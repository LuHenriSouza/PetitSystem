<?php

namespace App\Livewire;

use App\Models\{Product, Soldtoday, Product_Soldtoday, Fincash};
use Livewire\Component;

class SalePage extends Component
{
    // EFETUAR VENDA
    public $searchTerm = '';
    public $searchResults = [];
    public $totalValue;
    public $lastResult;
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

            $this->lastResult = $result;
            $this->attTotalValue();
        } else {
            if (!trim($this->searchTerm)) {
                if (isset($this->searchResults[$this->lastResult->prod_id])) {
                    $this->addProd($this->lastResult->prod_id);
                } else {
                    session()->flash('NotFound', 'Produto não encontrado!');
                }
            } else {
                session()->flash('NotFound', 'Produto não encontrado!');
            }
        }

        // Limpe o campo de pesquisa
        $this->searchTerm = '';
    }

    public function addProd($productId)
    {
        $this->searchResults[$productId]['count']++;
        $this->attTotalValue();
    }

    public function minusProd($productId)
    {
        if ($this->searchResults[$productId]['count'] <= 1) {
            unset($this->searchResults[$productId]);
        } else {
            $this->searchResults[$productId]['count']--;
        }

        $this->attTotalValue();
    }

    public function attTotalValue()
    {
        $total = 0;

        foreach ($this->searchResults as $item) {
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

    // FINALIZAR A VENDA
    public function finish()
    {
        if ($this->searchResults) {
            $Fincash = Fincash::where('fincash_isFinished', false)->first();
            if ($Fincash) {
                $sale = Soldtoday::create(['fincash_id' => $Fincash->fincash_id]);
                foreach ($this->searchResults as $item) {
                    Product_Soldtoday::create([
                        'prod_id' => $item['product']->prod_id,
                        'sale_id' => $sale->sale_id,
                        'qnt' => $item['count'],
                        'unique_price' => $item['product']->prod_price,
                        'total_price' => ($item['product']->prod_price * $item['count'])
                    ]);
                }
                $this->searchResults = [];
                $this->attTotalValue();
                session()->flash('FinishSuccess', 'Venda Efetuada :)');
            }else{
                redirect(route('fincash.create'));
            }
        } else {
            session()->flash('FinishError', 'Ocorreu um Erro ao Finalizar a Compra!');
        }
    }
}
