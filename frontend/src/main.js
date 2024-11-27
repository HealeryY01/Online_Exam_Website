import { createApp } from "vue";
import { createPinia } from "pinia";
import piniaPersist from "pinia-plugin-persist";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "./plugins/axios";
import "./style.css";

const app = createApp(App);
const pinia = createPinia();
pinia.use(piniaPersist); // Sử dụng plugin persist trong Pinia

app.config.globalProperties.$axios = axios;
app.use(router);
app.use(store);
app.use(pinia);
app.mount("#app");
