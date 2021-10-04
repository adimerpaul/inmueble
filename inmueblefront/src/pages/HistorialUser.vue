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
    <td><q-btn color="primary" label="Historial" icon="list" size="xs" @click="historial(u)"/></td>
  </tr>
  </tbody>
</table>
  <q-dialog v-model="alert" full-width>
    <q-card>
      <q-card-section>
        <div class="text-h6">Historial registros</div>
      </q-card-section>

      <q-card-section class="q-pt-none">
        <ul v-for="r in user.registros" :key="r.id">
          <li>
            Num: {{r.num}}
            Contribuyente: {{r.contribuyente}}
            NumTramite: {{r.numtramite}}
            Numhoja: {{r.numhoja}}
            Lugar: {{r.lugar}}
            Tipo: {{r.tipo}}
            Fecha: {{r.fecha}}
          </li>
        </ul>
      </q-card-section>

      <q-card-actions align="right">
        <q-btn flat label="OK" color="primary" v-close-popup />
      </q-card-actions>
    </q-card>
  </q-dialog>

</q-page>
</template>

<script>
export default {
  name: "HistorialUser",
  data(){
    return {
      users:[],
      user:{},
      alert:false
    }
  },
  created(){
    this.$q.loading.show()
    this.$axios.get(process.env.API+'/historialuser').then(res=>{
      console.log(res.data)
      this.users=res.data
      this.$q.loading.hide()
    })
  },
  methods:{
    historial(u){
      this.user=u
      this.alert=true
    }
  }
}
</script>

<style scoped>
table,th,td{
  border: 0.3px solid gray;
  border-collapse: collapse;
}
</style>
