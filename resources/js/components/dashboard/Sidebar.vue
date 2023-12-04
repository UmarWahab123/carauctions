   <template>
  <nav class="sidebar">
    <div class="avatar">
      <img
        width="50px"
        height="50px"
        class="rounded-circle sidebar_img"
        alt="100x100"
        :src="this.dp"
        data-holder-rendered="true"
      />
    </div>
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <router-link class="nav-link" to="/">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-home"
            >
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Home
          </router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-file"
            >
              <path
                d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"
              ></path>
              <polyline points="13 2 13 9 20 9"></polyline>
            </svg>
            Notifications
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-shopping-cart"
            >
              <circle cx="9" cy="21" r="1"></circle>
              <circle cx="20" cy="21" r="1"></circle>
              <path
                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"
              ></path>
            </svg>
            Messages
          </a>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/training">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-users"
            >
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            Trainings
          </router-link>
        </li>
        <li class="nav-item">
          <router-link
            class="nav-link sub {{activeClass}} "
            to="/subscription"
            id="sub"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-bar-chart-2"
            >
              <line x1="18" y1="20" x2="18" y2="10"></line>
              <line x1="12" y1="20" x2="12" y2="4"></line>
              <line x1="6" y1="20" x2="6" y2="14"></line>
            </svg>
            Subscriptions
          </router-link>
        </li>
                <li class="nav-item">
       
          <a class="nav-link" target="_blank" href="/enneagram/en">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-bar-chart-2"
            >
              <line x1="18" y1="20" x2="18" y2="10"></line>
              <line x1="12" y1="20" x2="12" y2="4"></line>
              <line x1="6" y1="20" x2="6" y2="14"></line>
            </svg>
            Enneagram
          </a>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/profile">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-layers"
            >
              <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
              <polyline points="2 17 12 22 22 17"></polyline>
              <polyline points="2 12 12 17 22 12"></polyline>
            </svg>

            My Profile
          </router-link>
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            href="#"
            @click="
              {
                logout();
              }
            "
          >
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
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
              <polyline points="16 17 21 12 16 7"></polyline>
              <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  props: ["results2"],
  data: () => ({
    id: "",
    dp:"",
    activeClass: "active",
    results: { dp: "" },
  }),

  mounted() {
    var userInfo = JSON.parse(localStorage.getItem("userInfo"));
    var userId = userInfo.id;
    this.dp=userInfo.dp;
    // console.log(userId);
    // console.log(this.$router.currentRoute);
    console.log(this.$route.name);

    if (this.$route.name == "subscription") {
      this.activeClass = "active";
    }
    axios
      .get("/api/get_user/" + userId)
      .then((response) => {
        this.results = response.data.response;
        // this.$vs.loading.close();
        // console.log(this.results);
      })
      .catch((error) => {});
  },
  methods: {
    changeClass() {
      var test = document.getElementById("sub");
      alert(test);
    },
    logout() {
      //   axios
      //     .post("/api/logout")
      //     .then((response) => {
      //       //   this.results = response.data.response;
      //       // console.log(this.results);

      //     })
      //     .catch((error) => {});
      localStorage.clear();
      this.$router.push("/login");
    },
  },
};
</script>
