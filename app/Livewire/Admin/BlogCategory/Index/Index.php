<?php

namespace App\Livewire\Admin\BlogCategory\Index;

use App\Models\BlogCategory;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'q', keep: true)]
    public string $search = '';

    #[Url(as: 'pp', keep: true)]
    public int $perPage = 10;

    public bool $showFormModal = false;

    public string $name = '';

    public string $slug = '';

    public ?int $editingId = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->showFormModal = true;
    }

    public function openEditModal(int $id): void
    {
        $category = BlogCategory::query()->findOrFail($id);

        $this->editingId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->showFormModal = true;
    }

    public function closeModal(): void
    {
        $this->showFormModal = false;
    }

    public function saveCategory(): void
    {
        $this->name = trim($this->name);
        $this->slug = Str::slug($this->slug);

        if ($this->slug === '') {
            $this->slug = Str::slug($this->name);
        }

        $validated = $this->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('blog_categories', 'name')->ignore($this->editingId),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('blog_categories', 'slug')->ignore($this->editingId),
            ],
        ]);

        $baseSlug = $validated['slug'];
        $slug = $baseSlug;
        $counter = 1;

        while (
            BlogCategory::query()
                ->where('slug', $slug)
                ->when($this->editingId, fn ($query) => $query->where('id', '!=', $this->editingId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        BlogCategory::query()->updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => $validated['name'],
                'slug' => $slug,
            ]
        );

        session()->flash('success', $this->editingId ? 'Category updated successfully.' : 'Category created successfully.');

        $this->resetForm();
        $this->showFormModal = false;
    }

    public function deleteCategory(int $id): void
    {
        BlogCategory::query()->findOrFail($id)->delete();

        session()->flash('success', 'Category deleted successfully.');

        $this->resetPageIfNeeded();
    }

    public function render()
    {
        try {
            $query = BlogCategory::query()
                ->when($this->search !== '', fn ($builder) => $builder->where('name', 'like', "%{$this->search}%"))
                ->latest('id');

            $totalCategories = (clone $query)->count();
            $categories = $query->paginate($this->perPage);
        } catch (QueryException $exception) {
            report($exception);
            session()->now('error', 'Database connection failed. Please start MySQL and refresh this page.');
            $totalCategories = 0;
            $categories = $this->emptyPaginator();
        }

        return view('livewire.admin.blog-category.index.index', [
            'categories' => $categories,
            'totalCategories' => $totalCategories,
        ])->layout('layouts.app');
    }

    private function resetForm(): void
    {
        $this->resetValidation();
        $this->editingId = null;
        $this->name = '';
        $this->slug = '';
    }

    private function resetPageIfNeeded(): void
    {
        if ($this->getPage() > 1 && BlogCategory::query()->paginate($this->perPage, ['*'], 'page', $this->getPage())->isEmpty()) {
            $this->previousPage();
        }
    }

    private function emptyPaginator(): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            collect(),
            0,
            $this->perPage,
            LengthAwarePaginator::resolveCurrentPage(),
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
    }
}
