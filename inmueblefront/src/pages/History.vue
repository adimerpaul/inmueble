<template>
  <q-page class="q-pa-xs">
    <div class="row">
      <div class="col-12">
        <q-card  bordered class="">
<!--          <q-card-section>-->
<!--            <div class="text-h6">-->
<!--              Historial por dia-->
<!--            </div>-->
<!--          </q-card-section>-->
<!--          <q-separator  inset />-->

          <q-card-section>
            <q-badge color="primary" class="full-width text-h6 text-center" >Consulta por dia</q-badge>
            <q-form class="q-ma-xs" @submit.prevent="misregistros">
              <div class="row">
                <div class="col-6 ">
                  <q-input type="date" label="Fecha" v-model="fecha" outlined required />
                </div>
                <div class="col-6 flex flex-center">
                  <q-btn icon="search" label="Buscar" color="primary" type="submit" />
                </div>
              </div>
            </q-form>
            <q-badge color="info" class="full-width text-h6 text-center" >Consulta por mes</q-badge>
            <q-form class="q-ma-xs" @submit.prevent="registrosmes">
              <div class="row">
                <div class="col-4 ">
                  <q-select outlined :options="meses" label="Mes" v-model="mes"/>
                </div>
                <div class="col-4 ">
                  <q-select outlined :options="anios" label="Año" v-model="anio"/>
                </div>
                <div class="col-4 flex flex-center">
                  <q-btn icon="search" label="Buscar" color="info" type="submit" />
                </div>
              </div>
            </q-form>
            <q-badge color="negative" class="full-width text-h6 text-center" >Consulta por Año</q-badge>
            <q-form class="q-ma-xs" @submit.prevent="registrosanio">
              <div class="row">
                <div class="col-6 ">
                  <q-select outlined :options="anios" label="Año" v-model="anio"/>
                </div>
                <div class="col-6 flex flex-center">
                  <q-btn icon="search" label="Buscar" color="negative" type="submit" />
                </div>
              </div>
            </q-form>
            <table id="example" class="display" style="width:100%">
              <thead>
              <tr>
                <th>#</th>
                <th>Ci</th>
                <th>Contribuyente</th>
                <th>Num27</th>
                <th>NumForm</th>
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
                <td>{{re.num}}</td>
                <td>{{re.ci}}</td>
                <td>{{re.contribuyente}}</td>
                <td>{{re.numero}}</td>
                <td>{{re.numform}}</td>
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
          </q-card-section>
        </q-card>
      </div>
    </div>

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
  data(){
    return{
      fecha:date.formatDate(Date(),'YYYY-MM-DD',{
        // days: ['Duminica', 'Luni', /* and all the rest of days - remember starting with Sunday */],
        // daysShort: ['Dum', 'Lun', /* and all the rest of days - remember starting with Sunday */],
        months: [
          'ENERO',
          'FEBRERO',
          'MARZO',
          'ABRIL',
          'MAYO',
          'JUNIO',
          'JULIO',
          'AGOSTO',
          'SEPTIEMBRE',
          'OCTUBRE',
          'NOVIEMBRE',
          'DICIEMBRE',
        ],
        // monthsShort: ['Ian', 'Feb', /* and all the rest of months */]
      }),
      crear:false,
      registro:{tipo2:'NATURAL'},
      registros:[],
      mes:{
        val:date.formatDate(Date(),'M'),
        label:date.formatDate(Date(),'MMMM',{
          months: [
            'ENERO',
            'FEBRERO',
            'MARZO',
            'ABRIL',
            'MAYO',
            'JUNIO',
            'JULIO',
            'AGOSTO',
            'SEPTIEMBRE',
            'OCTUBRE',
            'NOVIEMBRE',
            'DICIEMBRE',
          ],
        })
      },
      meses:[
        {val:1,label:'ENERO'},
        {val:2,label:'FEBRERO'},
        {val:3,label:'MARZO'},
        {val:4,label:'ABRIL'},
        {val:5,label:'MAYO'},
        {val:6,label:'JUNIO'},
        {val:7,label:'JULIO'},
        {val:8,label:'AGOSTO'},
        {val:9,label:'SEPTIEMBRE'},
        {val:10,label:'OCTUBRE'},
        {val:11,label:'NOVIEMBRE'},
        {val:12,label:'DICIEMBRE'},
      ],
      tipos:[
        "C. BANC.",
        "C. GG.",
        "C. GRAL",
        "C. C.",
        "C. CAT.",
        "CN. COD.",
        "CN. NOMB.",
        "DRENAJE",
        "EXEDENCIA",
        "I. T.",
        "MOD. DATOS",
        "MOD. CI.",
        "R. IMP.",
        "REC.",
        "REC. COD.",
        "RECTA.",
        "REC. IMP.",
      ],
      anios:[],
      anio:date.formatDate(Date(),'YYYY'),
    }
  },
  mounted() {
    $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
    this.misregistros();
    // console.log(
    //   date.formatDate(Date(),'M',{
    //     months: [
    //       'ENERO',
    //       'FEBRERO',
    //       'MARZO',
    //       'ABRIL',
    //       'MAYO',
    //       'JUNIO',
    //       'JULIO',
    //       'AGOSTO',
    //       'SEPTIEMBRE',
    //       'OCTUBRE',
    //       'NOVIEMBRE',
    //       'DICIEMBRE',
    //     ],
    //   })
    // )
    for (let i= parseInt( date.formatDate(Date(),'YYYY'))-30;i<= parseInt( date.formatDate(Date(),'YYYY'));i++){
      // console.log(i)
      this.anios.push(i)
    }
  },
  methods:{
    cambio(re){
      // console.log(re);
      // re.tipo3='INACTIVO';
      this.$q.loading.show()
      this.$axios.put(process.env.API+'/registro/'+re.id).then(res=> {
        // console.log(res.data)
        // re.tipo3=res.data;
        // this.$q.loading.hide()
        this.misregistros()
      });
    },
    misregistros(){
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/registro/'+this.fecha).then(res=>{
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
    registrosmes(){
      this.$q.loading.show()
      this.$axios.post(process.env.API+'/mes',{mes:this.mes.val,anio:this.anio}).then(res=>{
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
    registrosanio(){
      this.$q.loading.show()
      this.$axios.post(process.env.API+'/anio',{anio:this.anio}).then(res=>{
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
    buscarcontribuyente(){
      // console.log()
      if (this.registro.ci!=''){
        this.$axios.get(process.env.API+'/contribuyente/'+this.registro.ci).then(res=>{
          if (res.data.length>0){
            // console.log(res.data)
            this.registro.contribuyente=res.data[0].contribuyente
          }
        })
      }
    },
    agregar(){
      if (this.registro.tipo=='' || this.registro.tipo==undefined){
        this.$q.notify({
          color:'red',
          icon:'error',
          message:'Tienes que selecionar tipo de tramite'
        })
        return false
      }
      // console.log(this.registro)
      this.$q.loading.show()
      this.$axios.post(process.env.API+'/registro',this.registro).then(res=>{
        // console.log(res.data)
        this.misregistros()
        this.registro={tipo2:'NATURAL'}
        // this.$q.loading.hide()
      })
    }
  }

}
</script>
