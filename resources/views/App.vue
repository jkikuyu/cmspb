<template>
    <Header :menuitems="menuitems"></Header>
    <router-view :menuitems="menuitems"></router-view>
    <Footer></Footer>
</template>

<script>
import Header from "../js/components/Header";
import Footer from "../js/components/Footer";
import { provide } from "vue";
export default {
    data() {
        return {
            menuitems: [
                {
                    name: "Home",
                    id: 1,
                    active: true,
                    index: 1,
                    link: "/home",
                },
                {
                    name: "Use of this website",
                    id: 1,
                    active: true,
                    index: 2,
                    link: "/use_website",
                },
                {
                    name: "Disclosing Irregularities",
                    id: 2,
                    active: true,
                    index: 3,
                    link: "/disclose_irreqularities",
                },
                {
                    name: "contacts",
                    id: 3,
                    active: true,
                    index: 4,
                    link: "/contacts",
                },
            ],
        };
    },
    components: {
        Header,
        Footer,
    },
};
</script>

<style></style>
