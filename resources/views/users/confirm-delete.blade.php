<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Confirmación de eliminación') }}
            <p>¿Estás seguro de que deseas eliminar este elemento?</p>
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <button onclick="mostrarVentanaEmergente()">Eliminar</button>

                <script>
                    function mostrarVentanaEmergente() {
                        if (confirm('¿Estás seguro de que deseas eliminar este elemento?')) {
                            // Si el usuario hace clic en "Aceptar", redirige al controlador para eliminar
                            window.location.href = "{{ route('users.destroy', $user->id) }}";
                        } else {
                            // Si el usuario hace clic en "Cancelar", no se realiza ninguna acción
                            console.log('Eliminación cancelada');
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
