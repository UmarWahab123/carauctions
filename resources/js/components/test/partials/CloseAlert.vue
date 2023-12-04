<template>
 <div class="samebox" v-if="showClose==1">
          <h2>Do you really want to leave?</h2>
            <div class="text mb-5">
              If you leave now you will lose your progress and will have to start new test
            </div>
          <div class="row">
            <div class="col-md-4 col-12">
            <a  v-on:click="resumetest" href="javascript::void(0)" class="btnblue">RESUME TEST</a>
            </div>
            <div class="col-md-4 col-12">
            <a href="/" class="btnlight">LEAVE</a>
            </div>
        </div>
     </div>
</template>

<script>
export default {
     props: ['showClose'],
   data () {
    return {
     // showClose: this.showClose,
    }
  },
   methods: {
      resumetest: function (event) {
                // this.showClose=0;
                // this.showSection=1;
                 this.$emit('showSection', 1);
            },

   }
}
</script>