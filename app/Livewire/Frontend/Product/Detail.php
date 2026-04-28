<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public Product $product;
    public int $quantity = 1;

    public function mount($slug = null)
    {
        if ($slug) {
            $this->product = Product::where('slug', $slug)->firstOrFail();
        } else {
            // Default to first product if none specified (for single product shop feel)
            $this->product = Product::first() ?? new Product();
        }
    }

    public function increment()
    {
        if ($this->quantity < ($this->product->stock ?? 999)) {
            $this->quantity++;
        }
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function buyNow()
    {
        // Redirect to checkout or handle order logic
        session()->put('checkout_item', [
            'product_id' => $this->product->id,
            'quantity' => $this->quantity,
            'price' => $this->product->price
        ]);
        
        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.frontend.product.detail')->layout('layouts.app');
    }
}
