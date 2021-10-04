<template>
<q-page class="q-pa-xs">
<table style="width: 100%">
<thead>
<tr>
  <th>#</th>
  <th>Usuario</th>
  <th>Registros</th>
  <th>Opciones</th>
</tr>
</thead>
  <tbody>
  <tr v-for="(u,i) in users" :key="i">
    <td>{{i+1}}</td>
    <td>{{u.name}}</td>
    <td>{{u.registros.length}}</td>
    <td><q-btn color="primary" label="HIstorial" icon="list" size="xs"/></td>
  </tr>
  </tbody>
</table>
</q-page>
</template>

<script>
export default {
  name: "HistorialUser",
  data(){
    return {
      users:[]
    }
  },
  created(){
    this.$q.loading.show()
    this.$axios.get(process.env.API+'/historialuser').then(res=>{
      console.log(res.data)
      this.users=res.data
      this.$q.loading.hide()
    })
  }
}
</script>

<style scoped>
table,th,td{
  border: 0.3px solid gray;
  border-collapse: collapse;
}
</style>
