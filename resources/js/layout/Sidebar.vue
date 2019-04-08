<template>
  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview" routerLinkActive="active menu-open">
            <a href="#" role="button">
              <i class="fa fa-laptop"></i>
              <span>UI Elements</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><router-link :to="{name:'Dashboard'}"><i class="fa fa-circle-o"></i> Room</router-link></li>
              <li><router-link :to="{name:'room.index'}"><i class="fa fa-circle-o"></i> Room</router-link></li>
              <li><router-link :to="{name:'room.create'}"><i class="fa fa-circle-o"></i> Add Room</router-link></li>
              <li><router-link :to="{name:'roomtype.index'}"><i class="fa fa-circle-o"></i> Room Type</router-link></li>              
              <li><router-link :to="{name: 'Login'}"><i class="fa fa-circle-o"></i> Login</router-link></li>
              <li><router-link :to="{name:'room.create'}"><i class="fa fa-circle-o"></i> New Room</router-link></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
</template>
<script>
export default {
  name:'Sidebar',
  created() {
    //  $(document).ready(() => {
    //   const trees: any = $('[data-widget="tree"]');
    //   trees.tree();
    // });
  }
};
</script>