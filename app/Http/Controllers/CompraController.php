<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use DB;

/**
 * Class CompraController
 * @package App\Http\Controllers
 */
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate();
        

        return view('compra.index', compact('compras'))
            ->with('i', (request()->input('page', 1) - 1) * $compras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compra = new Compra();
        $proveedor_id = Proveedore::select(DB::raw("tienda_proveedor as tienda_proveedor"),DB::raw("id as id"))->pluck('tienda_proveedor', 'id');
               

        return view('compra.create', compact('compra','proveedor_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Compra::$rules);

        $compra = Compra::create($request->all());

        return redirect()->route('compras.index')
            ->with('success', 'Compra created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::find($id);

        return view('compra.show', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::find($id);
        $proveedor_id = Proveedore::select(DB::raw("tienda_proveedor as tienda_proveedor"),DB::raw("id as id"))->pluck('tienda_proveedor', 'id');

        return view('compra.edit', compact('compra','proveedor_id','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        $recargo_paypal= DB::table('parametros')->where('nombre_parametro','recargo_paypal')->first();
        $cambio_moneda= DB::table('parametros')->where('nombre_parametro','cambio_moneda')->first();
        
        $compra = Compra::find($request->id);

        $total_final_compra=$compra->total_final_compra-$compra->importacion_compra;
        $precio_real_envio = $compra->envio_compra+($compra->envio_compra*$recargo_paypal->valor_parametro);
        $precio_envio_dolares = $precio_real_envio * $cambio_moneda->valor_parametro;

        $total_pesos_compra=$compra->total_pesos_compra-$precio_real_envio; //a usar
        $total_dolares_compra=$compra->total_dolares_compra-$precio_envio_dolares; // a usar
        $total_final=$compra->total_final_compra-$precio_envio_dolares-$compra->importacion_compra; // a usar



        $precio_real_envio_2 = $request->envio_compra+($request->envio_compra*$recargo_paypal->valor_parametro);
        $precio_envio_dolares_2 = $precio_real_envio_2 * $cambio_moneda->valor_parametro;

        $total_pesos_2= $total_pesos_compra + $precio_real_envio_2;

        $total_dolares_2= $total_dolares_compra + $precio_envio_dolares_2;

        $total_final_2=$total_final+$precio_envio_dolares_2 + $request->importacion_compra;

        request()->validate(Compra::$rules);
        //dd($request->id);
        $compra->update($request->all());

                DB::table('compras')
            ->where('id', $request->id)
            ->update(['total_pesos_compra' => $total_pesos_2,'total_dolares_compra' => $total_dolares_2,'total_final_compra' => $total_final_2]);

        return redirect()->route('compras.index')
            ->with('success', 'Compra updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $compra = Compra::find($id)->delete();

        return redirect()->route('compras.index')
            ->with('success', 'Compra deleted successfully');
    }
}
