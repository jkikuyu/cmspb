require("./bootstrap");
import { createApp } from "vue";
import router from "../js/router";
import App from "../views/App";

createApp(App).use(router).mount("#app");
