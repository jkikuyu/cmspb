import { createRouter, createWebHistory } from "vue-router";

import PageContent from "../components/PageContent";
import MakeReport from "../components/MakeReport";
import Login from "../components/Login";
import Dashboard from "../components/Dashboard";
import axios from "axios";

const routes = [
    {
        path: "/ims",
        name: "Welcome",
        component: PageContent,
    },
    {
        path: "/home",
        name: "Home",
        component: PageContent,
    },
    {
        path: "/ims/confidentiality_name_identity",
        name: "UseWebsite",
        component: PageContent,
    },
    {
        path: "/ims/reporting_irregularities",
        name: "ReportingIrregularities",
        component: PageContent,
    },
    {
        path: "/ims/follow_up",
        name: "FollowUp",
        component: PageContent,
    },

    {
        path: "/ims/faqs",
        name: "FAQs",
        component: PageContent,
    },
    {
        path: "/ims/contact_us",
        name: "Contacts",
        component: PageContent,
    },
    {
        path: "/ims/makereport",
        name: "MakeReport",
        component: MakeReport,
        props: true,
    },
    {
        path: "/ims/login",
        name: "Login",
        component: Login,
        props: true,
    },
    {
        path: "/ims/dashboard",
        name: "Dashboard",
        component: Dashboard,
        props: true,
        beforeEnter: (to, from, next) => {
            if (axios.defaults.headers.common["Authorization"]) {
                next();
            } else {
                next("/ims/login");
            }
        },
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        beforeEnter: (to, from, next) => {
            next("/ims/");
        },
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
