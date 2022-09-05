<template>
    <Header :menuitems="menuitems"></Header>
    <router-view :menuitems="menuitems"></router-view>
    <Footer></Footer>
</template>

<script>
import Header from "../js/components/Header";
import Footer from "../js/components/Footer";

export default {
    data() {
        return {
            resp: {},
            isExpired: false,
            menuitems: [],
            /*             menuitems: [
                {
                    name: "Home",
                    id: 1,
                    active: true,
                    index: 1,
                    link: "/",
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
            ],*/
        };
    },
    components: {
        Header,
        Footer,
    },
    async created() {
        this.menuitems = await this.fetchPageContents();
        console.log(this.menuitems);
    },
    methods: {
        async fetchPageContents() {
            let data = null;
            try {
                console.log(process.env.VUE_APP_WB_API_ENDPOINT);

                const res = await fetch("api/pagecontents", {
                    credentials: "include",
                });
                data = await res.json();
                //console.log(data.data);
                return data.data;
            } catch (err) {
                console.log(err);
            }
        },
        isTokenExpired: function (token) {
            if (token) {
                console.log(token);
                try {
                    const [, payload] = token.split(".");
                    const { exp: expires } = JSON.parse(window.atob(payload));
                    if (typeof expires === "number") {
                        if (Date.now() >= expires * 1000) {
                            this.isExpired = true;
                        } else {
                            this.isExpired = false;
                        }
                    }
                } catch (err) {
                    console.log(err);
                }
            }
        },
        refreshToken: async function () {
            console.log("dash");
        },
        getStoredToken: function () {
            console.log("gettoken");
            this.resp = JSON.parse(localStorage.getItem("resp"));
        },
    },
};
</script>

<style></style>
