<?php

namespace App\Livewire;

use App\Models\Fincash;
use Livewire\Component;
use Livewire\WithPagination;

class ClosedFincashes extends Component
{
    use WithPagination;

    public function render()
    {
        $finData = Fincash::orderBy('fincash_finalDate')->paginate(10);

        return view('livewire.closed-fincashes', compact('finData'));
    }


    protected $selectedId;

    public function showReport($id)
    {
        $this->selectedId = $id;
    }
}
