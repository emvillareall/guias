<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $pedido->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion del producto']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('descuentos_pedido') }}
            {{ Form::text('descuentos_pedido', $pedido->descuentos_pedido, ['class' => 'form-control' . ($errors->has('descuentos_pedido') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion del producto']) }}
            {!! $errors->first('descuentos_pedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('clientes') }}
            <select class="js-example-basic-single" name="clientes_id">
              @foreach($clientes as $cliente)
              <option value="{{ $cliente->id }}">{{ $cliente->apellidos_clientes }} {{ $cliente->nombres_clientes }}</option>
              @endforeach
          </select>
      </div>
        
        <div class="form-group">
            {{ Form::label('tienda_id') }}
            {{ Form::select('tienda_id', $tienda_id, ['class' => 'form-control' . ($errors->has('tienda_id') ? ' is-invalid' : ''), 'placeholder' => 'tienda_id','autocomplete' => 'off']) 
            }}
            {!! $errors->first('tienda_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>