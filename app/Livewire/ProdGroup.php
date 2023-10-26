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
            $prods = Product::whereIn('prod_id', $productIds)->orderBy('prod_name')->Paginate(7, pageName: 'products');
        } else {
            $prods = null;
        }
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Group::where('group_name', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc')->simplePaginate(8, pageName: 'groups');
        } else {
            $results = Group::orderBy('updated_at', 'desc')->simplePaginate(7, pageName: 'groups');
        }

        if (strlen($this->searchProd) >= 1) {
            $allProds = Product::where('prod_name', 'like', '%' . $this->searchProd . '%')->orderBy('updated_at', 'desc')->simplePaginate(8, pageName: 'prodadd');
        } else {
            $allProds = Product::orderBy('updated_at', 'desc')->simplePaginate(7, pageName: 'prodadd');
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
        session()->flash('groupAdd', 'Grupo "' . $this->groupName . '" criado !');
        $this->closeGroupAddModal();
        $this->groupName = "";
    }

    // ADD PRODGROUP MODAL
    public $addProdGroupModalIsOpened = false;
    public $modalRowSelected;

    public function selectModalProd($id)
    {
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

            $alreadyExists = \App\Models\ProdGroup::where('prod_id', $this->modalRowSelected)->where('group_id', $this->selectedGroup)->exists();

            if (!$alreadyExists) {
                \App\Models\ProdGroup::create([
                    'prod_id' => $this->modalRowSelected,
                    'group_id' => $this->selectedGroup
                ]);
                session()->flash('prodGroupAdd', 'Produto adicionado !');
            } else {
                session()->flash('alreadyExists', 'Esse produto ja pertence a esse grupo !');
            }
        }
    }

    // DELETE
    public $ExModalGroupIsOpened = false;
    public $ExModalProdGroupIsOpened  = false;

    public $nameGroup;
    public $idGroup;

    public $nameProd;
    public $idProd;


    public function openDeleteGroupModal($id_Group)
    {
        if ($id_Group) {
            $data = Group::find($id_Group);
            $this->nameGroup = $data->group_name;
            $this->idGroup = $data->group_id;
            $this->ExModalGroupIsOpened = true;
        }
    }

    public function openDeleteProdGroupModal($id_Group, $id_Prod)
    {
        $dataGroup = Group::find($id_Group);
        $dataProd = Product::find($id_Prod);
        $this->idGroup = $dataGroup->group_id;
        $this->nameGroup = $dataGroup->group_name;
        $this->idProd = $dataProd->prod_id;
        $this->nameProd = $dataProd->prod_name;
        $this->ExModalProdGroupIsOpened = true;
    }

    public function closeExModalGroup()
    {
        $this->ExModalGroupIsOpened = false;
        $this->ExModalProdGroupIsOpened = false;
    }


    public function deleteGroup($id)
    {
        $group = Group::find($id);
        $name = $group->group_name;

        if ($group) {
            $group->delete();
            session()->flash('groupRemoved', 'Grupo "' . $name . '" excluído !');
            $this->closeExModalGroup();
            $this->resetProducts();
        }
    }

    public function deleteProdGroup($id_group, $id_prod)
    {
        $data = \App\Models\ProdGroup::where('group_id', $id_group)
            ->where('prod_id', $id_prod)
            ->get();

        foreach ($data as $prod) {
            $prod->delete();
        }

        session()->flash('prodGroupRemoved', 'Produto "' . $this->nameProd . '" removido !');
        $this->closeExModalGroup();
    }
}
