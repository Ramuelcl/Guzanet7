<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users List') }}

        </h2>
        @include('layouts.partials.messages')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <x-forms.tw_buttonA class="w-full" routeName="users.create">{{ __('Create New') }}</x-forms.tw_buttonA>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            @include('includes.titulos')
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $field)
                            <tr>
                                @include('includes.campos')

                                <td class="border px-4 py-1 text-center">

                                    {{-- ver un registro --}}
                                    {{-- <x-forms.tw_buttonA color="gray"
                                        icon='eye'>{{ __('view') }}</x-forms.tw_buttonA> --}}
                                    <a href="{{ route('users.show', $field->id) }}"
                                        class="inline-flex items-center justify-center min-w-20 rounded-md p-2 focus:outline-none focus:ring bg-gray-600 dark:bg-gray-400 text-gray-100 dark:text-gray-800 hover:bg-gray-400 dark:hover:bg-gray-200 active:bg-gray-400 dark:active:bg-gray-200 focus:ring-gray-700 dark:focus:ring-gray-500">{{ __('show') }}
                                    </a>

                                    {{-- editar un registro --}}
                                    <a href="{{ route('users.edit', $field->id) }}"
                                        class="inline-flex items-center justify-center min-w-20 rounded-md p-2 focus:outline-none focus:ring bg-green-600 dark:bg-green-400 text-green-100 dark:text-green-800 hover:bg-green-400 dark:hover:bg-green-200 active:bg-green-400 dark:active:bg-green-200 focus:ring-green-700 dark:focus:ring-green-500">{{ __('Edit') }}
                                    </a>

                                    {{-- borrar un registro --}}
                                    <div class="inline-flex items-center justify-center">
                                        <form action="{{ route('users.destroy', $field->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-forms.tw_button type="submit"
                                                color="red">Eliminar</x-forms.tw_button>
                                        </form>
                                    </div>

                                    {{-- roles --}}
                                    <x-forms.tw_buttonA color="violet">{{ __('Role') }}</x-forms.tw_buttonA>
                                    <x-forms.tw_buttonA color="yellow">{{ __('Permissions') }}</x-forms.tw_buttonA>
                                </td>
                            </tr>
                        @empty
                            No hay registros
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
