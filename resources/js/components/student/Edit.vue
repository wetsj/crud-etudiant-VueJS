<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier un etudiant</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" v-model="student.nom">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" v-model="student.email">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Tel</label>
                                    <input type="number" class="form-control" v-model="student.tel">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
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
export default{
    name:"update-student",
    data(){
        return{
            student:{
                nom:"",
                email:"",
                tel:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showStudent()
    },
    methods:{
        async showStudent(){
            await this.axios.get('/api/student/'+this.$route.params.id).then(response=>{
                const { nom, email, tel} = response.data
                this.student.nom = nom
                this.student.email = email
                this.student.tel = tel
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post('/api/student/'+this.$route.params.id, this.student).then(response=>{
                this.$router.push({name:"studentList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>