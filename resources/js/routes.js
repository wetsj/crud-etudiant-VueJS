import AllEtudiant from './components/AllEtudiant.vue';
import CreateEtudiant from './components/CreateEtudiant.vue';
import EditEtudiant from './components/EditEtudiant.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllEtudiant
    },
    {
        name: 'create',
        path: '/create',
        component: CreateEtudiant
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditEtudiant
    }
];