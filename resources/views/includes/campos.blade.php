@foreach ($campos as $campoNombre => $campoInfo)
    @php
        // Obtén el valor del campo actual
        $valorCampo = $field->$campoNombre;
        // Obtén el tipo de campo
        $tipoCampo = $campoInfo['tipo'];
        $visible = $campoInfo['visible1'];
        // dump([$campoNombre . '=>' . $valorCampo, $tipoCampo]);
    @endphp
    @if ($visible)
        <td class="border px-4 py-1 text-gray-900 dark:text-white">
            @switch($tipoCampo)
                @case('integer')
                @case('decimal')
                    <div class="text-right">
                        {{ number_format($valorCampo, $campoInfo['decimal'], '.', ',') }}
                    </div>
                @break

                @case('date')
                    <div class="text-center">
                        {{ date('d/m/Y', strtotime($valorCampo)) }}
                    </div>
                @break

                @case('checkit')
                    <div class="text-center">
                        {{ $valorCampo ? 'yes' : 'no' }}
                    </div>
                @break

                @case('image')
                    <div class="text-center w-10">
                        <img src="{{ asset('storage/' . $valorCampo) }}" alt="Foto">
                    </div>
                @break

                @default
                    <div class="text-left">
                        {{ $valorCampo }}
                    </div>
            @endswitch
        </td>
    @endif
@endforeach
