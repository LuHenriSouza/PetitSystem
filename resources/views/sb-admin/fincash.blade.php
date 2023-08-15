@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Caixa</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        <p class="mb-4">Efetue Vendas e Gerencie o Caixa</p>


        <x-sb-admin.openbox/>
        {{-- <x-sb-admin.shopping/> --}}

    </div>
    <!-- /.container-fluid -->
@endsection
