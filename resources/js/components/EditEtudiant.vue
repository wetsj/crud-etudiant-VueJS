<template>
    <div>
        <h3 class="text-center">Modifier Etudiant</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateEtudiant">
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control" v-model="etudiant.prenom">
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" v-model="etudiant.nom">
                    </div>
                    <div class="form-group">
                        <label>Classe</label>
                        <input type="text" class="form-control" v-model="etudiant.classe">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="etudiant.email">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                etudiant: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/etudiants/${this.$route.params.id}`)
                .then((res) => {
                    this.etudiant = res.data;
                });
        },
        methods: {
            updateEtudiant() {
                this.axios
                    .patch(`http://localhost:8000/api/etudiants/${this.$route.params.id}`, this.etudiant)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>