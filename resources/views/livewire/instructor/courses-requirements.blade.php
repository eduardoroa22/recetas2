<section>
    <h1 class=" font-bold text-2xl">requirimientos del curso</h1>
    <hr class=" mt-2 mb-6">

    @foreach ($course->requirements as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">

                @if ($requirement->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="requirement.name" class=" w-full bg-purple-white shadow rounded border-0 p-2 " >
                    </form>

                    @error('requirement.name')
                        <span class=" text-red-500 text-xs">{{$message}}</span>
                    @enderror
                @else

                <header class="flex justify-between">
                    <h1>{{$item->name}}</h1>
                    <div>
                        <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                        <i wire:click="destroy({{$item}})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                    </div>
                </header>

                @endif

                

            </div>
        </article>
    @endforeach
    
    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" placeholder="Agregar el nombre de un requerimiento" class=" w-full bg-purple-white shadow rounded border-0 p-2 ">
                @error('name')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                @enderror
                <div class="flex justify-end mt-2">
                    <button class="btn btn-primary" type="submit">Agregar requirimiento</button>
                </div>
            </form>
        </div>
    </article>
</section>
