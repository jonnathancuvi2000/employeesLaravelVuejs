<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
        </div>

        <div class="row">
            <div class="card mx-auto">

                <div>
                    <div class="alert alert-success">
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" name="search" class="form-control mb-0.9"
                                            id="inlineFormInput" placeholder="Ecuador">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="" class="btn btn-primary float-right">Crear</a>
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
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td class="row">
                                    <a href="" class="btn btn-success mr-2">Editar</a>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
