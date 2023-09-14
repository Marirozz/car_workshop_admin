@extends('layouts.admin')

@section('title', 'Entrada Vehiculos')
@section('content-header', 'Entrada Vehiculos')
@section('content-actions')
<a href="{{route('vehicle_entries.create')}}" class="btn btn-primary">Registrar entrada vehiculo</a>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr></tr>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Vehiculo</th>
                    <th>Detalle</th>
                    <th>Recorrido</th>
                    <th>Tipo de recorrido</th>
                    <th>Fecha entrada</th>
                    <th>Fecha salida</th>
                    <th>Mantenimiento</th>
                    <th>Empleado</th>
                    <th>Reservacion</th>
                    <th>Creado</th>
                    <td>Acciones</td>

                </tr>
            </thead>
            <tbody>
                @foreach ($vehicle_entries as $vehicle_entry)
                <tr>
                    <td>{{$vehicle_entry->id}}</td>
                    <td>{{$vehicle_entry->customer->first_name.' '.$vehicle_entry->customer->last_name}}</td>
                    <td>{{$vehicle_entry->vehicle?->type.' '. $vehicle_entry->vehicle?->brand->name.' '.$vehicle_entry->vehicle?->carModel->name.' '.$vehicle_entry->vehicle?->license_plate}}</td>
                    <td>{{$vehicle_entry->details}}</td>
                    <td>{{$vehicle_entry->traveled}}</td>
                    <td>{{$vehicle_entry->type_traveled}}</td>
                    <td>{{$vehicle_entry->entry_date}}</td>
                    <td>{{$vehicle_entry->departure_date}}</td>
                    <td>{{$vehicle_entry->maintenance_id}}</td>
                    <td>{{$vehicle_entry->employee->first_name.' '.$vehicle_entry->employee->last_name}}</td>
                    <td>{{$vehicle_entry->reservation->id}}</td>
                    <td>{{$vehicle_entry->created_at}}</td>
                    <td>
                        <a href="{{ route('vehicle_entries.edit', $vehicle_entry) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                    </td>

                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vehicle_entries->render() }}
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-delete', function () {
                $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Estas seguro?',
                    text: "seguro que desea eliminar cliente?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {_method: 'DELETE', _token: '{{csrf_token()}}'}, function (res) {
                            $this.closest('tr').fadeOut(500, function () {
                                $(this).remove();
                            })
                        })
                    }
                })
            })
        })
    </script> -->
@endsection