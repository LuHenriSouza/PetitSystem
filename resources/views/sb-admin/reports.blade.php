@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Fechamentos</h1>
            <a href="{{ route('fincash.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-solid fa-cash-register"></i> Caixa</a>

        </div>
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-1">
            <p class="mb-4">Gerencie os fechamentos</p>
        </div>
        @livewire('closed-fincashes')
    </div>
    <!-- /.container-fluid -->
@endsection
