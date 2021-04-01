<div>

    <article class="card" x-data="{open: false}">
        <div  class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" x-show="!open" class="text-gray-600 font-bold cursor-pointer"><i class="fas fa-angle-double-down text-blue-500 text-sm"></i> Descripcion de la leccion</h1>
                

                <h2 x-show="open" x-on:click="open = !open" class=" cursor-pointer text-red-500 font-bold text-sm"><i class="fas fa-angle-double-up text-sm text-red-500"></i> OCULTAR Descripcion de la leccion</h2>
            </header>

            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="bg-purple-white shadow rounded border-0 p-2 w-full"></textarea>

                        @error('description.name')
                            <span class="text-sm text-red-500">{{message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="destroy" class="btn btn-danger text-xs" type="button">Eliminar</button>
                            <button class="btn btn-primary text-xs ml-2" type="submit">Actualizar</button>
                        </div>
                    </form>

                    @else

                    <div>
                        <textarea wire:model="name" placeholder="agregue una descripcion de la leccion..." class="bg-purple-white shadow rounded border-0 p-2 w-full"></textarea>

                        @error('name')
                            <span class="text-sm text-red-500">{{message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="store" class="btn btn-primary text-xs ml-2">Agregar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
