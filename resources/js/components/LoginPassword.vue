<template>
    <main class="log-in">
        <form @submit.prevent="loginform">
            <div class="d-flex flex-column">
                <div class="row">
                    <span class="errmsg" v-if="msg.password">
                        <h5>{{ msg.password }}</h5></span
                    >

                    <div class="col-sm-5 pt-5">
                        <Label :label="label.userid" />
                    </div>
                    <div class="col-sm-5 pt-5">
                        <input
                            class="form-control"
                            v-model="userid"
                            name="userid"
                            type="text"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 pt-3">
                        <Label :label="label.password" />
                    </div>
                    <div class="form-group col-sm-5 pt-3 m-0">
                        <div class="input-group">
                            <input
                                class="form-control"
                                :type="isVisiblePassword ? 'text' : 'password'"
                                v-model="password"
                                name="password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <a
                                        src="#"
                                        @click="
                                            isVisiblePassword =
                                                !isVisiblePassword
                                        "
                                        ><i
                                            :class="{
                                                'fas fa-eye-slash':
                                                    !isVisiblePassword,
                                                'fa fa-eye': isVisiblePassword,
                                            }"
                                        ></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-sm-5">
                        <VueClientRecaptcha
                            :value="captchaValue"
                            @getCode="getCaptchaCode"
                            @isValid="checkValidCaptcha"
                            :key="vueclientrecaptchakey"
                        />
                    </div>
                    <div class="col-sm-5 pt-4 input-group-append pb-captcha">
                        <input
                            class="form-control"
                            type="text"
                            v-model="captchaValue"
                        />
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-8"></div>

                    <div class="col-sm-3 ms-3">
                        <button class="btn btn-primary" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</template>

<script>
import Label from "./Label";
import Button from "./Button";
import axios from "axios";
import { useRouter } from "vue-router";
import { ref, reactive } from "vue";
import VueClientRecaptcha from "vue-client-recaptcha";

export default {
    name: "LoginPassword",
    components: {
        VueClientRecaptcha,

        Label,
        Button,
    },
    emits: ["saveDropDownList"],

    data() {
        return {
            response: "",
            isVisiblePassword: false,
            //msg: [],
            userid: "",
            password: "",
            label: {
                userid: {
                    name: "userid",
                    title: "Enter user name or anonymous id",
                },
                password: {
                    name: "password",
                    title: "Enter password",
                },
            },
        };
    },
    mounted() {
        if (axios.defaults.headers.common["Authorization"]) {
            this.$router.push("/ims/dashboard");
        }
    },
    setup(props, { emit }) {
        const router = new useRouter();
        const msg = reactive({ password: "" });
        const captchaValue = ref(null);
        let isValidCaptcha = ref("false");
        let vueclientrecaptchakey = ref(0);

        const loginform = async (e) => {
            let userDetails = {};
            const form = new FormData(e.target);
            const inputs = Object.fromEntries(form.entries());
            if (
                /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(
                    inputs.userid
                )
            ) {
                userDetails = {
                    email: inputs.userid,
                    password: inputs.password,
                };
            } else {
                userDetails = {
                    userid: inputs.userid,
                    password: inputs.password,
                };
            }
            try {
                const { data } = await axios.post("login", userDetails, {
                    withCredentials: true,
                });
                if (data.status === "200" && isValidCaptcha) {
                    axios.defaults.headers.common[
                        "Authorization"
                    ] = `Bearer ${data.authorisation.token}`;
                    sessionStorage.setItem(
                        "user_token",
                        data.authorisation.token
                    );
                    router.push({
                        name: "Dashboard",
                        params: { id: data.user.id },
                    });
                    //setDropDownList();
                } else {
                    // window.location.reload();
                    if (vueclientrecaptchakey.value >= 3) {
                        window.location.reload();
                    }

                    forceRerender();
                    msg.password = "Enter the correct captcha code";
                }
            } catch (error) {
                //window.location.reload();
                if (vueclientrecaptchakey.value >= 3) {
                    window.location.reload();
                }

                forceRerender();
                msg.password = "user details provided are incorrect";
            }
        };
        const getCaptchaCode = (value) => {
            return value;
        };
        const forceRerender = () => {
            vueclientrecaptchakey.value += 1;
        };
        const checkValidCaptcha = (value) => {
            isValidCaptcha = value;
        };
        const saveDropDownList = () => {
            //console.log("loginpasword");
            emit("saveDropDownList");

            //console.log("Login....");
        };
        return {
            loginform,
            getCaptchaCode,
            checkValidCaptcha,
            captchaValue,
            vueclientrecaptchakey,
            msg,
        };
    },
};
</script>

<style scoped>
.navbar-toggler-icon {
    background-image: none;
}
</style>
