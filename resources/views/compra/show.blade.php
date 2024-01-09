@extends('layouts.app')

@section('template_title')
    {{ $compra->name ?? "{{ __('Show') Compra" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('compras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo Compra:</strong>
                            {{ $compra->codigo_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Compra:</strong>
                            {{ $compra->descripcion_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Envio Compra:</strong>
                            {{ $compra->envio_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Recargo Compra:</strong>
                            {{ $compra->recargo_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Total Compra:</strong>
                            {{ $compra->total_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $compra->proveedor_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
