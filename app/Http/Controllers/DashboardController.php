<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Acesso;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
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

        $mes = date('m');

        $links = Link::withCount('acesso')->orderBy('acesso_count', 'desc')->paginate(4);

        if($links){
            foreach($links as $key => $link){
                $link->totalAcesso = $link->acesso_count;
            }
        }

        $totalAcessos = count(Acesso::whereMonth('created_at', '=', $mes)->get());

        $acessos = Acesso::whereMonth('created_at', '=', $mes)->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d'); // grouping by day
        });

        $title = 'Dashboard';
        return view('home')->with(compact('title', 'links', 'acessos', 'totalAcessos'));
    }
}
