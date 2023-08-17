@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Caixa</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
                <i class="fa-solid fa-paste me-1"></i> Fechamentos</a>

        </div>
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-1">
            <p class="mb-4">Efetue Vendas e Gerencie o Caixa</p>
            @if ($hasUnfinishedFincash)
            <strong>
                <p class="me-4 mb-4">Valor Inicial do Caixa: <span id="caixa-value" role="button">R${{ $unfinishedFincash->openfincash_value }}</span></p>
                <script>
                    var caixaValueElement = document.getElementById('caixa-value');
                    var originalValue = caixaValueElement.textContent;
                    var hiddenValue = '*****'; // Valor censurado

                    // Começa com o valor censurado
                    caixaValueElement.textContent = hiddenValue;

                    caixaValueElement.addEventListener('click', function () {
                        if (caixaValueElement.textContent === originalValue) {
                            caixaValueElement.textContent = hiddenValue;
                        } else {
                            caixaValueElement.textContent = originalValue;
                        }
                    });
                </script>
            </strong>
            @endif
        </div>

        @if ($hasUnfinishedFincash)
            <x-sb-admin.shopping />
        @else
            <x-sb-admin.openbox />
        @endif

    </div>
    <!-- /.container-fluid -->
@endsection
