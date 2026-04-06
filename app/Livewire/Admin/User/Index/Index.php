<?php

namespace App\Livewire\Admin\User\Index;

use App\Models\User;
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

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function deleteUser(int $id): void
    {
        $user = User::query()
            ->where('is_customer', true)
            ->findOrFail($id);

        $user->delete();

        session()->flash('success', 'User deleted successfully.');
    }

    public function render()
    {
        try {
            $query = User::query()
                ->where('is_customer', true)
                ->withCount('orders')
                ->when($this->search !== '', function ($builder) {
                    $builder->where(function ($innerQuery) {
                        $innerQuery->where('name', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%")
                            ->orWhere('phone', 'like', "%{$this->search}%");
                    });
                })
                ->latest('id');

            $totalUsers = (clone $query)->count();
            $users = $query->paginate(10);
        } catch (QueryException $exception) {
            report($exception);
            session()->now('error', 'Database connection failed. Please start MySQL and refresh this page.');
            $totalUsers = 0;
            $users = $this->emptyUsersPaginator();
        }

        return view('livewire.admin.user.index.index', [
            'users' => $users,
            'totalUsers' => $totalUsers,
        ])->layout('layouts.app');
    }

    private function emptyUsersPaginator(): LengthAwarePaginator
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
