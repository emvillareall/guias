<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo_compra') }}
            {{ Form::text('codigo_compra', $compra->codigo_compra, ['class' => 'form-control' . ($errors->has('codigo_compra') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Compra']) }}
            {!! $errors->first('codigo_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_compra') }}
            {{ Form::text('descripcion_compra', $compra->descripcion_compra, ['class' => 'form-control' . ($errors->has('descripcion_compra') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Compra']) }}
            {!! $errors->first('descripcion_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('envio_compra') }}
            {{ Form::text('envio_compra', $compra->envio_compra, ['class' => 'form-control' . ($errors->has('envio_compra') ? ' is-invalid' : ''), 'placeholder' => 'Envio Compra']) }}
            {!! $errors->first('envio_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recargo_compra') }}
            {{ Form::text('recargo_compra', $compra->recargo_compra, ['class' => 'form-control' . ($errors->has('recargo_compra') ? ' is-invalid' : ''), 'placeholder' => 'Recargo Compra']) }}
            {!! $errors->first('recargo_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_compra') }}
            {{ Form::text('total_compra', $compra->total_compra, ['class' => 'form-control' . ($errors->has('total_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total Compra']) }}
            {!! $errors->first('total_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedor_id') }}
            {{ Form::text('proveedor_id', $compra->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor Id']) }}
            {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>