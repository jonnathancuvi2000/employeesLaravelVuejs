<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
        </div>

        <div class="row">
            <div class="card mx-auto">
                <div v-if="showMessage">
                    <div class="alert alert-success">
                        {{ message }}
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" v-model.lazy="search" class="form-control mb-0.9"
                                            placeholder="Nombre o Apellido">
                                    </div>
                                    <div class="col">
                                        <b-button class="btn btn-primary">Buscar</b-button>
                                        <!-- <button class="btn btn-primary">Buscar</button> -->
                                    </div>
                                    <div class="col">
                                        <select name="department" class="form-control"
                                            aria-label="Default select example" v-model="selectedDepartment">
                                            <option v-for="department in departments" :key="department.id"
                                                :value="department.id">{{
                                                    department.name
                                                }}</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <router-link :to="{ name: 'EmployeesCreate' }"
                                class="btn btn-primary float-right">Crear</router-link>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Gestion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="employee in employees" :key="employee.id">
                                <th scope="row">{{ employee.id }}</th>
                                <td>{{ employee.first_name }}</td>
                                <td>{{ employee.last_name }}</td>
                                <td>{{ employee.address }}</td>
                                <td>{{ employee.department.name }}</td>
                                <td class="row">
                                    <router-link :to="{ name: 'EmployeesEdit', params: { id: employee.id } }"
                                        class="btn btn-success mr-2">Editar</router-link>
                                    <button class="btn btn-danger"
                                        @click="deleteEmployee(employee.id)">Eliminar</button>
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
    data() {
        return {
            employees: [],
            showMessage: false,
            message: '',
            search: null,
            selectedDepartment: null,
            departments: []
        }
    },
    watch: {
        search() {
            this.getEmployees();
        },
        selectedDepartment() {
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getDepartments() {
            axios.get('/api/employees/departments')
                .then(res => {
                    this.departments = res.data;
                }).catch(error => {
                    console.log(console.error)
                })
        },
        getEmployees() {
            axios.get('/api/employees', {
                params: {
                    buscar: this.search,
                    department_id: this.selectedDepartment
                }
            })
                .then(res => {
                    // usamos esto, cuando hay relaciones entre las tablas, y tenemos objetos dentro de los campos  de las tablas
                    this.employees = res.data.data;
                    // this.employees = res.data;
                    console.log(this.employees)
                }).catch(error => {
                    console.log(error)
                })
        },
        deleteEmployee(id) {
            axios.delete('/api/employees/' + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getEmployees();
            }).catch(error => {
                console.log(error)
            })

        }
    }

}
</script>

<style>

</style>