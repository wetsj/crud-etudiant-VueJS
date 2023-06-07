<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"etudiantAdd"}' class="btn btn-primary">Ajouter</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Etudiant</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Classe</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="etudiants.length > 0">
                                <tr v-for="(etudiant,key) in etudiants" :key="key">
                                    <td>{{ etudiant.id }}</td>
                                    <td>{{ etudiant.prenom }}</td>
                                    <td>{{ etudiant.nom }}</td>
                                    <td>{{ etudiant.classe }}</td>
                                    <td>{{ etudiant.email }}</td>
                                    <td>
                                        <router-link :to='{name:"etudiantEdit",params:{id:etudiant.id}}' class="btn btn-success">Modifier</router-link>
                                        <button type="button" @click="deleteEtudiant(etudiant.id)" class="btn btn-danger">Supprimer</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Etudiant non trouvé.</td>
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
    name:"etudiants",
    data(){
        return {
            etudiants:[]
        }
    },
    mounted(){
        this.getEtudiants()
    },
    methods:{
        async getEtudiants(){
            await this.axios.get('/api/etudiant').then(response=>{
                this.etudiants = response.data
            }).catch(error=>{
                console.log(error)
                this.etudiants = []
            })
        },
        deleteEtudiant(id){
            if(confirm("Voulez-vous vraiment supprimer cet etudiant ?")){
                this.axios.delete(`/api/etudiant/${id}`).then(response=>{
                    this.getEtudiants()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>