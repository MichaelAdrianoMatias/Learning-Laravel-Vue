

import RoomTypeIndex from '../../views/room types/index';

const roomtype = {
    path: 'roomtype',
    redirect: '/roomtype/view',
    component: { render(c) { return c('router-view') } },
    children: [
        {
            path: 'view',
            component: RoomTypeIndex,
            name: 'roomtype.index'
        }
    ]
}

export default roomtype