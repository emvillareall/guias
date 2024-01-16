<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use DB;
use Carbon\Carbon;

class EventController extends Controller
{
    public function getLinkSubscribe(Request $request, $id)
    {
      //  dd($id);
        $date = Carbon::now();
        $pedidos = DB::table('pedidos')
            ->join('tiendas', 'tiendas.id', '=', 'pedidos.tienda_id')
            ->join('clientes', 'clientes.id', '=', 'pedidos.clientes_id')
            ->select('pedidos.*','clientes.nombres_clientes','clientes.apellidos_clientes', 'tiendas.nombre_tienda')
            ->where('pedidos.created_at','like',"%{$date->toDateString()}%")
            ->paginate(30);

        $url_signed= URL::temporarySignedRoute(
            'event.subscribe', 
            now()->addMinutes(10),
            ['id' => $id] 
        );
        

        return view('pedido.index', compact('pedidos','url_signed','id'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());

    }

    public function subscribe(Request $request, $id)
    {
        if (! $request->hasValidSignature()) {
            abort(403);
        }

        $cliente = new Cliente();
        //dd($id);
        return view('cliente.create', compact('cliente', 'id'));

    }   
}
