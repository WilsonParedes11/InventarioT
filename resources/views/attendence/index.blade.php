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
                    <h4 class="mb-3">Lista de Asistencia</h4>
                    <p class="mb-0">Un panel de asistencia te permite reunir y visualizar fácilmente datos de asistencia, optimizando <br>
                        la experiencia de asistencia y garantizando la retención de asistencia. </p>
                </div>
                <div>
                    <a href="{{ route('attendence.create') }}" class="btn btn-primary add-list"><i class="fas fa-plus mr-3"></i>Crear Asistencia</a>
                    <a href="{{ route('attendence.index') }}" class="btn btn-danger add-list"><i class="fa-solid fa-trash mr-3"></i>Limpiar Búsqueda</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('attendence.index') }}" method="get">
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

                    <button type="submit" class="input-group-text bg-primary"><i class="fa-solid fa-magnifying-glass font-size-20"></i></button>
                </div>
            </form>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>@sortablelink('date','fecha')</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($attendences as $attendence)
                        <tr>
                            <td>{{ (($attendences->currentPage() * 10) - 10) + $loop->iteration  }}</td>
                            <td>{{ $attendence->date }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="btn btn-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"
                                        href="{{ route('attendence.edit', $attendence->date) }}"><i class="ri-pencil-line mr-0"></i>
                                    </a>
                                    {{-- <a class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver"
                                        href="{{ route('attendence.show', $attendence->date) }}"><i class="ri-eye-line mr-0"></i>
                                    </a> --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="iq-alert-text">Datos no encontrados.</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $attendences->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection
