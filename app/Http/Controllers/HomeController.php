<?php

namespace App\Http\Controllers;

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

    public function result(Request $request, Response $response)
    {
        $attributes = $request->validate([
            'veiculo' => 'required|string',
            'marca' => 'required|numeric',
            'modelo' => 'required|numeric',
            'ano' => 'required|alpha_dash'
        ]);

        $result = ($this->consultaFipe($attributes));

        return view('home', compact('result'));
    }

    private function consultaFipe($data)
    {
        try {
            $url = "https://parallelum.com.br/fipe/api/v1/${data['veiculo']}/marcas/${data['marca']}/modelos/${data['modelo']}/anos/${data['ano']}";
            $result = file_get_contents($url);

            if ($result !== false)
                return json_decode($result);

            return [];
        } catch (\ErrorException $e) {
            return [];
        }
    }
}
