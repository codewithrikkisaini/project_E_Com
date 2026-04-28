<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Order;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $product;
    public $quantity = 1;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $postal_code = '';
    public $payment_screenshot;
    public $payment_note = '';

    public $qr_image = '';
    public $payment_instructions = '';

    public function mount()
    {
        $checkoutData = session()->get('checkout_item');
        
        if (!$checkoutData) {
            return redirect()->route('products');
        }

        $this->product = Product::find($checkoutData['product_id']);
        if (!$this->product) {
            return redirect()->route('products');
        }

        $this->quantity = $checkoutData['quantity'];
        
        if (Auth::check()) {
            $user = Auth::user();
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone ?? '';
            $this->address = $user->address ?? '';
        }

        $this->qr_image = SiteSetting::where('key', 'qr_payment_image')->value('value');
        $this->payment_instructions = SiteSetting::where('key', 'qr_payment_instructions')->value('value') 
            ?? "Scan QR, pay the amount, upload screenshot, then submit order.";
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

    public function placeOrder()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to place an order.');
            return;
        }

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_screenshot' => 'required|image|max:2048',
        ]);

        $screenshotPath = $this->payment_screenshot->store('payments', 'public');

        $order = Order::create([
            'user_id' => Auth::id(),
            'product_name' => $this->product->name,
            'total_amount' => $this->product->price * $this->quantity,
            'order_status' => 'pending',
            'payment_status' => 'pending',
            'payment_proof' => $screenshotPath,
            'notes' => $this->payment_note,
            'customer_name' => $this->name,
            'customer_mobile' => $this->phone,
            'ordered_at' => now(),
        ]);

        session()->forget('checkout_item');
        return redirect()->route('home')->with('success', 'Order placed successfully! Order ID: #' . $order->id);
    }

    public function render()
    {
        return view('livewire.frontend.checkout.index')->layout('layouts.app');
    }
}
