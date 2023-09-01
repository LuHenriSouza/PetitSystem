@extends('layouts.main')
@section('content')
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
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Fechamento |
                            {{ $fin->getDateFormatted('created_at','d / m / y H:i:s'). ' - ' . ($fin->fincash_finalDate ? $fin->getDateFormatted('fincash_finalDate','d / m / y H:i:s') : 'Aberto').' |' }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Corpo -->


                        <!-- /Corpo -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
