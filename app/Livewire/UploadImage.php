<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UploadImage extends Component
{
    use WithFileUploads;

    public $image;
    public $imageUrl;
    public $publicId;

    public function upload()
    {
        $this->validate([
            'image' => 'required|image|max:4096', // 4MB limit
        ]);

        try {
            $upload = Cloudinary::upload($this->image->getRealPath(), [
                'folder' => 'properties',
            ]);

            $this->imageUrl = $upload->getSecurePath();
            $this->publicId = $upload->getPublicId();

            // Optionally, emit an event to parent form
            $this->emit('imageUploaded', [
                'image_url' => $this->imageUrl,
                'public_id' => $this->publicId,
            ]);

            session()->flash('success', 'Image uploaded successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Upload failed: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.upload-image');
    }
}
