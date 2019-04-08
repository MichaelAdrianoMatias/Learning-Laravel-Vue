<template>
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">{{ title }}</h3>
      <slot name="header">
      </slot>
    </div>
    <div class="box-body">
        <slot name="body"></slot>
    </div>
  </div> 
</template>

<script>
export default {
  name: 'Box',
  props: {
      title: {
          default: 'Title',
          type: String
      },
      
  }
  
}
</script>
