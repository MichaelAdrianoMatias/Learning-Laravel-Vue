<template>
<div>
  <box title="Room">
    <template slot="header">
      <button @click="newRoomType" data-target="modalDialog" class="btn btn-primary btn-md btn-flat pull-right">
        <i class="fa fa-plus-circle"></i> New Room Type
      </button>
    </template>
    <template slot="body">
      <custom-table>
        <template slot="columns">
          <th width="10%">Code</th>
          <th width="10%">Name</th>
          <th width="40%">Description</th>
          <th width="10%">Last Updated</th>
          <th width="20%">Created By</th>
          <th width="10%">Action</th>
        </template>
        <template slot="rows">
          <tr v-for="type in getRoomTypes" :key="type.id">
            <td>{{ type.code }}</td>
            <td>{{ type.name }}</td>
            <td>{{ type.description }}</td>
            <td>{{ type.updated_at }}</td>
            <td>{{ type.created_by }}</td>
            <td>
              <button @click="editRoomType(type)" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit Details"><span class="fa fa-edit alias"></span></button>
              <button @click="deleteRoomType(type)" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Record"><span class="fa fa-edit alias"></span></button>
            </td>
          </tr>
        </template>
      </custom-table>
    </template>
   </box>
   <modal title="Room Type" :method="saveChanges">
      <template slot="modalBody">
        <div class="form-group">
          <label for="code">Room Code</label>
          <input type="text" v-model="form.code" autofocus="true" name="code" class="form-control input-md" :class="{ 'is-invalid': form.errors.has('code') }" placeholder="Enter Type Code" >
          <has-error :form="form" field="code" class="invalid-color"></has-error>
        </div>
        <div class="form-group">
          <label for="name">Room Type</label>
          <input type="text" name="name" id="name" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name" class="form-control input-md"  placeholder="Enter Room Type">
          <has-error :form="form" field="name" class="invalid-color"></has-error>
        </div>
        <div class="form-group">
          <label for="name">Description</label>
          <textarea type="text" row="8" name="description" id="description" :class="{ 'is-invalid': form.errors.has('description') }" v-model="form.description" class="form-control input-md"  placeholder="Enter Room Type">
          </textarea>
          <has-error :form="form" field="description" class="invalid-color"></has-error>
        </div>
      </template>
   </modal>
</div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
  export default {
    name: 'RoomType',
    data() {
      return {
        form: new Form({
          id: '',
          code: '',
          name: '',
          description: '',
        }),
        isNew: true,
        roomTypeData: {},
      }
    },
    computed: {
      ...mapGetters('roomtype',[
        'getRoomTypes'
      ])
    },
    created() {
      this.fetch();
    },
    methods: {
      ...mapActions('roomtype',[
        'fetch','delete','commit_data'
      ]),
     
      deleteRoomType(roomType) {
        if (confirm('Delete this record')) {
          this.$Progress.start();
          this.$toastr.s("successfully deleted");
          this.delete(roomType);
          this.$Progress.finish();
        }
      },
      newRoomType() {
        this.clearErrors();
        this.clearForm();
        $("#modalDialog").modal('show')
      },
      editRoomType(data) {
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
          this.form.post('/api/roomtype')
          .then(response => { 
            this.clearForm();
            this.$toastr.s("successfully added");
            this.$Progress.finish();
          }).catch(() => {
            this.$Progress.fail();
          });
        } else {  
          this.form.patch('/api/roomtype/' + this.form.id)
          .then(response => {
              this.clearForm();
              $("#modalDialog").modal('hide');
              this.$toastr.s("successfully updated");
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
