require("./bootstrap");
window.Vue = require("vue").default;
import { createApp } from "vue";
import router from "./router"; // Vue Router
// import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import Notifications from "@kyvg/vue3-notification";
import MainTest from "./components/test/MainTest.vue";

// Vue.component('font-awesome-icon', FontAwesomeIcon);
// import Header from './components/layout/Header.vue';
const app = createApp({});
app.use(router, MainTest).mount("#app");
app.use(Notifications);
app.use(MainTest);
