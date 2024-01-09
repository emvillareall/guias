<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tienda_proveedor') }}
            {{ Form::text('tienda_proveedor', $proveedore->tienda_proveedor, ['class' => 'form-control' . ($errors->has('tienda_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Tienda Proveedor']) }}
            {!! $errors->first('tienda_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombres_proveedor') }}
            {{ Form::text('nombres_proveedor', $proveedore->nombres_proveedor, ['class' => 'form-control' . ($errors->has('nombres_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Nombres Proveedor']) }}
            {!! $errors->first('nombres_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos_proveedor') }}
            {{ Form::text('apellidos_proveedor', $proveedore->apellidos_proveedor, ['class' => 'form-control' . ($errors->has('apellidos_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos Proveedor']) }}
            {!! $errors->first('apellidos_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cedula_proveedor') }}
            {{ Form::text('cedula_proveedor', $proveedore->cedula_proveedor, ['class' => 'form-control' . ($errors->has('cedula_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Cedula Proveedor']) }}
            {!! $errors->first('cedula_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_proveedor') }}
            {{ Form::text('telefono_proveedor', $proveedore->telefono_proveedor, ['class' => 'form-control' . ($errors->has('telefono_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Proveedor']) }}
            {!! $errors->first('telefono_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion_proveedor') }}
            {{ Form::text('direccion_proveedor', $proveedore->direccion_proveedor, ['class' => 'form-control' . ($errors->has('direccion_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Proveedor']) }}
            {!! $errors->first('direccion_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_proveedor') }}
            {{ Form::text('email_proveedor', $proveedore->email_proveedor, ['class' => 'form-control' . ($errors->has('email_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Email Proveedor']) }}
            {!! $errors->first('email_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>