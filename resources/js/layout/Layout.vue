<template>
    <transition name="fade">
      <div class="wrapper">
        <app-header/>
        <app-sidebar/>
        <!-- <notifications group="foo" style="margin: 10px 10px" position="bottom right" height="300px"/> -->
        <app-content>
        </app-content>
        <app-footer/>
      </div>
  </transition>
</template>
<script>
  import { Sidebar, Footer, Header, Content } from './index.js';

export default {
    name: 'Layout',
    components: {
      'app-footer': Footer,
      'app-header': Header,
      'app-sidebar': Sidebar,
      'app-content': Content,
    },
    computed: {

    },
    
}
</script>

<!-- CSS Code Here -->
<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition-duration: .05s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
</style>
