<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso:') !!}
    {!! Form::text('title', null, ['class'=>'rounded-md form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class=" text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso:') !!}
    {!! Form::text('slug', null, ['readonly'=>'readonly', 'class'=>'rounded-md form-input block w-full mt-1'. ($errors->has('slug') ? ' border-red-600' : '')]) !!}
    
    @error('slug')
        <strong class=" text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'subtitulo del curso:') !!}
    {!! Form::text('subtitle', null, ['class'=>'rounded-md form-input block w-full mt-1'. ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
    
    @error('subtitle')
        <strong class=" text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description', 'Descripcion del curso:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-input block w-full mt-1'. ($errors->has('description') ? ' border-red-600' : '')]) !!}
    
    @error('description')
        <strong class=" text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4">
    <div class="">
        {!! Form::label('category_id', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'rounded-md form-input block w-full mt-1']) !!}
    </div>
    <div class="">
        {!! Form::label('level_id', 'Niveles:') !!}
        {!! Form::select('level_id', $levels, null, ['class'=>'rounded-md form-input block w-full mt-1']) !!}
    </div>
    <div class="">
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class'=>'rounded-md form-input block w-full mt-1']) !!}
    </div>
</div>

<h1 class=" text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
        <img id="picture" class=" rounded-lg w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
        
            
        @else
        <img id="picture" class=" rounded-lg w-full h-64 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/01/27/06/55/nova-scotia-duck-tolling-retriever-5953889__340.jpg" alt="">   
        @endisset
    </figure>

    <div class="">
        <p class=" mb-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit velit sapiente nemo, odio eaque possimus et esse, quo quam mollitia placeat ab beatae sint. Nemo quaerat excepturi et nisi rem.</p>
        {!! Form::file('file', ['class'=>' form-input w-full'. ($errors->has('file') ? ' border-red-600' : ''), 'id'=>'file', 'accept'=>'image/*']) !!}
        
        @error('file')
            <strong class=" text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
    
</div>