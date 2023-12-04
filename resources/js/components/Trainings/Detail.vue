<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-lg-2 col-xl-2 col-12 l-header__menu sidebar">
        <sidebar />
      </div>
      <div class="col-md-10 col-mxl-10 col-lg-10">
        <TrainingDetail :detailData="this.results" />
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "../dashboard/Sidebar.vue";
import Subscription from "../Subscription/Subscription.vue";
import TrainingDetail from "./TrainingDetail.vue";
export default {
  components: { Sidebar, Subscription, TrainingDetail },
};
</script>

<style>
</style>
