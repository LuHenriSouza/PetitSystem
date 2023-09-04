@php
    $finca = App\Models\Fincash::with('cashOutflows.outflowType')->find($selectedId);
@endphp
<div>
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Ultimos fechamentos</h5>
                </div>
                <div class="card-body">
                    <!-- Corpo -->
                    <div class="table-responsive" style="max-height: 300px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @if ($finData)
                                    @foreach ($finData as $fin)
                                        <tr wire:click="showReport({{ $fin->fincash_id }})" style='cursor:pointer'
                                            class='{{ $rowSelected == $fin->fincash_id ? 'table-active' : '' }}'>
                                            <td class="align-middle">{{ $fin->fincash_name }}</td>
                                            <td class="align-middle">
                                                {{ $fin->getDateFormatted('created_at', 'd / m / y') . ' - ' . ($fin->fincash_finalDate ? $fin->getDateFormatted('fincash_finalDate', 'd / m / y') : 'Aberto') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /Corpo -->
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Fechamento |
                        @if ($selectedId)
                            {{ $finca->getDateFormatted('created_at', 'd / m / y H:i:s') .
                                ' - ' .
                                ($finca->fincash_isFinished ? $finca->getDateFormatted('fincash_finalDate', 'H:i:s d / m / y') : 'Aberto') }}
                        @endif
                        |
                    </h5>
                    @if ($selectedId)
                        @if (!$finca->fincash_isFinished)
                            <button type="button" class="btn btn-dark btn-icon-split p-0" wire:click="openCalcModal">
                                <span class="icon text-white-50"><i class="fa-solid fa-flag-checkered"></i></span>
                                <span class="text">Fechar Caixa</span>
                            </button>
                        @else
                            <a href="{{ route('product.create') }}" type="button" class="btn btn-dark" wire:navigate>
                                <i class="fa-solid fa-pencil"></i></i>
                            </a>
                        @endif
                    @endif
                </div>
                <div class="card-body">
                    <!-- Corpo -->
                    @if ($selectedId)
                        <div>
                            <h5 class="mb-4">Nome: {{ $finca->fincash_name }} </h5>

                            <p>Inicio: {{ $finca->fincash_value }} </p>
                            <p>Saidas: </p>
                            <ul>
                                @if (!$finca->fincash_isFinished)
                                    @for ($i = 1; $i <= $numberOfInputs; $i++)
                                        <div class="d-flex ">
                                            <select wire:model="selectValues.{{ $i }}"
                                                class="form-select m-2" style="max-width: 200px;">
                                                @foreach ($finca->cashOutflows as $out)
                                                    <option value="{{ $out->outflowType->outflow_type_id }}">
                                                        {{ $out->outflowType->outflow_type }}</option>
                                                @endforeach
                                            </select>
                                            <input type="number" wire:model="inputValues.{{ $i }}"
                                                class="form-control m-2" style="max-width: 110px;">
                                        </div>
                                    @endfor
                                    <button wire:click="addInput(true)" class="btn btn-circle btn-dark mt-1 ms-5"><i
                                            class="fa-solid fa-plus"></i></button>
                                    @if ($numberOfInputs > 0)
                                        <button wire:click="addInput(false)"
                                            class="btn btn-circle btn-dark mt-1 ms-5"><i
                                                class="fa-solid fa-minus"></i></button>
                                    @endif
                                @else
                                    @foreach ($finca->cashOutflows as $out)
                                        <li>
                                            {{ $out->outflowType->outflow_type }}: {{ $out->outflow_value }}
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <p>Observações: </p>
                            @if (!$finca->fincash_isFinished)
                                <Textarea class="form-control mb-3"></Textarea>
                            @else
                                <p>Valor Final: {{ $finca->fincash_finalValue }}</p>
                            @endif
                        </div>
                    @endif
                    <!-- /Corpo -->
                </div>
            </div>
        </div>
    </div>
    {{-- CALCULATOR MODAL --}}
    @if ($calcModalIsOpened)
        <div class="modal-container-e">
            <div class="modal-content-e">
                <div class="modal-header">
                    <h5 class="modal-title">Calculadora</h5>
                    <button type="button" class="btn-close" wire:click="closeCalcModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                        <p>0.05</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>0.25</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>0.50</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>1.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>2.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>5.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>10.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>20.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>50.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>100.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                    <div class="d-flex">
                        <p>200.00</p>
                        <input type="number" class="form-control ms-3 mb-2" style="max-width: 20%">
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeCalcModal()">Cancelar</button>
                        <button wire:click="" id="CALCULATOR" type="button"
                            class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeCalcModal()">Ok</button>
                </div>
            </div>
        </div>
    @endif
    {{-- /CALCULATOR MODAL --}}
</div>
