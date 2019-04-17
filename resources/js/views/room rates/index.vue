<template>
<div>
  <box title="Room Rate">
    <template slot="header">
      <button @click="newRoomRate" data-target="modalDialog" class="btn btn-primary btn-md btn-flat pull-right">
        <i class="fa fa-plus-circle"></i> New Room Rate
      </button>
    </template>
    <template slot="body">
      <custom-table>
        <template slot="columns">
        
          <th width="10%">Code</th>
          <th width="10%">Room</th>
          <th width="40%">Room Rate</th>
          <th width="10%">Hours</th>
          <th width="10%">Action</th>
        </template>
        <template slot="rows">
          <tr v-for="roomrate in getRoomRates" :key="roomrate.id">
            
            <td>{{ roomrate.code }}</td>
            <td>{{ roomrate.room.name }}</td>
            <td>{{ roomrate.rate }}</td>
            <td>{{ roomrate.hours }}</td>
            <td>
              <button @click="editRoomRate(roomrate)" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit Details"><span class="fa fa-edit alias"></span></button>
              <button @click="deleteRoomRate(roomrate)" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Record"><span class="fa fa-trash alias"></span></button>
            </td>
          </tr>
        </template>
      </custom-table>
    </template>
   </box>
   <modal title="Room Rate" :method="saveChanges">
      <template slot="modalBody">
        
        <div class="form-group">
          <label for="code">Rate Code</label>
          <input type="text" v-model="form.code" autofocus="true" name="code" class="form-control input-md" :class="{ 'is-invalid': form.errors.has('code') }">
          <has-error :form="form" field="code" class="invalid-color"></has-error>
        </div>
        
        <div class="form-group">
          <label for="rate">Room</label>
          <select class="form-control" v-model="form.room_id"  :class="{ 'is-invalid': form.errors.has('room_type') }"  name="room_id" id="room_id" placeholder="Select Room Type">       
            <option></option>
            <option v-for="room in getRooms" :key="room.id" v-bind:value="room.id">
              {{ room.name }}
            </option>
          </select>
          <has-error :form="form" field="room_id" class="invalid-color"></has-error>
        </div>
         <div class="form-group">
          <label for="rate">Rate</label>
          <input type="text" name="rate" id="rate" :class="{ 'is-invalid': form.errors.has('rate') }" v-model="form.rate" class="form-control input-md" >
          <has-error :form="form" field="rate" class="invalid-color"></has-error>
        </div>
        <div class="form-group">
          <label for="hours">Hours</label>
          <input type="text" name="hours" id="hours" :class="{ 'is-invalid': form.errors.has('hours') }" v-model="form.hours" class="form-control input-md" >
          <has-error :form="form" field="hours" class="invalid-color"></has-error>
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
    name: 'RoomRate',
    data() {
      return {
        form: new Form({
          id: '',
          code: '',
          room_id: '',
          rate: '',
          hours: '',
        }),
        isNew: true,
        formData: {}
      }
    },
    computed: {
      ...mapGetters('roomrate',[
        'getRoomRates'
      ]),
      ...mapGetters('room',[
        'getRooms'
      ])
    },
    created() {
      this.fetch();
      this.fetchRooms();
    },
    methods: {
      ...mapActions('roomrate',[
        'fetch','delete','commit_data'
      ]),
      ...mapActions('room',{
          fetchRooms: 'fetch'
      }),
     
      deleteRoomRate(roomRate) {
        if (confirm('Delete this record')) {
          this.$Progress.start();
          this.$toastr.s("successfully deleted");
          this.delete(roomRate);
          this.$Progress.finish();
        }
      },
    newRoomRate() {
        this.clearErrors();
        this.clearForm();
        $("#modalDialog").modal('show')
      },
      editRoomRate(data) {
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
          this.form.post('/api/roomrate')
          .then(response => { 
            this.clearForm();
            this.fetch();
            // this.commit_data('ADD_DATA',this.form)
            this.$toastr.s("successfully added");
            this.$Progress.finish();
          }).catch(() => {
            this.$Progress.fail();
          });
        } else {  
          this.form.patch('/api/roomrate/' + this.form.id)
          .then(response => {
              this.clearForm();
              $("#modalDialog").modal('hide');
              this.fetch();
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

