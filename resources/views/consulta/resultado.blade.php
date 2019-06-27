<div class="card text-center text-white bg-success">
    <div class="card-header">Resultado do veículo selecionado</div>

    <div class="card-body">
        <h5 class="card-title mb-md-4">
            Saiba mais informações
                @if($result->TipoVeiculo === 1)
                    do <strong>Carro</strong>
                @elseif ($result->TipoVeiculo === 2)
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
                    {{ $result->Valor }}
                </h2>
            </div>

            <div class="col-md-6">
                <ul class="list-group list-group-flush text-left text-white ">
                    <li class="list-group-item list-group-item-secondary">
                        <strong> Modelo: </strong>{{ $result->Modelo }}
                    </li>

                    <li class="list-group-item list-group-item-secondary">
                        <strong>Marca: </strong>{{ $result->Marca }}
                    </li>
                    <li class="list-group-item list-group-item-secondary">
                        <strong> Ano: </strong>{{ $result->AnoModelo }}
                    </li>
                    <li class="list-group-item list-group-item-secondary">
                        <strong>Sigla / Combustivel: </strong>
                        {{ $result->SiglaCombustivel }} / {{ $result->Combustivel }}
                    </li>
                    <li class="list-group-item list-group-item-secondary">
                        <strong>Código de Referencia: </strong>
                        {{ $result->CodigoFipe }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-footer text-white">
        <small class="text-muted">Atualizando em: {{ $result->MesReferencia }}</small>
    </div>
</div>
