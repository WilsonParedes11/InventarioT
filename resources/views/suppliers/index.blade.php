@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert text-white bg-success" role="alert">
                    <div class="iq-alert-text">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Lista de Proveedores</h4>
                    <p class="mb-0">Un panel de proveedores te permite recopilar y visualizar fácilmente datos de proveedores para optimizar la experiencia del proveedor y garantizar la retención de proveedores.</p>
                </div>
                <div>
                    <a href="{{ route('suppliers.create') }}" class="btn btn-primary add-list"><i class="fa-solid fa-plus mr-3"></i>Añadir Proveedor</a>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-danger add-list"><i class="fa-solid fa-trash mr-3"></i>Limpiar Búsqueda</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('suppliers.index') }}" method="get">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="form-group row">
                        <label for="row" class="col-sm-3 align-self-center">Fila:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="row">
                                <option value="10" @if(request('row') == '10')selected="selected"@endif>10</option>
                                <option value="25" @if(request('row') == '25')selected="selected"@endif>25</option>
                                <option value="50" @if(request('row') == '50')selected="selected"@endif>50</option>
                                <option value="100" @if(request('row') == '100')selected="selected"@endif>100</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="search">Buscar:</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" id="search" class="form-control" name="search" placeholder="Buscar proveedor" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-primary"><i class="fa-solid fa-magnifying-glass font-size-20"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>Foto</th>
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('email')</th>
                            <th>@sortablelink('phone')</th>
                            <th>@sortablelink('shopname')</th>
                            <th>@sortablelink('type')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ (($suppliers->currentPage() * 10) - 10) + $loop->iteration  }}</td>
                            <td>
                                <img class="avatar-60 rounded" src="{{ $supplier->photo ? asset('storage/suppliers/'.$supplier->photo) : asset('assets/images/user/1.png') }}">
                            </td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->shopname }}</td>
                            <td>{{ $supplier->type }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver"
                                        href="{{ route('suppliers.show', $supplier->id) }}"><i class="ri-eye-line mr-0"></i>
                                    </a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"
                                        href="{{ route('suppliers.edit', $supplier->id) }}"><i class="ri-pencil-line mr-0"></i>
                                    </a>
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="margin-bottom: 5px">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-warning mr-2 border-none" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar"><i class="ri-delete-bin-line mr-0"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $suppliers->links() }}
        </div>
    </div>
    <!-- Página final  -->
</div>

@endsection
