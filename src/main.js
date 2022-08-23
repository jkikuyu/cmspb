import "/public/css/app.css";
import { createApp } from "vue";
import App from "../resources/views/App.vue";
import router from "../resources/js/router";
import axios from "../resources/js/interceptors/axios";

import "v-calendar/dist/style.css";

createApp(App).use(router).mount("#app");
import "bootstrap/dist/js/bootstrap.bundle.min.js";
