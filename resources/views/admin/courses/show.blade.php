<x-app-layout>
    <section class="bg-gray-700 py-12 mb-10">
        <div class=" container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 ">
            <figure class="">

                @if ($course->image)
                <img class="h-32 w-72 md:h-60 md:w-96 lg:h-72 lg:w-full object-cover rounded-lg m-auto"  src="{{Storage::url($course->image->url)}}" alt="">
                @else
                <img class="h-32 w-72 md:h-60 md:w-96 lg:h-72 lg:w-full object-cover rounded-lg m-auto"  src="https://cdn.pixabay.com/photo/2021/01/27/06/55/nova-scotia-duck-tolling-retriever-5953889__340.jpg" alt="">
                @endif
                
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

        @if (session('info'))
            <div class=" lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class=" text-center relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                    <span class="font-bold">!Ocurrio un error</span>
                    <p class=" text-center">{{session('info')}}</p>
                    <div class="">
                        <i x-on:click="open=false" class=" cursor-pointer fas fa-times-circle text-blue-500"></i>
                    </div>
                </div>
            </div>
        @endif

        <div class=" order-2 lg:col-span-2 md:col-span-2 md:order-1 lg:order-1">
            
            {{-- metas --}}
            <section class="card mb-10">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>

                        @empty
                            <li class="text-gray-700 text-base">este curso no tiene asignada ninguna meta</li>

                        @endforelse


                        
                    </ul>
                </div>
            </section>

            {{-- temario --}}
            <section>
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @forelse ($course->sections as $section)

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
                        
                @empty

                    <article class="card">
                        <div class="card-body">
                            Este curso no tiene ningun seccion asignada
                        </div>
                    </article>

                @endforelse
            </section>

            {{-- requisitos --}}
            <section class="mb-8">
                <h1 class=" font-bold text-3xl">Requisitos</h1>

                <ul class=" list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class=" text-gray-700 text-base">{{$requirement->name}}</li>
                    @empty
                        <li class=" text-gray-700 text-base">Este curso no tiene ningun requirimiento</li>
                    @endforelse
                </ul>
            </section>

            {{-- Descripcion --}}
            <section class=" mb-8">
                <h1 class=" font-bold text-3xl">Descripcion</h1>
                <div class=" text-gray-700 text-base">
                    {!!$course->description!!}
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

                    <form class=" mt-4" action="{{route('admin.courses.approved', $course)}}" method="POST">
                        @csrf

                        <button class="btn btn-primary w-full" type="submit">Aprovar curso</button>
                    </form>

                    <a class="btn btn-danger w-full block text-center mt-4" href="{{route('admin.courses.observation', $course)}}">Obsercar curso</a>

                </div>
            </section>

            
        </div>

    </div>
</x-app-layout> 