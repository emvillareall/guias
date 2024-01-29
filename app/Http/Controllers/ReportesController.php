<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedore;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\DetallePedido;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Tienda;
use DB;

class ReportesController extends Controller
{
    public function index()
    {

        $reportes = DB::table('detalle_pedidos')
            ->join('pedidos', 'pedidos.id', '=', 'detalle_pedidos.pedido_id')
            ->join('productos', 'productos.id', '=', 'detalle_pedidos.producto_id')
            ->select('detalle_pedidos.pedido_id','pedidos.total_pedido', DB::raw('detalle_pedidos.cantidad_producto * productos.precio_dolares_producto as total'))
            ->get();

        $repo = DB::table('detalle_pedidos')
            ->join('pedidos', 'pedidos.id', '=', 'detalle_pedidos.pedido_id')
            ->join('productos', 'productos.id', '=', 'detalle_pedidos.producto_id')
            ->select(DB::raw('detalle_pedidos.pedido_id, SUM(detalle_pedidos.cantidad_producto * productos.precio_dolares_producto) as total'))->groupby('detalle_pedidos.pedido_id')->get();
        
        $pedidos = $reportes->groupby('pedido_id');

        dd($repo);

        return view('reportes.index', compact('pedidos'));
    }

    public function show($id)
    {

        $reportes = DB::table('detalle_pedidos')
            ->join('pedidos', 'pedidos.id', '=', 'detalle_pedidos.pedido_id')
            ->join('productos', 'productos.id', '=', 'detalle_pedidos.producto_id')
            ->select(
                'detalle_pedidos.*',
                'pedidos.*',
                'productos.*',)
            ->where('pedidos.id',$id)
            ->paginate(300);
            //dd($pedidos);

        $pedidos = Pedido::find($id);

        $clientes = DB::table('pedidos')
            ->join('clientes', 'clientes.id', '=', 'pedidos.clientes_id')
            ->select('pedidos.*','clientes.*')
            ->where('pedidos.id',$id)->first();

        //dd($reportes);

        return view('reportes.reporte_ventas', compact('reportes','clientes','pedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $reportes->perPage());
    }
}
