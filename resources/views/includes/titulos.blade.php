@foreach ($campos as $campoNombre => $campoInfo)
    @php
        // Obtén el valor del campo actual
        // $valorCampo = $user->$campoNombre;
        // Obtén el tipo de campo
        $titulo1 = $campoInfo['titulo1'];
        $visible1 = $campoInfo['visible1'];
    @endphp
    @if ($visible1)
        <th class="px-4 py-2 text-gray-900 dark:text-white text-center">{{ $titulo1 }}
        </th>
    @endif
@endforeach
