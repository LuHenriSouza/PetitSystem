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
            @if (session('message'))
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i>
                    <div class="ms-3">{{ session('message') }}</div>
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
                            <tr>
                                <th scope="row" class="align-middle">{{ $product->prod_code }}</th>
                                <td class="align-middle">{{ $product->prod_name }}</td>
                                <td class="align-middle">{{ $product->prod_setor }}</td>
                                <td class="align-middle">{{ $product->prod_price }}</td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-danger btn-circle" data-bs-toggle="modal"
                                        data-bs-target="#modal-exclude" data-product-name="{{ $product->prod_name }}"
                                        data-product-id="{{ $product->prod_id }}">
                                        <i class="fa fa-solid fa-trash"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning btn-circle">
                                        <i class="fas fa-solid fa-pen-to-square"></i>
                                    </button>
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

    {{--  EXCLUDE MODAL SCRIPTS  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var excludeButtons = document.querySelectorAll('.btn-danger[data-bs-toggle="modal"]');
            var modalExclude = document.querySelector('#modal-exclude');
            var modalProductName = modalExclude.querySelector('.modal-body p span');
            var modalExcludeButton = modalExclude.querySelector('#exclude');

            excludeButtons.forEach(function(button) {

                button.addEventListener('click', function() {
                    var productName = button.getAttribute('data-product-name');
                    var productId = button.getAttribute('data-product-id');

                    modalExcludeButton.setAttribute('wire:click', 'delete(' + productId + ')');
                    modalProductName.textContent = productName;
                });
            });
        });
    </script>

    {{-- EXCLUDE MODAL --}}
    <div class="modal" tabindex="-1" id="modal-exclude">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir o Produto "<span></span>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="exclude" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Excluir</button>
                </div>
            </div>
        </div>
    </div>

</div>
