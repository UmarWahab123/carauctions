<template>
  <the-loader v-if="this.isloading === true"></the-loader>

  <div
    class="feed mt-5"
    :key="indextr"
    :data="item"
    v-for="(item, indextr) in results"
  >
    <div class="row">
      <div class="col-6">
        <div class="d-flex align-items-center">
          <div class="image">
            <img
              :src="item.user.dp"
              class="circleimg"
              style="height: 50px !important; width: 50px !important"
            />
          </div>
          <div class="ml-3 w-100">
            <p class="mb-0 mt-0">
              <b> {{ item.user.name }}</b>
            </p>
            <span>@{{ item.user.user_name }}</span>
          </div>
        </div>
      </div>
      <div class="col-6 text-end">
        <i class="fas fa-ellipsis-h"></i>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-2">
        <router-link
          v-bind:to="'/training_detail/' + item.id"
          v-if="
            item.type === 'tutorial' ||
            item.type === 'course' ||
            item.type === 'certifiedcourses'
          "
        >
          <img
            class="w-100 shadow-1-strong rounded mb-2"
            :src="item.file_upload"
            alt=""
            style="height: 200px !important"
          />
        </router-link>
        <router-link v-bind:to="'/training_detail/' + item.id" v-else>
          <video
            class="w-100 shadow-1-strong rounded mb-2"
            style="height: 200px !important"
            controls
          >
            <source :src="item.file_upload" type="video/mp4" />
            <source :src="item.file_upload" type="video/ogg" />
          </video>
        </router-link>

        <p>
          {{ item.description }}
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="d-flex gap-2">
          <div>
            <i
              v-if="item.user_like > 0"
              class="fas fa-heart"
              v-bind:training_id="item.id"
              @click="dislike"
            ></i>
            <i
              v-else
              class="far fa-heart"
              v-bind:training_id="item.id"
              @click="like"
            ></i>
          </div>
          <div>
            <i class="far fa-comment"></i>
          </div>
        </div>
        <p class="like">{{ item.total_like }} likes</p>
        <comment :commentsdata="item.comments" />
      </div>

      <div class="col-6 text-end">
        <i class="far fa-bookmark"></i>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <div class="d-flex align-items-center">
          <div class="image">
            <img
              src="https://www.w3schools.com/w3images/avatar6.png"
              class="circleimg"
              style="height: 40px !important; width: 40px !important"
            />
          </div>
          <div class="ms-3 col-lg-10">
            <textarea
              rows="1"
              placeholder="Add a comment..."
              class="form-control b-comments__input unlimsize b-comments__form"
              style="overflow: hidden; overflow-wrap: break-word; height: 48px"
              v-model="formdata.comment"
            ></textarea>
          </div>
          <button @click="savecomment" v-bind:training_id="item.id" class="btn">
            <svg
              viewBox="0 0 24 24"
              width="24"
              height="24"
              stroke="currentColor"
              stroke-width="2"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="css-i6dzq1"
            >
              <line x1="22" y1="2" x2="11" y2="13"></line>
              <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <hr />
  </div>
</template>

<script>
import comment from "../dashboard/Comment.vue";
import TheLoader from "../Loader/TheLoader.vue";
export default {
  components: { comment, TheLoader },

  props: ["comments"],
  data: () => ({
    id: "",
    isloading: true,
    results: [],
    count: "",
    formdata: {
      comment: "",
      user_id: "",
      training_id: "",
    },
  }),
  mounted() {
    var userInfo = JSON.parse(localStorage.getItem("userInfo"));
    var userId = userInfo.id;
    this.formdata.user_id = userId;
    this.get_trainings();
    // console.log("Component mounted.");
  },
  methods: {
    like: function (event) {
      var training_id = event.currentTarget.getAttribute("training_id");
      this.formdata.training_id = training_id;

      //   console.log();
      axios
        .post("/api/save_like", this.formdata)
        .then((response) => {
          this.results = response.data.response;
          // this.$vs.loading.close();
          this.get_trainings();
          console.log(this.results);
        })
        .catch((error) => {});
      //   alert(training_id);
    },
    dislike: function (event) {
      var training_id = event.currentTarget.getAttribute("training_id");
      this.formdata.training_id = training_id;

      console.log();
      axios
        .post("/api/dislike", this.formdata)
        .then((response) => {
          this.results = response.data.response;
          // this.$vs.loading.close();
          this.get_trainings();
          console.log(this.results);
        })
        .catch((error) => {});
      //   alert(training_id);
    },
    savecomment: function (event) {
      var training_id = event.currentTarget.getAttribute("training_id");
      this.formdata.training_id = training_id;

      console.log();
      axios
        .post("/api/save_comment", this.formdata)
        .then((response) => {
          this.results = response.data.response;
          // this.$vs.loading.close();
          this.get_trainings();
          console.log(this.results);
        })
        .catch((error) => {});
      //   alert(training_id);
    },
    get_trainings: function () {
      var userInfo = JSON.parse(localStorage.getItem("userInfo"));
      var userId = userInfo.id;
      //   alert("jkk");
      axios
        .get("/api/othertrainings/" + userId)
        .then((response) => {
          this.results = response.data.response;
          // this.$vs.loading.close();
          this.isloading = false;
          //   console.log(this.results);
        })
        .catch((error) => {});
    },
  },
};
</script>
