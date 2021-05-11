<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;

class CollectController extends Controller
{
    public function index(Request $request){
        $data = json_decode($request->getContent(), true);

        $user = User::where('uc', $data['uc'])->first();

        $siteUrl = $data['location']['origin'].$data['location']['pathname'];

        $ip = $request->ip();
        //$ip = '179.234.28.254';

        if (strpos($ip, ',') > 0) {
            $ip = substr($ip, 0, strpos($ip, ','));
        }

        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

        if(!$user){
            return false;
        }

        $buscaLink = Link::where('url', $siteUrl)->first();

        if($buscaLink){
            $link = $buscaLink;
        } else {
            $link = Link::create([
                'url' => $siteUrl,
                'tipo' => $data['tipo'],
                'titulo' => $data['title']
            ]);
        }

        if($query && $query['status'] == 'success'){
            $cidade = $query['city'];
            $estado = $query['region'];
            $lat = $query['lat'];
            $lon = $query['lon'];
        } else {
            $cidade = '';
            $estado = '';
            $lat = '';
            $lon = '';
        }

        $link->acesso()->create([
            'uc' => $data['uc'],
            'ip' => $ip,
            'cidade' => $cidade,
            'estado' => $estado,
            'lat' => $lat,
            'lon' => $lon,
            'user_id' => $user->id
        ]);

    }
}
