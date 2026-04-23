<?php

namespace App\Livewire\Admin\Banner\Form;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public string $banner_title = '';

    public string $banner_description = '';

    public string $banner_button_1_text = 'Buy Now';

    public string $banner_button_1_url = '#single-product';

    public ?string $existingBannerImage = null;

    public TemporaryUploadedFile|null $banner_image = null;

    public ?string $statusMessage = null;

    public function mount(): void
    {
        $this->banner_title = (string) $this->settingValue('banner_title', 'Trusted Quality Medicines Partner in India');
        $this->banner_description = (string) $this->settingValue('banner_description', 'For over 10 years, Admin has been the trusted partner for healthcare professionals and retail partners.');
        $this->banner_button_1_text = (string) $this->settingValue('banner_button_1_text', 'Buy Now');
        $this->banner_button_1_url = (string) $this->settingValue('banner_button_1_url', '#single-product');
        $this->existingBannerImage = $this->settingValue('banner_image');
    }

    public function save(): void
    {
        $validated = $this->validate([
            'banner_title' => ['required', 'string', 'max:255'],
            'banner_description' => ['required', 'string', 'max:1000'],
            'banner_button_1_text' => ['required', 'string', 'max:60'],
            'banner_button_1_url' => ['nullable', 'string', 'max:255'],
            'banner_image' => ['nullable', 'image', 'max:4096'],
        ]);

        $imagePath = $this->existingBannerImage;

        if ($this->banner_image) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $this->banner_image->store('banners', 'public');
        }

        $this->storeSetting('banner_title', $validated['banner_title']);
        $this->storeSetting('banner_description', $validated['banner_description']);
        $this->storeSetting('banner_button_1_text', $validated['banner_button_1_text']);
        $this->storeSetting('banner_button_1_url', $validated['banner_button_1_url'] ?? '');
        $this->storeSetting('banner_image', (string) $imagePath);

        $this->existingBannerImage = $imagePath;
        $this->banner_image = null;
        $this->statusMessage = 'Banner updated successfully.';
        session()->flash('success', $this->statusMessage);
    }

    public function render()
    {
        return view('livewire.admin.banner.form.form')
            ->layout('layouts.app');
    }

    private function settingValue(string $key, string $default = ''): string
    {
        return (string) SiteSetting::query()
            ->where('key', $key)
            ->value('value') ?: $default;
    }

    private function storeSetting(string $key, string $value): void
    {
        SiteSetting::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
