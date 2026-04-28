<?php

namespace App\Livewire\Frontend\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'q', keep: true)]
    public string $search = '';

    #[Url(as: 'cat', keep: true)]
    public string $categoryId = '';

    #[Url(as: 'tag', keep: true)]
    public string $tag = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategoryId(): void
    {
        $this->resetPage();
    }

    public function updatingTag(): void
    {
        $this->resetPage();
    }

    public function setCategory($id)
    {
        $this->categoryId = $id;
        $this->resetPage();
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
        $this->resetPage();
    }

    public function render()
    {
        try {
            if (!\Illuminate\Support\Facades\Schema::hasTable('blogs')) {
                return $this->renderEmpty();
            }

            $query = Blog::query()
                ->with('category')
                ->where('is_published', true);

            if ($this->search !== '') {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                      ->orWhere('content', 'like', "%{$this->search}%");
                });
            }

            if ($this->categoryId !== '') {
                $query->where('blog_category_id', $this->categoryId);
            }

            if ($this->tag !== '') {
                if (\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'tags')) {
                    $query->where('tags', 'like', "%{$this->tag}%");
                }
            }

            $blogs = $query->latest('id')->paginate(9);

            // Fetch categories with counts
            $categories = BlogCategory::withCount(['blogs' => function ($query) {
                $query->where('is_published', true);
            }])->get();

            // Extract unique tags (if column exists)
            $allTags = [];
            if (\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'tags')) {
                $tagsData = Blog::where('is_published', true)->whereNotNull('tags')->where('tags', '!=', '')->pluck('tags');
                foreach ($tagsData as $tStr) {
                    $tagsArray = explode(',', $tStr);
                    foreach ($tagsArray as $t) {
                        $t = trim($t);
                        if (!empty($t) && !in_array($t, $allTags)) {
                            $allTags[] = $t;
                        }
                    }
                }
            }

            return view('livewire.frontend.blog.index', [
                'blogs' => $blogs,
                'categories' => $categories,
                'allTags' => collect($allTags)->take(15)
            ])->layout('layouts.app');

        } catch (QueryException $exception) {
            return $this->renderEmpty();
        }
    }

    private function renderEmpty()
    {
        return view('livewire.frontend.blog.index', [
            'blogs' => $this->emptyPaginator(),
            'categories' => collect(),
            'allTags' => collect()
        ])->layout('layouts.app');
    }

    private function emptyPaginator(): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            collect(),
            0,
            9,
            LengthAwarePaginator::resolveCurrentPage(),
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
    }
}
