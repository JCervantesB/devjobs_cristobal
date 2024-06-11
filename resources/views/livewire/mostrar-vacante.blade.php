<div class="p-10">
    <div class=""mb-5>
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacante->titulo}}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Ultimo dia:
                <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria:
                <span class="normal-case font-normal">{{$vacante->categoria}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario:
                <span class="normal-case font-normal">{{$vacante->salario}}</span>
            </p>
        </div>

    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
                <img src="{{ asset('storage/vacantes/' . $vacante->imagen)}}" alt="{{'Imagen vacante ' . $vacante->titulo}}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del puesto </h2>
            <p class="">{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest

    <div class="mt-5 bg-grey-50 border border-dashed p-5 text-center">
        <p>
            ¿Te interesa? <a class="font-bold text-indigo-600" href="{{ route('register') }}"> Registrate ahora y solicita la vacante disponible</a>
        </p>

    </div>

    @endguest


    {{-- cannot: no puede crear--}}
    @cannot('create', App\Models\Vacante::class)

       {{-- renderizo el componente --}}
        {{-- visible para los devs --}}
    <livewire:solicitar-vacante :vacante="$vacante"/> 
    @endcannot


</div>
