<div class="mt-8">
  <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <div class="embed-responsive">
        {!!$currents->iframe!!}
      </div>

      <h1 class=" text-3xl text-gray-600 font-bold mt-4">
        {{$currents->name}}
      </h1>

      @if ($currents->description)

        <div class=" text-gray-600">
          {{$currents->description->name}}
        </div>
          
      @endif
{{-- marcar como culminado --}}
      <div class="flex justify-between mt-4">

        <div class="flex items-center cursor-pointer" wire:click="completed">

          @if ($currents->completed)
              <i class="fas fa-toggle-on text-2xl text-blue-600 transition-all duration-1000"></i>
            @else
              <i class="fas fa-toggle-off text-2xl text-gray-600 transition-all duration-1000"></i>
          @endif

              <p class=" text-sm ml-2">Marcar como culminada</p>
        </div>
        @if ($currents->resource)
          <div wire:click="download" class="flex items-center text-gray-600 cursor-pointer">
            <i class="fas fa-download text-lg"></i>
            <p class=" text-sm ml-2">descargar recurso</p>
          </div>
        @else
            
        @endif
        

      </div>
        
      

      <div class="card mt-2">
        <div class="card-body flex text-gray-500 font-bold">
            @if ($this->previous)
            <a wire:click="chageLesson({{$this->previous}})" class=" cursor-pointer">anterior</a>
            @endif

            @if ($this->next)
            <a wire:click="chageLesson({{$this->next}})" class=" ml-auto cursor-pointer">siguiente</a>
            @endif
            
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h1 class=" text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>

        <div class=" flex items-center">
          <figure>
            <img class=" w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
          </figure>

          <div>
            <p>{{$course->teacher->name}}</p>
            <a class=" text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name,'')}}</a>
          </div>
        </div>

        <p class=" text-gray-600 text-sm mt-2 ">{{$this->avance . '%'}} completado</p>

        <div class="relative pt-1">
          <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
            <div style="width:{{$this->avance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500 transition-all duration-300"></div>
          </div>
        </div>

        <ul>
          @foreach ($course->sections as $sectio)
              <li class=" text-gray-600 mb-4">
                <a class=" font-bold text-base inline mb-2">{{$sectio->name}}</a>
                <ul>
                  @foreach ($sectio->lessons as $leso)
                      <li class=" flex">
                        <div>
                          @if ($leso->completed)

                            @if ($currents->id == $leso->id)
                            <span class=" inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                            @else
                            <span class=" inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                            @endif

                          @else
                            @if ($currents->id == $leso->id)
                              <span class=" inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                            @else
                              <span class=" inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>

                            @endif
                          @endif
                        </div>
                        <a class=" cursor-pointer" wire:click="chageLesson({{$leso}})">{{$leso->name}}</a>
                      </li>
                  @endforeach
                </ul>
              </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
