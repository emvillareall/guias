@extends('layouts.app_cliente')

@section('template_title')
    {{ __('Create') }} Cliente
@endsection

@section('content')
    <section class="content container-fluid">


  <div class="container-sm">

     <div class="row">
        <div class="col"></div>
        <div class="col-4. " >
            <br><br>
                <div class="card bg-light mb-3" >
                    <div class="card-header" style="background-color: #C3AFEB;">
                        <span class="card-title" style="font-weight: bold; text-align: center;">Datos de Envío:</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('clientes.store', ['id' => $id]) }}"  role="form" enctype="multipart/form-data" class="form-inline">
                            {{ Form::hidden('id_pedido', $id) }}
                            @csrf

                            @include('cliente.form')

                        </form>
                    </div>
                </div>
</div>
<div class="col"></div>
               </div>
                </div>


    </section>
@endsection
