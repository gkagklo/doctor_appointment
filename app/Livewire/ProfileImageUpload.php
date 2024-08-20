<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ProfileImageUpload extends Component
{

    use WithFileUploads;

    public $profile_image;

    public function mount()
    {
        $this->profile_image = auth()->user()->profile_image;
    }

    public function save()
    {
        $this->validate([
            'profile_image' => ['nullable', 'image', 'max:1024']
        ]);

        if($this->profile_image){
            $path = $this->profile_image->store('public/profiles');
            $user = User::find(auth()->user()->id);
            $user->update([
                'profile_image' => $path
            ]);  
            $this->dispatch('profile-updated', name: $user->name);

            return $this->redirect('/profile', navigate:true);
        }

    }

    public function render()
    {
        return view('livewire.profile-image-upload');
    }
}
