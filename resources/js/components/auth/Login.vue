<template>
  <div class="login login_body">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-6">
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
            <h3 class="mb-3 mt-2 mobcenter">Login</h3>
            <div class="form-group mt-5">
              <input
                type="text"
                id="email"
                class="form-control"
                required
                v-model="email"
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
                v-model="password"
                required
              />
              <label class="form-control-placeholder ms-2" for="password"
                >Password</label
              >
            </div>
            <div class="row justify-content-center my-3 p-3">
              <button class="btn btn-gray" @click="loginuser">Login</button>
            </div>
            <div class="mt-4" style="margin-left: 50%">OR</div>
            <div class="mt-4 mobresponsive" style="margin-left: 40%">
              <router-link to="/register">Sign up for Newrich</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </div>
  <div class="container">
    <Footer />
  </div>
</template>
<script>
import Footer from "../footer/Footer.vue";
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  components: {
    Footer,
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    loginuser() {
      // console.log('safd',this.userDefaults)
      //if (!this.checkLogin()) return
      // Loading
      // return false;
      //this.$vs.loading();
      const payload = {
        userDetails: {
          email: this.email,
          password: this.password,
        },
      };
      //   localStorage.setItem("userInfo", JSON.stringify(payload));
      //  this.$router.push("/advocates");
      //   console.log(localStorage.getItem("userInfo"));

      axios
        .post("/api/applogin", payload)
        .then((response) => {
          let responseData = response.data.response;
          // console.log('asdf',responseData);
          if (responseData.status == 1) {
            localStorage.setItem("userInfo", JSON.stringify(responseData));
            //  this.$vs.loading.close();
            // this.$vs.notify({
            //   color: "success",
            //   position: "top-right",
            //   title: "Success",
            //   text: "Credentials matches successfully",
            // });
            //this.$vs.loading.close();

            this.$router.push("/");
          } else {
            this.$vs.notify({
              title: "Error",
              text: "Credendials do not match our records",
              iconPack: "feather",
              icon: "icon-alert-circle",
              color: "danger",
            });
          }
        })
        .catch((error) => {});
      // this.$store.dispatch('api/login', payload)
      //   .then(() => { this.$vs.loading.close() })
      //   .catch(error => {
      //     this.$vs.loading.close()
      //     this.$vs.notify({
      //       title: 'Error',
      //       text: error.message,
      //       iconPack: 'feather',
      //       icon: 'icon-alert-circle',
      //       color: 'danger'
      //     })
      //   })
    },
  },
};
</script>
