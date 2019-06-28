<?php

namespace App\Http\Controllers;

use App\Entities\History;
use App\User;
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
    public function index(Request $request)
    {
        if (!empty($request->filter))
            $query = auth()->user()->filter($request->filter);
        else
            $query = auth()->user()->histories();

        $histories = $query->paginate(10);

        return view('history.index', compact('histories'));
    }
}
