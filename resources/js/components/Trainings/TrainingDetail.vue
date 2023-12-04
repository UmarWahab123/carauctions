<template>
  <div class="container">
    <div class="text-center green_color mt-3">
      <h1>Training Detail</h1>
    </div>
    <hr />
    <div class="row mt-4">
      <div class="col-4">
        <img
          v-if="
            this.results.type === 'tutorial' ||
            this.results.type === 'course' ||
            this.results.type === 'certifiedcourses'
          "
          class="w-100 shadow-1-strong rounded mb-2"
          :src="this.results.file_upload"
          alt=""
          style="height: 200px !important"
        />
        <video
          v-else
          class="w-100 shadow-1-strong rounded mb-2"
          style="height: 200px !important"
          controls
        >
          <source :src="this.results.file_upload" type="video/mp4" />
          <source :src="this.results.file_upload" type="video/ogg" />
        </video>
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
          <div class="col-4">
            <label> <h4 class="text-muted">Share</h4> </label><br />
            <h3 class="zero">
              <b>
                <span class="darkgreen-color">{{ this.results.share }}</span>
              </b>
            </h3>
          </div>
          <div class="col-4">
            <label> <h4 class="text-muted">Access Control</h4> </label><br />
            <h3 class="zero">
              <b>
                <span class="darkgreen-color">{{
                  this.results.access_control
                }}</span>
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
          <div class="col-4 mt-2">
            <label> <h4 class="text-muted">Comments</h4> </label><br />
            <h3 class="zero">
              <b>
                <span class="darkgreen-color">{{
                  this.results.total_comments
                }}</span>
              </b>
            </h3>
          </div>
          <div class="col-2 mt-2">
            <label> <h4 class="text-muted">Likes</h4> </label><br />
            <h3 class="zero">
              <b>
                <span class="darkgreen-color">{{
                  this.results.total_like
                }}</span>
              </b>
            </h3>
          </div>
          <div class="col-2 mt-2">
            <label> <h4 class="text-muted">User</h4> </label><br />
            <h3 class="zero">
              <b>
                <span class="darkgreen-color">{{ user.name }}</span>
              </b>
            </h3>
          </div>
          <div class="col-5 mt-2">
            <label> <h4 class="text-muted">Duration</h4> </label><br />
            <h3 class="zero">
              <b>
                <span class="darkgreen-color">{{ this.results.duration }}</span>
              </b>
            </h3>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-xl-12 col-md 12">
        <p>{{ this.results.description }}</p>
      </div>
    </div>
    <div class="row">
      <div
        class="col-5"
        :key="indextr"
        :data="item"
        v-for="(item, indextr) in lessons"
      >
        <div class="card">
          <img
            class="card-img-top portfolio-card__image"
            :src="item.file_upload"
            alt="Card image cap"
          />
          <div class="card-body">
            <h6
              class="
                card-subtitle
                mb-2
                portfolio-card__category portfolio-card__category__offices
              "
            >
              {{ item.tags }}
            </h6>
            <h4 class="card-title mb-2 portfolio-card__title">
              {{ item.title }}
            </h4>

            <div class="card-text portfolio-card__text">
              <span v-html="item.description.substring(0, 100) + '...'"></span>
              <router-link
                v-bind:to="'/lesson_detail/' + item.id"
                class="card-btn"
                >READ MORE</router-link
              >
            </div>
          </div>
        </div>
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
        .get("/api/frontend_trainingdetail/" + id)
        .then((response) => {
          //   this.$vs.loading.close();
          this.results = response.data.response;
          this.user = this.results.user;
          this.lessons = this.results.lessons;
          console.log(this.lessons);
        })
        .catch((error) => {});
    }
  },
};
</script>

<style>
.green_color {
  color: #e9bf36;
}
.darkgreen-color {
  color: #28a745 !important;
}
.card {
  margin: 2rem 1rem 2rem 1rem;
  border: none;
  border-radius: 0px;
  box-shadow: -2px 1px 8px 1px lightgrey;
}

.portfolio-card__image {
  max-height: 13rem;
}

.portfolio-card__title {
  font-family: "Barlow Condensed", sans-serif;
  font-size: 2rem;
  text-transform: uppercase;
}

.portfolio-card__category {
  font-family: "Barlow Condensed", sans-serif;
  font-size: 1rem;
  text-transform: uppercase;
}

.portfolio-card__category__offices {
  color: red;
}

.portfolio-card__category__industrial {
  color: blue;
}

.portfolio-card__category__retail {
  color: green;
}

.portfolio-card__text {
  font-family: "Abel", sans-serif;
  font-size: 1rem;
}

.portfolio-card__stage {
  color: white;
  text-transform: uppercase;
  padding: 6px;
  font-family: "Barlow Condensed", sans-serif;
}

.portfolio-card__stage__icon {
  margin-right: 5px;
}

.portfolio-card__stage__complete {
  background-color: green;
}

.portfolio-card__stage__construction {
  background-color: red;
}

.portfolio-card__stage__planning {
  background-color: lightblue;
}

.portfolio-card__link {
  font-family: "Barlow Condensed", sans-serif;
  text-transform: uppercase;
  font-size: 0.8rem;
  color: grey;
  text-decoration: underline;
  transition: 0.3s;
}

.portfolio-card__link:hover {
  color: black;
}
.card-btn {
  all: unset;
  display: block;
  margin-left: auto;
  border: 2px solid #fc9;
  padding: 10px 15px;
  border-radius: 25px;
  font-size: 10px;
  font-weight: 600;
  transition: all 0.5s;
  cursor: pointer;
  letter-spacing: 1.2px;
  width: 84px;
  height: 13px;
  text-align: center;
}
.card-btn:hover {
  color: #02b875;
  background: #eeee;
}
</style>
