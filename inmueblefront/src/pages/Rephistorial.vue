<template>
<q-page class="q-pa-xs">

  <table id="example" class="display" style="width:100%">
    <thead>
    <tr>
      <th>num</th>
      <th>#</th>
      <th>Ci</th>
      <th>Contribuyente</th>
      <th>Num27</th>
      <th>Numtramite</th>
      <th>Numhoja</th>
      <th>Lugar</th>
      <th>Tipo</th>
      <th>N T</th>
      <th>Gestion</th>
      <th>Fecha hora</th>
      <th>Estado</th>
      <th>Usuario</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(re,index) in registros" :key="index">
      <td>{{index + 1 }}</td>
      <td>{{re.num}}</td>
      <td>{{re.ci}}</td>
      <td>{{re.contribuyente}}</td>
      <td>{{re.numero}}</td>
      <td>{{re.numtramite}}</td>
      <td>{{re.numhoja}}</td>
      <td>{{re.lugar}}</td>
      <td>{{re.tipo}}</td>
      <td>{{re.tipo2}}</td>
      <td>{{re.gestion}}</td>
      <td>{{re.fecha}} {{re.hora}}</td>
      <td> <q-badge :color="re.tipo3=='ACTIVO'?'positive':'negative'" @click="cambio(re)"> {{re.tipo3}}</q-badge></td>
      <td>{{re.user.name}}</td>
    </tr>
    </tbody>
  </table>
</q-page>
</template>

<script>
var $  = require( 'jquery' );
// // var dt = require( 'datatables.net' )( window, $ );
// require( 'jszip' );
// require( 'pdfmake' );
// require( 'datatables.net-dt' )();
// require( 'datatables.net-buttons-dt' )();
// require( 'datatables.net-buttons/js/buttons.colVis.js' )();
// import datatable from 'datatables.net-buttons-bs4'
require( 'datatables.net-buttons/js/buttons.html5.js' )();
require( 'datatables.net-buttons/js/buttons.print.js' )();
require('datatables.net-buttons/js/dataTables.buttons');
require('datatables.net-dt/css/jquery.dataTables.min.css');
import print from 'datatables.net-buttons/js/buttons.print';
import jszip from 'jszip/dist/jszip';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs=pdfFonts.pdfMake.vfs;
window.JSZip=jszip;
import { date } from 'quasar';
export default {
  name: "Reporte",
  data() {
    return{
      registros:[]
    }
  },
  mounted() {
    this.listado();
    $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
  },
  methods:{
    natural(){
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/reporte/NATURAL').then(res=>{
        console.log(res.data)
        this.registros=res.data
        $('#example').DataTable().destroy();
        this.$nextTick(()=>{
          $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "order": [[ 0, "desc" ]]
          } );
          this.$q.loading.hide();
        })
      })
    },
    listado(){
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/reportodo').then(res=>{
        console.log(res.data)
        this.registros=res.data
        $('#example').DataTable().destroy();
        this.$nextTick(()=>{
          $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "order": [[ 0, "desc" ]]
          } );
          this.$q.loading.hide();
        })
      })
    },
    juridico(){
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/reporte/JURIDICO').then(res=>{
        // console.log(res.data)
        this.registros=res.data
        $('#example').DataTable().destroy();
        this.$nextTick(()=>{
          $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "order": [[ 0, "desc" ]]
          } );
          this.$q.loading.hide();
        })
      })
    },
    baja(){
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/reporte/BAJA').then(res=>{
        // console.log(res.data)
        this.registros=res.data
        $('#example').DataTable().destroy();
        this.$nextTick(()=>{
          $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "order": [[ 0, "desc" ]]
          } );
          this.$q.loading.hide();
        })
      })
    },
  }
}
</script>

<style scoped>

</style>
