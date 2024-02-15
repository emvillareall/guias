<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Tienda;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();
        $clientes= DB::table('clientes')->get();
        $pedidos = DB::table('pedidos')
            ->join('tiendas', 'tiendas.id', '=', 'pedidos.tienda_id')
            ->join('clientes', 'clientes.id', '=', 'pedidos.clientes_id')
            ->select('pedidos.*','clientes.nombres_clientes','clientes.apellidos_clientes', 'tiendas.nombre_tienda')
            ->where('pedidos.created_at','like',"%{$date->toDateString()}%")
            ->where('pedidos.estado_pedidos','1')
            ->paginate(30);
            //dd($pedidos);
        return view('pedido.index', compact('pedidos','clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = new Pedido();
        $clientes= DB::table('clientes')->get();
        $tienda_id = Tienda::select(DB::raw("nombre_tienda as nombre_tienda"), DB::raw("id as id"))
        ->pluck('nombre_tienda', 'id');

        return view('pedido.create', compact('pedido','tienda_id','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate(Pedido::$rules);

        $pedido = Pedido::create($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pedido = Pedido::find($id);
        $clientes= DB::table('clientes')->where('id',$pedido->clientes_id)->get();
        $tienda_id = Tienda::select(DB::raw("nombre_tienda as nombre_tienda"), DB::raw("id as id"))
        ->pluck('nombre_tienda', 'id');
        return view('pedido.edit', compact('pedido','tienda_id','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
       //dd($pedido->subtotal_pedido-$pedido->descuentos_pedido);
        //request()->validate(Pedido::$rules);
        $pedido->update($request->all());
        $pedido->total_pedido = $pedido->subtotal_pedido-$pedido->descuentos_pedido;
        $pedido->save();
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   
        $detallepedido= DB::table('detalle_pedidos')->where('pedido_id',$id)->get();

        foreach ($detallepedido as $value) {
            $producto = Producto::find($value->producto_id)->first();
            DB::table('productos')
            ->where('id', $value->producto_id)
            ->update(['stock_venta_producto' => $producto->stock_venta_producto + $value->cantidad_producto]);
        }

        $pedido = DB::table('pedidos')
            ->where('id', $id)
            ->update(['estado_pedidos' => 0]);

        $detalle_pedido = DB::table('detalle_pedidos')
            ->where('pedido_id', $id)
            ->update(['estado_dtpedidos' => 0]);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }


    public function cambiar_de_estado($id)
    {

        $pedido = DB::table('pedidos')
            ->where('id', $id)
            ->update(['estado_url' => "ENVIADO"]);

        return redirect()->route('pedidos.index')
            ->with('success', 'Link Enviado');
    }

}
