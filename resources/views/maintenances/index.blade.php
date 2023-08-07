@extends('layouts.admin')

@section('title', 'Mantenimiento')
@section('content-header', 'Mantenimiento')
@section('content-actions')
<a href="{{route('maintenances.create')}}" class="btn btn-primary">Crear mantenimiento</a>
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
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Costo</th>
                    <th>Frecuencia</th>
                    <th>Duracion</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Creado</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maintenances as $maintenance)
                <tr>
                    <td>{{$maintenance->id}}</td>
                    <td>{{$maintenance->name}}</td>
                    <td>{{$maintenance->type}}</td>
                    <td>{{$maintenance->cost}}</td>
                    <td>{{$maintenance->frequency}}</td>
                    <td>{{$maintenance->duration}}</td>
                    <td>{{$maintenance->brand->name}}</td>
                    <td>{{$maintenance->carModel->name}}</td>
                    <td>{{$maintenance->created_at}}</td>
                    <td>
                        <a href="{{ route('maintenances.edit', $maintenance) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('maintenances.destroy', $maintenance) }}" method="post" class="d-inline-block">
                            <button class="btn btn-danger btn-delete" data-url="{{route('maintenances.destroy', $maintenance)}}"><i class="fas fa-trash"></i></button>
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $maintenances->render() }}
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