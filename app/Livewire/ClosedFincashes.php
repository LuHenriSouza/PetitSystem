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

    // CASH OUTFLOW INPUT

    public $numberOfInputs = 0;
    public $inputValues = [];
    public $selectValues = [];

    public function addInput($add)
    {
        if ($add) {
            $this->numberOfInputs++;
        }
        if (!$add) {
            $this->numberOfInputs--;
        }
    }

    // CALCULATOR

    public $calcModalIsOpened = false;

    public function openCalcModal()
    {

        $this->calcModalIsOpened = true;
    }

    public function closeCalcModal()
    {
        $this->calcModalIsOpened = false;
    }
}
