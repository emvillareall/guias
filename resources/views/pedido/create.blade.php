@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Pedido
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    span.select2.select2-container.select2-container--classic{
        width: 100% !important;
    }
</style>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Nuevo') }} Pedido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pedidos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pedido.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){
    $('.js-example-basic-single').select2({
        theme: "classic"
    });
    console.log("oki")
});
</script>
@endsection
