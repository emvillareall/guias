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
            {{ Form::label('total_pesos_compra') }}
            {{ Form::text('total_pesos_compra', $compra->total_pesos_compra, ['class' => 'form-control' . ($errors->has('total_pesos_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total Compra']) }}
            {!! $errors->first('total_pesos_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_dolares_compra') }}
            {{ Form::text('total_dolares_compra', $compra->total_dolares_compra, ['class' => 'form-control' . ($errors->has('total_dolares_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total Compra']) }}
            {!! $errors->first('total_dolares_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
                <div class="form-group">
            {{ Form::label('importacion_compra') }}
            {{ Form::text('importacion_compra', $compra->importacion_compra, ['class' => 'form-control' . ($errors->has('importacion_compra') ? ' is-invalid' : ''), 'placeholder' => 'Importacion Compra']) }}
            {!! $errors->first('importacion_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
                <div class="form-group">
            {{ Form::label('total_final_compra') }}
            {{ Form::text('total_final_compra', $compra->total_final_compra, ['class' => 'form-control' . ($errors->has('total_final_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total final Compra']) }}
            {!! $errors->first('total_final_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedor_id') }}
            {{ Form::select('proveedor_id', $proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor Id']) }}
            {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('id', $compra->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Id']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>