<template>
  <the-loader v-if="this.isloading === true"></the-loader>
  <div class="container result_subtitle" v-if="this.isloading === false">
    <ul class="nav nav-pills mt-5" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#info">Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#photos">Photos</a>
      </li>
    </ul>
    <div class="tab-content" id="nav-tabContent">
      <div
        class="tab-pane fade show active"
        id="info"
        role="tabpanel"
        aria-labelledby="nav-home-tab"
      >
        <div class="row mt-5">
          <div class="class col-6">
            <div class="form-group">
              <input
                type="text"
                id="first_name"
                class="form-control"
                required
                v-model="formdata.first_name"
              />
              <label class="form-control-placeholder ms-2" for="first_name"
                >First Name
              </label>
            </div>
          </div>
          <div class="class col-6">
            <div class="form-group">
              <input
                type="text"
                id="last_name"
                class="form-control"
                required
                v-model="formdata.last_name"
              />
              <label class="form-control-placeholder ms-2" for="last_name"
                >Last Name
              </label>
            </div>
          </div>

          <div class="class col-6">
            <div class="form-group">
              <input
                type="email"
                id="email"
                class="form-control"
                required
                v-model="formdata.email"
              />
              <label class="form-control-placeholder ms-2" for="email"
                >Email</label
              >
            </div>
          </div>
          <div class="class col-6">
            <div class="form-group">
              <input
                type="text"
                id="postal_code"
                class="form-control"
                required
                v-model="formdata.postal_code"
              />
              <label class="form-control-placeholder ms-2" for="postal_code"
                >Postal Code
              </label>
            </div>
          </div>
          <div class="class col-6">
            <div class="form-group">
              <input
                type="text"
                id="city"
                class="form-control"
                required
                v-model="formdata.city"
              />
              <label class="form-control-placeholder ms-2" for="city"
                >City</label
              >
            </div>
          </div>
          <div class="class col-6">
            <div class="form-group">
              <input
                type="text"
                id="phone"
                class="form-control"
                required
                v-model="formdata.phone"
              />
              <label class="form-control-placeholder ms-2" for="phone"
                >Phone No</label
              >
            </div>
          </div>
          <div class="class col-6">
            <div class="form-group">
              <textarea
                type="text"
                id="address"
                class="form-control"
                required
                v-model="formdata.address"
                >{{ formdata.address }}</textarea
              >
              <label class="form-control-placeholder ms-2" for="address"
                >Address</label
              >
            </div>
          </div>
        </div>
      </div>
      <div
        class="tab-pane fade"
        id="photos"
        role="tabpanel"
        aria-labelledby="nav-profile-tab"
      >
        <img :src="formdata.dp" alt="" class="side_image" />
      </div>
      <div class="col-4 justify-content-center">
        <button class="btn btn-gray" @click="updateuser">Update</button>
      </div>
    </div>
  </div>
  <notifications />
</template>
<script>
import TheLoader from "../Loader/TheLoader.vue";
export default {
  components: { TheLoader },
  data() {
    return {
      isloading: true,
      formdata: {
        id: "",
        dp: "",
        name: "",
        first_name: "",
        last_name: "",
        email: "",
        address: "",
        phone: "",
        postal_code: "",
        city: "",
      },
    };
  },

  mounted() {
    var userInfo = JSON.parse(localStorage.getItem("userInfo"));
    var userId = userInfo.id;
    this.formdata.id = userId;
    // console.log(userId);
    axios
      .get("/api/profile/" + userId)
      .then((response) => {
        this.formdata = response.data.response;
        // this.$vs.loading.close();
        this.isloading = false;
        // console.log(this.formdata);
      })
      .catch((error) => {});
  },
  methods: {
    updateuser() {
      axios
        .post("/api/update_profile/", this.formdata)
        .then((response) => {
          this.formdata = response.data.response;
          this.$notify({
            title: "Updated",
            type: "success",
            text: "Profile Updated Successfully",
          });
          // this.$vs.loading.close();
          //   console.log(this.formdata);
        })
        .catch((error) => {});
    },
  },
};
</script>
