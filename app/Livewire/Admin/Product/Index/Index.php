<?php

namespace App\Livewire\Admin\Product\Index;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'q', keep: true)]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        session()->flash('success', 'Product deleted successfully.');
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->search !== '', function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('slug', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.product.index.index', [
            'products' => $products,
        ])->layout('layouts.app');
    }
}
