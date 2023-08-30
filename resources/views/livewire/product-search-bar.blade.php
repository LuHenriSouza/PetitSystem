<div>
    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Todos os Produtos</h6>
            <!--  Button -->
            <a href="{{ route('product.create') }}" type="button" class="btn btn-dark btn-icon-split p-0" wire:navigate>
                <span class="icon text-white-50"><i class="fa fa-regular fa-plus"></i></span>
                <span class="text">Adicionar Produto</span>
            </a>
            <!-- /Button -->
        </div>
        <div class="card-body">
            @if (session('removed'))
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i>
                    <div class="ms-3">{{ session('removed') }}</div>
                    <button type="button" class="btn-close pb-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('edited'))
                <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i>
                    <div class="ms-3">{{ session('edited') }}</div>
                    <button type="button" class="btn-close pb-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- BUTTON SEARCH --}}
            <div class="ms-3">
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

            <table class="mt-3 table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Setor</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if ($products)
                        @foreach ($products as $product)
                            <tr wire:key="{{ $product->prod_id }}">
                                <th scope="row" class="align-middle">{{ $product->prod_code }}</th>
                                <td class="align-middle">
                                    @if ($editingProduct === $product->prod_id)
                                        <input wire:model.live="editName" class="form-control">
                                        @error('editName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @else
                                        {{ $product->prod_name }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($editingProduct === $product->prod_id)
                                        <select wire:model="editSetor" class="form-select">
                                            <option {{ $product->prod_setor == 1 ? 'selected' : '' }} value="1">1 -
                                                Bebidas</option>
                                            <option {{ $product->prod_setor == 2 ? 'selected' : '' }} value="2">2 -
                                                Chocolates</option>
                                            <option {{ $product->prod_setor == 3 ? 'selected' : '' }} value="3">3
                                                - Salgadinhos</option>
                                            <option {{ $product->prod_setor == 4 ? 'selected' : '' }} value="4">4
                                                - Sorvetes</option>
                                        </select>
                                    @else
                                        {{ $product->prod_setor }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($editingProduct === $product->prod_id)
                                        <input wire:model.live="editPrice" class="form-control" style="max-width: 70%;">
                                        @error('editPrice')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    @else
                                        {{ $product->prod_price }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($editingProduct === $product->prod_id)
                                        {{-- AFTER EDIT CLICK --}}
                                        <button wire:click="edit({{ $product->prod_id }})" type="button"
                                            class="btn btn-success btn-circle">
                                            <i class="fa-solid fa-check"></i>
                                        </button>

                                        <button wire:click="cancelEdit()" type="button"
                                            class="btn btn-danger btn-circle">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    @else
                                        @if ($editingProduct === null)
                                            <button type="button" class="btn btn-danger btn-circle"
                                                wire:click="openExModal({{ $product->prod_id }})"
                                                data-bs-toggle="modal" data-bs-target="#ExcludeModal">
                                                <i class="fa fa-solid fa-trash"></i>
                                            </button>
                                        @endif
                                        <button wire:click="startEditing({{ $product->prod_id }})" type="button"
                                            class="btn btn-warning btn-circle">
                                            <i class="fas fa-solid fa-pen-to-square"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $products->links() }}
            <!-- /Corpo -->
        </div>
    </div>

    {{-- EXCLUDE MODAL --}}
    @if ($ExModalIsOpened)
        <div class="modal-container-e">
            <div class="modal-content-e">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir</h5>
                    <button type="button" class="btn-close" wire:click="closeExModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($editingProduct === null)
                        <p>Tem certeza que deseja excluir o Produto "{{ $nameProduct }}"?</p>
                    @else
                        <p>Não é possível excluir um produto enquanto está editando, termine de editar ou reinicie a
                            página antes de tentar novamente !</p>
                    @endif
                </div>
                <div class="modal-footer">
                    @if ($editingProduct === null)
                        <button type="button" class="btn btn-secondary" wire:click="closeExModal()">Cancelar</button>
                        <button wire:click="delete({{ $idProduct }})" id="exclude" type="button"
                            class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>
                    @else
                        <button type="button" class="btn btn-secondary" wire:click="closeExModal()">Ok</button>
                    @endif
                </div>
            </div>
        </div>
    @endif
    {{-- /EXCLUDE MODAL --}}
</div>
