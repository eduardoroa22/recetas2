<x-app-layout>
    <section class="bg-gray-700 py-12 mb-10">
        <div class=" container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 ">
            <figure class="">
                <img class="h-32 w-72 md:h-60 md:w-96 lg:h-72 lg:w-full object-cover rounded-lg m-auto"  src="{{Storage::url($course->image->url)}}" alt="">
            </figure>

            <div class="text-white text-center md:text-left">
                <h1 class="lg:text-4xl md:text-3xl text-2xl">{{$course->title}}</h1>
                <h2 class="lg:text-xl md:text-sm text-xs mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2 md:text-sm"><i class="fas fa-chart-line  mr-2"></i>Nivel: {{$course->level->name}}</p>
                <p class="mb-2 md:text-sm"><i class=""></i>Categoria: {{$course->category->name}}</p>
                <p class="mb-2 md:text-sm"><i class="fas fa-users mr-2"></i>Matriculados: {{$course->students_count}}</p>
                <p class="md:text-sm"><i class="far fa-star mr-2"></i>calificacion: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">

        <div class=" order-2 lg:col-span-2 md:col-span-2 md:order-1 lg:order-1">
            <section class="card mb-10">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            {{-- temario --}}
            <section>
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @foreach ($course->sections as $section)

                <article class="mb-4 shadow " 
                @if ($loop->first)
                    x-data="{open: true}"
                    
                    @else

                    x-data="{open: false}"
                @endif>

                    <header class="border border-gray-200 py-2 px-4 cursor-pointer bg-gray-200" x-on:click="open=!open">
                        <h1 class="fon-bold text-lg text-gray-600" >{{$section->name}}</h1>
                    </header>

                    <div class="bg-white py-2 px-4" x-show= "open">
                        <ul class="grid grid-cols-1 gap-2">
                            @foreach ($section->lessons as $lesson)
                                <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-700"></i>{{$lesson->name}}</li>
                            @endforeach
                        </ul>
                    </div>

                </article>
                    
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class=" font-bold text-3xl">Requisitos</h1>

                <ul class=" list-disc list-inside">
                    @foreach ($course->requirements as $requireme)
                        <li class=" text-gray-700 text-base">{{$requireme->name}}</li>
                    @endforeach
                </ul>
            </section>

            <section class=" mb-8">
                <h1 class=" font-bold text-3xl">Descripcion</h1>
                <div class=" text-gray-700 text-base">
                    {{$course->description}}
                </div>  
            </section>
        </div>

        <div class=" order-1 md:order-2 lg:order-2 ">
            <section class=" card mb-4">
                <div class="card-body ">
                    
                    <div class="flex items-center">
                        <img class="  h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher}}">
                        <div class="ml-4 ">
                            <h1 class=" font-bold text-gray-500 lg:text-lg sm:text-sm ">Prof: {{$course->teacher->name}}</h1>
                            <a class=" text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>
                    @can('enrolled', $course)

                    <a class="btn btn-danger btn-block mt-4 text-xs lg:text-lg" href="{{route('courses.status', $course)}}">continuar con el curso</a>

                    @else
                    <form action="{{route('courses.enrolled', $course)}}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-block mt-4">llevar este curso</button>
                        
                    </form>
                    @endcan
                        

                </div>
            </section>

            <aside class="hidden md:block lg:block">
                @foreach ($similares as $simi)
                    <article class="flex mb-6">
                        <img class="md:h-20 md:w-20 lg:h-32 lg:w-40 object-cover rounded" src="{{Storage::url($simi->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class=" font-bold text-gray-500 mb-3 md:text-sm lg:text-lg" href="{{route('courses.show', $simi)}}">{{Str::limit($simi->title, 40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="hidden lg:block h-8 w-8 object-cover rounded-full shadow-lg" src="{{$simi->teacher->profile_photo_url}}" alt="">
                                <p class=" text-gray-700 md:text-xs lg:text-sm ml-2">{{$simi->teacher->name}}</p>
                            </div>
                            <p class=" hidden lg:block text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$simi->rating}}</p>

                        </div>
                    </article>
                @endforeach
            </aside>
        </div>

    </div>
</x-app-layout> 