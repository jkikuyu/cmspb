<template>
    <div class="row">
        <div class="col-sm-6 d-none d-lg-block d-md-block">
            <ContentImage :contentImage="imageDetail" />
        </div>
        <div class="col-sm-6">
            <h2>{{ page }}</h2>
            <hr />
            <LoginPassword @saveDropDownList="saveDropDownList" />
        </div>
    </div>
</template>

<script>
import LoginPassword from "./LoginPassword";
import ContentImage from "./ContentImage";

export default {
    name: "Login",

    components: {
        LoginPassword,
        ContentImage,
    },
    emits: ["saveDropDownList"],
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

    methods: {
        storeToken: function (resp) {
            sessionStorage.setItem("resp", JSON.stringify(resp));
        },
        getStoredToken: function () {
            return JSON.parse(sessionStorage.getItem("resp"));
        },
        saveDropDownList: function () {
            this.$emit("saveDropDownList");
            //console.log("Login....");
        },
    },
};
</script>

<style></style>
