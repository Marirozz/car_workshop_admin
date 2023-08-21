@extends('layouts.admin')

@section('title', 'Actualizar Entrada Vehiculo')
@section('content-header', 'Actualizar Entrada Vehiculo')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('vehicle_entries.update', $vehicle_entry) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                

                <div class="form-group">
                    <label for="details">Detalles</label>
                    <textarea 
                        name="details" 
                        class="form-control" 
                        id="details" 
                        placeholder="El auto se apagó y no enciende">
                        {{old('details', $vehicle_entry->details)}}
                       
                    </textarea>
    
                    @error('datails')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="traveled">Reorrido</label>
                    <input 
                        type="number"
                        name="traveled" 
                        class="form-control" 
                        @error('traveled') is-invalid @enderror"
                        id="traveled" 
                        placeholder="Kilometros o millas recorridas"
                        value="{{ old('traveled', $vehicle_entry->traveled) }}"
                    >
                    @error('traveled')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type_traveled">Tipo Recorrido</label>
                    <select
                        type="text" 
                        name="type_traveled" 
                        class="form-control @error('type_traveled') is-invalid @enderror"
                        id="type_traveled"
                        placeholder="Ej: Kilometro" 
                        value="{{ old('type_traveled', $vehicle_entry->type_traveled) }}">
                          <option value="Kilometro">Kilometro</option>
                          <option value="Millas">Millas</option>

                     </select>
                    @error('type_traveled')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="departure_date">Fecha Salida</label>
                    <input
                        type="date"                    
                        name="departure_date" 
                        class="form-control" 
                        value="{{ old("departure_date ") }}" 
                        id="departure_date">
                    </input>
                    @error('departure_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="maintenance_id">Mantenimiento</label>
                    <select 
                        name="maintenance_id" 
                        id="maintenance_id"
                        class="form-control" 
                        value="{{ old('maintenance_id') }}">
                        <option value="">Seleccione
                        </option>
                        @foreach($maintenances as $maintenance)
                            <option 
                                value="{{$maintenance->id}}">{{$maintenance->name}}
                            </option>
                        @endforeach
                    </select>
    
                    @error('maintenance_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="employee_id">Empleado</label>
                    <select 
                        name="employee_id" 
                        class="form-control" 
                        value="{{ old('employee_id') }}" 
                        id="employee_id">
    
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                        @endforeach
                    </select>
                    
                    @error('employee_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reservation_id">Reservacion</label>
                    <select 
                        name="reservation_id" 
                        id="reservation_id"
                        class="form-control" 
                        value="{{ old('reservation_id')}}">
                        <option value="No aplica">No aplica</option>
                        @foreach($reservations as $reservation)
                            
                            <option 
                                value="{{$reservation->id}}">{{$reservation->customer->first_name.' '.$reservation->customer->last_name.' Fecha: '.$reservation->date}}
                            </option>
                        @endforeach
                    </select>
    
                    @error('reservation_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
