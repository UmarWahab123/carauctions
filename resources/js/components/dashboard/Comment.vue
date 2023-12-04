<template>
  <div class="row" :data="item2" v-for="(item2, indextr) in commentsdata">
    <div class="col-12">
      <div class="d-flex align-items-center">
        <div class="image">
          <img
            src="https://www.w3schools.com/w3images/avatar6.png"
            class="circleimg"
            style="height: 50px !important; width: 50px !important"
          />
        </div>
        <div class="ms-3 w-100">
          <p class="mb-0 mt-0">
            <b> test</b>
            <span class="text-primary"> @username</span>
          </p>
          <span class="mb-0 mt-0">{{ item2.comment }}</span
          ><br />

          <span style="color: #8a96a3; font-size: 13px">day</span>
        </div>
      </div>
    </div>
  </div>
  <span v-if="this.commentsdata.length === 5">Show All Coments</span>
</template>

<script>
export default {
  props: ["commentsdata"],
  data: () => ({
    // commentsdata: [],
    id: "",
  }),
  mounted() {
    var userInfo = JSON.parse(localStorage.getItem("userInfo"));
    var userId = userInfo.id;
    this.id = userId;
    console.log(this.commentsdata.length);
  },
  methods: {},
};
</script>
