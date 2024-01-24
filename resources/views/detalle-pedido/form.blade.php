<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cantidad_producto') }}
            {{ Form::text('cantidad_producto', $detallePedido->cantidad_producto, ['class' => 'form-control' . ($errors->has('cantidad_producto') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Producto']) }}
            {!! $errors->first('cantidad_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('productos') }}
            <select class="js-example-basic-single" name="producto_id">
              @foreach($productos as $producto)
              <option value="{{ $producto->id }}">{{ $producto->descripcion_producto }} ( cantidad - {{ $producto->stock_venta_producto }} )</option>
              @endforeach
          </select>
      </div>

        <div class="form-group">
            {{ Form::hidden('pedido_id', $pedido_id) }}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Confirmar Venta') }}</button>
    </div>
</div>