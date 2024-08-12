<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class FeaturedDoctors extends Component
{

    public $featuredDoctors;

    public function mount($speciality_id)
    {
        if($speciality_id != 0)
        {
            $this->featuredDoctors = Doctor::with('speciality', 'user')->whereHas('speciality', function($query) use($speciality_id){
                $query->where('id', $speciality_id);
            })->get();
        }else{
            $this->featuredDoctors = Doctor::with('speciality', 'user')->get();
        }
        
    }

    public function render()
    {
        return view('livewire.featured-doctors');
    }
}
