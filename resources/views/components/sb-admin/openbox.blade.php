<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informações Necessárias</h6>
    </div>
    <div class="card-body">

        <form class="row g-3 needs-validation" action="{{ route('fincash.store') }}" method="post" novalidate>
            @csrf
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nome</label>
                <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Nome" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Valor do Caixa</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">R$</span>
                    <input name="value" type="text" value="0.00" class="form-control" id="boxvalue"
                        aria-describedby="inputGroupPrepend" required>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary mt-3" type="submit">Abrir Caixa</button>
            </div>
        </form>

    </div>
</div>
