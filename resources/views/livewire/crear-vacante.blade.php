<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>

        
        <div>
            <x-input-label for="titulo" :value="__('Titulo Vacante')" />

            <input 
            id="titulo" 
            class="rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            placeholder = "Titulo Vacante"
            />

            @error ('titulo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="salario" :value="__('Salario Anual')" />
            <select
                id="salario"
                wire:model="salario"
                class="rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                                >
                <option>-- Seleccione --</option>
                <option value="18000">-- Menos de 18000 euros --</option>
                <option value="18000-22000">-- Desde 18000 euros hasta 22000€ --</option>
                <option value="22000-25000">-- Desde 22000€ euros hasta 25000€ --</option>
                <option value="Mas de 25000€">-- Más de 25000€ --</option>

            </select>
            @error ('salario')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select
                id="categoria"
                wire:model="categoria"
                class="rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                >
                <option>-- Seleccione --</option>
                <option value="BackendDeveloper">-- Backend Developer --</option>
                <option value="FrotendDeveloper">-- Frotend Developer --</option>
                <option value="MobileDeveloper">-- Mobile Developer --</option>
                <option value="Devops">-- Devops --</option>

            </select>
            @error ('categoria')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />

            <input 
            id="empresa" 
            class="rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            placeholder = "Empresa ej..."
            />

            @error ('empresa')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />

            <input 
            id="ultimo_dia" 
            class="rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
            />
            @error ('ultimo_dia')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripción Puesto')" />

            <textarea
            wire:model="descripcion"
                placeholder="Descripcion..."
                class="rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-52"

             
            ></textarea>
            @error ('descripcion')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />

            <input 
            id="imagen" 
            class="rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
            type="file" 
            wire:model="imagen" 
            accept="image/*"
            />
            <div class="my-5">
                @if($imagen)
            
                    Imagen:
                    <img src="{{$imagen->temporaryUrl()}}">
                @endif

            </div>
            @error ('imagen')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <x-primary-button>
            CREAR VACANTE
        </x-primary-button>

</form>