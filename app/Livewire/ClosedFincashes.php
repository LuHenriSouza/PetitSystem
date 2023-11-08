<?php

namespace App\Livewire;

use App\Models\{Fincash, OutflowType};
use Livewire\Component;
use Livewire\WithPagination;

class ClosedFincashes extends Component
{
    use WithPagination;

    public $selectedId;
    public $rowSelected;
    public $selectedFincashData;
    public $outflowTypes;

    public function render()
    {
        $finData = Fincash::orderBy('fincash_finalDate', 'asc')->paginate(10);

        return view('livewire.closed-fincashes', compact('finData'));
    }

    public function showReport($id)
    {
        $this->selectedId = $id;
        $this->rowSelected = $id;
        $this->selectedFincashData = Fincash::with('cashOutflows')->find($id);
        $this->outflowTypes = OutflowType::get();
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

    // TEST
    // No seu componente Livewire
    public function atualizarPagina()
    {
        // Execute a lógica necessária e, em seguida, emita o evento
        $this->dispatch('paginaAtualizada');
    }
}
