<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier etudiant</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
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
                                <button type="submit" class="btn btn-primary">Modifier</button>
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
    name:"update-category",
    data(){
        return {
            category:{
                title:"",
                description:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showCategory()
    },
    methods:{
        async showCategory(){
            await this.axios.get(`/api/category/${this.$route.params.id}`).then(response=>{
                const { title, description } = response.data
                this.category.title = title
                this.category.description = description
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/category/${this.$route.params.id}`,this.category).then(response=>{
                this.$router.push({name:"categoryList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>