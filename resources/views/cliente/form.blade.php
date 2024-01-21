<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombres_clientes:') }}&nbsp;
            {{ Form::text('nombres_clientes', $cliente->nombres_clientes, ['class' => 'form-control' . ($errors->has('nombres_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Nombres Clientes']) }}
            {!! $errors->first('nombres_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('apellidos_clientes:') }}&nbsp;
            {{ Form::text('apellidos_clientes', $cliente->apellidos_clientes, ['class' => 'form-control' . ($errors->has('apellidos_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos Clientes']) }}
            {!! $errors->first('apellidos_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('cedula_clientes:') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ Form::text('cedula_clientes', $cliente->cedula_clientes, ['class' => 'form-control' . ($errors->has('cedula_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Cedula Clientes']) }}
            {!! $errors->first('cedula_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('telefono_clientes:') }}&nbsp;&nbsp;
            {{ Form::text('telefono_clientes', $cliente->telefono_clientes, ['class' => 'form-control' . ($errors->has('telefono_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Clientes']) }}
            {!! $errors->first('telefono_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('ciudad_clientes:') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ Form::text('ciudad_clientes', $cliente->ciudad_clientes, ['class' => 'form-control' . ($errors->has('ciudad_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad Clientes']) }}
            {!! $errors->first('ciudad_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('direccion_clientes:') }}&nbsp;
            {{ Form::text('direccion_clientes', $cliente->direccion_clientes, ['class' => 'form-control' . ($errors->has('direccion_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Clientes']) }}
            {!! $errors->first('direccion_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('email_clientes:') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ Form::text('email_clientes', $cliente->email_clientes, ['class' => 'form-control' . ($errors->has('email_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Email Clientes']) }}
            {!! $errors->first('email_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>