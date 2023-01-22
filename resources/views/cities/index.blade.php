@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ciudades</h1>
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
                    <form method="GET" action="{{ route('cities.index') }}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-0.9" id="inlineFormInput" placeholder="Ciudad">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="{{ route( 'cities.create' )}}" class="btn btn-primary float-right">Crear</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Estado Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Gestionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city )
                    <tr>
                        <th scope="row">{{ $city->id }}</th>
                        <td>{{ $city->state->name }}</td>
                        <td>{{ $city->name }}</td>
                        <td class="row">
                            <!-- in route, we send "$city->id" this, but we also can send just the city "$city" -->
                            <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success mr-2">Editar</a>
                            <div class="ms-10">
                                <form method="POST" action="{{ route('cities.destroy', $city->id) }}">
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