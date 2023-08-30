<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
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
        $name = $product->prod_name;
        if ($product) {
            $product->delete();
            session()->flash('message', 'Produto "'.$name.'" excluído com sucesso.');
            $this->closeExModal();
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

    // EDIT PRODUCT
    public $editingProduct = null;

    public $editedProducts = [];


    public function startEditing($productId)
    {
        $data = Product::find($productId);
        $this->editedProducts[$productId]['prod_name'] = $data->prod_name;
        $this->editedProducts[$productId]['prod_setor'] = $data->prod_setor;
        $this->editedProducts[$productId]['prod_price'] = $data->prod_price;

        $this->editingProduct = $productId;
    }

    public function cancelEdit()
    {
        $this->editingProduct = null;
    }

    // EXCLUDE MODAL

    public $ExModalIsOpened = false;
    public $nameProduct;
    public $idProduct;
    public function openExModal($id)
    {
        $data = Product::find($id);
        $this->nameProduct = $data->prod_name;
        $this->idProduct = $data->prod_id;
        $this->ExModalIsOpened = true;
    }

    public function closeExModal()
    {
        $this->ExModalIsOpened = false;
    }
}
