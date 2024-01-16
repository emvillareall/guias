<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Compra;
use App\Models\Parametro;
use Illuminate\Http\Request;
use DB;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $compras_id=$request->id;
        $producto = new Producto();
        return view('producto.create', compact('producto','compras_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $producto = Producto::create($request->all());

        $recargo_paypal= DB::table('parametros')->where('nombre_parametro','recargo_paypal')->first();
        $cambio_moneda= DB::table('parametros')->where('nombre_parametro','cambio_moneda')->first();


        $precio_real_pesos= $request->precio_pesos_producto + ($request->precio_pesos_producto * $recargo_paypal->valor_parametro);

        $precio_real_dolares=$precio_real_pesos * $cambio_moneda->valor_parametro;

                DB::table('productos')
            ->where('codigo_producto', $request->codigo_producto)
            ->update(['precio_dolares_producto' => $precio_real_dolares,'precio_pesos_producto'=>$precio_real_pesos]);

        $compra = Compra::find($request->compras_id);

        $subtotal_producto_pesos= $precio_real_pesos * $request->cantidad_compra_producto;
        $subtotal_producto_dolares= $precio_real_dolares * $request->cantidad_compra_producto;

        $total_pesos= $compra->total_pesos_compra + $subtotal_producto_pesos;
        $total_dolares= $compra->total_dolares_compra + $subtotal_producto_dolares;  

        DB::table('compras')
            ->where('id', $request->compras_id)
            ->update(['total_pesos_compra' => $total_pesos,'total_dolares_compra' => $total_dolares]);
         

        return redirect()->route('compras.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $compras_id=$producto->compras_id;

        return view('producto.edit', compact('producto','compras_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //request()->validate(Producto::$rules);

        $producto->update($request->all());

        //dd($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
