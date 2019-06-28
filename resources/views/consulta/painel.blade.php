<div class="card text-center">
    <form action="{{ route('result') }}" method="POST">
        @csrf

        <div class="card-header">Consultando a tabela de preços</div>

        <div class="card-body">
            <h5 class="card-title">Descubra o valor ideal para compra ou venda</h5>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="veiculo">Veiculo</label>
                                <select name="veiculo" id="veiculo" class="form-control" onchange="onChangeMarca(this.value)" required>
                                    <option value="">Selecione um veiculo</option>
                                    <option value="carros">Carros</option>
                                    <option value="motos">Motos</option>
                                    <option value="caminhoes">Caminhões</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <select name="marca" id="marca" class="form-control" onchange="onChangeModelo(this.value)" required disabled>
                                    <option value="">Selecione a marca</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <select name="modelo" id="modelo" class="form-control" onchange="onChangeAno(this.value)" required disabled>
                                    <option value="">Selecione o modelo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="ano">Ano</label>
                                <select name="ano" id="ano" class="form-control" required disabled>
                                    <option value="">Selecione o ano</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                </div>
            </div>
        </div>
    </form>
</div>

@section('scripts')
    <script>
        let veiculo;
        let marca;
        let modelo;
        let ano;

        function initSelect(id) {
            const select = document.getElementById(id);
            select.disabled = true;
            select.options.length = 1;
            return select;
        }

        function createOption(codigo, nome) {
            let optionMarca = document.createElement('option');

            optionMarca.value = codigo;
            optionMarca.text = nome;

            return optionMarca;
        }

        // Iniciando as buscas
        function onChangeMarca(value) {
            veiculo = document.getElementById('veiculo');
            veiculo.value = value;

            marca = initSelect('marca');
            modelo = initSelect('modelo');
            ano = initSelect('ano');

            // No caso de nenhum veiculo selecionado
            if (veiculo.value === '')
                return;

            fetch(`https://parallelum.com.br/fipe/api/v1/${value}/marcas`)
                .then(function (response) {
                    response.json().then(function (result) {
                        result.forEach(function (it) {
                            marca.add(createOption(it['codigo'], it['nome']));
                            marca.disabled = false;
                        });
                    });
                });
        }

        function onChangeModelo(value) {
            fetch(`https://parallelum.com.br/fipe/api/v1/${veiculo.value}/marcas/${value}/modelos`)
                .then(function (response) {
                    response.json().then(function (result) {
                        result.modelos.forEach(function (it) {
                            modelo.add(createOption(it['codigo'], it['nome']));
                            modelo.disabled = false;
                        });
                    });
                });
        }

        function onChangeAno(value) {
            fetch(`https://parallelum.com.br/fipe/api/v1/${veiculo.value}/marcas/${marca.value}/modelos/${modelo.value}/anos`)
                .then(function (response) {
                    response.json().then(function (result) {
                        result.forEach(function (it) {
                            ano.add(createOption(it['codigo'], it['nome']));
                            ano.disabled = false;
                        });
                    });
                });
        }
    </script>
@endsection
