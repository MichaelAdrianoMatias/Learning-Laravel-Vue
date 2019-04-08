<template>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="btn-group btn-flat" style="margin-top:5px;">
          <button type="button" class="btn btn-success btn-flat">Create New</button>
          <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
      </section>
      <section class="content" >
        
        <transition name="fade" mode="out-in">
           <router-view></router-view>       
        </transition>
      </section>
    </div>
</template>

<script>
export default {
    name: 'Content',
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.08s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
</style>

