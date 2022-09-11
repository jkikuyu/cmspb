<template>
    <div class="row">
        <div class="col-sm-6 d-none d-lg-block d-md-block">
            <ContentImage :contentImage="imageDetail" />
        </div>
        <div class="col-sm-6">
            <h2>{{ page }}</h2>
            <hr />
            <LoginPassword />
        </div>
    </div>
</template>

<script>
import LoginPassword from "./LoginPassword";
import ContentImage from "./ContentImage";

export default {
    components: {
        LoginPassword,
        ContentImage,
    },
    data() {
        return {
            response: {},
            isExpired: false,
            page: "Login Details",
            imageDetail: {
                name: "LoginImage",
                imagepath: "images/cheetah.jpg",
            },
            logintext: {
                userid: {
                    name: "userid",
                    title: "Enter user name or anonymous id",
                },
                confirmpassword: {
                    name: "password",
                    title: "Enter password",
                },
            },

            newpassword: "",
            msg: [],
            isVisibleNewPassword: false,
        };
    },
    /*  mounted() {
        this.response = this.getStoredToken();
        if (this.response) {
            this.isExpired = this.isTokenExpired(this.response.token);
            if (!this.isExpired) {
                this.$router.push({ path: "/dashboard" });
            }
        }
    }, */
    props: {
        dropdownList: String,
    },
    watch: {
        $route: function (value) {
            // lets watch for route changes on our
            console.log("dash");
        },
    },

    methods: {
        storeToken: function (resp) {
            localStorage.setItem("resp", JSON.stringify(resp));
        },
        getStoredToken: function () {
            return JSON.parse(localStorage.getItem("resp"));
        },
    },
};
</script>

<style></style>
