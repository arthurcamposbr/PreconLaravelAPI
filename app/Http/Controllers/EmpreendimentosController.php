<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empreendimento;
use Intervention\Image\Facades\Image as Image;

class EmpreendimentosController extends Controller
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
        $title = 'Empreendimentos';

        $empreendimentos = Empreendimento::get();

        return view('empreendimentos.index')->with(compact('title', 'empreendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        //ATUALIZA LISTA DE EMPREENDIMENTOS

        $itens = json_decode(file_get_contents('https://meuprecon.com.br/wp-json/empreendimentos/list'), true);

        if($itens['empreendimentos']){
            foreach($itens['empreendimentos'] as $item){
                $path = $item['foto'];
                $filename = basename($path);
                if(!file_exists(public_path('images/empreendimentos/' . $filename))){
                    Image::make($path)->save(public_path('images/empreendimentos/' . $filename));
                }

                $emp = Empreendimento::where('post_id', $item['id'])->first();

                if($emp){

                    $emp->local_1 = $item['local_1'];
                    $emp->local_2 = $item['local_1'];
                    $emp->titulo = $item['titulo'];
                    $emp->nome = $item['nome'];
                    $emp->nome_formatado = $item['nome_formatado'];
                    $emp->desc = $item['desc'];
                    $emp->foto = 'images/empreendimentos/' . $filename;
                    $emp->slug = $item['slug'];
                    $emp->data = $item['data'];
                    $emp->categoria = $item['categoria'][0]['name'];
                    $emp->link = $item['link'];
                    $emp->save();

                } else {

                    Empreendimento::create([
                        'post_id' => $item['id'],
                        'local_1' => $item['local_1'],
                        'local_2' => $item['local_2'],
                        'titulo' => $item['titulo'],
                        'nome' => $item['nome'],
                        'nome_formatado' => $item['nome_formatado'],
                        'desc' => $item['desc'],
                        'foto' => 'images/empreendimentos/' . $filename,
                        'slug' => $item['slug'],
                        'data' => $item['data'],
                        'categoria' => $item['categoria'][0]['name'],
                        'link' => $item['link']
                    ]);

                }
            }
        }

        return redirect('admin/empreendimentos')->withStatus(__('Empreendimentos atualizados com sucesso!'));

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
