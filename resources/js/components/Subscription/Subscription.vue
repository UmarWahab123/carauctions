<template>
  <the-loader v-if="this.isloading === true"></the-loader>

  <div class="row mt-5">
    <div class="col-4" :data="item" v-for="(item, indextr) in results">
      <div class="custom_box">
        <h3 class="box_title">{{ item.type }}</h3>
        <div class="mt-3 pad">
          <p class="above-price">As Low as</p>
          <p>
            <span class="amount">${{ item.price }}</span>
            <span class="term">/Mon</span>
          </p>
          <P>{{ item.description }}</P>
          <div>
            <button class="button-three">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import TheLoader from "../Loader/TheLoader.vue";
export default {
  components: { TheLoader },
  data() {
    return {
      isloading: true,
      results: [],
    };
  },
  mounted() {
    axios
      .get("/api/get_membership")
      .then((response) => {
        this.results = response.data.response;
        // this.$vs.loading.close();
        this.isloading = false;
        console.log(this.results);
      })
      .catch((error) => {});
  },
};
</script>

