<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Dashboard extends Component
{
    public string $aboutContent = '';

    public string $pageTitle = 'Dashboard';

    public ?string $statusMessage = null;

    public bool $isAboutPage = false;

    public function mount(): void
    {
        $this->isAboutPage = request()->is('admin/about');
        $this->pageTitle = $this->resolvePageTitle();

        if ($this->isAboutPage) {
            $this->aboutContent = $this->getAboutContent();
        }
    }

    public function saveAboutContent(): void
    {
        if (! $this->isAboutPage) {
            return;
        }

        $this->validate([
            'aboutContent' => ['nullable', 'string'],
        ]);

        if (Schema::hasTable('site_settings')) {
            SiteSetting::query()->updateOrCreate(
                ['key' => 'about_content'],
                ['value' => $this->aboutContent]
            );
        }

        $this->statusMessage = 'About content updated successfully.';
        session()->flash('status', $this->statusMessage);
    }

    private function resolvePageTitle(): string
    {
        return match (true) {
            $this->isAboutPage => 'About Page',
            request()->is('admin/products') => 'Products',
            request()->is('admin/banner') => 'Banner',
            request()->is('admin/services') => 'Services',
            request()->is('admin/testimonials') => 'Testimonials',
            request()->is('admin/orders') => 'Orders',
            request()->is('admin/users') => 'Users',
            request()->is('admin/payment-settings') => 'QR Payment',
            request()->is('admin/settings') => 'Settings',
            request()->is('admin/blog-categories') => 'Blog Categories',
            request()->is('admin/blogs') => 'Blogs',
            request()->is('admin/enquiries') => 'Enquiries',
            default => 'Dashboard',
        };
    }

    private function getAboutContent(): string
    {
        if (! Schema::hasTable('site_settings')) {
            return '';
        }

        return (string) SiteSetting::query()
            ->where('key', 'about_content')
            ->value('value');
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.app');
    }
}
