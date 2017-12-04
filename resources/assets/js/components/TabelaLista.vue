<template>
<div>
    <div class="form-inline">
        <a v-if="criar && !modal" v-bind:href="criar"> Criar </a>
        <modal-link v-if="criar && modal" titulo="Criar" classe="btn btn-link" nome="adicionar"></modal-link>
        <div class="form-group pull-right">
            <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
        </div>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos"> {{titulo}} </th>
                    <th v-if="detalhe || editar || deletar"> Ações </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
                    <td v-for="elemento in item">{{elemento}}</td>
                    <td v-if="detalhe || editar || deletar">
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">
                            
                            <a v-if="detalhe && !modal" class="btn btn-xs btn-info" v-bind:href="detalhe">Detalhes</a> 
                            <modal-link v-bind:url="detalhe" v-bind:item="item" v-if="detalhe && modal" titulo="Detalhes" classe="btn btn-xs btn-info" nome="detalhe"></modal-link>

                            <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-xs btn-warning" >Editar</a> 
                            <modal-link v-bind:item="item" v-if="editar && modal" titulo="Editar" classe="btn btn-xs btn-warning" nome="editar"></modal-link>

                            <a v-on:click="executaForm(index)" class="btn btn-xs btn-danger" href="#" v-if="deletar">Deletar </a>
                        </form>
                        <span v-if="!token">
                            <a v-if="detalhe && !modal" class="btn btn-xs btn-info" v-bind:href="detalhe">Detalhes</a> 
                            <modal-link v-bind:url="detalhe" v-bind:item="item" v-if="detalhe && modal" titulo="Detalhes" classe="btn btn-xs btn-info" nome="detalhe"></modal-link>
                            <a v-if="editar && !modal" class="btn btn-xs btn-warning"  v-bind:href="editar">Editar</a> 
                            <modal-link v-if="editar && modal" titulo="Editar" classe="btn btn-xs btn-warning" nome="editar"></modal-link>
                            <a v-if="deletar" v-bind:href="deletar" class="btn btn-xs btn-danger">Deletar </a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
</template>
<script>
export default {
    props: ['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordem', 'coluna', 'modal'],
    data: function () {
        return {
            buscar: '',
            ordemAux: this.ordem || 'asc',
            colunaAux: this.coluna || '0'
        }
    },
    methods: {
        executaForm: function (index) {
            document.getElementById(index).submit();
        },
        ordenaColuna: function (coluna) {
            this.colunaAux = coluna;

            if(this.ordemAux.toLowerCase() == "asc")  {
                this.ordemAux = 'desc';
            } else {
                this.ordemAux = 'asc';  
            }
        }
    },
    computed: {
        lista: function () {
            let ordem = this.ordemAux;;
            let coluna = this.colunaAux;

            ordem = ordem.toLowerCase();
            coluna = parseInt(coluna);
            if (ordem == "asc") {
                this.itens.sort(function(a,b) {
                if (Object.values(a)[coluna] > Object.values(b)[coluna]) { return 1; }
                if (Object.values(a)[coluna] < Object.values(b)[coluna]) { return -1; }
                return 0;
            });
            } else {
                this.itens.sort(function(a,b) {
                if (Object.values(a)[coluna] < Object.values(b)[coluna]) { return 1; }
                if (Object.values(a)[coluna] > Object.values(b)[coluna]) { return -1; }
                return 0;
            });
            }
            
            if (this.buscar) {
                return this.itens.filter(res => {
                    for (let k = 0; k < Object.keys(res).length; k++) {
                        if ((Object.values(res)[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0) {
                            return true;
                        }
                    }
                    return false;
                });
            }

            return this.itens;
        }
    }
}
</script>
