<div class="card text-center text-white bg-success">
    <div class="card-header">Resultado do veículo selecionado</div>

    <div class="card-body">
        <h5 class="card-title mb-md-4">
            Saiba mais informações
                @if($result->tipo_veiculo === 1)
                    do <strong>Carro</strong>
                @elseif ($result->tipo_veiculo === 2)
                    da <strong>Moto</strong>
                @else
                    do <strong>Caminhão</strong>
                @endif
            consultado:
        </h5>

        <p class="card-text">

        </p>

        <div class="row">
            <div class="col-md-6">
                <h2 class="display-4">
                    Valor
                </h2>

                <h2 class="display-4">
                    {{ $result->valor }}
                </h2>
            </div>

            <div class="col-md-6">
                <ul class="list-group list-group-flush text-left text-white ">
                    <li class="list-group-item list-group-item-secondary">
                        <strong> Modelo: </strong>{{ $result->modelo }}
                    </li>

                    <li class="list-group-item list-group-item-secondary">
                        <strong>Marca: </strong>{{ $result->marca }}
                    </li>
                    <li class="list-group-item list-group-item-secondary">
                        <strong> Ano: </strong>{{ $result->ano_modelo }}
                    </li>
                    <li class="list-group-item list-group-item-secondary">
                        <strong>Sigla / Combustivel: </strong>
                        {{ $result->sigla_combustivel }} / {{ $result->combustivel }}
                    </li>
                    <li class="list-group-item list-group-item-secondary">
                        <strong>Código de Referencia: </strong>
                        {{ $result->codigo_fipe }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-footer text-white">
        <small class="text-muted">Atualizando em: {{ $result->mes_referencia }}</small>
    </div>
</div>
