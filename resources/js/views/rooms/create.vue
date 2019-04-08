<template>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <box title="Create Room">
        <template slot="body">
          <form @submit.prevent="saveRoom(room)" class="horizontal-form">
            <div class="col-md-12">
              <div class="form-group">
                <label for="code">Room Code</label>
                <input type="text" v-model="room.code" name="code" class="form-control input-md" placeholder="Enter Room Code" >
              </div>
              <div class="form-group">
                <label for="name">Room Name</label>
                <input type="text" name="name" id="name" class="form-control input-md"  v-model="room.name" placeholder="Enter Room name">
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <label for="floor">Floor Level</label>
                  <input type="number" min="1" class="form-control" name="floor" v-model="room.floor" id="floor" placeholder="Enter Floor level">
                </div>
                <div class="col-xs-4">
                  <label for="max_person">Capacity</label>
                  <input type="number" min="1" class="form-control" v-model="room.max_person" name="max_person" id="max_person" placeholder="Enter Maximum Room Capacity">
                </div>
                <div class="col-xs-4">
                  <label for="type_id">Room Type</label>
                  <select class="form-control" name="type_id" id="type_id" placeholder="Select Room Type">
                    <option value="" class="selected">--SELECT--</option>
                    <option v-for="type in getRoomTypes" :key="type.id">{{ type.name }}</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <br>
                <a @click="goToRoomView" class="btn btn-danger pull-right btn-flat"  style="margin-left:8px;" >Cancel</a>
                <button type="submit" class="btn btn-primary pull-right btn-flat" style="margin-left:5px;">Save</button>
              </div>
            </div>
          </form>
        </template>
      </box>
    </div>
  </div>
</template>

<script>
import {Form, HasError, AlertError } from 'vform';
window.form = Form;
import { mapActions, mapGetters } from 'vuex';
export default {
  data() {
    return {
      room: {}
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
  components: {
    HasError,
    AlertError,
  },
  methods: {
    ...mapActions('room',[
      'create'
    ]),
    ...mapActions('roomtype',['fetch']),
    saveRoom(room) {
      this.$Progress.start();
      this.create(room)
      .then(res => {
        this.$Progress.finish();
        this.$toastr.s("successfully added");
      })
      .catch(error => {
        console.log(error)
      });
    },
    goToRoomView() {
      this.$router.push({name:'room.index'});
    },
    
  },
}
</script>