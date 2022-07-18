import { createRouter, createWebHistory } from "vue-router";

import PageContent from "../components/PageContent";

const routes = [
    {
        path: "/",
        name: "Home",
        component: PageContent,
    },

    {
        path: "/use_website",
        name: "UseWebsite",
        component: PageContent,
    },
    {
        path: "/disclose_irreqularities",
        name: "DiscloseIrreqularities",
        component: PageContent,
    },
    {
        path: "/contacts",
        name: "Contacts",
        component: PageContent,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
