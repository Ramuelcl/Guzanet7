<div class="bg-gray-900 py-3">{{ $accion }} Usuario</div>
<div class="container mx-auto sm:px-4">
    <div class="flex flex-wrap  justify-center mt-4">
        <div class="md:w-4/5 pr-4 pl-4 flex justify-end">
            <a href="{{ route('users.create') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">{{ __('Create') }}</a>
        </div>
    </div>
    <div class="flex flex-wrap justify-center">
        @if (Session::has('success'))
            <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
                <div class="md:w-4/5 pr-4 pl-4">{{ Session::get('success') }}</div>
            </div>
        @elseif (Session::has('error'))
            <div class="relative px-3 py-3 mb-4 border rounded alert-error">
                <div class="md:w-4/5 pr-4 pl-4">{{ Session::get('error') }}</div>
            </div>
        @endif
        <div class="md:w-4/5 pr-4 pl-4 mt-4">
            <div
                class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 borde-0 shadow-lg my-4">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 bg-blue-200">
                    <h3 class="text-white">{{ $accion }} </h3>
                    <h2>X</h2>
                </div>
                <form
                    action="{{ route($accion == 'crear' ? 'users.store' : ($accion == 'editar' ? 'users.update' : 'users.destroy'), isset($field->id) ? $field->id : 0) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($accion == 'crear')
                        @method('POST')
                    @elseif ($accion == 'eliminar')
                        @method('DELETE')
                    @endif)
                    <div class="flex-auto p-6">
                        <div class="mb-3">
                            <label for="name" class="form-label h4">Name</label>
                            <input id="name" name="name" type="text" placeholder="Name"
                                value="{{ old('name') }}"
                                class="@error('name') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">
                            @error('name')
                                <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>
                        <fieldset {{ $accion == 'delete' ? disabled : '' }}>
                            <div class="mb-3">
                                <label for="email" class="form-label h4">eMail</label>
                                <input id="email" name="email" type="mail" placeholder="eMail"
                                    value="{{ old('email') }}"
                                    class="@error('email') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">
                                @error('email')
                                    <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label h4">Price</label>
                                <input id="price" name="price" type="number" placeholder="Price"
                                    value="{{ old('price') }}"
                                    class="@error('price') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">
                                @error('price')
                                    <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label h4">Descripcion</label>
                                <text-area id="descripcion" name="descripcion" placeholder="Descripción" cols="30"
                                    rows="5"
                                    class="@error('descripcion') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">{{ old('descripcion') }}</text-area>
                                @error('descripcion')
                                    <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="profile_photo_path" class="form-label h4">Image</label>
                                <input id="profile_photo_path" name="profile_photo_path" type="file"
                                    accept=".png .jpg .jpeg"
                                    class="@error('profile_photo_path') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">
                                @error('profile_photo_path')
                                    <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="d-grid">
                            <button
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline py-3 px-4 leading-tight text-xl bg-blue-600 text-white hover:bg-blue-600">Submit</button>
                            <a href="{{ route('users.index') }}"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        // Deshabilitar todos los campos dentro del formulario
        $('form :input').prop('disabled', true);
    });
</script>
