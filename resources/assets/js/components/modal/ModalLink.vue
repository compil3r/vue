<template>
    <span>
        <span v-if="item">
            <button v-on:click="preencheFormulario()" v-if="!tipo || (tipo != 'button' && tipo!='link') || tipo == 'button'" type="button" v-bind:class="classe || 'btn btn-primary'"
                data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
            <a v-on:click="preencheFormulario()" href="#" v-if="tipo == 'link'" type="button" v-bind:class="classe || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</a>
        </span>

        <span v-if="!item">
            <button v-if="!tipo || (tipo != 'button' && tipo!='link') || tipo == 'button'" type="button" v-bind:class="classe || 'btn btn-primary'"
                data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
            <a href="#" v-if="tipo == 'link'" type="button" v-bind:class="classe || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</a>
        </span>
    </span>
</template>

<script>
export default {
    props:['tipo','nome', 'classe', 'titulo', 'item','url'],
    methods: {
        preencheFormulario: function() {
            axios.get(this.url + this.item.id).then(res => {
                console.log(res.data);
                this.$store.commit('setItem', res.data);
            });
        }
    }
}
</script>
