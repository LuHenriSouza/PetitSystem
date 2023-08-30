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
            // Add a timestamp into prod_code before Delete Product"
            $product->prod_code = $product->prod_code . 'R' . now();
            $product->save();
            $product->delete();
            session()->flash('removed', 'Produto "' . $name . '" excluído com sucesso.');
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

    #[Rule('required|max:255', message: 'Nome precisa ter entre 1 a 255 caracteres')]
    public $editName;
    public $editSetor;

    #[Rule('required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/', message: 'Formato Inválido')]
    public $editPrice;


    public function startEditing($productId)
    {
        $data = Product::find($productId);
        $this->editName = $data->prod_name;
        $this->editSetor = $data->prod_setor;
        $this->editPrice = $data->prod_price;

        $this->editingProduct = $productId;
    }

    public function cancelEdit()
    {
        $this->editingProduct = null;
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if ($product) {

            $this->validate([
                "editPrice" => 'required|numeric|min:0',
                "editName" => 'required|max:255'
            ]);

            $newProduct = new Product();
            $newProduct->prod_code = $product->prod_code;

            $product->prod_code = $product->prod_code .'E'. now();
            $product->save();

            $newProduct->prod_name = $this->editName;
            $newProduct->prod_setor = $this->editSetor;
            $newProduct->prod_price = $this->editPrice;


            $newProduct->save();
            $product->delete();


            $this->cancelEdit();
            session()->flash('edited', 'Produto editado com sucesso.');
        }
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
