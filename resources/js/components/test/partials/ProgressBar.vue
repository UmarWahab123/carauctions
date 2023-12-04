<template>
<div class="d-none d-sm-block">
 <p  class="progress-text">{{progresscount}}%</p>
      <div class="progress mt-5">
         <div class="progress-bar"></div>
      </div>
</div>
</template>
<script>
export default {
      props: ['progresscount'],
   data () {
    return {
      data_local: this.data,
    }
  }
}
</script>