<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class ProdGroup extends Component
{
    use WithPagination;

    public $search = '';
    public $searchProd = '';
    public function render()
    {
        if ($this->selectedGroup) {
            $prodgroup = \App\Models\ProdGroup::where('group_id', '=', $this->selectedGroup)->get();
            $productIds = $prodgroup->pluck('prod_id');
            $prods = Product::whereIn('prod_id', $productIds)->orderBy('prod_name')->paginate(7, pageName: 'products');
        } else {
            $prods = null;
        }
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Group::where('group_name', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc')->paginate(8, pageName: 'groups');
        } else {
            $results = Group::orderBy('updated_at', 'desc')->paginate(7, pageName: 'groups');
        }

        if (strlen($this->searchProd) >= 1) {
            $allProds = Product::where('prod_name', 'like', '%' . $this->searchProd . '%')->orderBy('updated_at', 'desc')->paginate(8, pageName: 'prodadd');
        } else {
            $allProds = Product::orderBy('updated_at', 'desc')->paginate(7, pageName: 'prodadd');
        }

        return view('livewire.prod-group')->with(compact('results', 'prods', 'allProds'));
    }


    public $selectedGroup;
    public $rowSelected;

    public function showProducts($id)
    {
        $this->selectedGroup = $id;
        $this->rowSelected = $id;
        $this->resetPage(pageName: 'products');
    }

    public function resetProducts()
    {
        $this->selectedGroup = null;
        $this->rowSelected = null;
    }

    public function updated()
    {
        $this->resetPage(pageName: 'products');
        $this->resetPage(pageName: 'prodadd');
        $this->resetPage(pageName: 'groups');
    }

    // ADD GROUP MODAL
    public $addGroupModalIsOpened = false;

    public function openGroupAddModal()
    {
        $this->addGroupModalIsOpened = true;
    }

    public function closeGroupAddModal()
    {
        $this->addGroupModalIsOpened = false;
    }

    // ADD GROUP FORM
    #[Rule('required|max:255', message: 'Nome obrigatório!')]
    public $groupName;

    public function saveGroup()
    {
        Group::create([
            'group_name' => $this->groupName
        ]);
    }

    // ADD PRODGROUP MODAL
    public $addProdGroupModalIsOpened = false;
    public $modalRowSelected;

    public function selectModalProd($id){
        $this->modalRowSelected = $id;
    }

    public function openProdGroupAddModal($id)
    {
        $this->addProdGroupModalIsOpened = true;
    }

    public function closeProdGroupAddModal()
    {
        $this->addProdGroupModalIsOpened = false;
    }

    // ADD GROUP FORM

    public function saveProdGroup()
    {
        if ($this->modalRowSelected && $this->selectedGroup) {
            \App\Models\ProdGroup::create([
                'prod_id' => $this->modalRowSelected ,
                'group_id' => $this->selectedGroup
            ]);
        }

    }
}
