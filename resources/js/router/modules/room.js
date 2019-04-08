
import Layout from '../../layout/Layout';

//import room views
import RoomIndex from '../../views/rooms/index';
import CreateRoom from '../../views/rooms/create';
import EditRoom from '../../views/rooms/edit';


const roomRouter = {
  path: 'room',
  redirect: '/room/view',
  component: { render (c) { return c('router-view') } },
  children: [
    {
      path: 'view',
      component: RoomIndex,
      name: 'room.index'
    },
    {
      path: 'create',
      component: CreateRoom,
      name: 'room.create'
    },
    {
      path: 'edit/:id',
      component: EditRoom,
      name: 'room.edit'

    },
  ],
};

export default roomRouter;