<template>
  <q-page class="q-pa-xs">
    <div class="row">
      <div class="col-12">
        <q-card  bordered class="">
          <q-card-section>
            <div class="text-h6">
              Registro
<!--              <q-btn label="Registrar" icon="add" color="positive" @click="crear = true" />-->
            </div>
            <!--            <div class="text-subtitle2">by John Doe</div>-->
          </q-card-section>
<!--          <q-dialog v-model="crear"  style="max-width: 600px">-->
<!--            <q-card>-->
<!--              <q-card-section>-->
<!--                <div class="text-h6">Registro nuevo inmueble</div>-->
<!--              </q-card-section>-->
<!--              <q-card-section class="q-pt-none">-->
<!--                <q-form-->
<!--                  @submit="onSubmit"-->
<!--                  @reset="onReset"-->
<!--                  class="q-gutter-md"-->
<!--                >-->
<!--                  <q-input-->
<!--                    filled-->
<!--                    v-model="registro.ci"-->
<!--                    label="Carnet *"-->
<!--                    hint="Nombre del carnet"-->
<!--                    lazy-rules-->
<!--                    :rules="[ val => val && val.length > 0 || 'Porfavor ingresar dato']"-->
<!--                  />-->
<!--                  <q-input-->
<!--                    filled-->
<!--                    v-model="registro.contributente"-->
<!--                    label="Contribuyente *"-->
<!--                    hint="Nombre del contribuyente"-->
<!--                    lazy-rules-->
<!--                    :rules="[ val => val && val.length > 0 || 'Porfavor ingresar dato']"-->
<!--                  />-->
<!--                  <q-input-->
<!--                    filled-->
<!--                    v-model="registro.numero"-->
<!--                    label="Formulario 27 *"-->
<!--                    hint="Formulario numero 27"-->
<!--                    lazy-rules-->
<!--                    :rules="[ val => val && val.length > 0 || 'Porfavor ingresar dato']"-->
<!--                  />-->
<!--                  <q-input-->
<!--                    filled-->
<!--                    v-model="registro.numtramite"-->
<!--                    label="Numero tramite *"-->
<!--                    hint="Formualario numero tramite"-->
<!--                    lazy-rules-->
<!--                    :rules="[ val => val && val.length > 0 || 'Porfavor ingresar dato']"-->
<!--                  />-->
<!--                  <q-input-->
<!--                    filled-->
<!--                    v-model="registro.numhoja"-->
<!--                    label="Numero hoja *"-->
<!--                    hint="Formulario numero hoja"-->
<!--                    lazy-rules-->
<!--                    :rules="[ val => val && val.length > 0 || 'Porfavor ingresar dato']"-->
<!--                  />-->
<!--                  <q-input-->
<!--                    filled-->
<!--                    v-model="registro.lugar"-->
<!--                    label="Lugar *"-->
<!--                    hint="Lugar"-->
<!--                    lazy-rules-->
<!--                    :rules="[ val => val && val.length > 0 || 'Porfavor ingresar dato']"-->
<!--                  />-->

<!--                  <q-input-->
<!--                    filled-->
<!--                    v-model="registro.tipo"-->
<!--                    label="Tipo *"-->
<!--                    hint="Tipo de tramite"-->
<!--                    lazy-rules-->
<!--                    :rules="[ val => val && val.length > 0 || 'Porfavor ingresar dato']"-->
<!--                  />-->
<!--                  <q-toggle v-model="accept" label="I accept the license and terms" />-->
<!--                  <div>-->
<!--                    <q-btn label="Submit" type="submit" color="primary"/>-->
<!--                    <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />-->
<!--                  </div>-->
<!--                </q-form>-->
<!--              </q-card-section>-->

<!--&lt;!&ndash;              <q-card-actions align="right">&ndash;&gt;-->
<!--&lt;!&ndash;                <q-btn flat label="OK" color="primary" v-close-popup />&ndash;&gt;-->
<!--&lt;!&ndash;              </q-card-actions>&ndash;&gt;-->
<!--            </q-card>-->
<!--          </q-dialog>-->

          <q-separator  inset />
          <q-card-section>
            <q-form class="q-mb-xs" @submit.prevent="agregar">
              <div class="row">
<!--                <div class="col-1"><q-input  outlined label="num" v-model="registro.num" /></div>-->
                <div class="col-6 col-sm-1"><q-input  outlined label="ci" v-model="registro.ci" @keyup="buscarcontribuyente" required/></div>
                <div class="col-6 col-sm-2"><q-input  outlined label="contribuyente" v-model="registro.contribuyente" required style="text-transform: uppercase"/></div>
                <div class="col-6 col-sm-1"><q-input  outlined label="numero" v-model="registro.numero" /></div>
                <div class="col-6 col-sm-1"><q-input  outlined label="numtramite" v-model="registro.numtramite" /></div>
                <div class="col-6 col-sm-1"><q-input  outlined label="numhoja" v-model="registro.numhoja" /></div>
                <div class="col-6 col-sm-1"><q-input  outlined label="lugar" v-model="registro.lugar" style="text-transform: uppercase"/></div>
                <div class="col-6 col-sm-1">
<!--                  <q-input  outlined label="tipo" v-model="registro.tipo" />-->
                  <q-select outlined :options="tipos" label="Tramite" v-model="registro.tipo" option-label="nombre" required/>

                </div>
                <div class="col-6 col-sm-1">
<!--                    {{registro.tipo==undefined}}-->
                    <template v-if="registro.tipo">
                      <q-badge class="full-width full-height text-bold" :color="registro.tipo.tipo=='NATURAL'?'positive':registro.tipo.tipo=='JURIDICO'?'negative':'teal'"> Tipo <br>
                        {{registro.tipo.tipo}}
                      </q-badge>
                    </template>


<!--                  <q-input  outlined label="tipo2" v-model="registro.tipo2" />-->
<!--                  <q-select outlined label="Tipo" :options="['NATURAL','JURIDICO']" v-model="registro.tipo2"/>-->
                </div>
                <div class="col-6 col-sm-2"><q-input  outlined label="detalle" v-model="registro.detalle" /></div>
                <div class="col-6 col-sm-1 flex flex-center">
                  <q-btn label="Modificar" icon="edit" color="amber" type="submit" v-if="mod"/>
                  <q-btn label="Agregar" icon="send" color="positive" type="submit" v-else/>
                </div>
              </div>
            </q-form>
            <q-separator  inset />
            <q-form class="q-ma-xs" @submit.prevent="misregistros">
              <div class="row">
                <div class="col-6 ">
                  <q-input type="date" label="Fecha" v-model="fecha" outlined required />
                </div>
                <div class="col-6 flex flex-center">
                  <q-btn icon="search" label="Buscar" color="info" type="submit" />
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
                <th>Numtramite</th>
                <th>Numhoja</th>
                <th>Lugar</th>
                <th>Tipo</th>
                <th>N T</th>
                <th>Gestion</th>
                <th>Fecha hora</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Opcion</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(re,index) in registros" :key="index">
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
                <td><q-btn color="amber" glossy icon="edit" @click="modificar(re)"/></td>
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
      fecha:date.formatDate(Date(),'YYYY-MM-DD'),
      crear:false,
      registro:{tipo2:'NATURAL'},
      registros:[],
      tipos:[],
      mod:false,
      boolcrear:true,
      // tipos:[
      //   "C. BANC.",
      //   "C. GG.",
      //   "C. GRAL",
      //   "C. C.",
      //   "C. CAT.",
      //   "C. RAZON SOCIAL",
      //   "CN. COD.",
      //   "CN. NOMB.",
      //   "DRENAJE",
      //   "EXEDENCIA",
      //   "I. T.",
      //   "MOD. DATOS",
      //   "MOD. CI.",
      //   "R. IMP.",
      //   "REC.",
      //   "REC. COD.",
      //   "RECTA.",
      //   "REC. IMP.",
      //   "BAJA",
      //   "APELLIDO",
      //   "AUTO EVALUACION",
      //   "BALANCE",
      //   "BENEMERITO",
      //   "CAMBIO DE RAZON",
      //   "CN. DE APELLIDO",
      //   "COMPENSACION",
      //   "CREDITO FISCAL",
      //   "DESISTIMIENTO",
      //   "EXENCION",
      //   "HABILITACION",
      //   "DESISTIMIENTO",
      //   "DESISTIMIENTO",
      //   "DESISTIMIENTO",
      //   "DESISTIMIENTO",
      //   "DESISTIMIENTO",
      //   "DESISTIMIENTO",
      // ]
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
    this.$axios.get(process.env.API+'/tipo').then(res=>{
      this.tipos=res.data
      console.log(this.tipos)
    })
    this.minumero();
  },
  methods:{
    minumero(){
      this.$axios.get(process.env.API+'/registro').then(res=>{
        console.log(res.data);
        //this.registro.numero=parseInt(res.data) + 1;
    })
    },
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
      // if(this.registro.id!=undefined || this.registro.id!=='')
      //   this.actualizar();
      // if (this.registro.tipo=='' || this.registro.tipo==undefined){
      //   this.$q.notify({
      //     color:'red',
      //     icon:'error',
      //     message:'Tienes que selecionar tipo de tramite'
      //   })
      //   return false
      // }
      // console.log(this.registro)
      this.$q.loading.show()
      if (this.boolcrear){
        this.registro.tipo_id=this.registro.tipo.id;
        this.registro.tipo2=this.registro.tipo.tipo;
        this.registro.tipo=this.registro.tipo.nombre;
        this.$axios.post(process.env.API+'/registro',this.registro).then(res=>{
          console.log(res.data)
          this.misregistros()
          this.registro={}
          this.minumero();
          // this.$q.loading.hide()
        })
      } else{
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
        this.registro.tipo_id=this.registro.tipo.id;
        this.registro.tipo2=this.registro.tipo.tipo;
        this.registro.tipo=this.registro.tipo.nombre;
        this.$axios.post(process.env.API+'/modificar',this.registro).then(res=>{
          // console.log(res.data)
          this.misregistros()
          this.registro={}
          this.minumero();
          this.mod=false;
          this.boolcrear=true
          // this.$q.loading.hide()
        })
      }

    },
    modificar(re){
      this.boolcrear=false
      // console.log(re);
      this.registro.re;
      this.registro.id=re.id;
      this.registro.ci=re.ci;
      this.registro.contribuyente=re.contribuyente;
      this.registro.numero=re.numero;
      this.registro.numtramite=re.numtramite;
      this.registro.numhoja=re.numhoja
      this.registro.lugar=re.lugar
      this.registro.tipo={id:re.tipo_id,nombre:re.tipo,tipo:re.tipo2}
      this.registro.detalle=re.detalle;
      this.mod=true;
    },
    actualizar(){
      // if (this.registro.tipo=='' || this.registro.tipo==undefined){
      //   this.$q.notify({
      //     color:'red',
      //     icon:'error',
      //     message:'Tienes que selecionar tipo de tramite'
      //   })
      //   return false
      // }
      // // console.log(this.registro)
      // this.$q.loading.show()
      // this.registro.tipo_id=this.registro.tipo.id;
      // this.registro.tipo2=this.registro.tipo.tipo;
      // this.registro.tipo=this.registro.tipo.nombre;
      // this.$axios.post(process.env.API+'/modificar',this.registro).then(res=>{
      //   // console.log(res.data)
      //   this.misregistros()
      //   this.registro={}
      //   this.minumero();
      //   this.mod=false;
      //   // this.$q.loading.hide()
      // })
    }
  }

}
</script>
