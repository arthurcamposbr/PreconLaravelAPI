<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicado;
use App\Models\User;

class IndicacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Indicações';

        $indicados = Indicado::get();

        if($indicados){
            foreach($indicados as $key => $ac){
                $ac->usuario = $ac->user()->get()->pluck('name')->first();
            }
        }

        return view('indicacoes.index')->with(compact('title', 'indicados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $data = $request->all();

        $criaIndicacao = $user->indicado()->create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'empreendimento' => $data['empreendimento'],
            'estado' => $data['uf'],
            'cidade' => $data['cidade'],
            'regioes' => $data['regioes'],
        ]);

        return $criaIndicacao;

    }

    public function all(Request $request)
    {
        $user = $request->user();

        return $user->indicado()->orderBy('id', 'DESC')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
