@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Paises</h1>
</div>

<div class="row">
    <div class="card mx-auto">

        <div>
            @if (session()->has('mensaje'))
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
            @endif
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form method="GET" action="{{ route('countries.index') }}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-0.9" id="inlineFormInput" placeholder="Ecuador">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="{{ route( 'countries.create' )}}" class="btn btn-primary float-right">Crear</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Codigo Pais</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Gestionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country )
                    <tr>
                        <th scope="row">{{ $country->id }}</th>
                        <td>{{ $country->country_code }}</td>
                        <td>{{ $country->name }}</td>
                        <td class="row">
                            <!-- in route, we send "$country->id" this, but we also can send just the country "$country" -->
                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-success mr-2">Editar</a>
                            <div class="ms-10">
                                <form method="POST" action="{{ route('countries.destroy', $country->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection