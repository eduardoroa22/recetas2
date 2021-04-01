<div>
  
  

    @foreach ($section->lessons as $item)
    
    
        <article x-data="{open: false}" class="card mt-4">
            <div class="card-body">
                
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent='update'>
                        <div class="flex items-center">
                            <label class="w-32">Nombre: </label>
                            <input wire:model="lesson.name" class="bg-purple-white shadow rounded border-0 p-2 w-full">
                        </div>

                        @error('lesson.name')
                            <span class=" text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class=" flex items-center mt-4">
                            <label class="w-32">Plataforma: </label>
                            <select wire:model="lesson.platform_id" class="bg-purple-white shadow rounded border p-2 w-full">
                                @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">Url: </label>
                            <input wire:model="lesson.url" class="bg-purple-white shadow rounded border-0 p-2 w-full">
                        </div>

                        @error('lesson.url')
                            <span class=" text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class=" mt-4 flex justify-end">
                            <button type="button" class="btn btn-danger" wire:click="cancel" >Cancelar</button>
                            <button type="submit" class="btn btn-primary ml-2">Acrualizar</button>
                        </div>

                    </form>
                @else
                <header>
                    <h1 x-on:click="open = !open" class=" cursor-pointer">
                        <i class="mr-1 far fa-play-circle text-blue-500"></i> 
                        Leccion: {{$item->name}}
                    </h1>
                </header>

                <div x-show="open">
                    <hr class=" my-2">
                    <p class=" text-sm">Plataforma: {{$item->platform->name}}</p>
                    <p class=" text-sm text-blue-600">Enlace: <a href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>
                    
                    <div class=" my-2">
                        <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">Editar</button>
                        <button class="btn btn-danger text-sm"  wire:click="destroy({{$item}})">Eliminar</button>
                    </div>

                    <div class=" mb-4">
                        @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description' . $item->id))
                    </div>

                    <div>
                        @livewire('instructor.lesson-resourse', ['lesson' => $item], key('lesson-resourse' . $item->id))
                    </div>

                </div>
                @endif

            </div>
        </article>

    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open=true"  class=" flex items-center cursor-pointer text-xs">
            <i class="far fa-plus-square text-red-500 mr-2 text-xs"></i>
                Agregar nueva leccion
        </a>

        <div x-show="open" class="card">
            <div class="card-body">
                <h1 class="text-cl font-bold mb-4">Agregar nueva leccion</h1>
                
                <div class=" mb-2">
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input wire:model="name" class="bg-purple-white shadow rounded border-0 p-2 w-full">
                    </div>

                    @error('name')
                        <span class=" text-sm text-red-500">{{$message}}</span>
                    @enderror

                    <div class=" flex items-center mt-4">
                        <label class="w-32">Plataforma: </label>
                        <select wire:model="platform_id" class="bg-purple-white shadow rounded border p-2 w-full">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    
                    @error('platform_id')
                        <span class=" text-sm text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Url: </label>
                        <input wire:model="url" class="bg-purple-white shadow rounded border-0 p-2 w-full">
                    </div>

                    @error('url')
                        <span class=" text-sm text-red-500">{{$message}}</span>
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
