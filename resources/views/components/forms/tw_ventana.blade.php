<div class="fixed inset-0 flex items-center justify-center backdrop-blur-md bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded-md shadow-md">
        <!-- Encabezado con título -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Ventana Emergente</h2>
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <!-- Icono de cierre (puedes usar un ícono de tu elección) -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <!-- Contenido de la ventana emergente -->

        {{ $slot }} <!-- Puedes personalizar esto según el contexto -->

        <!-- Pie de página con botones -->
        <div class="flex justify-end mt-4">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none mr-2">
                Aceptar
            </button>
            <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none">
                Eliminar
            </button>
            <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none ml-2">
                Cancelar
            </button>
        </div>
    </div>
</div>
