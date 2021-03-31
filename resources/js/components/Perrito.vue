<template>
  <div>
    <h1 class="text-center">Perritos</h1>
    <hr />

    <!-- Button to Open the Modal -->
    <button @click="modificar=false; abrirModal();" type="button" class="btn btn-primary my-4">Nuevo</button>

    <!-- The Modal -->
    <div class="modal" :class="{mostrar: modal}">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">{{tituloModal}}</h4>
            <button @click="cerrarModal();"  type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="my-4">
              <label for="nombre">Nombre</label>
              <input v-model="perrito.nombre" type="text" class="form-control" id="nombre" placeholder="Nombre del perrito">
              <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
            </div>
            <div class="my-4">
              <label for="color">Color</label>
              <input v-model="perrito.color" type="text" class="form-control" id="color" placeholder="Color del perrito">
              <span class="text-danger" v-if="errores.color">{{errores.color[0]}}</span>
            </div>
            <div class="my-4">
              <label for="raza">Raza</label>
              <input v-model="perrito.raza" type="text" class="form-control" id="raza" placeholder="Raza del perrito">
              <span class="text-danger" v-if="errores.raza">{{errores.raza[0]}}</span>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
            <button  @click="guardar();" type="button" class="btn btn-success" data-dismiss="modal">
              Guardar
            </button>


          </div>
        </div>
      </div>
    </div>

    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Color</th>
          <th scope="col">Raza</th>
          <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="perr in perritos" :key="perr.id">
          <th scope="row">{{ perr.id }}</th>
          <td>{{ perr.nombre }}</td>
          <td>{{ perr.color }}</td>
          <td>{{ perr.raza }}</td>
          <td>
            <button  @click="modificar=true; abrirModal(perr);" class="btn btn-warning">Editar</button>
          </td>
          <td>
            <button @click="eliminar(perr.id)" class="btn btn-danger">
              Eliminar
            </button>
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
      perrito:{
        nombre:'',
        color:'',
        raza: '',
      },
      id:0,
      modificar:true,
      modal:0,
      tituloModal:'',
      perritos: [],
      errores: {},
    };
  },
  methods: {
    async listar() {
      const res = await axios.get('perritos');
      this.perritos = res.data;
    },
    async eliminar(id) {
      const res = await axios.delete('perritos/' + id);
      this.listar();
    },
    async guardar() {
       try {
           if(this.modificar){
            const res = await axios.put('perritos/'+this.id, this.perrito)
            

            }else{
                const res = await axios.post('perritos/', this.perrito);
            }
            this.cerrarModal();
            this.listar();
       } catch (error) {
           if(error.response.data){
               this.errores = error.response.data.errors;
               return;
           }
       } 
      
    },
    abrirModal(data={}){
      this.modal=1;
      if(this.modificar){
        this.id=data.id;
        this.tituloModal="Modificar perrito";
        this.perrito.nombre=data.nombre;
        this.perrito.color=data.color;
        this.perrito.raza=data.raza;
      }else{
        this.id=0;
        this.tituloModal="Crear perrito";
        this.perrito.nombre='';
        this.perrito.color='';
        this.perrito.raza='';
      }
    },
    cerrarModal(){
      this.modal=0;
      this.errores={};
    },
  },
  created() {
    this.listar();
  },
};
</script>

<style>
  .mostrar{
    display: list-item;
    opacity: 1;
    background: rgba(100, 99, 104, 0.705);
  }
</style>