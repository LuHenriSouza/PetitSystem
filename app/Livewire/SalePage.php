<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SalePage extends Component
{
    // EFETUAR VENDA
    public $searchTerm = '';
    public $searchResults = [];
    public $totalValue;

    public function atualizarResultados()
    {
        // Realize a pesquisa no banco de dados
        $result = Product::where('prod_code', trim($this->searchTerm))->first();

        // Adicione o resultado à matriz de resultados
        if ($result) {
            $productId = $result->prod_id;

            // Verifique se o produto já existe na coleção
            if (isset($this->searchResults[$productId])) {
                // Produto já existe, aumente o contador
                $this->addProd($productId);
            } else {
                // Produto é novo, adicione à coleção
                $this->searchResults[$productId] = [
                    'product' => $result,
                    'count' => 1,
                ];
            }

            $this->attTotalValue($productId);
        } else {
            session()->flash('NotFound', 'Produto não encontrado!');
        }

        // Limpe o campo de pesquisa
        $this->searchTerm = '';
    }

    public function addProd($productId)
    {
        $this->searchResults[$productId]['count']++;
        $this->attTotalValue($productId);
    }

    public function minusProd($productId)
    {
        if ($this->searchResults[$productId]['count'] <= 1) {
            unset($this->searchResults[$productId]);
        } else {
            $this->searchResults[$productId]['count']--;
        }

        $this->attTotalValue($productId);
    }

    public function attTotalValue()
    {
        $total = 0;

        foreach ($this->searchResults as $productId => $item) {
            $product = $item['product'];
            $count = $item['count'];

            $total += $count * $product->prod_price;
        }

        $this->totalValue = $total;
    }


    public function render()
    {
        return view('livewire.sale-page');
    }
}
