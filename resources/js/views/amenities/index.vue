<template>
<div>
  <box title="Amenities">
    <template slot="header">
      <button @click="newAmenities" data-target="modalDialog" class="btn btn-primary btn-md btn-flat pull-right">
        <i class="fa fa-plus-circle"></i> New Amenities
      </button>
    </template>
    <template slot="body">
      <custom-table>
        <template slot="columns">
          <th width="10%">Code</th>
          <th width="10%">Name</th>
          <th width="40%">Quantity</th>
          <th width="10%">Total Stock</th>
          <th width="10%">Action</th>
        </template>
        <template slot="rows">
          <tr v-for="amenities in getAmenities" :key="amenities.id">
            
            <td>{{ amenities.code }}</td>
            <td>{{ amenities.name }}</td>
            <td>{{ amenities.quantity }}</td>
            <td>{{ amenities.totalquantity }}</td>
            <td>
              <button @click="editAmenities(amenities)" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit Details"><span class="fa fa-edit alias"></span></button>
              <button @click="deleteAmenities(amenities)" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Record"><span class="fa fa-trash alias"></span></button>
            </td>
          </tr>
        </template>
      </custom-table>
    </template>
   </box>
   <modal title="Room Rate" :method="saveChanges">
      <template slot="modalBody">
        <div class="form-group">
          <label for="code">Code</label>
          <input type="text" v-model="form.code" autofocus="true" name="code" class="form-control input-md" :class="{ 'is-invalid': form.errors.has('code') }">
          <has-error :form="form" field="code" class="invalid-color"></has-error>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" v-model="form.name" autofocus="true" name="name" class="form-control input-md" :class="{ 'is-invalid': form.errors.has('name') }">
          <has-error :form="form" field="name" class="invalid-color"></has-error>
        </div>
        <div class="form-group">
          <label for="barrowedcost">Borrow Cost</label>
          <input type="number" v-model="form.barrowedcost" autofocus="true" name="barrowedcost" class="form-control input-md" :class="{ 'is-invalid': form.errors.has('barrowedcost') }">
          <has-error :form="form" field="barrowedcost" class="invalid-color"></has-error>
        </div>
         <div class="form-group">
          <label for="damagedcost">Damage Cost</label>
          <input type="number" v-model="form.damagedcost" autofocus="true" name="damagedcost" class="form-control input-md" :class="{ 'is-invalid': form.errors.has('damagedcost') }">
          <has-error :form="form" field="damagedcost" class="invalid-color"></has-error>
        </div>
         <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" name="rate" id="rate" :class="{ 'is-invalid': form.errors.has('quantity') }" v-model="form.quantity" class="form-control input-md" >
          <has-error :form="form" field="quantity" class="invalid-color"></has-error>
        </div>
      </template>
   </modal>
</div>
</template>

<style scoped>

</style>


<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
  export default {
    name: 'Amenities',
    data() {
      return {
        form: new Form({
          id: '',
          code: '',
          name: '',
          barrowedcost: '',
          damagedcost: '',
          quantity: '',
        }),
        isNew: true,
        formData: {}
      }
    },
    computed: {
      ...mapGetters('amenities',[
        'getAmenities'
      ]),
      
    },
    created() {
      this.fetch();
     
    },
    methods: {
      ...mapActions('amenities',[
        'fetch','delete','commit_data'
      ]),
     
      deleteAmenities(amenities) {
        if (confirm('Delete this record')) {
          this.$Progress.start();
          this.$toastr.w("successfully deleted");
          this.delete(amenities);
          this.$Progress.finish();
        }
      },
    newAmenities() {
        this.clearErrors();
        this.clearForm();
        $("#modalDialog").modal('show')
      },
      editAmenities(data) {
        this.isNew = false;
        this.form.clear();
        this.form.reset();
        $("#modalDialog").modal('show');
        this.form.fill(data);
      },
      clearErrors() {
        this.form.clear();
      },
      clearForm() {
        this.form.reset();
      },
      saveChanges() {
        this.$Progress.start();
        if (this.isNew) {
          this.form.post('/api/amenities')
          .then(response => { 
            this.clearForm();
            this.fetch();
            this.$toastr.s("successfully added");
            this.$Progress.finish();
          }).catch(() => {
            this.$Progress.fail();
          });
        } else {  
          this.form.patch('/api/amenities/' + this.form.id)
          .then(response => {
              this.clearForm();
              $("#modalDialog").modal('hide');
              this.fetch();
              this.$toastr.i("successfully updated");
              this.$Progress.finish();
           })
           .catch(error => {
             console.log(error)
             this.$Progress.fail();
          });
        }
      }
    }
  }
</script>

