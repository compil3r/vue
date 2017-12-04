<template>
  <form v-bind:action="action" v-bind:class="classe" v-bind:method="defineMetodo" v-bind:enctype="enctype || 'multipart/form-data'">
    <input v-if="token" type="hidden" name="_token" v-bind:value="token">
    <input v-if="alteraMetodo" type="hidden" name="_method" v-bind:value="alteraMetodo">
    
    <slot></slot>
    
  </form>
</template>

<script>
    export default {
        props: ['classe', 'action', 'method', 'enctype', 'token'],
        data: function() {
            return {
                alteraMetodo:""
            }
        },
        computed: {
            defineMetodo: function() {
                if (this.method.toLowerCase() == "post" || this.method.toLowerCase() == "get") {
                    return this.method.toLowerCase();
                } 
                if (this.method.toLowerCase() == "put") {
                    this.alteraMetodo = "put"; 
                }

                return "post";
            }
        }
    }
</script>
