<?php

namespace App\Http\Controllers;

use App\Entities\History;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request, Response $response)
    {
        $attributes = $request->validate([
            'tipo_veiculo' => 'required|string',
            'marca' => 'required|numeric',
            'modelo' => 'required|numeric',
            'ano_modelo' => 'required|alpha_dash'
        ]);

        $result = ($this->consultaFipe($attributes));

        $history = $this->saveHistory($result);

        return redirect()->route('history.view', ['id' => $history->id]) ;
    }

    public function view(Request $request, Response $response, string $id) {
        $result = auth()->user()->histories()->where('id', $id)->first();

        if (empty($result))
            return redirect()->route('history.index');

        return view('home', compact('result'));
    }

    private function consultaFipe($data)
    {
        try {
            $url = "https://parallelum.com.br/fipe/api/v1/${data['tipo_veiculo']}/marcas/${data['marca']}/modelos/${data['modelo']}/anos/${data['ano_modelo']}";
            $result = file_get_contents($url);

            if ($result !== false)
                return json_decode($result);

            return [];
        } catch (\ErrorException $e) {
            return [];
        }
    }

    private function saveHistory($data)
    {
        // Salvando o historico de consulta
        $attributes['user_id'] = auth()->id();
        $attributes['valor'] = $data->Valor;
        $attributes['marca'] = $data->Marca;
        $attributes['modelo'] = $data->Modelo;
        $attributes['ano_modelo'] = $data->AnoModelo;
        $attributes['combustivel'] = $data->Combustivel;
        $attributes['codigo_fipe'] = $data->CodigoFipe;
        $attributes['mes_referencia'] = $data->MesReferencia;
        $attributes['sigla_combustivel'] = $data->SiglaCombustivel;
        $attributes['tipo_veiculo'] = $data->TipoVeiculo;

        return History::create($attributes);
    }
}
