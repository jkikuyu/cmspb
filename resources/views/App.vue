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
import axios from "axios";
export default {
    data() {
        return {
            resp: {},
            isExpired: false,
            menuitems: [],
            dropdowns: {
                allegetypelist: [
                    {
                        name: "Bribery",
                        id: 1,
                    },
                    {
                        name: "Corruption",
                        id: 2,
                    },
                    {
                        name: "Fraud",
                        id: 3,
                    },

                    {
                        name: "Theft",
                        id: 4,
                    },
                    {
                        name: "Other Unethical Behaviour",
                        id: 5,
                    },
                ],
                complainantlist: [
                    {
                        name: "Employee",
                        id: 1,
                    },
                    {
                        name: "Ex-Employee",
                        id: 2,
                    },
                    {
                        name: "Contractor",
                        id: 3,
                    },

                    {
                        name: "Contract Employee",
                        id: 4,
                    },
                    {
                        name: "Visitor",
                        id: 5,
                    },
                    {
                        name: "Supplier",
                        id: 6,
                    },
                    {
                        name: "Other",
                        id: 7,
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
                complaintstatus: [
                    {
                        name: "Pending",
                        id: 0,
                    },
                    {
                        name: "On going",
                        id: 1,
                    },
                    {
                        name: "Completed",
                        id: 2,
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
                const { data } = await axios.get("pagecontents", {
                    withCredentials: true,
                });
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
            sessionStorage.setItem(
                "dropdownlist",
                JSON.stringify(this.dropdowns)
            );
        },
        getStoredToken: function () {
            console.log("gettoken");
            this.resp = JSON.parse(sessionStorage.getItem("resp"));
        },
    },
};
</script>

<style></style>
