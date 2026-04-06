<?php

namespace App\Livewire\Admin\Testimonial\Form;

use App\Models\Testimonial;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Form extends Component
{
    use WithFileUploads;
    use WithPagination;

    public ?Testimonial $testimonial = null;

    public string $name = '';
    public int $rating = 5;
    public int $sort_order = 0;
    public bool $is_active = true;
    public string $message = '';

    public TemporaryUploadedFile|null $photo = null;
    public ?string $existingPhoto = null;

    #[Url(as: 'q', keep: true)]
    public string $search = '';

    public function edit(int $id): void
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->fillFromTestimonial($testimonial);
    }

    public function createNew(): void
    {
        $this->testimonial = null;
        $this->name = '';
        $this->rating = 5;
        $this->sort_order = 0;
        $this->is_active = true;
        $this->message = '';
        $this->photo = null;
        $this->existingPhoto = null;
        $this->resetValidation();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
            'message' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->photo) {
            if ($this->existingPhoto) {
                \Storage::disk('public')->delete($this->existingPhoto);
            }

            $validated['photo'] = $this->photo->store('testimonials', 'public');
        } else {
            $validated['photo'] = $this->existingPhoto;
        }

        if ($this->testimonial) {
            $this->testimonial->update($validated);
            session()->flash('success', 'Testimonial updated successfully.');
        } else {
            Testimonial::create($validated);
            session()->flash('success', 'Testimonial created successfully.');
        }

        $this->createNew();
    }

    public function delete(int $id): void
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->photo) {
            \Storage::disk('public')->delete($testimonial->photo);
        }

        $testimonial->delete();

        if ($this->testimonial?->id === $id) {
            $this->createNew();
        }

        session()->flash('success', 'Testimonial deleted successfully.');
    }

    public function render()
    {
        try {
            $testimonials = Testimonial::query()
                ->when($this->search !== '', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('message', 'like', "%{$this->search}%");
                })
                ->orderBy('sort_order')
                ->latest('id')
                ->paginate(10);
        } catch (QueryException $exception) {
            report($exception);
            session()->now('error', 'Database connection failed. Please start MySQL and refresh this page.');
            $testimonials = $this->emptyTestimonialsPaginator();
        }

        return view('livewire.admin.testimonial.form.form', [
            'testimonials' => $testimonials,
        ])->layout('layouts.app');
    }

    private function emptyTestimonialsPaginator(): LengthAwarePaginator
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

    private function fillFromTestimonial(Testimonial $testimonial): void
    {
        $this->testimonial = $testimonial;
        $this->name = $testimonial->name;
        $this->rating = (int) $testimonial->rating;
        $this->sort_order = (int) $testimonial->sort_order;
        $this->is_active = (bool) $testimonial->is_active;
        $this->message = (string) $testimonial->message;
        $this->photo = null;
        $this->existingPhoto = $testimonial->photo;
        $this->resetValidation();
    }
}
