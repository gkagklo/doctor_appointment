<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class DoctorListingComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $sortDirection = 'ASC';
    public $sortColumn = 'name';

    public function doSort($column)
    {
        if($this->sortColumn === $column){
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($doctor_id)
    {
        $doctor = Doctor::find($doctor_id);
        $doctor->delete();
        $user = User::find($doctor->user_id);
        $user->delete();
        session()->flash('error', 'Doctor deleted successfully.');
        return $this->redirect('/admin/doctors', navigate: true);
    }

    public function featured($doctor_id)
    {
        $doctor = Doctor::find($doctor_id); 
        if($doctor->is_featured == 0){
            $doctor->update([
                'is_featured' => 1
            ]);
        }else{
            $doctor->update([
                'is_featured' => 0
            ]); 
        }
        session()->flash('message', 'Doctor featured updated successfully.');
        return $this->redirect('/admin/doctors', navigate: true);       
    }

    public function render()
    { 
        $doctors = Doctor::with('speciality','user')->join('users', 'users.id', '=', 'doctors.user_id')
        ->select('doctors.*')        
        ->search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.doctor-listing-component', [
            'doctors' => $doctors
        ]);
    }
}
