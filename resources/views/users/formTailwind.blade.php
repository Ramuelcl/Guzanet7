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
                    method="POST">
                    @csrf
                    @if ($accion == 'crear')
                        @method('POST')
                    @else
                        @method('DELETE')
                    @endif)
                    <div class="flex-auto p-6">
                        <div class="mb-3">
                            <label for="name" class="form-label h4">Name</label>
                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                                class="@error('name') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">
                            @error('name')
                                <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label h4">eMail</label>
                            <input type="mail" placeholder="eMail" name="email" value="{{ old('email') }}"
                                class="@error('email') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">
                            @error('email')
                                <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label h4">Price</label>
                            <input type="number" placeholder="Price" name="price" value="{{ old('price') }}"
                                class="@error('price') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">
                            @error('price')
                                <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label h4">Descripcion</label>
                            <text-area name="descripcion" placeholder="Descripción" cols="30" rows="5"
                                class="@error('descripcion') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded">{{ old('descripcion') }}</text-area>
                            @error('descripcion')
                                <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label h4">Image</label>
                            <input type="file"
                                class="@error('image') bg-red-700 @enderror py-2 px-4 text-lg leading-normal rounded"
                                placeholder="Image" name="image">
                            @error('image')
                                <p class="hidden mt-1 text-sm text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline py-3 px-4 leading-tight text-xl bg-blue-600 text-white hover:bg-blue-600">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
