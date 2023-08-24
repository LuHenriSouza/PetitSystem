<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSearchBar extends Component
{

    public $search = '';

    public function render()
    {

        $results = [];

        if( strlen( $this->search ) >= 1 ){
            $results = Product::where('prod_name', 'like', '%'.$this->search.'%' )->orderBy('updated_at', 'asc')->get();
        }
        else{
            $results = Product::get();
        }

        return view('livewire.product-search-bar', [
            'products' => $results
        ]);
    }
}
