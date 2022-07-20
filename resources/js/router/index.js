import { createRouter, createWebHistory } from "vue-router";

import PageContent from "../components/PageContent";
import MakeReport from "../components/MakeReport";

const routes = [
    {
        path: "/",
        name: "Welcome",
        component: PageContent,
    },
    {
        path: "/home",
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
    {
        path: "/makereport",
        name: "MakeReport",
        component: MakeReport,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
