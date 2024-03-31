<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <x-forms.tw_buttonA class="w-full">{{ __('Create') }}</x-forms.tw_buttonA>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">Id</th>
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">Nombre</th>
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">eMail</th>
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">Foto</th>
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">Activo</th>
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">Creado</th>
                            <th class="px-4 py-1 text-gray-900 dark:text-white text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-1 text-gray-900 dark:text-white text-center">
                                    {{ $user->id }}</td>
                                <td class="border px-4 py-1 text-gray-900 dark:text-white text-center">
                                    {{ $user->name }}</td>
                                <td class="border px-4 py-1 text-gray-900 dark:text-white text-center">
                                    {{ $user->email }}</td>
                                <td class="border px-4 py-1 text-gray-900 dark:text-white text-center">
                                    {{ $user->profile_photo_path }}</td>
                                <td class="border px-4 py-1 text-gray-900 dark:text-white text-center">
                                    {{ $user->is_active ? 'yes' : 'no' }}</td>
                                <td class="border px-4 py-1 text-gray-900 dark:text-white text-center">
                                    {{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="border px-4 py-1 text-center">
                                    <x-forms.tw_buttonA color="gray"
                                        icon='eye'>{{ __('view') }}</x-forms.tw_buttonA>
                                    <x-forms.tw_buttonA color="green">{{ __('Edit') }}</x-forms.tw_buttonA>
                                    <x-forms.tw_buttonA color="red">{{ __('delete') }}</x-forms.tw_buttonA>
                                    <x-forms.tw_buttonA color="violet">{{ __('Role') }}</x-forms.tw_buttonA>
                                    <x-forms.tw_buttonA color="yellow">{{ __('Permissions') }}</x-forms.tw_buttonA>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
