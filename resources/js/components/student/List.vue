<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"studentAdd"}' class="btn btn-primary">Ajouter</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Liste des Etudiants</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Tel</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="students.length > 0">
                                <tr v-for="(student,key) in students" :key="key">
                                    <td>{{ student.id }}</td>
                                    <td>{{ student.nom }}</td>
                                    <td>{{ student.email }}</td>
                                    <td>{{ student.tel }}</td>
                                    <td>
                                        <router-link :to='{ name:"studentEdit" , params:{ id:student.id } }' class="btn btn-success">Modifier</router-link>
                                        <button type="button" @click="deleteStudent(student.id)" class="btn btn-danger">Supprimer</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Etudiant vide.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"students",
    data(){
        return{
            students:[]
        }
    },
    mounted(){
        this.getStudents()
    },
    methods:{
        async getStudents(){
            await this.axios.get('/api/student').then(response=>{
                this.students = response.data
            }).catch(error=>{
                console.log(error)
                this.students = []
            })
        },
        deleteStudent(id){
            if(confirm("Voulez-vous supprimer ?")){
                this.axios.delete('/api/student/'+id).then(response=>{
                    this.getStudents()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>