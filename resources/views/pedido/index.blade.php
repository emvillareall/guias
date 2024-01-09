@extends('layouts.app')

@section('template_title')
    Pedido
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pedido') }}
                            </span>

                             <div class="float-right">
                                <a class="btn btn-sm btn-warning" href="{{ 
                                route('getPDF_pedidos_completo') }}" target="_blank"><i class="fa fa-fw fa-print  "></i></a>
                                <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
                                        <th>No</th>
                                        <th>Descripcion</th>
                                        <th>Cliente</th>
                                        <th>Tienda</th>
                                        <th>URL</th>
                                        <th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)

                                    @if($pedido->clientes_id==1)
                                        <tr class="bg-secondary">
                                    @else
                                     <tr class="bg-info">
                                    @endif
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $pedido->descripcion }}</td>
                                            <td>{{ $pedido->nombres_clientes }} {{ $pedido->apellidos_clientes }}</td>
                                            <td>{{ $pedido->nombre_tienda }}</td>
                                            @isset($url_signed)
                                            @if($pedido->id==$id) 
                                            <td>{{$url_signed}}
                                                <a class="btn btn-sm btn-primary" href="{{ 
                                                        route('estado_pedido',$pedido->id) }}" target="_blank"><i class="fa fa-fw fa fa-paper-plane"></i></a>

                                            </td>
                                            @else
                                            <td><label class="" > {{$pedido->estado}} </label></td>
                                            @endif
                                            @else
                                            <td><label class="" > {{$pedido->estado}} </label></td>
                                            @endisset

                                            <td>

                                                <form  method="POST" action="{{ route('event.getLinkSubscribe', $pedido->id)}}"> 
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm">{{ __('URL') }}</button>
                                                </form>


                                                <form action="{{ route('pedidos.destroy',$pedido->id) }}" method="POST">

                                                    <a class="btn btn-sm btn-success" href="{{ route('pedidos.edit',$pedido->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>   
                                                     <a class="btn btn-sm btn-warning" href="{{ 
                                                        route('getPDF_pedidos',$pedido->id) }}" target="_blank"><i class="fa fa-fw fa-print  "></i></a>
                                                        
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pedidos->links() !!}
            </div>
        </div>
    </div>
@endsection
