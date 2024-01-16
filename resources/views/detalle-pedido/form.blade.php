<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cantidad_producto') }}
            {{ Form::text('cantidad_producto', $detallePedido->cantidad_producto, ['class' => 'form-control' . ($errors->has('cantidad_producto') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Producto']) }}
            {!! $errors->first('cantidad_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('producto_id') }}
            {{ Form::text('producto_id', $detallePedido->producto_id, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto Id']) }}
            {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pedido_id') }}
            {{ Form::text('pedido_id', $detallePedido->pedido_id, ['class' => 'form-control' . ($errors->has('pedido_id') ? ' is-invalid' : ''), 'placeholder' => 'Pedido Id']) }}
            {!! $errors->first('pedido_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>