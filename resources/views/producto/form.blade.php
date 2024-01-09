<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo_producto') }}
            {{ Form::text('codigo_producto', $producto->codigo_producto, ['class' => 'form-control' . ($errors->has('codigo_producto') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Producto']) }}
            {!! $errors->first('codigo_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_producto') }}
            {{ Form::text('descripcion_producto', $producto->descripcion_producto, ['class' => 'form-control' . ($errors->has('descripcion_producto') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Producto']) }}
            {!! $errors->first('descripcion_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad_compra_producto') }}
            {{ Form::text('cantidad_compra_producto', $producto->cantidad_compra_producto, ['class' => 'form-control' . ($errors->has('cantidad_compra_producto') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Compra Producto']) }}
            {!! $errors->first('cantidad_compra_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock_venta_producto') }}
            {{ Form::text('stock_venta_producto', $producto->stock_venta_producto, ['class' => 'form-control' . ($errors->has('stock_venta_producto') ? ' is-invalid' : ''), 'placeholder' => 'Stock Venta Producto']) }}
            {!! $errors->first('stock_venta_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_pesos_producto') }}
            {{ Form::text('precio_pesos_producto', $producto->precio_pesos_producto, ['class' => 'form-control' . ($errors->has('precio_pesos_producto') ? ' is-invalid' : ''), 'placeholder' => 'Precio Pesos Producto']) }}
            {!! $errors->first('precio_pesos_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_dolares_producto') }}
            {{ Form::text('precio_dolares_producto', $producto->precio_dolares_producto, ['class' => 'form-control' . ($errors->has('precio_dolares_producto') ? ' is-invalid' : ''), 'placeholder' => 'Precio Dolares Producto']) }}
            {!! $errors->first('precio_dolares_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_venta_producto') }}
            {{ Form::text('precio_venta_producto', $producto->precio_venta_producto, ['class' => 'form-control' . ($errors->has('precio_venta_producto') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta Producto']) }}
            {!! $errors->first('precio_venta_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('compras_id', $id_compra) }}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>