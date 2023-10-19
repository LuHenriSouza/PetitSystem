<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Grupos</h5>
                {{-- BUTTON SEARCH --}}
                <div class="">
                    <div class="search">
                        <input wire:model.live="search" id="search" name="search" type="text" placeholder=" "
                            autocomplete="off">
                        <div>
                            <svg>
                                <use xlink:href="#path">
                            </svg>
                        </div>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 28" id="path">
                            <path
                                d="M32.9418651,-20.6880772 C37.9418651,-20.6880772 40.9418651,-16.6880772 40.9418651,-12.6880772 C40.9418651,-8.68807717 37.9418651,-4.68807717 32.9418651,-4.68807717 C27.9418651,-4.68807717 24.9418651,-8.68807717 24.9418651,-12.6880772 C24.9418651,-16.6880772 27.9418651,-20.6880772 32.9418651,-20.6880772 L32.9418651,-29.870624 C32.9418651,-30.3676803 33.3448089,-30.770624 33.8418651,-30.770624 C34.08056,-30.770624 34.3094785,-30.6758029 34.4782612,-30.5070201 L141.371843,76.386562"
                                transform="translate(83.156854, 22.171573) rotate(-225.000000) translate(-83.156854, -22.171573)">
                            </path>
                        </symbol>
                    </svg>
                </div>
                {{-- /BUTTON SEARCH --}}
            </div>
            <div class="card-body">
                <!-- Corpo -->
                <button type="button" class="btn btn-dark btn-icon-split p-0 mb-3" wire:click="openGroupAddModal">
                    <span class="icon text-white-50"><i class="fa fa-regular fa-plus"></i></span>
                    <span class="text">Criar</span>
                </button>
                <div class="table-responsive" style="max-height: 450px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @if ($results)
                                @foreach ($results as $group)
                                    <tr wire:click="showProducts({{ $group->group_id }})" style="cursor:pointer;"
                                        class="{{ $rowSelected == $group->group_id ? 'table-active' : '' }}">
                                        <td>{{ $group->group_name }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                {{ $results->links() }}
                <!-- /Corpo -->
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Produtos</h5>
                @if ($selectedGroup)
                    <button type="button" class="btn btn-dark btn-icon-split p-0"
                        wire:click="openProdGroupAddModal({{ $selectedGroup }})">
                        <span class="icon text-white-50"><i class="fa fa-regular fa-plus"></i></span>
                        <span class="text">Adicionar</span>
                    </button>
                @endif
            </div>
            <div class="card-body">
                <!-- Corpo -->
                @if (session('saved'))
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                        role="alert">
                        <i class="fa-solid fa-check"></i>
                        <div class="ms-3">{{ session('saved') }}</div>
                        <button type="button" class="btn-close pb-3" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if ($selectedGroup)
                    <button wire:click="resetProducts" type="button" class="btn btn-dark btn-circle p-0 mb-3"><i
                            class="fa-solid fa-arrow-rotate-left"></i></button>
                @endif
                <div class="table-responsive" style="max-height: 450px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Produto</th>
                                <th scope="col">Preço</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @if ($prods)
                                @foreach ($prods as $prod)
                                    <tr>
                                        <td>{{ $prod->prod_name }}</td>
                                        <td>{{ $prod->prod_price }}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                @if ($prods)
                    {{ $prods->links() }}
                @endif
                <!-- /Corpo -->
            </div>
        </div>
    </div>
    {{-- ADD GROUP MODAL --}}
    @if ($addGroupModalIsOpened)
        <div class="modal-container-e" id="addModal">
            <div class="modal-content-e">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar</h5>
                    <button type="button" class="btn-close" wire:click="closeGroupAddModal()"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveGroup">
                        <div class="d-flex">
                            <input type="text" name="groupName" id="groupName" wire:model.live="groupName"
                                class="form-control me-3" style="max-width: 60%" placeholder="Nome do Grupo" required>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                    @error('GroupName')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeGroupAddModal()">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
    {{-- /ADD GROUP MODAL --}}

    {{-- ADD PRODGROUP MODAL --}}
    @if ($addProdGroupModalIsOpened)
        <div class="modal-container-e" id="addModal">
            <div class="modal-content-e">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar</h5>
                    <button type="button" class="btn-close" wire:click="closeProdGroupAddModal()"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveProdGroup">
                        <div class="row">
                            <input type="text" name="searchProd" id="searchProd" class="form-control me-3 mb-2 col-4"
                            wire:model.live='searchProd' placeholder="Procurar" required>
                            <div class="col-4">
                                {{$allProds->links()}}
                            </div>
                            <div class="table-responsive" style="max-height: 450px;">
                                <table class="table table-hover">
                                    <tbody class="table-group-divider">
                                        @if ($allProds)
                                            @foreach ($allProds as $prod)
                                                <tr>
                                                    <td>{{ $prod->prod_name }}</td>
                                                    <td>{{ $prod->prod_price }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                    @error('GroupName')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        wire:click="closeProdGroupAddModal()">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
    {{-- /ADD PRODGROUP MODAL --}}
</div>
