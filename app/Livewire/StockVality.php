<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Stock;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class StockVality extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $this->selectedProd ?
        $stock = Stock::with('products')->where('prod_id', '=', $this->selectedProd)->orderBy('stock_validity')->paginate(7, pageName: 'stock'):
        $stock = Stock::with('products')->orderBy('stock_validity')->paginate(8, pageName: 'stock');
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Product::where('prod_name', 'like', '%' . $this->search . '%')->orWhere('prod_code', 'like', $this->search . '%')->orderBy('updated_at', 'desc')->paginate(8, pageName: 'products');
        } else {
            $results = Product::orderBy('updated_at', 'desc')->paginate(7, pageName: 'products');
        }

        return view('livewire.stock-vality')->with(compact('stock', 'results'));
    }

    public function updated()
    {
        $this->resetPage();
    }

    // VALIDITIES
    public $selectedProd;
    public $rowSelected;

    public function showValidities($id)
    {
        $this->selectedProd = $id;
        $this->rowSelected = $id;
    }

    public function resetValidities(){
        $this->selectedProd = null;
        $this->rowSelected = null;
    }

    // ADD MODAL VALIDITIES
    public $addModalIsOpened = false;
    public $prodName;
    public function openAddModal($id)
    {
        $this->addModalIsOpened = true;

        $prod = Product::find($id);
        $this->prodName = $prod->prod_name;
    }

    public function closeAddModal()
    {
        $this->addModalIsOpened = false;
    }

    // ADD FORM
    #[Rule('required|numeric|min:1|regex:/^[0-9]+$/', message: 'Valor tem que ser maior que 0')]
    public $qnt;

    #[Rule('required', message: 'Selecione uma data válida')]
    public $validity;

    public function save(){
        $stock = new Stock();
        $stock->prod_id = $this->selectedProd;
        $stock->stock_qnt = $this->qnt;
        $stock->stock_validity = $this->validity;
        $stock->save();
    }
}
