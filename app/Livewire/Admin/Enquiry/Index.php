<?php

namespace App\Livewire\Admin\Enquiry;

use App\Models\Enquiry;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(keep: true)]
    public string $type = 'general';

    public function mount()
    {
        $this->type = request()->query('type', 'general');
    }

    public function markAsRead(int $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update(['status' => 'read']);
        session()->flash('success', 'Enquiry marked as read.');
    }

    public function delete(int $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        session()->flash('success', 'Enquiry deleted successfully.');
    }

    public function render()
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('enquiries')) {
            \Illuminate\Support\Facades\Schema::create('enquiries', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->id();
                $table->string('type')->default('general');
                $table->string('name');
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('subject')->nullable();
                $table->longText('message')->nullable();
                $table->string('status')->default('unread');
                $table->timestamps();
            });
        }

        $enquiries = Enquiry::query()
            ->where('type', $this->type)
            ->latest()
            ->paginate(15);

        return view('livewire.admin.enquiry.index', [
            'enquiries' => $enquiries
        ])->layout('layouts.admin');
    }
}
