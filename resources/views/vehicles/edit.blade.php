@extends('layouts.admin')

@section('title', 'Actualizar Vehiculo')
@section('content-header', 'Actualizar Vehiculo')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('vehicles.update', $vehicle) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="customer_id">Cliente</label>
                    <select 
                        name="customer_id" 
                        class="form-control" 
                        value="{{ old('type') }}" 
                        id="servicioInput">
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
                    <label for="brand_id">Marca</label>
                    <select 
                        name="brand_id" 
                        class="form-control" 
                        value="{{ old('brand_id') }}" 
                        id="brand_id">
                        @foreach($brands as $brand)
                            <option 
                                value="{{$brand->id}}">{{$brand->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="car_model_id">Modelo</label>
                    <select 
                        name="car_model_id" 
                        class="form-control" 
                        value="{{ old('car_model_id') }}" 
                        id="car_model_id">
                        @foreach($car_models as $car_model)
                            <option 
                                value="{{$car_model->id}}">{{$car_model->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('car_model_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="license_plate">Placa</label>
                    <input 
                        type="text" 
                        name="license_plate" 
                        class="form-control @error('license_plate') is-invalid @enderror" 
                        id="license_plate"
                        placeholder="Placa" 
                        value="{{ old('license_plate', $vehicle->license_plate) }}"
                        
                        
                    />

                    @error('license_plate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year">Año</label>
                    <input 
                        type="text" 
                        name="year" 
                        class="form-control @error('year') is-invalid @enderror"
                        id="year"
                        placeholder="Año" 
                        value="{{ old('year',$vehicle->year )}}"
                    />

                    @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="token">Ficha</label>
                    <input 
                        type="text" 
                        name="token" 
                        class="form-control @error('token') is-invalid @enderror"
                        id="token"
                        placeholder="Ficha" 
                        value="{{ old('token',$vehicle->token) }}"
                    />
                    @error('token')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mileage">Kilometraje</label>
                    <input 
                        type="text" 
                        name="mileage" 
                        class="form-control @error('mileage') is-invalid @enderror"
                        id="mileage"
                        placeholder="Kilometraje" 
                        value="{{ old('mileage', $vehicle->mileage) }}"
                    />
                    @error('mileage')
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
