<div class="row">
    <div class="col-md-5">
        <div class="card shadow mb-4">
            @if (session('NotFound'))
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-xmark"></i>
                    <div class="ms-3">{{ session('NotFound') }}</div>
                    <button type="button" class="btn-close pb-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header py-3">
                <input type="text" name="search" id="search" class="form-control" wire:model="searchTerm"
                    wire:keydown.enter="atualizarResultados" autocomplete="off">
            </div>
            <div class="card-body">
                <!-- Corpo -->
                <div class="table-responsive" style="max-height: 1000px;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider" wire:loading.remove wire:target="atualizarResultados">
                            @if (!empty($searchResults))
                                @foreach ($searchResults as $item)
                                    <tr>
                                        <td class="align-middle">{{ $item['product']->prod_name }}</td>
                                        <td class="align-middle">{{ $item['product']->prod_price }}</td>
                                        <td class="align-middle" wire:loading.remove>
                                            @if ($item['count'] == 1)
                                                <i class="fa-solid fa-trash-can me-2" style="cursor:pointer;"
                                                    wire:click="minusProd({{ $item['product']->prod_id }})"></i>
                                            @else
                                                <i class="fa-solid fa-caret-left me-2" style="cursor:pointer;"
                                                    wire:click="minusProd({{ $item['product']->prod_id }})"></i>
                                            @endif
                                            <span>{{ $item['count'] }}</span>
                                            <i class="fa-solid fa-caret-right ms-2" style="cursor:pointer;"
                                                wire:click="addProd({{ $item['product']->prod_id }})"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
                @if (!empty($searchResults))
                    <div class="row">
                        <div class="col-4 pt-2">
                            <button class="btn btn-dark ms-2" wire:click="Finish">
                                <i class="fa-solid fa-cart-plus"></i>
                                Finalizar
                            </button>
                        </div>
                        <div class="col-4"></div>
                        <p class="col-3 pt-2"><strong>TOTAL: R$ {{ $totalValue }}</strong></p>
                    </div>
                @endif
                <div wire:loading wire:target="atualizarResultados" class="mx-auto mb-2">
                    <div class="loading">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
                <!-- /Corpo -->

            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mais Vendidos</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>item 1</td>
                        <td>item 2</td>
                        <td>item 3</td>
                    </tr>
                    <tr>
                        <td>item 4</td>
                        <td>item 5</td>
                        <td>item 6</td>
                    </tr>
                    <tr>
                        <td>item 1</td>
                        <td>item 2</td>
                        <td>item 3</td>
                    </tr>
                    <tr>
                        <td>item 1</td>
                        <td>item 2</td>
                        <td>item 3</td>
                    </tr>
                    <tr>
                        <td>item 1</td>
                        <td>item 2</td>
                        <td>item 3</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
