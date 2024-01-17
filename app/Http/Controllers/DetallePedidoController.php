<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use DB;
/**
 * Class DetallePedidoController
 * @package App\Http\Controllers
 */
class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallePedidos = DetallePedido::paginate();

        return view('detalle-pedido.index', compact('detallePedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $detallePedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pedido_id=$request->id;

        $productos= DB::table('productos')->get();

        //dd($productos);

        $producto_id = Producto::select(DB::raw("descripcion_producto as nombre_producto"), DB::raw("id as id"))
        ->pluck('nombre_producto', 'id');
        $detallePedido = new DetallePedido();
        return view('detalle-pedido.create', compact('detallePedido','pedido_id','producto_id','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detallePedido = DetallePedido::create($request->all());

        $pedidos = Pedido::find($request->pedido_id);
        $productos = Producto::find($request->producto_id);
        
        if($productos->stock_venta_producto>=$request->cantidad_producto)
        {
            DB::table('productos')
            ->where('id', $request->producto_id)
            ->update(['stock_venta_producto' => $productos->stock_venta_producto - $request->cantidad_producto ]);

            DB::table('pedidos')
            ->where('id', $request->pedido_id)
            ->update([
                'subtotal_pedido' => $pedidos->subtotal_pedido+($productos->precio_venta_producto*$request->cantidad_producto), 
                'iva_pedido'=>0,
                'total_pedido'=> $pedidos->subtotal_pedido+($productos->precio_venta_producto*$request->cantidad_producto) - $pedidos->descuentos_pedido]);

            return redirect()->route('pedidos.index')
            ->with('success', 'DetallePedido created successfully.');
        }
        else
        {
        return redirect()->route('pedidos.index')
            ->with('danger', 'la cantidad '.$request->cantidad_producto.' supera el STOCK de '.$productos->descripcion_producto.' - Stock Disponible ( '.$productos->stock_venta_producto.' )');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallePedido = DetallePedido::find($id);

        return view('detalle-pedido.show', compact('detallePedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detallePedido = DetallePedido::find($id);

        return view('detalle-pedido.edit', compact('detallePedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetallePedido $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePedido $detallePedido)
    {
        request()->validate(DetallePedido::$rules);
        $productos= DB::table('productos')->get();
        $detallePedido->update($request->all());

        return redirect()->route('detalle-pedidos.index')
            ->with('success', 'DetallePedido updated successfully','productos');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detallePedido = DetallePedido::find($id)->delete();

        return redirect()->route('detalle-pedidos.index')
            ->with('success', 'DetallePedido deleted successfully');
    }
}
