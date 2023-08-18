        <!-- Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-2 d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Todos os Produtos</h6>
                <!--  Button -->
                <a href="{{route('product.create')}}" type="button" class="btn btn-dark btn-icon-split p-0">
                    <span class="icon text-white-50"><i class="fa fa-regular fa-plus"></i></span>
                    <span class="text">Adicionar Produto</span>
                </a>
                <!-- /Button -->
            </div>
            <div class="card-body">
                <!-- Corpo -->
                <table class="table table-striped">
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
                        <tr>
                            <th scope="row" class="align-middle">123321</th>
                            <td class="align-middle">Luiz</td>
                            <td class="align-middle">3</td>
                            <td class="align-middle">R$32,40</td>
                            <td class="align-middle">
                                <a href="#" class="btn btn-danger btn-circle">
                                    <i class="fa fa-solid fa-trash"></i>
                                </a>

                                <button type="button" class="btn btn-warning btn-circle">
                                    <i class="fas fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- /Corpo -->
            </div>
        </div>
