<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($estado . ' usuario') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form enctype="multipart/form-data" method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        {{-- <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div> --}}

                        <!-- profile photo -->
                        {{-- <div class="mt-4">
                            <label for="profile_photo_path" class="form-label h4">Image</label>

                            <span class="sr-only">Choose image</span>
                            <input type="file" id="profile_photo_path" name="profile_photo_path"
                                class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100" />
                            <div class="shrink-0 my-2">
                                <img id="profile_photo_path_preview" class="h-64 w-128 object-cover rounded-md"
                                    src="{{ isset($user) ? Storage::url($user->profile_photo_path) : '' }}"
                                    alt="Photo" />
                            </div>

                            @error('profile_photo_path')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror

                        </div> --}}

                        <!-- active -->
                        {{-- <div class="mt-4">
                            <x-input-label for="is_active" :value="__('Active')" />
                            <input type="checkbox" id="is_active" name="is_active"
                            {{ old('is_active') || !old('is_active') ? 'checked' : '' }} class="block mt-1 rounded"
                            value="0">
                            
                            <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                            </div> --}}

                        <!-- boton -->
                        <div class="mt-4 justify-between">
                            <x-forms.tw_button color="green" type="submit"
                                routeName="users.store">{{ __('Save') }}</x-forms.tw_button>
                            <x-forms.tw_buttonA color="gray" routeName="users.index">{{ __('Cancel') }}
                            </x-forms.tw_buttonA>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for profile_photo_path input
        document.getElementById('profile_photo_path').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in profile_photo_path_preview
                document.getElementById('profile_photo_path_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
