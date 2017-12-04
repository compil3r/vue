<template>
    <div v-bind:class="defineCor">
        <div class="panel-heading">{{titulo}}</div>
        <div class="panel-body">
           <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props:['titulo', 'cor'],
    computed: {
        defineCor: function() {
            return "panel " + (this.cor || "panel-default");
        }
    }
};
</script>

<style>
    .purple {
        border-color:#b66cff;
    }

    .purple > .panel-heading {
        color: #fff;
        background-color: #400080;
         border-color:#b66cff;
    }
    
    .orange {
        border-color: #ffb591;
    }

    .orange > .panel-heading {
        color: #ffffff;
        border-color: #ffb591;
        background-color: #ff8040;
    }

    .green {
        border-color: #00ff80;
    }

    .green > .panel-heading {
        color: #ffffff;
                border-color: #00ff80;
        background-color: #80ff80;
    }
</style>
