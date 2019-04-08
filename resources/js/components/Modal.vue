<template>
    <div class="modal fade" id="modalDialog" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered" style="width:500px !important" role="document">
        <form @submit.prevent="functionName" @keyup.enter="functionName">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">{{ title }}</h4>
            </div>
            <div class="modal-body">
              <slot name="modalBody"></slot>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-md">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      functionName: this.method,
      
    }
  },
  props: ['title','method']
}
</script>