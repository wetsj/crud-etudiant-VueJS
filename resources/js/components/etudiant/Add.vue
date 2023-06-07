<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter etudiant</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control" v-model="etudiant.prenom">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" v-model="etudiant.nom">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Classe</label>
                                    <input type="text" class="form-control" v-model="etudiant.classe">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" v-model="etudiant.email">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"add-etudiant",
    data(){
        return {
            etudiant:{
                prenom:"",
                nom:"",
                classe:"",
                email:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/etudiant',this.etudiant).then(response=>{
                this.$router.push({name:"etudiantList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>