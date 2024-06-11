<div>
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
    
    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">

        <div class="space-y-3">

            <a href="{{ route ('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                {{$vacante->titulo}}
            </a>
            <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
            <p class="text-sm text-gray-500">Ultimo dia: {{$vacante->ultimo_dia->format('d/m/Y')}}

        </div>

        <div class="flex flex-cool md:flex-row gap-3 items-streetch mt-5 md:mt-0">
            <a 
                href="{{route('candidatos.index', $vacante)}}"
                class="text-center bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase"
                > Candidatos</a>

                <a 
                href="{{ route('vacantes.edit', $vacante->id )}}"
                class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase"
                > Editar</a>

                <abutton 
                wire:click="$emit('mostrar_alerta', {{$vacante->id}})"
                class="text-center bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase"
                > Eliminar</abutton>

            
        </div>

    </div>
    
    @empty  
        <p class="p-3 text-center text-sm text-grey-600">No tienes ninguna vacante abierta</p>

    @endforelse

</div>

   {{-- Paginacion--}}
   <div class=""flex justify-center mt-10>
        {{ $vacantes->links()}}

    </div>

</div>

@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    Livewire.on('mostrar_alerta', vacanteId => {
    Swal.fire({
        title: '¿Eliminar vacante?',
        text: "Una vacante eliminada no se puede eliminar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
            //si pulsa a eliminar

            if(result.isConfirmed){
                Livewire.emit('eliminarVacante', vacanteId)
            }

        Swal.fire(
            'Vacante eliminada!',
            'Eliminada correctamente.',
            'success'
        )
    }
    })
})
</script>

@endpush