<template>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-3 col-xl-3 col-12 l-header__menu sidebar">
        <sidebar />
      </div>
      <div class="col-md-6">
        <MyProfile />
      </div>
      <div class="col-lg-3 col-md-3 col-xl-3 col-12 col-sm-4">
        <rightbar />
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "../dashboard/Sidebar.vue";
import Rightbar from "../dashboard/Rightbar.vue";
import MyProfile from "./MyProfile.vue";
export default {
  data: () => ({ results: [] }),
  components: {
    Sidebar,
    Rightbar,
    MyProfile,
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
