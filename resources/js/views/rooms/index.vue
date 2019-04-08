<template>
<div>
  <box title="Room">
    <template slot="header">
      <button data-toggle="modal" @click="newRoom" class="btn btn-primary btn-md btn-flat pull-right">
        <i class="fa fa-plus-circle"></i> New Room
      </button>
    </template>
    <template slot="body">
      <custom-table>
        <template slot="columns">
          <th width="10%">Code</th>
          <th width="20%">Name</th>
          <th width="5%">Floor</th>
          <th width="15%">Type</th>
          <th width="10%">Occupancy</th>
          <th width="10%">Last Updated</th>
          <th width="10%">Action</th>
        </template>
        <template slot="rows">
          <tr v-for="room in getRooms" :key="room.id">
            <td>{{ room.code }}</td>
            <td>{{ room.name }}</td>
            <td>{{ room.floor }}</td>
            <td>{{ room.room_type }}</td>
            <td>{{ room.max_person }}</td>
            <td>{{ room.last_updated }}</td>
            <td>
              <button @click="editRoom(room)"  class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit Details"><span class="fa fa-edit alias"></span></button>
              <button @click="deleteRoom(room)" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Record"><span class="fa fa-edit alias"></span></button>
            </td>
          </tr>
        </template>
      </custom-table>
    </template>
   </box>
   <modal title="New Room" :method="saveChanges">
     <template slot="modalBody">
        <div class="form-group">
          <label for="code">Room Code</label>
          <input type="text" v-model="form.code" autofocus="true" name="code" class="form-control input-md" :class="{ 'is-invalid': form.errors.has('code') }" placeholder="Enter Room Code" >
          <has-error :form="form" field="code" class="invalid-color"></has-error>
        </div>
        <div class="form-group">
          <label for="name">Room Name</label>
          <input type="text" name="name" id="name" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name" class="form-control input-md"  placeholder="Enter Room name">
          <has-error :form="form" field="name" class="invalid-color"></has-error>
        </div>
         <div class="form-group">
          <label for="floor">Floor Level</label>
          <input type="number" min="1" class="form-control" :class="{ 'is-invalid': form.errors.has('floor') }" v-model="form.floor" name="floor" id="floor" placeholder="Enter Floor level">
          <has-error :form="form" field="floor" class="invalid-color"></has-error>

        </div>
         <div class="form-group">
            <label for="max_person">Capacity</label>
            <input type="number" min="1" class="form-control" :class="{ 'is-invalid': form.errors.has('max_person') }" v-model="form.max_person"  name="max_person" id="max_person" placeholder="Enter Maximum Room Capacity">
            <has-error :form="form" field="max_person" class="invalid-color"></has-error>

        </div>
        <div class="form-group">
          <label for="room_type">Room Type</label>
          <select class="form-control" v-model="form.room_type"  :class="{ 'is-invalid': form.errors.has('room_type') }"  name="room_type" id="room_type" placeholder="Select Room Type">       
            <option></option>
            <option v-for="type in getRoomTypes" :key="type.id" v-bind:value="type.id">
              {{ type.name }}
            </option>
          </select>
          <has-error :form="form" field="room_type" class="invalid-color"></has-error>
        </div>
     </template>
   </modal>
</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
  export default {
    data() {
      return {
        isNew: true,
        selectedData: '',
        form: new form({
          id: '',
          code: '',
          name: '',
          floor: '',
          max_person: '',
          room_type: ''
        })
      }
    },
    components: {

    },
    name: 'Room',
    computed: {
      ...mapGetters('room',[
          'getRooms'
        ]),
        ...mapGetters('roomtype',[
          'getRoomTypes'
        ]),
    },
    created() {
      this.fetch();
      this.fetchRoomTypes();
    },
    methods: {
      ...mapActions('room',[
        'fetch','delete','update','commit_data'
      ]),
      ...mapActions('roomtype',{
        fetchRoomTypes: 'fetch',
      }),

      deleteRoom(room) {
        if (confirm('Delete this record')) {
          this.$Progress.start();
          this.$toastr.s("successfully deleted");
          this.delete(room);
          this.$Progress.finish();
        }
      },
      saveChanges(room) {
        this.$Progress.start();
        if (this.isNew) {
          this.form.post('/api/room')
          .then(response => { 
            this.clearForm();
            this.commit_data(response.data);
            this.$toastr.s("successfully added");
            this.$Progress.finish();
          }).catch(() => {
            this.$Progress.fail();
          });
        } else {
          this.form.put('/api/room/' + this.form.id)
          .then(() => {
              this.clearForm();
              $("#modalDialog").modal('hide');
              this.$toastr.s("successfully updated");
              this.$Progress.finish();
           })
           .catch(() => {
            this.$Progress.fail();
          });
        }
        
      },
      editRoom(data) {
        this.isNew = false;
        this.form.clear();
        this.form.reset();
        $("#modalDialog").modal('show');
        this.form.fill(data);
        this.form.room_type = data.room_type;      
      },
      newRoom() {
        this.isNew = true;
        this.form.clear();
        this.form.reset();
        $("#modalDialog").modal('show');
      },
      
      clearErrors() {
        this.form.clear();
      },
      clearForm() {
        this.form.reset();
      }
      
    }
  }
</script>

<style scoped>
  .invalid-color {
    color: red;
  }
</style>





