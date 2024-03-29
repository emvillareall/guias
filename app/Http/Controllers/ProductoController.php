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

        if($request->precio_dolares_producto == 0)
        {
            DB::table('productos')
            ->where('codigo_producto', $request->codigo_producto)
            ->update(['precio_dolares_producto' => $precio_real_dolares,'precio_pesos_producto'=>$precio_real_pesos]);

            $precio_real_dolares=$precio_real_pesos * $cambio_moneda->valor_parametro ;
        }
        else
        {
             DB::table('productos')
            ->where('codigo_producto', $request->codigo_producto)
            ->update(['precio_dolares_producto' => $request->precio_dolares_producto]);

            $precio_real_dolares=$request->precio_dolares_producto;
        }


        $compra = Compra::find($request->compras_id);

        $subtotal_producto_pesos= $precio_real_pesos * $request->cantidad_compra_producto;
        $subtotal_producto_dolares= $precio_real_dolares * $request->cantidad_compra_producto;

        
        if($compra->total_dolares_compra == '0')
        {
            $envio_temp=$compra->importacion_compra; 
            $precio_real_envio = $compra->envio_compra+($compra->envio_compra*$recargo_paypal->valor_parametro);
            $precio_envio_dolares = $precio_real_envio * $cambio_moneda->valor_parametro;
        }
        else
        {

            $envio_temp=0;
            $precio_real_envio = 0;
            $precio_envio_dolares = 0;
        }
 

        $total_pesos= $compra->total_pesos_compra + $subtotal_producto_pesos + $precio_real_envio;

        $total_dolares= $compra->total_dolares_compra + $subtotal_producto_dolares+$precio_envio_dolares;

        $total_final=$compra->total_final_compra+$subtotal_producto_dolares+$precio_envio_dolares+$envio_temp;

        //dd($total_final);

        DB::table('compras')
            ->where('id', $request->compras_id)
            ->update(['total_pesos_compra' => $total_pesos,'total_dolares_compra' => $total_dolares,'total_final_compra' => $total_final]);

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
