<?php

namespace App\Http\Controllers;

use App\Entities\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = auth()->user()->histories()->paginate(10);
        return view('history.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $attributes = $request->validate(['filter' => 'required|min:3']);

        $likeAttributes = "%${attributes['filter']}%";

        $filterHistories = auth()->user()
            ->histories()
            ->Where('valor', 'like', $likeAttributes)
            ->orWhere('marca', 'like', $likeAttributes)
            ->orWhere('modelo', 'like', $likeAttributes)
            ->orWhere('ano_modelo', 'like', $likeAttributes)
            ->orWhere('combustivel', 'like', $likeAttributes)
            ->orWhere('codigo_fipe', 'like', $likeAttributes)
            ->orWhere('mes_referencia', 'like', $likeAttributes)
            ->orWhere('tipo_veiculo', 'like', $likeAttributes)
            ->paginate(10);

        return view('history.index', ['histories' => $filterHistories]);
    }
}
