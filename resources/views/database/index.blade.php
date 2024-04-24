@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert text-white bg-success" role="alert">
                    <div class="iq-alert-text">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Lista de Copias de Seguridad de la Base de Datos</h4>
                </div>
                <div>
                    <a href="{{ route('backup.create') }}" class="btn btn-primary add-list"></i>Hacer Copia de Seguridad Ahora</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>Nombre del Archivo</th>
                            <th>Tamaño del Archivo</th>
                            <th>Ruta</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($files as $file)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $file->getFileName() }}</td>
                            <td>{{ $file->getSize() }}</td>
                            <td>{{ $file->getPath() }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="btn btn-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Descargar"
                                        href="{{ route('backup.download', $file->getFileName()) }}"><i class="fa-solid fa-download mr-0"></i>
                                    </a>
                                    <a class="btn btn-danger mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar"
                                        href="{{ route('backup.delete', $file->getFileName()) }}"><i class="fa-solid fa-trash mr-0"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Fin de la Página  -->
</div>

@endsection
