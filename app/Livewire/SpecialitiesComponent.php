<?php

namespace App\Livewire;

use App\Models\Specialities;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialitiesComponent extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $sortDirection = 'ASC';
    public $sortColumn = 'speciality_name';

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

    public function delete($speciality_id)
    {
        $speciality = Specialities::find($speciality_id);
        $speciality->delete();
        session()->flash('error', 'Speciality deleted successfully.');
        return $this->redirect('/admin/specialities', navigate: true);
    }

    public function render()
    {

        $specialities = Specialities::search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perPage);

        //dd($specialities);

        return view('livewire.specialities-component', [
            'specialities' => $specialities
        ]);
    }

}
