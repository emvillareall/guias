@extends('layouts.app')

@section('template_title')
    Compra
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('REPORTES') }}
                            </span>

                             <div class="float-right">
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

										<th>Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reportes as $reporte)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reporte->id }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('show',$reporte->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reportes->links() !!}
            </div>
        </div>
    </div>
@endsection
