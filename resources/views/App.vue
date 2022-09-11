<template>
    <Header
        :menuitems="menuitems"
        @saveDropDownList="saveDropDownList"
    ></Header>
    <router-view
        :menuitems="menuitems"
        @saveDropDownList="saveDropDownList"
    ></router-view>
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
            dropdowns: {
                allegetypelist: [
                    {
                        name: "Fraud",
                        id: 1,
                    },
                    {
                        name: "Corruption",
                        id: 2,
                    },
                    {
                        name: "Theft",
                        id: 3,
                    },
                    {
                        name: "Unethical Behaviour",
                        id: 4,
                    },
                ],
                complainantlist: [
                    {
                        name: "Contractor",
                        id: 1,
                    },
                    {
                        name: "Former Employee",
                        id: 2,
                    },
                    {
                        name: "Contract Employee",
                        id: 3,
                    },
                    {
                        name: "Citizen",
                        id: 4,
                    },
                    {
                        name: "Supplier",
                        id: 5,
                    },
                ],
                yesno: [
                    {
                        name: "No",
                        id: 0,
                    },
                    {
                        name: "Yes",
                        id: 1,
                    },
                ],
            },
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
    },
    methods: {
        async fetchPageContents() {
            let data = null;
            try {
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
        saveDropDownList: function () {
            localStorage.setItem(
                "dropdownlist",
                JSON.stringify(this.dropdowns)
            );
        },
        getStoredToken: function () {
            console.log("gettoken");
            this.resp = JSON.parse(localStorage.getItem("resp"));
        },
    },
};
</script>

<style></style>
