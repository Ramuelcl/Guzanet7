<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($user) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post"
                        action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data">class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($user)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="$user->title ?? old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="content" value="Content" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="content" name="content" class="mt-1 block w-full" required
                                autofocus>{{ $user->content ?? old('content') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div>
                            <x-input-label for="profile_photo_path" value="Featured Image" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="profile_photo_path" name="profile_photo_path"
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                " />
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="profile_photo_path_preview" class="h-64 w-128 object-cover rounded-md"
                                    src="{{ isset($user) ? Storage::url($user->profile_photo_path) : '' }}"
                                    alt="Photo" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('profile_photo_path')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
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
