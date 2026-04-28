<?php

namespace App\Livewire\Admin\Blog\Form;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Form extends Component
{
    use WithFileUploads;
    use WithPagination;

    public ?Blog $blog = null;
    public bool $blogFormOpen = false;

    public $blog_category_id = '';
    public string $title = '';
    public string $slug = '';
    public string $content = '';
    public bool $is_published = true;
    public string $tags = '';
    public string $meta_title = '';
    public string $meta_description = '';
    public string $meta_keywords = '';

    public TemporaryUploadedFile|null $image = null;
    public ?string $existingImage = null;

    #[Url(as: 'q', keep: true)]
    public string $search = '';

    #[Url(as: 'cat', keep: true)]
    public string $categoryId = '';

    #[Url(as: 'status', keep: true)]
    public string $status = '';

    public function edit(Blog $blog): void
    {
        $this->blog = $blog;
        $this->blog_category_id = $blog->blog_category_id ?? '';
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->content = $blog->content;
        $this->is_published = (bool) $blog->is_published;
        
        $this->tags = $blog->tags ?? '';
        $this->meta_title = $blog->meta_title ?? '';
        $this->meta_description = $blog->meta_description ?? '';
        $this->meta_keywords = $blog->meta_keywords ?? '';

        $this->existingImage = $blog->image;
        $this->image = null;
        $this->blogFormOpen = true;
        $this->resetValidation();
    }

    public function createNew(): void
    {
        $this->blog = null;
        $this->blog_category_id = '';
        $this->title = '';
        $this->slug = '';
        $this->content = '';
        $this->is_published = true;
        $this->tags = '';
        $this->meta_title = '';
        $this->meta_description = '';
        $this->meta_keywords = '';
        $this->image = null;
        $this->existingImage = null;
        $this->resetValidation();
    }

    public function openCreateForm(): void
    {
        $this->blogFormOpen = true;
        $this->createNew();
    }

    public function closeForm(): void
    {
        $this->blogFormOpen = false;
        $this->createNew();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function generateSlug(): void
    {
        $this->slug = Str::slug($this->title);
    }

    protected function rules(): array
    {
        return [
            'blog_category_id' => ['nullable', 'exists:blog_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:blogs,slug,' . ($this->blog ? $this->blog->id : 'NULL')],
            'content' => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
            'tags' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function save(): void
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('blogs')) {
            \Illuminate\Support\Facades\Schema::create('blogs', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->id();
                $table->foreignId('blog_category_id')->nullable()->constrained()->nullOnDelete();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('image')->nullable();
                $table->longText('content')->nullable();
                $table->boolean('is_published')->default(true);
                $table->timestamps();
            });
        }

        $validated = $this->validate();

        if ($this->image) {
            if ($this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
            $validated['image'] = $this->image->store('blogs', 'public');
        } else {
            $validated['image'] = $this->existingImage;
        }

        $saveData = [
            'blog_category_id' => $validated['blog_category_id'] ?: null,
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'is_published' => $validated['is_published'],
            'image' => $validated['image'],
        ];

        if (\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'tags')) $saveData['tags'] = $validated['tags'];
        if (\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'meta_title')) $saveData['meta_title'] = $validated['meta_title'];
        if (\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'meta_description')) $saveData['meta_description'] = $validated['meta_description'];
        if (\Illuminate\Support\Facades\Schema::hasColumn('blogs', 'meta_keywords')) $saveData['meta_keywords'] = $validated['meta_keywords'];

        if ($this->blog) {
            $this->blog->update($saveData);
            session()->flash('success', 'Blog post updated successfully.');
        } else {
            Blog::create($saveData);
            session()->flash('success', 'Blog post created successfully.');
        }

        $this->closeForm();
    }

    public function delete(int $id): void
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        if ($this->blog?->id === $id) {
            $this->closeForm();
        }

        session()->flash('success', 'Blog Post deleted successfully.');
    }

    public function render()
    {
        try {
            $blogs = Blog::query()
                ->with('category')
                ->when($this->search !== '', function ($query) {
                    $query->where('title', 'like', "%{$this->search}%");
                })
                ->when($this->categoryId !== '', function ($query) {
                    $query->where('blog_category_id', $this->categoryId);
                })
                ->when($this->status !== '', function ($query) {
                    if ($this->status === 'published') {
                        $query->where('is_published', true);
                    } elseif ($this->status === 'draft') {
                        $query->where('is_published', false);
                    }
                })
                ->latest('id')
                ->paginate(10);
        } catch (QueryException $exception) {
            report($exception);
            session()->now('error', 'Database connection failed. Please start MySQL and refresh this page.');
            $blogs = $this->emptyPaginator();
        }

        return view('livewire.admin.blog.form.form', [
            'blogs' => $blogs,
            'categories' => BlogCategory::orderBy('name')->get(),
        ])->layout('layouts.admin');
    }

    private function emptyPaginator(): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            collect(),
            0,
            10,
            LengthAwarePaginator::resolveCurrentPage(),
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
    }

    private function fillFromBlog(Blog $blog): void
    {
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->blog_category_id = $blog->blog_category_id;
        $this->content = (string) $blog->content;
        $this->is_published = (bool) $blog->is_published;
        $this->image = null;
        $this->existingImage = $blog->image;
        $this->resetValidation();
    }
}
