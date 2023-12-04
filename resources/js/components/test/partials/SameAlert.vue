<template>
 <div class="samebox container-fluid " v-if="showSame==1">
                      <h2 class="msgheading">{{translations.same_headline}}</h2>
                        <div class="text mb-5 msgtext">
                          {{translations.same_text}}
                        </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-3 col-xl-12 col-12">
                        <a href="/enneagram/en" class="btnblue">RESTART TEST</a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12 leavediv">
                        <a href="/" class="btnleave">LEAVE</a>
                        </div>
                    </div>
  
    </div>
</template>

<script>
export default {
     props: ['showSame','translations'],
   data () {
    return {
      data_local: this.data,
    }
  }
}
</script>