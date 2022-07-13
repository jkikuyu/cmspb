import {createRouter, createWebHistory} from "vue-router"

import ComplaintsIndex from "../components/complaints/ComplaintsIndex"
const routes = [
    {   path: "/home",
        name: "complaints.index",
        component: ComplaintsIndex
    },

    
    ]
const router = createRouter(
    {
        history: createWebHistory(),
        routes,
    })
export default router   

