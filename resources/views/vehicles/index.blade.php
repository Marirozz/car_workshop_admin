@extends('layouts.admin')

@section('title', 'Vehiculos')
@section('content-header', 'Vehiculos')
@section('content-actions')
<a href="{{route('vehicles.create')}}" class="btn btn-primary">Crear vehiculo</a>
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
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Placa</th>
                    <th>Ficha</th>
                    <th>Kilometraje</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{$vehicle->id}}</td>
                    <td>{{$vehicle->customer->first_name.' '.$vehicle->customer->last_name}}</td>
                    <td>{{$vehicle->type}}</td>
                    <td>{{$vehicle->brand->name}}</td>
                    <td>{{$vehicle->carModel->name}}</td>
                    <td>{{$vehicle->year}}</td>
                    <td>{{$vehicle->license_plate}}</td>
                    <td>{{$vehicle->token}}</td>
                    <td>{{$vehicle->mileage}}</td>
                    <td>{{$vehicle->created_at}}</td>
                    <td>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vehicles->render() }}
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