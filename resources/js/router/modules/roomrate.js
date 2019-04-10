
import Layout from '../../layout/Layout';

//import room views
import RoomRateIndex from '../../views/room rates/index';

const roomRateRouter = {
  path: 'roomrate',
  redirect: '/roomrate/view',
  component: { render (c) { return c('router-view') } },
  children: [
    {
      path: 'view',
      component: RoomRateIndex,
      name: 'roomrate.index'
    },
  ],
};

export default roomRateRouter;