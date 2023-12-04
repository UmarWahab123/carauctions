import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: "/",
        name: "Home",
        component: import("./components/dashboard/Index.vue"),
    },
    {
        path: "/enneagram/:id",
        name: "enneagram",
        component: import("./components/test/MainTest.vue"),
    },
    {
        path: "/testresults/:id",
        name: "testresults",
        component: import("./components/test/TestResults.vue"),
    },
    {
        path: "/about",
        name: "About",
        component: import("./components/layout/Header.vue"),
    },
    {
        path: "/login",
        name: "Login",
        component: import("./components/auth/Login.vue"),
    },
    {
        path: "/register",
        name: "Register",
        component: import("./components/auth/Register.vue"),
    },
    {
        path: "/subscription",
        name: "subscription",
        component: import("./components/Subscription/Index.vue"),
    },
    {
        path: "/training",
        name: "training",
        component: import("./components/Trainings/Index.vue"),
    },

    {
        path: "/chats",
        name: "chats",
        component: import("./components/chat/Chats.vue"),
    },

    {
        path: "/training_detail/:id",
        name: "training_detail",
        component: import("./components/Trainings/Detail.vue"),
    },
    {
        path: "/lesson_detail/:id",
        name: "lesson_detail",
        component: import("./components/Lesson/Index.vue"),
    },
    {
        path: "/profile",
        name: "profile",
        component: import("./components/Profile/Profile.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.afterEach(() => {
    // console.log(window.location.href);
    var login = window.location.href.indexOf("login") > -1;
    var register = window.location.href.indexOf("register") > -1;

    // console.log('main router',localStorage.userInfo);
    // test=Object.entries(test);
    if (localStorage.userInfo == null && login == false && register == false) {
        // alert('sdf');

        window.location.href = "/login";
    }
    if (localStorage.userInfo != null && login == true) {
        // alert('sdf');

        window.location.href = "/";
    }
});

export default router;
