<template>
    <div v-bind:id="nome" class="modal fade" tabindex="-1" role="dialog" v-bind:aria-labelledby="nome">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{titulo}}</h4>
                </div>
                 <div class="modal-body">
                    <slot></slot>
                 </div>
            </div>
        </div>
    </div>
</template> 

<script>
export default {
  props: ['nome', 'titulo']
}
</script>

