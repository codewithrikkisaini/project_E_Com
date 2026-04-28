<?php

namespace App\Livewire\Admin\BlogCategory\Form;

use App\Models\BlogCategory;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Form extends Component
{
    use WithPagination;

    public ?BlogCategory $category = null;

    public bool $categoryFormOpen = false;

    public string $name = '';
    public string $slug = '';
    public bool $is_active = true;

    #[Url(as: 'q', keep: true)]
    public string $search = '';

    public function openCreateForm(): void
    {
        $this->createNew();
        $this->categoryFormOpen = true;
    }

    public function closeForm(): void
    {
        $this->categoryFormOpen = false;
        $this->createNew();
    }

    public function edit(int $id): void
    {
        $category = BlogCategory::findOrFail($id);
        $this->fillFromCategory($category);
        $this->categoryFormOpen = true;
    }

    public function createNew(): void
    {
        $this->category = null;
        $this->name = '';
        $this->slug = '';
        $this->is_active = true;
        $this->resetValidation();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function generateSlug(): void
    {
        $this->slug = Str::slug($this->name);
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:blog_categories,slug,' . ($this->category ? $this->category->id : 'NULL')],
            'is_active' => ['boolean'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        $saveData = [
            'name' => $validated['name'],
            'slug' => $validated['slug'],
        ];

        if (\Illuminate\Support\Facades\Schema::hasColumn('blog_categories', 'is_active')) {
            $saveData['is_active'] = $validated['is_active'];
        }

        if ($this->category) {
            $this->category->update($saveData);
            session()->flash('success', 'Blog Category updated successfully.');
        } else {
            BlogCategory::create($saveData);
            session()->flash('success', 'Blog Category created successfully.');
        }

        $this->closeForm();
    }

    public function delete(int $id): void
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        if ($this->category?->id === $id) {
            $this->createNew();
        }

        session()->flash('success', 'Blog Category deleted successfully.');
    }

    public function render()
    {
        try {
            $categories = BlogCategory::query()
                ->when($this->search !== '', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%");
                })
                ->latest('id')
                ->paginate(10);
        } catch (QueryException $exception) {
            report($exception);
            session()->now('error', 'Database connection failed. Please start MySQL and refresh this page.');
            $categories = $this->emptyPaginator();
        }

        return view('livewire.admin.blog-category.form.form', [
            'categories' => $categories,
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

    private function fillFromCategory(BlogCategory $category): void
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = (bool) $category->is_active;
        $this->resetValidation();
    }
}
