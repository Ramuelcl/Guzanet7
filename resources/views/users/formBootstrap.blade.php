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
        @endif
        <div class="col-md-10 mt-4">
            <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-blue-200">
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
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label h4">Name</label>
                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                                class="@error('name') is-invalid @enderror form-control-lg">
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label h4">eMail</label>
                            <input type="mail" placeholder="eMail" name="email" value="{{ old('email') }}"
                                class="@error('email') is-invalid @enderror form-control-lg">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label h4">Price</label>
                            <input type="number" placeholder="Price" name="price" value="{{ old('price') }}"
                                class="@error('price') is-invalid @enderror form-control-lg">
                            @error('price')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label h4">Descripcion</label>
                            <text-area name="descripcion" placeholder="Descripción" cols="30" rows="5"
                                class="@error('descripcion') is-invalid @enderror form-control-lg">{{ old('descripcion') }}</text-area>
                            @error('descripcion')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label h4">Image</label>
                            <input type="file" class="@error('image') is-invalid @enderror form-control-lg"
                                placeholder="Image" name="image">
                            @error('image')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
