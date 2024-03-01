@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        <th>Codigo Producto</th>
                                        <th>Descripcion Producto</th>
                                        <th>Cantidad Compra Producto</th>
                                        <th>Stock Venta Producto</th>
                                        <th>Precio Pesos Producto</th>
                                        <th>Precio Dolares Producto</th>
                                        <th>Precio Total Producto Pesos.</th>
                                        <th>Precio Total Producto Dolar.</th>
                                        <th>Precio Venta Producto</th>
                                        <th>Compras Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_dolares=0; ?>
                                    <?php $total_pesos=0; ?>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            
                                            <td>{{ $producto->codigo_producto }}</td>
                                            <td>{{ $producto->descripcion_producto }}</td>
                                            <td>{{ $producto->cantidad_compra_producto }}</td>
                                            <td>{{ $producto->stock_venta_producto }}</td>
                                            <td>{{ $producto->precio_pesos_producto }}</td>
                                            <td>{{ $producto->precio_dolares_producto }}</td>
                                            <td>{{ $producto->precio_pesos_producto * $producto->cantidad_compra_producto }}</td>
                                            <td>{{ $producto->precio_dolares_producto * $producto->cantidad_compra_producto }}</td>
                                            <td>{{ $producto->precio_venta_producto }}</td>
                                            <td>{{ $producto->compras_id }}</td>

                                        </tr>
                                        <?php   $total_dolares=$total_dolares+$producto->precio_dolares_producto * $producto->cantidad_compra_producto ?>
                                        <?php   $total_pesos=$total_pesos+$producto->precio_pesos_producto * $producto->cantidad_compra_producto ?>

                                    @endforeach
                                </tbody>
                                                                <tfoot>
                                    <tr>
                                        <th scope="row">Sumatorias: </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$total_pesos}}</td>
                                        <td>{{$total_dolares}}</td>
                                        <td></td>
                                        <td></td>

                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
