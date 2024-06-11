<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-bold text-center mY-10">Mis notificaciones </h1>
                    
                    @forelse ($notificaciones as $notificacion)
                        <div class="rounded-lg p-5 border border-gray-200 flex justify-between items-center">
                            <div>
                                <p>Tienes un nuevo candidato en la oferta de trabajo:
                                    <span class="font-bold">{{ $notificacion->data['nombre_vacante']}}</span>
                                </p>    

                                <p>
                                    <span class="font-bold">{{ $notificacion->created_at->diffForHumans()}}</span>
                                </p>   
                            </div>

                            <a href="{{route ('candidatos.index', $notificacion->data['id_vacante'])}}" class="bg-teal-600 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                Ver Candidatos
                            </a>
            
                        </div>
                        

                    @empty

                        <a class="text-center text-gray-600">No hay notificaciones nuevas</a>
                        
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
