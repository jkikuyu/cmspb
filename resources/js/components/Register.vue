<template>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
        ref="modal"
        class="modal fade"
        id="loginForm"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="loginFormLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginFormLabel">
                        <slot name="formname" />
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 pt-2">
                            <Label :label="label.anonymousid" />
                        </div>
                        <div class="col-sm-4">
                            <Input
                                class="form-control-plaintext"
                                readonly
                                :value="anonymoususer_id"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 pt-2">
                            <Label :label="label.newpassword" />
                        </div>
                        <div class="form-group col-sm-6 m-0">
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    :type="
                                        isVisibleNewPassword
                                            ? 'text'
                                            : 'password'
                                    "
                                    v-model="newpassword"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <a
                                            src="#"
                                            @click="
                                                isVisibleNewPassword =
                                                    !isVisibleNewPassword
                                            "
                                            ><i
                                                :class="{
                                                    'fa fa-eye-slash':
                                                        !isVisibleNewPassword,
                                                    'fas fa-eye':
                                                        isVisibleNewPassword,
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
                    <div class="row">
                        <div class="col-sm-5 pt-2">
                            <Label :label="label.confirmpassword" />
                        </div>
                        <div class="form-group col-sm-6 m-0">
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    :type="
                                        isVisibleConfirmPassword
                                            ? 'text'
                                            : 'password'
                                    "
                                    v-model="confirmpassword"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <a
                                            src="#"
                                            @click="
                                                isVisibleConfirmPassword =
                                                    !isVisibleConfirmPassword
                                            "
                                            ><i
                                                :class="{
                                                    'fa fa-eye-slash':
                                                        !isVisibleConfirmPassword,
                                                    'fas fa-eye':
                                                        isVisibleConfirmPassword,
                                                }"
                                            ></i
                                        ></a>
                                    </div>
                                </div>
                            </div>

                            <span class="errmsg" v-if="msg.confirmpassword">{{
                                msg.confirmpassword
                            }}</span>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <p class="fw-bold m-0">Note:</p>
                        <div class="col-sm-12 pt-2">
                            <ul>
                                <li>
                                    Write down your anonymous User ID and
                                    password. You need them to login and track
                                    the status of your report
                                </li>
                                <li>Keep your login details safe.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 ms-4">
                        <input
                            type="checkbox"
                            @click="isAgree = !isAgree"
                            id="iagree"
                            autocomplete="off"
                        />
                        I have read and understood
                        <a
                            href="javascript:void(0)"
                            class="link-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#userManualModal"
                            >the steps and guidelines</a
                        >
                    </div>
                </div>

                <div class="modal-footer">
                    <Button
                        :disabled="!(isValid && isAgree)"
                        type="button"
                        button="submit"
                        data-bs-dismiss="modal"
                        @click="submitReport"
                    >
                        Submit
                    </Button>
                    <Button
                        type="button"
                        button="cancel"
                        @click="hideLoginModal"
                    >
                        Cancel
                    </Button>
                </div>
            </div>
        </div>
    </div>
    <div
        class="modal"
        id="userManualModal"
        aria-hidden="true"
        aria-labelledby="userManualModal"
        tabindex="-1"
    >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userManualTitle">
                        Whistleblower User Manual
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">111</div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from "./Button";
import Input from "./Input";
import Label from "./Label";
import LoginPassword from "./LoginPassword";
import { Modal } from "bootstrap";
export default {
    name: "Login",
    data: () => ({
        loginFormModal: null,
        confirmpassword: "",
        newpassword: "",
        msg: [],
        isValid: true,
        isAgree: false,
        isVisibleNewPassword: false,

        isVisibleConfirmPassword: false,
    }),

    props: {
        showModal: Boolean,
        anonymoususer_id: String,
        label: Object,
        modelValue: String,
    },
    components: { Button, Input, Label, LoginPassword },
    mounted() {
        const userManalModal = document.querySelector("#userManualModal");
        userManalModal.addEventListener("show.bs.modal", (event) => {
            const link = "http://localhost/demo.html";

            fetch(link)
                .then((res) => res.text())
                .then((html) => {
                    userManalModal.querySelector(".modal-body").innerHTML =
                        html;
                });
        });
    },
    watch: {
        showModal: function (val) {
            if (val === true) {
                this.modalActive();
            }
        },
        newpassword: function (val) {
            this.validatePassword(val, "N");
        },
        confirmpassword: function (val) {
            this.confirmpassword = val;
            this.validatePassword(val, "C");
        },
    },
    emits: ["hideLoginModal", "submitReport"],
    methods: {
        togglePassword: function () {
            this.isVisibleNewPassword = !this.isVisibleNewPassword;
        },
        modalActive: function () {
            this.loginFormModal = new Modal(
                document.getElementById("loginForm"),
                {
                    target: "#loginForm",
                    backdrop: "static",
                }
            );
            this.loginFormModal.show();
        },
        launchUserManual: function () {
            console.log("here");
            this.userManualModal = new Modal(
                document.getElementById("userManualModal"),
                {
                    target: "#userManualModal",
                }
            );
            this.userManualModal.show();
        },
        hideLoginModal: function () {
            this.loginFormModal.hide();
            this.$emit("hideLoginModal");
        },
        submitReport: function () {
            this.loginFormModal.hide();
            this.$emit("submitReport", this.newpassword);
        },
        validatePassword(value, type) {
            this.isValid = false;

            let regularExpression =
                /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
            if (type === "N") {
                this.newpassword = value;
                if (value.length < 8) {
                    this.msg["newpassword"] = "( " + value.length + "/8 )";
                } else {
                    this.msg["newpassword"] = "";
                }
            } else {
                if (value !== this.newpassword) {
                    this.msg["confirmpassword"] =
                        "New password and confirm password must be the same";
                } else {
                    if (regularExpression.test(this.newpassword)) {
                        this.isValid = true;
                        this.msg["confirmpassword"] = "";
                    } else {
                        this.msg["confirmpassword"] =
                            "Password should contain numbers, letters and special characters";
                    }
                }
            }
        },
    },
};
</script>

<style>
span.errmsg {
    padding-top: 0px;
    margin-top: 0px;
    font-size: 12px;
    color: red;
}
</style>
