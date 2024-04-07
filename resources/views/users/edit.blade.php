<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('users.update', $usuario->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $usuario->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $usuario->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('New Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- profile photo -->
                        <div class="mt-4">
                            <x-input-label for="profile_photo_path" :value="__('Photo')" />
                            <x-text-input id="profile_photo_path" class="block mt-1 w-full" type="text"
                                name="profile_photo_path" :value="old('profile_photo_path', $usuario->profile_photo_path)" />
                            <x-input-error :messages="$errors->get('profile_photo_path')" class="mt-2" />
                        </div>

                        <!-- active -->
                        <div class="mt-4">
                            <x-input-label for="is_active" :value="__('Active')" />
                            <input type="checkbox" id="is_active" name="is_active"
                                {{ old('is_active', $usuario->is_active) }} class="block mt-1 rounded" value="1">

                            <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                        </div>
                        <div class="mt-4 justify-between">
                            <x-forms.tw_button color="green" type="submit"
                                routeName="users.store">{{ __('Update') }}</x-forms.tw_button>
                            <x-forms.tw_buttonA color="gray" routeName="users.index">{{ __('Cancel') }}
                            </x-forms.tw_buttonA>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
