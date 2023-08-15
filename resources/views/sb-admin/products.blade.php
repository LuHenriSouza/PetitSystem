@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produtos</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-2 d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Todos os Produtos</h6>
                <!--  Button -->
                <button type="button" class="btn btn-primary btn-icon-split p-0" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <span class="icon text-white-50"><i class="fa fa-regular fa-plus"></i></span>
                    <span class="text">Adicionar Produto</span>
                </button>
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
                                <a href="#" class="btn btn-primary btn-circle">
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
    </div>
    <!-- /.container-fluid -->
    <!-- Add Product Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="btn-group rounded" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                checked>
                            <label class="rounded-start btn btn-outline-primary" for="btnradio1">Código de
                                Barras</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio2">Código Personalizado</label>
                        </div>
                    </div>
                    <form action="?" method="post">
                        <div class="mb-3" id="customCodeInput">
                            <label for="CustomCode" class="form-label">Código</label>
                            <input type="number" class="form-control" id="CustomCode" name="CustomCode" required disabled>
                        </div>
                        <div class="mb-2">
                            <label for="ProductName" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" name="ProductName" id="ProductName" required>
                        </div>
                        <div class="mb-3">
                            <label for="ProductSetor" class="form-label">Setor</label>
                            <select class="form-select" id="ProductSetor" name="ProductSetor">
                                <option value="1">1 - Bebidas</option>
                                <option value="2">2 - Chocolates</option>
                                <option value="3">3 - Salgadinhos</option>
                                <option value="4">4 - Sorvetes</option>
                            </select>
                        </div>
                        <label for="ProductPrice" class="form-label">Preço</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">R$</span>
                            <input type="text" class="form-control" id="ProductPrice" name="ProductPrice"
                                value="0.00">
                        </div>

                        <button type="submit" class="mt-3 btn btn-primary">Adicionar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Product Modal -->
@endsection
