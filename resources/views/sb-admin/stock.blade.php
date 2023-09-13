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

        @livewire('stock')
    </div>
    <!-- /.container-fluid -->
@endsection
