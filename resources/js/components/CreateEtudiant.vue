<template>
    <div>
        <h3 class="text-center">Ajouter Etudiant</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addEtudiant">
                    <div class="form-group">
                        <label>Prénom</label>
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
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
        methods: {
            addEtudiant() {
                this.axios
                    .post('http://localhost:8000/api/etudiants', this.etudiant)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>