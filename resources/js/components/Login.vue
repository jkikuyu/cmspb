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
};
</script>

<style></style>
