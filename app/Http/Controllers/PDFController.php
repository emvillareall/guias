<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Tienda;
use Arr;
use Carbon\Carbon;
use DB;
use PDF;

class PDFController extends Controller
{
        public function getPDF_pedidos($id){
        $pedidos = Pedido::find($id);
        $cliente = Cliente::find($pedidos->clientes_id);
        $tienda = Tienda::find($pedidos->tienda_id);
        $pdf = PDF::loadView('pdf/pedidos', compact('cliente','tienda'));
        return $pdf->stream('prueba_1.pdf');
    }
        public function getPDF_pedidos_completo(){
        $date = Carbon::now();
        $pedidos = DB::table('pedidos')
            ->join('tiendas', 'tiendas.id', '=', 'pedidos.tienda_id')
            ->join('clientes', 'clientes.id', '=', 'pedidos.clientes_id')
            ->select('pedidos.*' ,'clientes.*','tiendas.*')
            ->where('pedidos.created_at','like',"%{$date->toDateString()}%")
            ->where('pedidos.clientes_id','!=',1)
            ->get();
            //dd($pedidos);
        $pdf = PDF::loadView('pdf/pedidos_completo', compact('pedidos'));
        return $pdf->stream('prueba_1.pdf');  
        }
}
