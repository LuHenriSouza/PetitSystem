<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Produtos</h5>
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
                <div class="table-responsive" style="max-height: 450px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @if ($results)
                                @foreach ($results as $prod)
                                    <tr wire:click="showValidities({{ $prod->prod_id }})" style="cursor:pointer;"
                                        class="{{ $rowSelected == $prod->prod_id ? 'table-active' : '' }}">
                                        <td>{{ $prod->prod_name }}</td>
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
                <h5 class="m-0 font-weight-bold text-primary">Validades</h5>
                @if ($selectedProd)
                    <button type="button" class="btn btn-dark btn-icon-split p-0"
                        wire:click="openAddModal({{ $selectedProd }})">
                        <span class="icon text-white-50"><i class="fa fa-regular fa-plus"></i></span>
                        <span class="text">Cadastrar</span>
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
                @if ($selectedProd)
                    <button wire:click="resetValidities" type="button" class="btn btn-dark btn-circle p-0 mb-3"><i
                            class="fa-solid fa-arrow-rotate-left"></i></button>
                @endif
                <div class="table-responsive" style="max-height: 450px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Validade</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @if ($stock)
                                @foreach ($stock as $stk)
                                    <tr>
                                        <td>{{ $stk->products ? $stk->products->prod_name : 'N/A' }}</td>
                                        <td>{{ $stk->stock_qnt }}</td>
                                        <td class="{{ $this->getColorClass($stk->stock_validity) }}">{{ $stk->stock_validity->format('d / m / Y') }}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                {{ $stock->links() }}
                <!-- /Corpo -->
            </div>
        </div>
    </div>
    {{-- ADD MODAL --}}
    @if ($addModalIsOpened)
        <div class="modal-container-e" id="addModal">
            <div class="modal-content-e">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar</h5>
                    <button type="button" class="btn-close" wire:click="closeAddModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="d-flex">
                            <input type="number" name="qntInput" id="qntInput" wire:model.live="qnt"
                                class="form-control me-3" style="max-width: 40%" placeholder="Quantidade" required>
                            <input type="date" name="validity" id="validity" wire:model.live="validity"
                                class="form-control me-3" style="max-width: 40%" required>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                    @error('qnt')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                    @error('validity')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeAddModal()">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
    {{-- /ADD MODAL --}}
</div>
