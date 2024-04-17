<div class="bg-dark py-3">{{ $accion }} Usuario</div>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('users.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <div class="col-md-10">{{ Session::get('success') }}</div>
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-error">
                <div class="col-md-10">{{ Session::get('error') }}</div>
            </div>
        @endif
        <div class="col-md-10 mt-4">
            <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-blue-200">
                    <h3 class="text-white">{{ $accion }} </h3>
                    <h2>X</h2>
                </div>
                <form
                    action="{{ route($accion == 'crear' ? 'users.store' : ($accion == 'editar' ? 'users.update' : 'users.destroy'), isset($field->id) ? $field->id : 0) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- add @method('put') for edit mode --}}

                    @if ($accion == 'editar')
                        @method('PUT')
                    @elseif ($accion == 'eliminar')
                        @method('DELETE')
                    @endif)
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label h4">Name</label>
                            <input id="name" name="name" type="text" placeholder="Name"
                                value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control-lg">
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <fieldset {{ $accion == 'delete' ? disabled : '' }}>
                            <div class="mb-3">
                                <label for="email" class="form-label h4">eMail</label>
                                <input id="email" name="email" type="mail" placeholder="eMail"
                                    value="{{ old('email') }}"
                                    class="@error('email') is-invalid @enderror form-control-lg">
                                @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label h4">Price</label>
                                <input id="price" name="price" type="number" placeholder="Price"
                                    value="{{ old('price') }}"
                                    class="@error('price') is-invalid @enderror form-control-lg">
                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label h4">Descripcion</label>
                                <text-area id="descripcion" name="descripcion" placeholder="Descripción" cols="30"
                                    rows="5"
                                    class="@error('descripcion') is-invalid @enderror form-control-lg">{{ old('descripcion') }}</text-area>
                                @error('descripcion')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
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
                            </div>
                        </fieldset>
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Submit</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
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
