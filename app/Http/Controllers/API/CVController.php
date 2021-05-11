<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Indicado;

class CVController extends Controller
{

    public function collect(Request $request){
        $data = json_decode($request->getContent(), true);

        $user = User::where('uc', $data['uc'])->first();

        if($user){
            $user->indicado()->create([
                'nome' => $data['nome'],
                'email' => $data['email'],
                'celular' => $data['telefone'],
                'empreendimento' => $data['empreendimento'][0]['nome'],
                'estado' => 'nulo',
                'cidade' => 'nulo',
                'regioes' => 'nulo',
                'uc' => $data['uc'],
                'status' => $data['situacao']['nome'],
                'cv_id' => $data['idlead']
            ]);
        }

    }

    public function update(Request $request){
        $data = json_decode($request->getContent(), true);

        $indicado = Indicado::where('cv_id', $data['idlead'])->first();

        if($indicado){

        }

    }

}
