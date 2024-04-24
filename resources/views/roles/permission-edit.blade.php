@extends('dashboard.body.main')

@section('container')

@php
    $group_names = [
        [
            'slug' => 'pos',
            'name' => 'POS'
        ],
        [
            'slug' => 'employee',
            'name' => 'Empleado'
        ],
        [
            'slug' => 'customer',
            'name' => 'Cliente'
        ],
        [
            'slug' => 'supplier',
            'name' => 'Proveedor'
        ],
        [
            'slug' => 'salary',
            'name' => 'Salario'
        ],
        [
            'slug' => 'attendence',
            'name' => 'Asistencia'
        ],
        [
            'slug' => 'category',
            'name' => 'Categoría'
        ],
        [
            'slug' => 'product',
            'name' => 'Producto'
        ],
        [
            'slug' => 'orders',
            'name' => 'Órdenes'
        ],
        [
            'slug' => 'stock',
            'name' => 'Inventario'
        ],
        [
            'slug' => 'roles',
            'name' => 'Roles'
        ],
        [
            'slug' => 'user',
            'name' => 'Usuario'
        ],
        [
            'slug' => 'database',
            'name' => 'Base de Datos'
        ],
    ]
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Editar Permiso</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                    @method('put')
                    @csrf
                        <!-- begin: Input Data -->
                        <div class=" row align-items-center">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre del Permiso <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $permission->name) }}" required autocomplete="off">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="group_name">Nombre del Grupo <span class="text-danger">*</span></label>
                                <select class="form-control @error('group_name') is-invalid @enderror" name="group_name" required>
                                    <option disabled>-- Seleccionar Grupo --</option>
                                    @foreach ($group_names as $item)
                                        <option value="{{ $item['slug'] }}" {{ $permission->group_name == $item['slug'] ? 'selected' : '' }}>{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('group_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end: Input Data -->
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                            <a class="btn bg-danger" href="{{ route('permission.index') }}">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
@endsection
