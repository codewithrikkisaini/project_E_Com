<?php

namespace App\Livewire\Admin\Product\Form;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Form extends Component
{
    use WithFileUploads;
    use WithPagination;

    public ?Product $product = null;

    public string $name = '';
    public string $slug = '';
    public int $stock = 0;
    public string $price = '0';
    public string $description = '';
    public string $content = '';

    public TemporaryUploadedFile|null $image = null;
    public ?string $existingImage = null;

    public string $meta_title = '';
    public string $meta_description = '';
    public string $meta_keywords = '';

    public bool $autoSlug = true;

    #[Url(as: 'q', keep: true)]
    public string $search = '';

    public function mount(?Product $product = null): void
    {
        $this->product = $product?->exists ? $product : null;

        if ($this->product) {
            $this->fillFromProduct($this->product);
        }
    }

    public function edit(int $id): void
    {
        $product = Product::findOrFail($id);
        $this->fillFromProduct($product);
    }

    public function createNew(): void
    {
        $this->product = null;
        $this->name = '';
        $this->slug = '';
        $this->stock = 0;
        $this->price = '0';
        $this->description = '';
        $this->content = '';
        $this->image = null;
        $this->existingImage = null;
        $this->meta_title = '';
        $this->meta_description = '';
        $this->meta_keywords = '';
        $this->autoSlug = true;
        $this->resetValidation();
    }

    public function updatedName(string $value): void
    {
        if ($this->autoSlug) {
            $this->slug = Str::slug($value);
        }
    }

    public function updatedSlug(): void
    {
        $this->autoSlug = false;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    protected function rules(): array
    {
        $productId = $this->product?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug,' . $productId],
            'stock' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->image) {
            if ($this->existingImage) {
                \Storage::disk('public')->delete($this->existingImage);
            }

            $validated['image'] = $this->image->store('products', 'public');
        } else {
            $validated['image'] = $this->existingImage;
        }

        $validated['price'] = (float) $validated['price'];

        if ($this->product) {
            $this->product->update($validated);
            session()->flash('success', 'Product updated successfully.');
        } else {
            Product::create($validated);
            session()->flash('success', 'Product created successfully.');
        }

        return $this->redirectRoute('admin.products', navigate: true);
    }

    public function delete(int $id): void
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        if ($this->product?->id === $id) {
            $this->redirectRoute('admin.products', navigate: true);
            return;
        }

        session()->flash('success', 'Product deleted successfully.');
    }

    public function render()
    {
        try {
            $products = Product::query()
                ->when($this->search !== '', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%");
                })
                ->latest()
                ->paginate(10);
        } catch (QueryException $exception) {
            report($exception);
            session()->now('error', 'Database connection failed. Please start MySQL and refresh this page.');
            $products = $this->emptyProductsPaginator();
        }

        return view('livewire.admin.product.form.form', [
            'products' => $products,
        ])
            ->layout('layouts.app');
    }

    private function emptyProductsPaginator(): LengthAwarePaginator
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

    private function fillFromProduct(Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->stock = (int) $product->stock;
        $this->price = (string) $product->price;
        $this->description = (string) $product->description;
        $this->content = (string) $product->content;
        $this->image = null;
        $this->existingImage = $product->image;
        $this->meta_title = (string) $product->meta_title;
        $this->meta_description = (string) $product->meta_description;
        $this->meta_keywords = (string) $product->meta_keywords;
        $this->autoSlug = false;
        $this->resetValidation();
    }
}
