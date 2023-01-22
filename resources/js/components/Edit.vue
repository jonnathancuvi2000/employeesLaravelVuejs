<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Editar Empleado</h1>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Actualizar Estado
                            <router-link :to="{ name: 'EmployeesIndex' }"
                                class="btn btn-primary float-right">Regresar</router-link>
                        </div>

                        <div class="card-body">
                            <!-- we add "prevent" to no reaload the peage -->
                            <form @submit.prevent="updateEmployee">
                                <!-- first_name -->
                                <div class="row mb-3">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-end">Primer
                                        Nombre</label>
                                    <div class="col-md-6">
                                        <input id="first_name" name="first_name" v-model="form.first_name" type="text"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <!-- middle_name -->
                                <div class="row mb-3">
                                    <label for="middle_name" class="col-md-4 col-form-label text-md-end">Segundo
                                        Nombre</label>
                                    <div class="col-md-6">
                                        <input id="middle_name" name="middle_name" v-model="form.middle_name"
                                            type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!-- last_name -->
                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">Apellido</label>
                                    <div class="col-md-6">
                                        <input id="last_name" name="last_name" v-model="form.last_name" type="text"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <!-- address -->
                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">Direccion</label>
                                    <div class="col-md-6">
                                        <input id="address" name="address" v-model="form.address" type="text"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <!-- country -->
                                <div class="row mb-3">
                                    <label for="country" class="col-md-4 col-form-label text-md-end">Pais</label>
                                    <div class="col-md-6">
                                        <select name="country" class="form-control" aria-label="Default select example"
                                            v-model="form.country_id" @change="getStates()">
                                            <option v-for="country in countries" :key="country.id" :value="country.id">
                                                {{ country.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- state -->
                                <div class="row mb-3">
                                    <label for="state" class="col-md-4 col-form-label text-md-end">Estado</label>
                                    <div class="col-md-6">
                                        <select name="state" class="form-control" aria-label="Default select example"
                                            v-model="form.state_id" @change="getCities()">
                                            <option v-for="state in states" :key="state.id" :value="state.id">{{
                                                state.name
                                            }}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- deparment -->
                                <div class="row mb-3">
                                    <label for="deparment"
                                        class="col-md-4 col-form-label text-md-end">Departamento</label>
                                    <div class="col-md-6">
                                        <select name="deparment" class="form-control"
                                            aria-label="Default select example" v-model="form.department_id">
                                            <option v-for="department in departments" :key="department.id"
                                                :value="department.id">{{ department.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- city -->
                                <div class="row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-end">Ciudad</label>
                                    <div class="col-md-6">
                                        <select name="city" class="form-control" aria-label="Default select example"
                                            v-model="form.city_id">
                                            <option v-for="city in cities" :key="city.id" :value="city.id">{{
                                                city.name
                                            }}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- zip_code -->
                                <div class="row mb-3">
                                    <label for="zip_code" class="col-md-4 col-form-label text-md-end">Codigo
                                        Postal</label>
                                    <div class="col-md-6">
                                        <input id="zip_code" name="zip_code" v-model="form.zip_code" type="text"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <!-- birthdate -->
                                <div class="form-group row">
                                    <label for="birthdate"
                                        class="col-md-4 col-form-label text-md-end">Cumpleanos</label>
                                    <div class="col-md-6">
                                        <datepicker name="birthdate" v-model="form.birthdate"
                                            input-class="form-control">
                                        </datepicker>
                                    </div>
                                </div>
                                <!-- date_hired -->
                                <div class="form-group row">
                                    <label for="date_hired" class="col-md-4 col-form-label text-md-end">Fecha de
                                        Contratacion</label>
                                    <div class="col-md-6">
                                        <datepicker name="date_hired" v-model="form.date_hired"
                                            input-class="form-control"></datepicker>
                                    </div>
                                </div>

                                <div class="row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Actualizar Informacion
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
export default {
    components: {
        Datepicker
    },
    data() {
        return {
            countries: [],
            states: [],
            departments: [],
            cities: [],
            form: {
                first_name: '',
                last_name: '',
                middle_name: '',
                address: '',
                country_id: '',
                state_id: '',
                department_id: '',
                city_id: '',
                zip_code: '',
                birthdate: '',
                date_hired: '',
            }
        }
    },
    created() { // this runs the first time that the page charge
        this.getContries();
        this.getDepartments();
        this.getEmployee();
    },
    methods: {
        getEmployee() {
            axios.get('/api/employees/' + this.$route.params.id)
                .then(res => {
                    this.form = res.data.data;
                    this.getStates();
                    this.getCities();
                }).catch(error => {
                    console.log(console.error)
                })
        },
        getContries() {
            axios.get('/api/employees/countries')
                .then(res => {
                    this.countries = res.data;
                }).catch(error => {
                    console.log(console.error)
                })
        },
        getStates() {
            axios.get('/api/employees/' + this.form.country_id + '/states')
                .then(res => {
                    this.states = res.data;
                }).catch(error => {
                    console.log(console.error)
                })
        },
        getCities() {
            axios.get('/api/employees/' + this.form.state_id + '/cities')
                .then(res => {
                    this.cities = res.data;
                }).catch(error => {
                    console.log(console.error)
                })
        },
        getDepartments() {
            axios.get('/api/employees/departments')
                .then(res => {
                    this.departments = res.data;
                }).catch(error => {
                    console.log(console.error)
                })
        },
        updateEmployee() {
            axios.put('/api/employees/' + this.$route.params.id, {
                'first_name': this.form.first_name,
                'middle_name': this.form.middle_name,
                'last_name': this.form.last_name,
                'address': this.form.address,
                'country_id': this.form.country_id,
                'state_id': this.form.state_id,
                'city_id': this.form.city_id,
                'department_id': this.form.department_id,
                'zip_code': this.form.zip_code,
                'birthdate': this.format_date(this.form.birthdate),
                'date_hired': this.format_date(this.form.date_hired)
            }).
                then(res => {
                    this.$router.push({ name: 'EmployeesIndex' });
                    console.log(res);
                }).catch(error => {
                    console.log(error)
                });
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format('YYYYMMDD');
            }
        }
    }

}
</script>

<style>

</style>