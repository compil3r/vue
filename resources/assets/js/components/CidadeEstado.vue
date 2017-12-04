<template>
 <div class="col-md-8 col-md-offset-2 form-group">
     <label for="">Estado</label>
     <select class="form-control" v-on:change="onChange" name="estado" v-model="selected" id="estado">
         <option  v-for="estado in estados" :value="estado.id"> {{estado.nome}} </option>
     </select>
    
    <label for="">Cidade</label>
     <select class="form-control" name="cidade" v-model="cidadeSelected" id="cidade" placeholder="Cidades">
         <option v-if="selected == ''" value="" selected="selected">Selecione um estado</option>
         <option v-for="cidade in cidades" :value="cidade.id"> {{cidade.nome}} </option>
     </select>

    <label for="">Nome</label>
    <input class="form-control" type="text" v-model="artigo">
    <ul v-if="retorno && artigo && (busca == true)" >
        <li v-for="ret in retorno" v-on:click="detalhes(ret)">{{ret.titulo}}</li>
    </ul>
    <p v-if="!artigo">Digite algo para buscar o artigo.</p>
    <p v-if="!retorno && artigo">Nadica de nada</p>

    <label for="">Conteudo</label>
    <textarea name="" class="form-control" id="" cols="3">{{conteudo}}</textarea>

    <label for="Descricao">Descrição</label>
    <input type="text" class="form-control" :value="descricao">
 </div>
</template>

<script>
export default {
  props:['estados'],
  watch: {
      artigo: function (novoArtigo) {
          if (this.artigo != "") {
              this.getRetorno();
          } else {
         //this.artigo = "";
         this.conteudo = "";
         this.descricao = "";
         this.busca = true;
         this.retorno = "";
        }
      }
  },
  computed: {
   getCidades() {
       if (this.selected != '')
          {
              axios.get('/cidades/' + this.selected).then(res => {
                console.log(res.data);
                this.cidades = res.data;
                this.cidadeSelected = res.data[0].id;
            });
        } 
   }
  },
  methods: {
      onChange: function() {
         this.getCidades;
      },
      getRetorno: function() {
          axios.get('/artigo/' + this.artigo).then(res => {
              if (res.data.length){
                  if (this.artigo != "") {
                      this.retorno = res.data;
                  }
            } else {
                this.retorno = '';
            }
              
          }) 
      },
      detalhes: function (ret) {
         this.artigo = ret.titulo;
         this.conteudo = ret.conteudo;
         this.descricao = ret.descricao;
         this.busca = false;
      }
  },
  mounted: function(){
      this.getCidades;
  },
  data: function() {
     return {
         selected: '',
         cidadeSelected: '',
         cidades: [],
         artigo: '',
         retorno: 'Digite o nome do artigo para buscar',
         conteudo: '',
         descricao: '',
         busca: true
     }
          
  }
}
</script>

