<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_tienda') }}
            {{ Form::text('nombre_tienda', $tienda->nombre_tienda, ['class' => 'form-control' . ($errors->has('nombre_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Tienda']) }}
            {!! $errors->first('nombre_tienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombres_dueno_tienda') }}
            {{ Form::text('nombres_dueno_tienda', $tienda->nombres_dueno_tienda, ['class' => 'form-control' . ($errors->has('nombres_dueno_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Nombres Dueno Tienda']) }}
            {!! $errors->first('nombres_dueno_tienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos_dueno_tienda') }}
            {{ Form::text('apellidos_dueno_tienda', $tienda->apellidos_dueno_tienda, ['class' => 'form-control' . ($errors->has('apellidos_dueno_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos Dueno Tienda']) }}
            {!! $errors->first('apellidos_dueno_tienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cedula_dueno_tienda') }}
            {{ Form::text('cedula_dueno_tienda', $tienda->cedula_dueno_tienda, ['class' => 'form-control' . ($errors->has('cedula_dueno_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Cedula Dueno Tienda']) }}
            {!! $errors->first('cedula_dueno_tienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_dueno_tienda') }}
            {{ Form::text('telefono_dueno_tienda', $tienda->telefono_dueno_tienda, ['class' => 'form-control' . ($errors->has('telefono_dueno_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Dueno Tienda']) }}
            {!! $errors->first('telefono_dueno_tienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion_dueno_tienda') }}
            {{ Form::text('direccion_dueno_tienda', $tienda->direccion_dueno_tienda, ['class' => 'form-control' . ($errors->has('direccion_dueno_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Dueno Tienda']) }}
            {!! $errors->first('direccion_dueno_tienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_dueno_tienda') }}
            {{ Form::text('email_dueno_tienda', $tienda->email_dueno_tienda, ['class' => 'form-control' . ($errors->has('email_dueno_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Email Dueno Tienda']) }}
            {!! $errors->first('email_dueno_tienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>