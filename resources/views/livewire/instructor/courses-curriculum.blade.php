<div>
  

    <div class="flex justify-end mb-2">
        <a class="btn btn-primary ml-2 absolute" href="{{route('instructor.courses.index')}}">volver</a>
    </div>

    <h1 class=" text-2xl font-bold">Lecciones del curso</h1>
    <hr class="mt-2 mb-6">
    


    @foreach ($course->sections as $item)
        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-gray-100">

                @if ($section->id==$item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model ="section.name" class="bg-purple-white shadow rounded border-0 p-2 w-full" placeholder="Ingrese el nombre de la seccion">
                        @error('section.name')
                        <span class=" text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class=" cursor-pointer"><strong>Seccion: </strong>{{$item->name}}</h1>
                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500"  wire:click="edit({{$item}})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header> 

                    <div x-show="open">
                        @livewire('instructor.course-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif
                
               


            </div>
        </article>
    @endforeach
        
    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open=true"  class=" flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                Agregar nueva seccion
        </a>

        <div x-show="open" class="card">
            <div class="card-body bg-gray-100">
                <h1 class="text-cl font-bold mb-4">Agregar nueva seccion</h1>
                
                <div class=" mb-2">
                    <input wire:model="name" class="bg-purple-white shadow rounded border-0 p-2 w-full" placeholder="Escriba el nombre de la seccion">
                    @error('name')
                        <span class=" text-red-500 text-xs">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open=false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>

            </div>
        </div>
    </div>
</div>
