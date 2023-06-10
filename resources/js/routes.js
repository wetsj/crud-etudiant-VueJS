const Welcome = () => import('./components/Welcome.vue')
const StudentList = () => import('./components/student/List.vue')
const StudentCreate = () => import('./components/student/Add.vue')
const StudentEdit = () => import('./components/student/Edit.vue')
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'studentList',
        path: '/student',
        component: StudentList
    },
    {
        name: 'studentEdit',
        path: '/student/:id/edit',
        component: StudentEdit
    },
    {
        name: 'studentAdd',
        path: '/student/add',
        component: StudentCreate
    }
]