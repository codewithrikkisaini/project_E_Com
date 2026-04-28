<?php

namespace App\Livewire\Admin\Banner\Form;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public string $title = '';
    public string $description = '';
    public string $button1_text = '';
    public string $button1_url = '';
    public string $button2_text = '';
    public string $button2_url = '';

    public TemporaryUploadedFile|null $image = null;
    public ?string $existingImage = null;

    public function mount(): void
    {
        if (! Schema::hasTable('site_settings')) {
            return;
        }

        $settings = SiteSetting::query()
            ->whereIn('key', [
                'banner_title',
                'banner_description',
                'banner_button1_text',
                'banner_button1_url',
                'banner_button2_text',
                'banner_button2_url',
                'banner_image',
            ])
            ->pluck('value', 'key');

        $this->title = (string) ($settings['banner_title'] ?? '');
        $this->description = (string) ($settings['banner_description'] ?? '');
        $this->button1_text = (string) ($settings['banner_button1_text'] ?? '');
        $this->button1_url = (string) ($settings['banner_button1_url'] ?? '');
        $this->button2_text = (string) ($settings['banner_button2_text'] ?? '');
        $this->button2_url = (string) ($settings['banner_button2_url'] ?? '');
        $this->existingImage = (string) ($settings['banner_image'] ?? '');
    }

    protected function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'button1_text' => ['nullable', 'string', 'max:255'],
            'button1_url' => ['nullable', 'string', 'max:255'],
            'button2_text' => ['nullable', 'string', 'max:255'],
            'button2_url' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        if (! Schema::hasTable('site_settings')) {
            session()->flash('error', 'Site settings table not found.');
            return;
        }

        if ($this->image) {
            if ($this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
            $this->existingImage = $this->image->store('banner', 'public');
            $this->image = null;
        }

        $pairs = [
            'banner_title' => $validated['title'] ?? '',
            'banner_description' => $validated['description'] ?? '',
            'banner_button1_text' => $validated['button1_text'] ?? '',
            'banner_button1_url' => $validated['button1_url'] ?? '',
            'banner_button2_text' => $validated['button2_text'] ?? '',
            'banner_button2_url' => $validated['button2_url'] ?? '',
            'banner_image' => $this->existingImage ?? '',
        ];

        foreach ($pairs as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => (string) $value]
            );
        }

        session()->flash('success', 'Banner updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.banner.form.form')
            ->layout('layouts.admin');
    }
}
