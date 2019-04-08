<template>
    <div class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table id="table" class="table table-bordered table-striped dataTable" role="grid">
              <thead>
                <tr role="row">
                  <slot name="columns"></slot>
                </tr>
              </thead>
              <tbody>
                <slot name="rows"></slot>
              </tbody>
            </table>  
          </div>
        </div>
      </div>
</template>

<script>
export default {
    name: 'Table',
}
</script>
