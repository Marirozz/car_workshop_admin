@extends('layouts.admin')

@section('title', 'Actualizar Vehiculo')
@section('content-header', 'Actualizar Vehiculo')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('maintenances.update', $maintenance) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name"
                        placeholder="Nombre" 
                        value="{{ old('name', $maintenance->name) }}"
                        
                        
                    />

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Tipo</label>
                    <select
                        type="text" 
                        name="type" 
                        class="form-control @error('type') is-invalid @enderror" 
                        id="type"
                        placeholder="Tipo" 
                        value="{{ old('type') }}">
                        <option value="regular">Regular</option>
                        <option value="premiun">Premiun</option>
                        <option value="normal">Normal</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cost">Costo</label>
                    <input 
                        type="text" 
                        name="cost" 
                        class="form-control @error('cost') is-invalid @enderror" 
                        id="cost"
                        placeholder="Costo" 
                        value="{{ old('cost', $maintenance->cost) }}"
                        
                        
                    />

                    @error('cost')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="typeFrequency">Tipo Frecuencia</label>
                    <select 
                        name="typeFrequency" 
                        class="form-control" 
                        value="{{ old('typeFrequency') }}" 
                        id="typeFrequency">
                        <option value="millas">Millas</option>
                        <option value="kilometros">Kilometros</option>
                    </select>
                    @error('typeFrequency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="frequency">Frecuencia</label>
                    <input 
                        type="numeric" 
                        name="frequency" 
                        class="form-control @error('frequency') is-invalid @enderror" 
                        id="frequency"
                        placeholder="Frecuencia" 
                        value="{{ old('frequency', $maintenance->frequency) }}"
                        
                        
                    />

                    @error('frequency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="monthsFrequency">Frecuencia en meses</label>
                    <input 
                        type="numeric" 
                        name="monthsFrequency" 
                        class="form-control @error('monthsFrequency') is-invalid @enderror" 
                        id="monthsFrequency"
                        placeholder="Frecuencia en meses" 
                        value="{{ old('monthsFrequency', $maintenance->monthsFrequency) }}"
                        
                        
                    />

                    @error('frequency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="duration">Duracion</label>
                    <input 
                        type="number" 
                        name="duration" 
                        class="form-control @error('duration') is-invalid @enderror" 
                        id="duration"
                        placeholder="Duracion" 
                        value="{{ old('duration', $maintenance->duration) }}"
 
                    />

                    @error('duration')
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
