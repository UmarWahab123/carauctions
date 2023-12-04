<template>
  <div class="container">
    <div class="mt-3">
      <button @click="goBack">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-arrow-left-circle-fill"
          viewBox="0 0 16 16"
        >
          <path
            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"
          />
        </svg>
      </button>
    </div>
    <div class="text-center green_color mt-3">
      <h1>Lesson Detail</h1>
    </div>
    <hr />
    <div class="row mt-4">
      <div class="col-4">
        <img
          :src="this.results.file_upload"
          class="w-100 shadow-1-strong rounded mb-2"
          alt=""
          style="height: 200px !important"
        />
        <!-- <video
          v-else
          class="w-100 shadow-1-strong rounded mb-2"
          style="height: 200px !important"
          controls
        >
          <source :src="this.results.file_upload" type="video/mp4" />
          <source :src="this.results.file_upload" type="video/ogg" />
        </video> -->
      </div>

      <div class="col-8">
        <div class="row">
          <div class="col-4">
            <label> <h4 class="text-muted">Name</h4> </label><br />
            <h3 class="zero">
              <b>
                <span class="darkgreen-color">{{ this.results.title }}</span>
              </b>
            </h3>
          </div>

          <div class="col-5 mt-2">
            <label> <h4 class="text-muted">Tags</h4> </label><br />
            <h4 class="zero">
              <b>
                <span class="darkgreen-color">{{ this.results.tags }}</span>
              </b>
            </h4>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-xl-12 col-md 12">
        <span v-html="this.results.description"> </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      results: [],
      user: "",
      lessons: [],
    };
  },
  mounted() {
    var id = this.$route.params.id;
    // alert(id);
    if (id > 0) {
      axios
        .get("/api/lesson_detail/" + id)
        .then((response) => {
          //   this.$vs.loading.close();
          this.results = response.data.response;
          this.user = this.results.user;
          this.lessons = this.results.lessons;
          console.log(this.results);
        })
        .catch((error) => {});
    }
  },
  methods: {
    goBack: function (event) {
      return this.$router.go(-1);
    },
  },
};
</script>

<style>
</style>
