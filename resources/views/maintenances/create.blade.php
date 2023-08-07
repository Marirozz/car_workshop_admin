@extends('layouts.admin')

@section('title', 'Registrar Mantenimiento')
@section('content-header', 'Registrar Mantenimiento')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('maintenances.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input 
                    type="text" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name"
                    placeholder="Nombre" 
                    value="{{ old('name') }}"
                />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Tipo</label>
                    <input 
                    type="text" 
                    name="type" 
                    class="form-control @error('type') is-invalid @enderror" 
                    id="type"
                    placeholder="Tipo" 
                    value="{{ old('type') }}"
                />
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cost">Costo</label>
                    <input 
                    type="number" 
                    min="1"
                    name="cost" 
                    class="form-control @error('cost') is-invalid @enderror" 
                    id="cost"
                    placeholder="Costo" 
                    value="{{ old('cost') }}"
                />
                    @error('cost')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="frequency">Frecuencia</label>
                    <input 
                    type="text" 
                    name="frequency" 
                    class="form-control @error('frequency') is-invalid @enderror" 
                    id="frequency"
                    placeholder="Frecuencia" 
                    value="{{ old('frequency') }}"
                />
                    @error('frequency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="duration">Duracion en Minutos</label>
                    <input 
                    type="text" 
                    name="duration" 
                    class="form-control @error('duration') is-invalid @enderror" 
                    id="duration"
                    placeholder="Duracion" 
                    value="{{ old('duration') }}"
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
