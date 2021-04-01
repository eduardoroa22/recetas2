<x-instructor-layout :course="$course">
    <div class="flex justify-end mb-2">
        <a class="btn btn-primary ml-2 absolute" href="{{route('instructor.courses.index')}}">volver</a>
    </div>
    <h1 class=" text-2xl font-bold">observaciones del curso</h1>
    <hr class=" mt-2 mb-6">

    <div class=" text-gray-500">
        {!!$course->observation->body!!}
    </div>
</x-instructor-layout>
