<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-lg-2 col-xl-2 col-12 l-header__menu sidebar">
        <sidebar />
      </div>
      <div class="col-md-10 col-mxl-10 col-lg-10">
        <Subscription />
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "../dashboard/Sidebar.vue";
import Rightbar from "../dashboard/Rightbar.vue";
import Subscription from "../Subscription/Subscription.vue";
export default {
  data: () => ({ results: [] }),
  components: {
    Sidebar,
    Rightbar,
    Subscription,
  },
  mounted() {
    // var userInfo = JSON.parse(localStorage.getItem("userInfo"));
    // var userId = userInfo.id;
    // console.log(userId);
    // axios
    //   .get("/api/get_trainings/" + userId)
    //   .then((response) => {
    //     this.results = response.data.response;
    //     // this.$vs.loading.close();
    //     console.log(this.results);
    //   })
    //   .catch((error) => {});
    // console.log("Component mounted.");
  },
};
</script>
