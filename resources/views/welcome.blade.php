<x-app-layout>
 {{-- seccion arriba buscador --}}
    <section class="bg-cover" style="background-image: url({{asset('img/home/book.jpg')}})">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
           <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">jsudgyshdioasusd</h1>
                <p class="text-white text-lg mt-2 mb-4">hasdfausdaknjjhsdfgdfsjirbhcvghjdgfudgjirh hehi ieh hii ie eih ie e iei ehisudsjo</p>
                @livewire('search')
            </div>
        </div>
    </section>

{{-- seccion imagenes categorias  --}}

{{-- imagenes de catgoria --}}
    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8" >
            <article>
                <figure >
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/window.png')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600"> cursos y productos</h1>
                </header>

               <p class="text-sm text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tenetur sequi saepe quaerat eligendi fugit</p>
            </article>
            <article>
                <figure >
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/trees.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600"> manual de laravel</h1>
                </header>

               <p class="text-sm text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tenetur sequi saepe quaerat eligendi fugit</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/snowfall.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600"> blog</h1>
                </header>

               <p class="text-sm text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tenetur sequi saepe quaerat eligendi fugit</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/blue-flower.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600"> desarrollo web</h1>
                </header>

               <p class="text-sm text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tenetur sequi saepe quaerat eligendi fugit</p>
            </article>
        </div> 
    </section>

{{-- seccion nregra --}}
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">no sabes que curso llevar</h1>
        <p class="text-center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similiq</p>
        
        {{-- boton amarillo --}}
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
            Catalogo de recetas
            </a>
        </div>  
    </section>

    {{-- acualizaciones de cursos--}}
    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ultimos cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omni</p>
    
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            
            @foreach ($courses as $course)
            <x-course-card :course="$course"/>
                
            @endforeach

        </div>
        
    </section>
    
</x-app-layout>
