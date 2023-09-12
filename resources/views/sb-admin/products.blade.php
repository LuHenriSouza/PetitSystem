@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produtos</h1>
            <a href="{{ route('stock.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" wire:navigate>
                <i class="fa-solid fa-box"></i> Estoque</a>
        </div>
        @livewire('product-search-bar')
    </div>
    <!-- /.container-fluid -->
@endsection
