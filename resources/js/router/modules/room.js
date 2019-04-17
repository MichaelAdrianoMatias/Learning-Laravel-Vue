
import Layout from '../../layout/Layout';

//import room views
import RoomIndex from '../../views/rooms/index';



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
    
  ],
};

export default roomRouter;