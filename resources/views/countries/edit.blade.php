@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pais</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Actualizar Pais
                    <a href="{{ route('countries.index') }}" class="float-right">Regresar</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('countries.update', $country->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- country_code     -->
                        <div class="row mb-3">
                            <label for="country_code" class="col-md-4 col-form-label text-md-end">Codigo Pais</label>

                            <div class="col-md-6">
                                <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code', $country->country_code) }}" required autocomplete="country_code" autofocus>

                                @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- name -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $country->name) }}" required autocomplete="name" autofocus>

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
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="m-2 p-2">
                <form method="POST" action="{{ route('countries.destroy', $country->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eliminar {{ $country->country_code }}</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection