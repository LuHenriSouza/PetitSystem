<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearchBar extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            session()->flash('message', 'Produto "excluído" com sucesso.');
        }
    }

    public function render()
    {

        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Product::where('prod_name', 'like', '%' . $this->search . '%')->orWhere('prod_code', 'like', $this->search . '%')->orderBy('updated_at', 'desc')->paginate(20);
        } else {
            $results = Product::orderBy('updated_at', 'desc')->paginate(10);
        }

        return view('livewire.product-search-bar', [
            'products' => $results
        ]);
    }

    public function updated()
    {
        $this->resetPage();
    }
}
