const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const EtudiantList = () => import('./components/etudiant/List.vue' /* webpackChunkName: "resource/js/components/etudiant/list" */)
const EtudiantCreate = () => import('./components/etudiant/Add.vue' /* webpackChunkName: "resource/js/components/etudiant/add" */)
const EtudiantEdit = () => import('./components/etudiant/Edit.vue' /* webpackChunkName: "resource/js/components/etudiant/edit" */)
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'etudiantList',
        path: '/etudiant',
        component: EtudiantList
    },
    {
        name: 'etudiantEdit',
        path: '/etudiant/:id/edit',
        component: EtudiantEdit
    },
    {
        name: 'etudiantAdd',
        path: '/etudiant/add',
        component: EtudiantCreate
    }
]