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
                                @php
                                    $finca = App\Models\Fincash::find($selectedId);
                                @endphp
                                {{ $finca->getDateFormatted('created_at', 'd / m / y H:i:s') .
                                    ' - ' .
                                    ($finca->fincash_isFinished ? $finca->getDateFormatted('fincash_finalDate', 'H:i:s d / m / y') : 'Aberto') }}
                            @endif
                            |
                        </h5>
                        @if ($selectedId)
                            @php
                                $finca = App\Models\Fincash::find($selectedId);
                            @endphp
                            @if (!$finca->fincash_isFinished)
                                <a href="{{ route('product.create') }}" type="button"
                                    class="btn btn-dark btn-icon-split p-0" wire:navigate>
                                    <span class="icon text-white-50"><i class="fa-solid fa-flag-checkered"></i></span>
                                    <span class="text">Fechar Caixa</span>
                                </a>
                            @endif
                        @endif
                    </div>
                    <div class="card-body">
                        <!-- Corpo -->
                        @if ($selectedId)
                            @php
                                $finca = App\Models\Fincash::with('cashOutflows.outflowType')->find($selectedId);
                            @endphp
                            <div>
                                <p>Nome: {{ $finca->fincash_name }} </p>

                                <p>Inicio: {{ $finca->fincash_value }} </p>
                                <p>Saidas: </p>
                                <ul>
                                    @foreach ($finca->cashOutflows as $out)
                                        <li>
                                            {{ $out->outflowType->outflow_type }}: {{ $out->outflow_value }}
                                        </li>
                                    @endforeach
                                </ul>
                                <p>Observações: </p>

                                <p>Valor Final: {{ $finca->fincash_finalValue }}</p>
                            </div>
                        @endif
                        <!-- /Corpo -->

                    </div>
                </div>
            </div>

        </div>
    </div>
