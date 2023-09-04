<?php

namespace App\Livewire;

use App\Models\Fincash;
use Livewire\Component;
use Livewire\WithPagination;

class ClosedFincashes extends Component
{
    use WithPagination;

    public $selectedId;
    public $rowSelected;


    public function render()
    {
        $finData = Fincash::orderBy('fincash_finalDate', 'asc')->paginate(10);

        return view('livewire.closed-fincashes', compact('finData'));
    }

    public function showReport($id)
    {
        $this->selectedId = $id;
        $this->rowSelected = $id;
    }
}
