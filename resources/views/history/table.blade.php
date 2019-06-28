<div class="table-responsive">
    <table class="table table-striped">
        <caption>Lista de consultas realizadas / Total: {{ $histories->total() }} {{ debug($histories) }}</caption>

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Veiculo</th>
                <th scope="col">Marca / Modelo</th>
                <th scope="col">Combustivel</th>
                <th scope="col">Ano</th>
                <th scope="col">Valor</th>
                <th scope="col">Consulta</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>

        <tbody>
            @foreach($histories as $history)
                <tr>
                    <td>{{ $history->codigo_fipe }}</td>
                    <td>
                        @if($history->tipo_veiculo === '1')
                            Carro
                        @elseif ($history->tipo_veiculo === '2')
                            Moto
                        @else
                            Caminhão
                        @endif
                    </td>
                    <td>{{ $history->marca }} / {{ $history->modelo }}</td>
                    <td>{{ $history->combustivel }}</td>
                    <td>{{ $history->ano_modelo }}</td>
                    <td>{{ $history->valor }}</td>
                    <td>{{ date_format(date_create($history->created_at), "d/m/Y H:i:s") }}</td>
                    <td>
                        <a href="{{ route('history.view', $history->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
