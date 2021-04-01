<x-instructor-layout :course="$course">

    
   

    <div class="flex justify-end mb-2">
        <a class="btn btn-primary ml-2 absolute" href="{{route('instructor.courses.index')}}">volver</a>
    </div>

    <h1 class=" text-2xl font-bold">Informacion del curso</h1>
    <hr class=" mt-2 mb-6">

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method'=>'put', 'files'=>true]) !!}
    
    @include('instructor.partials.form')

    <div class="flex justify-end">
        {!! Form::submit('Actualizar informacion', ['class'=> 'btn btn-primary cursor-pointer']) !!}
    </div>
   
    {!! Form::close() !!}

    <x-slot name='js'>
        <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/course/form.js')}}"></script>
    </x-slot>

</x-instructor-layout>