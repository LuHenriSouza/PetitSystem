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
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Data</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @if ($finData)

                                        @foreach ($finData as $fin)
                                                <tr wire:navigate href="{{route('fincash.show', ['id' => $fin->fincash_id]) }}" style='cursor:pointer'>
                                                    <td class="align-middle">{{ $fin->fincash_name }}</td>
                                                    <td class="align-middle">
                                                        {{ $fin->getDateFormatted('created_at','d / m / y') . ' - ' . ($fin->fincash_finalDate ? $fin->getDateFormatted('fincash_finalDate','d / m / y') : 'Aberto') }}
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
        </div>
    </div>
