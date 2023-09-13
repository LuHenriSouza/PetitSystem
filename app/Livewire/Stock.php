<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Livewire\WithPagination;

class Stock extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $stock = App\Models\Stock::class;
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Product::where('prod_name', 'like', '%' . $this->search . '%')->orWhere('prod_code', 'like', $this->search . '%')->orderBy('updated_at', 'desc')->paginate(8);
        } else {
            $results = Product::orderBy('updated_at', 'desc')->paginate(7);
        }

        return view('livewire.stock')->with(compact('results','stock'));

    }
}
