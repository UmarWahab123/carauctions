<template>
  <div class="login login_body">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-6vmt-4">
        <img
          src="https://newrich.com/knowyourself/images/Artboard-28@2x.png"
          alt=""
          class="side_image"
        />
      </div>
      <div class="col-xxl-6 col-lg-6 col-md-6 login_body p-4">
        <div class="row justify-content-center my-auto">
          <div class="col-lg-8 my-5">
            <div class="ms-5">
              <img
                class="newrich_logo"
                src="https://nutrafunnels.com/wp-content/uploads/elementor/thumbs/cropped-logo-owv4yx3yxr0ts76bag9n5qdwuqo2prpg7x50b2tmh4.png"
                alt="newrich"
                height="100px"
                width="100px"
              />
            </div>
            <h3 class="mt-5 mobcenter">Create Account</h3>
            <div class="form-group mt-5">
              <input
                type="text"
                id="name"
                class="form-control"
                v-model="formdata.name"
                required
              />
              <label class="form-control-placeholder ms-2" for="name"
                >Name
              </label>
            </div>
            <div class="form-group mt-5">
              <input
                type="text"
                id="email"
                class="form-control"
                v-model="formdata.email"
                required
              />
              <label class="form-control-placeholder ms-2" for="email"
                >Email
              </label>
            </div>
            <div class="form-group mt-4">
              <input
                type="password"
                id="password"
                class="form-control"
                v-model="formdata.password"
                required
              />
              <label class="form-control-placeholder ms-2" for="password"
                >Password</label
              >
            </div>
            <div class="row justify-content-center my-3">
              <button class="btn btn-gray" v-on:click="submit">Sign up</button>
            </div>
            <div class="mt-4" style="margin-left: 50%">OR</div>
            <div class="mt-4 mobileresponse" style="margin-left: 30%">
              Already have an account?
              <router-link to="/login">Login</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr />
  <div class="container">
    <Footer />
  </div>
</template>
<script>
import Footer from "../footer/Footer.vue";
export default {
  data() {
    return {
      formdata: {
        name: "",
        email: "",
        password: "",
        status: "Active",
      },
    };
  },
  components: {
    Footer,
  },
  methods: {
    submit: function (event) {
      //   this.$vs.loading();
      console.log(this.formdata);
      axios
        .post("/api/register_user", this.formdata)
        .then((response) => {
          let responseData = response.data.response;
          if (response.data.status == 1) {
            localStorage.setItem("userInfo", JSON.stringify(responseData));
            // this.$vs.loading.close();
            // this.$vs.notify({
            //   color: "success",
            //   position: "top-right",
            //   title: "Success",
            //   text: "Information Saved successfully",
            // });
            this.$router.push("/");
          } else {
            alert("Something went wrong");
          }
        })
        .catch((error) => {});
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
