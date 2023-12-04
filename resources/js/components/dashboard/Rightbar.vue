   <template>
  <div class="rightbar">
    <div class="form-group col-xs-6 mb-3">
      <div class="inner-addon right-addon">
        <input type="text" class="form-control" placeholder="Search" />
      </div>
    </div>
    <div class="mb-3">
      <span>SUGGESTIONS</span>
    </div>
    <div :key="indextr" :data="item" v-for="(item, indextr) in results">
      <img
        v-if="
          item.type === 'tutorial' ||
          item.type === 'course' ||
          item.type === 'certifiedcourses'
        "
        :src="item.file_upload"
        class="w-100 shadow-1-strong rounded mb-2"
        alt=""
        style="height: 100px !important"
      />
      <video
        v-else
        class="w-100 shadow-1-strong rounded mb-2"
        style="height: 200px !important"
        controls
      >
        <source :src="item.file_upload" type="video/mp4" />
        <source :src="item.file_upload" type="video/ogg" />
      </video>
    </div>
  </div>
</template>

<script>
export default {
  props: ["results2"],
  data: () => ({
    path: "https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg",
    items: [{ message: "Foo" }, { message: "Bar" }],
    results: [],
  }),

  mounted() {
    var userInfo = JSON.parse(localStorage.getItem("userInfo"));
    var userId = userInfo.id;
    // console.log(userId);
    axios
      .get("/api/all_training/" + userId)
      .then((response) => {
        this.results = response.data.response;
        // this.$vs.loading.close();
        // console.log(this.results);
      })
      .catch((error) => {});
  },
  methods: {},
};
</script>
