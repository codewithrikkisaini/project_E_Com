<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Dashboard extends Component
{
    public string $aboutContent = '';
    public string $aboutStat1Value = '';
    public string $aboutStat1Label = '';
    public string $aboutStat2Value = '';
    public string $aboutStat2Label = '';

    public string $pageTitle = 'Dashboard';

    public ?string $statusMessage = null;

    public bool $isAboutPage = false;

    public function mount(): void
    {
        $this->isAboutPage = request()->is('admin/about');
        $this->pageTitle = $this->resolvePageTitle();

        if ($this->isAboutPage) {
            $this->aboutContent = $this->getAboutContent();
            
            if (Schema::hasTable('site_settings')) {
                $settings = SiteSetting::whereIn('key', [
                    'about_stat_1_value', 'about_stat_1_label',
                    'about_stat_2_value', 'about_stat_2_label'
                ])->pluck('value', 'key');

                $this->aboutStat1Value = $settings['about_stat_1_value'] ?? '100%';
                $this->aboutStat1Label = $settings['about_stat_1_label'] ?? 'Organic';
                $this->aboutStat2Value = $settings['about_stat_2_value'] ?? '50k+';
                $this->aboutStat2Label = $settings['about_stat_2_label'] ?? 'Happy Customers';
            }
        }
    }

    public function getStats(): array
    {
        if ($this->pageTitle !== 'Dashboard') {
            return [];
        }

        try {
            return [
                'products' => \App\Models\Product::count(),
                'users' => \App\Models\User::where('is_customer', true)->count(),
                'orders' => \App\Models\Order::count() ?? 0,
            ];
        } catch (\Exception $e) {
            return [
                'products' => 0,
                'users' => 0,
                'orders' => 0,
            ];
        }
    }

    public function saveAboutContent(): void
    {
        if (! $this->isAboutPage) {
            return;
        }

        $this->validate([
            'aboutContent' => ['nullable', 'string'],
            'aboutStat1Value' => ['nullable', 'string'],
            'aboutStat1Label' => ['nullable', 'string'],
            'aboutStat2Value' => ['nullable', 'string'],
            'aboutStat2Label' => ['nullable', 'string'],
        ]);

        if (Schema::hasTable('site_settings')) {
            $data = [
                'about_content' => $this->aboutContent,
                'about_stat_1_value' => $this->aboutStat1Value,
                'about_stat_1_label' => $this->aboutStat1Label,
                'about_stat_2_value' => $this->aboutStat2Value,
                'about_stat_2_label' => $this->aboutStat2Label,
            ];

            foreach ($data as $key => $value) {
                SiteSetting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        $this->statusMessage = 'About page content and stats updated successfully.';
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
        try {
            Schema::hasTable('site_settings');
        } catch (\Exception $e) {
            session()->now('error', 'Database connection failed. Please visit /setup-db and then /migrate to fix it.');
        }

        return view('livewire.admin.dashboard')
            ->layout('layouts.admin');
    }
}
