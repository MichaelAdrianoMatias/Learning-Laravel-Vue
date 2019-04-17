
import Layout from '../../layout/Layout';

//import room views
import AmenitiesIndex from '../../views/amenities/index';

const amenitiesRouter  = {
  path: 'amenities',
  redirect: '/amenities/view',
  component: { render (c) { return c('router-view') } },
  children: [
    {
      path: 'view',
      component: AmenitiesIndex,
      name: 'amenities.index'
    },
  ],
};

export default amenitiesRouter;