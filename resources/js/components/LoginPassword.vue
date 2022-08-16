<template>
    <div class="d-flex flex-column">
        <div class="row">
            <div class="col-sm-5 pt-5">
                <Label :label="label.userid" />
            </div>
            <div class="col-sm-5 pt-5">
                <input class="form-control" v-model="userid" type="text" />
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
                    />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <a
                                src="#"
                                @click="isVisiblePassword = !isVisiblePassword"
                                ><i
                                    :class="{
                                        'fa fa-eye': !isVisiblePassword,
                                        'fas fa-eye-slash': isVisiblePassword,
                                    }"
                                ></i
                            ></a>
                        </div>
                    </div>
                </div>

                <span class="errmsg" v-if="msg.newpassword">{{
                    msg.newpassword
                }}</span>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-8"></div>

            <div class="col-sm-3">
                <Button
                    class="btn btn-primary mx-2"
                    type="button"
                    button="submit"
                    @click="validatePassword"
                >
                    Submit
                </Button>
            </div>
        </div>
    </div>
</template>

<script>
import Label from "./Label";
import Button from "./Button";
export default {
    components: {
        Label,
        Button,
    },
    data() {
        return {
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

    methods: {
        processRequest: async function () {
            let token = validatePassword();
            if (token) {
                router.push("dashboard");
            }
        },
        validatePassword: async function () {
            let data = null;
            let token = "";
            if (
                /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)
            ) {
                let userDetails = {
                    email: this.userid,
                    password: this.password,
                };
            } else {
                let userDetails = {
                    userid: this.userid,
                    password: this.password,
                };
            }

            try {
                const res = await fetch("http://localhost:8000/api/login", {
                    method: "POST",
                    headers: {
                        "content-type": "application/json",
                    },
                    body: JSON.stringify(userDetails),
                });
                data = await res.json();
                token = data.authorisation.token;

                return token;
            } catch (err) {
                console.log(err);
            }
        },
    },
};
</script>

<style></style>
