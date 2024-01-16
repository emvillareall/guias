@extends('layouts.app')

@section('template_title')
    {{ $detallePedido->name ?? "{{ __('Show') Detalle Pedido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalle Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad Producto:</strong>
                            {{ $detallePedido->cantidad_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $detallePedido->producto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pedido Id:</strong>
                            {{ $detallePedido->pedido_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
