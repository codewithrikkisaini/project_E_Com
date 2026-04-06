<?php

namespace App\Livewire\Admin\PaymentSettings\Form;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public TemporaryUploadedFile|null $qrImage = null;

    public ?string $existingQrImage = null;

    public string $instructions = "1. Scan the QR code.\n2. Complete payment with your preferred UPI app.\n3. Upload payment screenshot during checkout.";

    public function mount(): void
    {
        if (! Schema::hasTable('site_settings')) {
            return;
        }

        $this->existingQrImage = (string) SiteSetting::query()
            ->where('key', 'qr_payment_image')
            ->value('value');

        $savedInstructions = (string) SiteSetting::query()
            ->where('key', 'qr_payment_instructions')
            ->value('value');

        if ($savedInstructions !== '') {
            $this->instructions = $savedInstructions;
        }
    }

    protected function rules(): array
    {
        return [
            'qrImage' => ['nullable', 'image', 'max:4096'],
            'instructions' => ['required', 'string', 'max:5000'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        if (! Schema::hasTable('site_settings')) {
            session()->flash('error', 'Site settings table not found.');
            return;
        }

        $imagePath = $this->existingQrImage;

        if ($this->qrImage) {
            if ($this->existingQrImage) {
                Storage::disk('public')->delete($this->existingQrImage);
            }

            $imagePath = $this->qrImage->store('payment/qr', 'public');
            $this->existingQrImage = $imagePath;
        }

        SiteSetting::query()->updateOrCreate(
            ['key' => 'qr_payment_image'],
            ['value' => $imagePath]
        );

        SiteSetting::query()->updateOrCreate(
            ['key' => 'qr_payment_instructions'],
            ['value' => $validated['instructions']]
        );

        $this->qrImage = null;

        session()->flash('success', 'QR payment settings updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.payment-settings.form.form')
            ->layout('layouts.app');
    }
}
