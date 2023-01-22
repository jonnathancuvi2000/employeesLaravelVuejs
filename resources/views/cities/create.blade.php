@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ciudad</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Registrar Ciudad
                    <a href="{{ route('cities.index') }}" class="float-right">Regresar</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.store') }}">
                        @csrf
                        <!-- city_id -->
                        <div class="row mb-3">
                            <label for="city_id" class="col-md-4 col-form-label text-md-end">Pais</label>

                            <div class="col-md-6">
                                <select name="state_id" class="form-control @error('city_id') is-invalid @enderror" aria-label="Default select example">
                                    <option selected>Seleccionar el Estado</option>
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id  }}">{{ $state->name  }}</option>
                                    @endforeach
                                </select>
                              
                                @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- name    -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre Ciudad">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection