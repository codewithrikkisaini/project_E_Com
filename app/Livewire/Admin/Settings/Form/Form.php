<?php

namespace App\Livewire\Admin\Settings\Form;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public string $website_name = '';
    public string $iso_certification = '';
    public string $email = '';
    public string $mobiles = '';
    public string $whatsapp = '';
    public string $google_map_embed = '';
    public string $facebook = '';
    public string $instagram = '';
    public string $linkedin = '';
    public string $youtube = '';
    public string $twitter_x = '';
    public string $footer_text = '';
    public string $company_profile = '';
    public string $live_chat_widget = '';
    public string $address = '';

    public TemporaryUploadedFile|null $light_logo = null;
    public TemporaryUploadedFile|null $dark_logo = null;

    public ?string $existingLightLogo = null;
    public ?string $existingDarkLogo = null;

    public function mount(): void
    {
        if (! Schema::hasTable('site_settings')) {
            return;
        }

        $settings = SiteSetting::query()
            ->whereIn('key', [
                'settings_website_name',
                'settings_iso_certification',
                'settings_email',
                'settings_mobiles',
                'settings_whatsapp',
                'settings_google_map_embed',
                'settings_facebook',
                'settings_instagram',
                'settings_linkedin',
                'settings_youtube',
                'settings_twitter_x',
                'settings_footer_text',
                'settings_company_profile',
                'settings_live_chat_widget',
                'settings_address',
                'settings_light_logo',
                'settings_dark_logo',
            ])
            ->pluck('value', 'key');

        $this->website_name = (string) ($settings['settings_website_name'] ?? '');
        $this->iso_certification = (string) ($settings['settings_iso_certification'] ?? '');
        $this->email = (string) ($settings['settings_email'] ?? '');
        $this->mobiles = (string) ($settings['settings_mobiles'] ?? '');
        $this->whatsapp = (string) ($settings['settings_whatsapp'] ?? '');
        $this->google_map_embed = (string) ($settings['settings_google_map_embed'] ?? '');
        $this->facebook = (string) ($settings['settings_facebook'] ?? '');
        $this->instagram = (string) ($settings['settings_instagram'] ?? '');
        $this->linkedin = (string) ($settings['settings_linkedin'] ?? '');
        $this->youtube = (string) ($settings['settings_youtube'] ?? '');
        $this->twitter_x = (string) ($settings['settings_twitter_x'] ?? '');
        $this->footer_text = (string) ($settings['settings_footer_text'] ?? '');
        $this->company_profile = (string) ($settings['settings_company_profile'] ?? '');
        $this->live_chat_widget = (string) ($settings['settings_live_chat_widget'] ?? '');
        $this->address = (string) ($settings['settings_address'] ?? '');
        $this->existingLightLogo = (string) ($settings['settings_light_logo'] ?? '');
        $this->existingDarkLogo = (string) ($settings['settings_dark_logo'] ?? '');
    }

    protected function rules(): array
    {
        return [
            'website_name' => ['nullable', 'string', 'max:255'],
            'iso_certification' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'mobiles' => ['nullable', 'string', 'max:1000'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
            'google_map_embed' => ['nullable', 'string', 'max:5000'],
            'facebook' => ['nullable', 'string', 'max:1000'],
            'instagram' => ['nullable', 'string', 'max:1000'],
            'linkedin' => ['nullable', 'string', 'max:1000'],
            'youtube' => ['nullable', 'string', 'max:1000'],
            'twitter_x' => ['nullable', 'string', 'max:1000'],
            'footer_text' => ['nullable', 'string', 'max:2000'],
            'company_profile' => ['nullable', 'string', 'max:10000'],
            'live_chat_widget' => ['nullable', 'string', 'max:10000'],
            'address' => ['nullable', 'string', 'max:5000'],
            'light_logo' => ['nullable', 'image', 'max:4096'],
            'dark_logo' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        if (! Schema::hasTable('site_settings')) {
            session()->flash('error', 'Site settings table not found.');
            return;
        }

        if ($this->light_logo) {
            if ($this->existingLightLogo) {
                Storage::disk('public')->delete($this->existingLightLogo);
            }
            $this->existingLightLogo = $this->light_logo->store('settings/logos', 'public');
            $this->light_logo = null;
        }

        if ($this->dark_logo) {
            if ($this->existingDarkLogo) {
                Storage::disk('public')->delete($this->existingDarkLogo);
            }
            $this->existingDarkLogo = $this->dark_logo->store('settings/logos', 'public');
            $this->dark_logo = null;
        }

        $pairs = [
            'settings_website_name' => $validated['website_name'] ?? '',
            'settings_iso_certification' => $validated['iso_certification'] ?? '',
            'settings_email' => $validated['email'] ?? '',
            'settings_mobiles' => $validated['mobiles'] ?? '',
            'settings_whatsapp' => $validated['whatsapp'] ?? '',
            'settings_google_map_embed' => $validated['google_map_embed'] ?? '',
            'settings_facebook' => $validated['facebook'] ?? '',
            'settings_instagram' => $validated['instagram'] ?? '',
            'settings_linkedin' => $validated['linkedin'] ?? '',
            'settings_youtube' => $validated['youtube'] ?? '',
            'settings_twitter_x' => $validated['twitter_x'] ?? '',
            'settings_footer_text' => $validated['footer_text'] ?? '',
            'settings_company_profile' => $validated['company_profile'] ?? '',
            'settings_live_chat_widget' => $validated['live_chat_widget'] ?? '',
            'settings_address' => $validated['address'] ?? '',
            'settings_light_logo' => $this->existingLightLogo ?? '',
            'settings_dark_logo' => $this->existingDarkLogo ?? '',
        ];

        foreach ($pairs as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => (string) $value]
            );
        }

        session()->flash('success', 'Settings updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.settings.form.form')
            ->layout('layouts.app');
    }
}
