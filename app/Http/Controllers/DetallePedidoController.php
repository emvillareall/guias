<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use Illuminate\Http\Request;

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
    public function create()
    {
        $detallePedido = new DetallePedido();
        return view('detalle-pedido.create', compact('detallePedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetallePedido::$rules);

        $detallePedido = DetallePedido::create($request->all());

        return redirect()->route('detalle-pedidos.index')
            ->with('success', 'DetallePedido created successfully.');
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

        $detallePedido->update($request->all());

        return redirect()->route('detalle-pedidos.index')
            ->with('success', 'DetallePedido updated successfully');
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
