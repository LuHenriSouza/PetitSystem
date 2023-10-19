@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Grupos</h1>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-1">
            <p class="mb-4">Crie Grupos de Produtos</p>
        </div>
        @livewire('prod-group')
    </div>
    <!-- /.container-fluid -->
@endsection
