<template>
  <div>
    <button class="btn btn-primary btn-md pull-right"> {{ text }}</button>
  </div>
</template>

<script>
export default {
  props: ['text','size','type'],
  props: {
    text: {
      default: 'button text',
      type: String
    },
    type: {
      type: String,
      default: 'primary'
    },
    size: {
      type: String,
      default: 'md'
    }
  },
  name: 'btn-primary-md'
}
</script>

