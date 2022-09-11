import { createRouter, createWebHistory } from "vue-router";

import PageContent from "../components/PageContent";
import MakeReport from "../components/MakeReport";
import Login from "../components/Login";
import Dashboard from "../components/Dashboard";

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
        path: "/confidentiality_name_identity",
        name: "UseWebsite",
        component: PageContent,
    },
    {
        path: "/reporting_irregularities",
        name: "ReportingIrregularities",
        component: PageContent,
    },
    {
        path: "/follow_up",
        name: "FollowUp",
        component: PageContent,
    },

    {
        path: "/faqs",
        name: "FAQs",
        component: PageContent,
    },
    {
        path: "/contact_us",
        name: "Contacts",
        component: PageContent,
    },
    {
        path: "/makereport",
        name: "MakeReport",
        component: MakeReport,
        props: true,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
        props: true,
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
        props: true,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
