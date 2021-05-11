<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\User;
use App\Mail\Token;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request){
        $user = $request->user();

        if($user){
            return response()->json([
                'usuario' => $user,
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Usuário não autorizado.',
            ], 401);
        }
    }

    //LOGIN
    public function login(Request $request){
        $data = $request->all();

        $validacao = Validator::make($data, [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string',
            ]);

        if($validacao->fails()){
            return response()->json([
                'status'=>false, "msg"=>$validacao->errors()
            ], 400);
        }

        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            $user = auth()->user();
            $user->token = $user->createToken($user->email)->accessToken;
            //$user->perfil = asset($user->perfil);
            if($user->role != 2){
                return response()->json([
                    'msg' => 'Usuário não autorizado.',
                ], 401);
            }
            if(!$user->acesso_token){
                return response()->json([
                    'status'=>true, 'usuario' => $user,
                ], 200);
            } else {
                return response()->json([
                    'msg' => 'Dados cadastrais não confirmados. Por favor acesse seu e-mail para confirmar o cadastro.',
                ], 400);
            }
        } else {
            return response()->json([
                'msg' => 'E-mail ou senha incorretos.',
            ], 401);
        }
    }

    //ENVIA TOKEN
    public function envia_token(Request $request){
        $data = $request->all();

        $validacao = Validator::make($data, [
            'email' => 'required|string|email|max:255',
        ]);

        if($validacao->fails()){
            return ['status'=>false,"validacao"=>true,"msg"=>$validacao->errors()];
        }

        $user = User::where('email', $data['email'])->first();

        if($user){

            $user->acesso_token = Str::random(4);
            $user->save();

            $assunto = 'Validação de Cadastro';
            $conteudo = '<h1>Validação de cadastro</h1>
            <p>Olá, '.$user->name.'!<br>
            O código de validação é <b>'.$user->acesso_token.'</b>
            </p>';

            Mail::send(new Token($user, $assunto, $conteudo));

            return ['status'=>true,"msg"=>'Código de validação enviado com sucesso'];

        } else {
            return response()->json([
                'msg' => 'Usuário não encontrado.',
            ], 401);
        }

    }

    //CADASTRO
    public function cadastro(Request $request){
        $data = $request->all();

            $validacao = Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'celular' => 'required|string|max:15|unique:users',
                'cpf' => 'required|string|max:14|unique:users',
                'password' => 'required|string|min:6|confirmed'
            ]);

            if($validacao->fails()){
                return ['status'=>false,"validacao"=>true,"msg"=>$validacao->errors()];
            }

        $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => 2,
                'celular' => $data['celular'],
                'cpf' => $data['cpf'],
                'password' => Hash::make($data['password']),
                'remember_token' => Str::random(40),
                'acesso_token' => Str::random(4),
                'uc' => Str::random(9),
            ]);

            $assunto = 'Validação de Cadastro';
            $conteudo = '<h1>Validação de cadastro</h1>
            <p>Olá, '.$user->name.'!<br>
            O código de validação é <b>'.$user->acesso_token.'</b>
            </p>';

        Mail::send(new Token($user, $assunto, $conteudo));

        return ['status'=>true,"msg"=>'Código de validação enviado com sucesso'];

    }

    //VALIDA USUÁRIO
    public function validaUsuário(Request $request){
        $data = $request->all();

        if(!$data['token']){
            return response()->json([
                'msg' => 'Forneça um token válido',
            ], 401);
        }

        $user = User::where('acesso_token', $data['token'])->first();

        if(!$user){
            return response()->json([
                'msg' => 'Este token não pode ser usado novamente.',
            ], 404);
        }

        $user->acesso_token = '';

        $user->save();

        $user->token = $user->createToken($user->email)->accessToken;

        $assunto = 'Cadastro validado com sucesso!';
        $conteudo = '<h1>Cadastro validado com sucesso!</h1>
            <p>Olá, '.$user->name.'!<br>
            Cadastro ativo com sucesso!
            </p>';

        Mail::send(new Token($user, $assunto, $conteudo));

        return response()->json([
            'status'=>true, 'user' => $user,
        ], 200);

    }

}
