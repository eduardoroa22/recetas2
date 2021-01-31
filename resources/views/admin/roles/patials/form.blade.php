<div class="form-group">
    {!! Form::label('name', 'nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder'=>'escriba un nombre']) !!}
   
    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>


<strong>Permisos</strong>
    <br>
@error('permissions')
    <small class="text-danger">
        <strong>{{$message}}</strong>
    </small>
    <br>
@enderror


@foreach ($permissions as $permi)

<div>
    <label>
        {!! Form::checkbox('permissions[]', $permi->id, null, ['class'=>'mr-1']) !!}
        {{$permi->name}}
    </label>
</div>        
      
@endforeach