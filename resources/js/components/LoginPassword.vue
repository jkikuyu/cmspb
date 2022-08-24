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
                    <div class="col-8"></div>

                    <div class="col-sm-3">
                        <Button class="btn btn-primary" type="submit">
                            Submit
                        </Button>
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

export default {
    name: "LoginPassword",
    components: {
        Label,
        Button,
    },
    data() {
        return {
            response: "",
            isVisiblePassword: false,
            msg: [],
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
            console.log(axios.defaults.headers.common["Authorization"]);
            this.$router.push("/dashboard");
        }
    },
    setup() {
        const router = new useRouter();
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
            const { data } = await axios.post("login", userDetails, {
                withCredentials: true,
            });

            axios.defaults.headers.common[
                "Authorization"
            ] = `Bearer ${data.authorisation.token}`;
            router.push({ path: "/dashboard" });
        };
        return {
            loginform,
        };
    },
    methods: {
        /*         processRequest: async function () {
            let resp = null;
            if (this.isExpired) {
                resp = await this.validatePassword();
                if (resp) {
                    this.$emit("storeToken", resp);
                }
                this.$router.push({ path: "/dashboard" });
            }
        },
 */
        validatePassword: async function () {
            let data = null;
            let token = "";
            let userDetails = {};
            if (
                /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(
                    this.userid
                )
            ) {
                userDetails = {
                    email: this.userid,
                    password: this.password,
                };
            } else {
                userDetails = {
                    userid: this.userid,
                    password: this.password,
                };
            }

            try {
                console.log(this.resp);
                const res = await fetch("http://localhost:8000/api/login", {
                    method: "POST",
                    headers: {
                        "content-type": "application/json",
                    },
                    body: JSON.stringify(userDetails),
                });
                data = await res.json();
                if (data.status === "200") {
                    let resp = {
                        token: data.authorisation.token,
                        id: data.user.id,
                    };
                    return resp;
                } else {
                    this.msg["password"] =
                        "user details provided are incorrect";
                }
            } catch (err) {
                console.log(err);
            }
        },
    },
};
</script>

<style scoped>
.navbar-toggler-icon {
    background-image: none;
}
</style>
