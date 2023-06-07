<template>
    <div>
        <h2 class="text-center">Liste Etudiant</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Classe</th>
                <th>Email</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="etudiant in etudiants" :key="etudiant.id">
                <td>{{ etudiant.id }}</td>
                <td>{{ etudiant.prenom }}</td>
                <td>{{ etudiant.nom }}</td>
                <td>{{ etudiant.classe }}</td>
                <td>{{ etudiant.email }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: etudiant.id }}" class="btn btn-success">Modifier</router-link>
                        <button class="btn btn-danger" @click="deleteEtudiant(etudiant.id)">Supprimer</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                etudiants: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/etudiants/')
                .then(response => {
                    this.etudiants = response.data;
                });
        },
        methods: {
            deleteEtudiant(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/etudiants/${id}`)
                    .then(response => {
                        let i = this.etudiants.map(data => data.id).indexOf(id);
                        this.etudiants.splice(i, 1)
                    });
            }
        }
    }
</script>