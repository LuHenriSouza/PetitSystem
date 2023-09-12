@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Estoque</h1>
            <a href="{{ route('product.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"
                wire:navigate>
                <i class="fas fa-solid fa-tags"></i> Produtos</a>

        </div>
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-1">
            <p class="mb-4">Estoque e controle de validade</p>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Produtos</h5>
                    </div>
                    <div class="card-body">
                        <!-- Corpo -->
                        <div class="table-responsive" style="max-height: 300px;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @if ($products)
                                        @foreach ($products::orderBy('prod_name')->get() as $prod)
                                            <tr>
                                                <td>{{$prod->prod_name}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /Corpo -->
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Validades</h5>
                    </div>
                    <div class="card-body">
                        <!-- Corpo -->

                        <!-- /Corpo -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
