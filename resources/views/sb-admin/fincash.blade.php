@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Caixa</h1>
            <a href="{{ route('fincash.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"
                wire:navigate>
                <i class="fa-solid fa-paste me-1"></i> Fechamentos</a>

        </div>
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-1">
            <p class="mb-4">Efetue Vendas e Gerencie o Caixa</p>
        </div>

        <x-sb-admin.openbox />

    </div>
    <!-- /.container-fluid -->
@endsection
