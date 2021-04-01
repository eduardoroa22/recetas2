<x-instructor-layout :course="$course">

    <div class="flex justify-end mb-2">
        <a class="btn btn-primary ml-2 absolute" href="{{route('instructor.courses.index')}}">volver</a>
    </div>

    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals' . $course->id))
    </div>

    <div class=" my-8">
        @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements' . $course->id))
    </div>

    <div>
        @livewire('instructor.courses-audiences', ['course' => $course], key('courses-audiences' . $course->id))
    </div>
    
</x-instructor-layout>