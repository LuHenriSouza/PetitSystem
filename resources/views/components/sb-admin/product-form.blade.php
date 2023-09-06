<div class="card">
    <div class="card shadow mb-4">
        <div class="card-header py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Cadastrar Novo Produto</h6>
            <!--  Button -->
            <a href="{{ route('product.index') }}" type="button" class="btn btn-dark btn-icon-split p-0" wire:navigate>
                <span class="icon text-white-50"><i class="fa-solid fa-arrow-left"></i></span>
                <span class="text">Voltar para Produtos</span>
            </a>
            <!-- /Button -->
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" id="ProdForm">
                @csrf
                <div class="mb-3" id="customCodeInput">
                    <label for="CustomCode" class="form-label">Código</label>
                    <input type="number" style="max-width: 15%;" class="form-control" id="CustomCode" name="CustomCode"
                        required>
                    <span id="mensagemErro" style="color: red;"></span>
                </div>
                <div class="mb-2">
                    <label for="ProductName" class="form-label">Nome do Produto</label>
                    <input type="text" style="max-width: 35%;" class="form-control" name="ProductName"
                        id="ProductName" required>
                </div>
                <div class="mb-3">
                    <label for="ProductSetor" class="form-label">Setor</label>
                    <select style="max-width: 20%;" class="form-select" id="ProductSetor" name="ProductSetor">
                        <option value="1">1 - Bebidas</option>
                        <option value="2">2 - Chocolates</option>
                        <option value="3">3 - Salgadinhos</option>
                        <option value="4">4 - Sorvetes</option>
                    </select>
                </div>
                <label for="ProductPrice" class="form-label">Preço</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">R$</span>
                    <input type="text" style="max-width: 10%;" class="form-control" id="ProductPrice"
                        name="ProductPrice" value="0.00">
                </div>

                <button type="subimit" class="mt-4 btn btn-warning" id="SubmitProduct">Adicionar</button>
                <br>
                <span id="carregando"></span>
            </form>
        </div>
    </div>
