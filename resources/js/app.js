require("./bootstrap");
import { createApp } from "vue";
import router from "../js/router";
import axios from "../js/interceptors/axios";

import App from "../views/App";
import "v-calendar/dist/style.css";
createApp(App).use(router).mount("#app");
