<?php

namespace App\Livewire\Admin\Order\Index;

use App\Models\Order;
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

    #[Url(as: 'payment', keep: true)]
    public string $paymentStatus = '';

    #[Url(as: 'status', keep: true)]
    public string $orderStatus = '';

    #[Url(as: 'from', keep: true)]
    public string $fromDate = '';

    #[Url(as: 'to', keep: true)]
    public string $toDate = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingPaymentStatus(): void
    {
        $this->resetPage();
    }

    public function updatingOrderStatus(): void
    {
        $this->resetPage();
    }

    public function updatingFromDate(): void
    {
        $this->resetPage();
    }

    public function updatingToDate(): void
    {
        $this->resetPage();
    }

    public function changePaymentStatus(int $id, string $status): void
    {
        if (! in_array($status, ['pending', 'verified', 'rejected'], true)) {
            return;
        }

        $order = Order::findOrFail($id);

        $order->update([
            'payment_status' => $status,
            'payment_verified_at' => $status === 'verified' ? now() : null,
        ]);

        session()->flash('success', 'Payment status updated successfully.');
    }

    public function changeOrderStatus(int $id, string $status): void
    {
        if (! in_array($status, ['new', 'processing', 'shipped', 'delivered', 'cancelled'], true)) {
            return;
        }

        $order = Order::findOrFail($id);
        $order->update([
            'order_status' => $status,
        ]);

        session()->flash('success', 'Order status updated successfully.');
    }

    public function render()
    {
        try {
            $orders = Order::query()
                ->when($this->search !== '', function ($query) {
                    $query->where(function ($innerQuery) {
                        $innerQuery->where('order_number', 'like', "%{$this->search}%")
                            ->orWhere('customer_name', 'like', "%{$this->search}%")
                            ->orWhere('customer_mobile', 'like', "%{$this->search}%")
                            ->orWhere('product_name', 'like', "%{$this->search}%");
                    });
                })
                ->when($this->paymentStatus !== '', function ($query) {
                    $query->where('payment_status', $this->paymentStatus);
                })
                ->when($this->orderStatus !== '', function ($query) {
                    $query->where('order_status', $this->orderStatus);
                })
                ->when($this->fromDate !== '', function ($query) {
                    $query->whereDate('ordered_at', '>=', $this->fromDate);
                })
                ->when($this->toDate !== '', function ($query) {
                    $query->whereDate('ordered_at', '<=', $this->toDate);
                })
                ->latest('ordered_at')
                ->latest('id')
                ->paginate(10);
        } catch (QueryException $exception) {
            report($exception);
            session()->now('error', 'Database connection failed. Please start MySQL and refresh this page.');
            $orders = $this->emptyOrdersPaginator();
        }

        return view('livewire.admin.order.index.index', [
            'orders' => $orders,
        ])->layout('layouts.admin');
    }

    private function emptyOrdersPaginator(): LengthAwarePaginator
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
}
