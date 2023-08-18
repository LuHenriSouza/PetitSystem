@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produtos</h1>
        </div>

        {{-- Message --}}
        @if (session('message'))
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-check"></i>
                <div class="ms-3">{{ session('message') }}</div>
                <button type="button" class="btn-close pb-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <x-sb-admin.product-form />
    </div>
    <!-- /.container-fluid -->
@endsection
