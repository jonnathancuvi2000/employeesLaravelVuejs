// const EmployeesIndex = () => import('./components/Index.vue');
// const EmployeesCreate = () => import('./components/Create.vue');
// const EmployeesEdit = () => import('./components/Edit.vue');

import EmployeesIndex from './components/Index.vue';
import EmployeesCreate from './components/Create.vue';
import EmployeesEdit from './components/Edit.vue';

export const routes = [
    {
        name: 'EmployeesIndex',
        path: '/employees',
        component: EmployeesIndex
    },
    {
        name: 'EmployeesCreate',
        path: '/employees/create',
        component: EmployeesCreate
    },
    {
        name: 'EmployeesEdit',
        path: '/employees/:id',
        component: EmployeesEdit
    },
    ]

