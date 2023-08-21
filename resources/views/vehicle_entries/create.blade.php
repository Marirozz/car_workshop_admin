@extends('layouts.admin')

@section('title', 'Registrar Vehiculo')
@section('content-header', 'Registrar Vehiculo')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('vehicle_entries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="customer_id">Cliente</label>
                    <select 
                        name="customer_id" 
                        class="form-control" 
                        value="{{ old('customer_id') }}" 
                        id="customer_id">
                        @foreach($customers as $customer)
                            <option 
                                value="{{$customer->id}}">{{$customer->first_name.' '.$customer->last_name}}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vehicle_id">Vehiculo</label>
                    <select 
                        name="vehicle_id" 
                        class="form-control" 
                        value="{{ old("vehicle_id") }}" 
                        id="vehicle_id">

                        @foreach ($vehicles as $vehicle )
                            <option 
                                 value="{{$vehicle->id}}">{{$vehicle->brand->name.' '.$vehicle->carModel->name.' '.$vehicle->license_plate}}
                            </option>
                        @endforeach
                       
                    </select>
                    @error('vehicle_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="details">Detalles</label>
                    <textarea 
                        name="details" 
                        class="form-control" 
                        id="details" 
                        placeholder="El auto se apagó y no enciende">
                        {{old('details')}}
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
                        name="traveled" 
                        class="form-control" 
                        id="traveled" 
                        placeholder="Kilometros o millas recorridas"
                        value="{{old('traveled')}}"
                    />
    
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
                        value="{{ old('type_traveled') }}">
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
                    <label for="entry_date">Fecha Entrada</label>
                    <input 
                        type="datetime-local"
                        name="entry_date" 
                        class="form-control" 
                        value="{{ old("entry_date") }}" 
                        id="entry_date">
                        
                    </input>
                    @error('entry_date')
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

                <button 
                    class="btn btn-primary" 
                    type="submit">
                    Crear
                </button>
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
