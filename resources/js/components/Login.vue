<template>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
        ref="modal"
        class="modal fade"
        id="loginForm"
        data-bs-backdrop="static"
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
                                                    'fa fa-eye':
                                                        !isVisibleNewPassword,
                                                    'fas fa-eye-slash':
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
                                                    'fa fa-eye':
                                                        !isVisibleConfirmPassword,
                                                    'fas fa-eye-slash':
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
                </div>
                <div class="modal-footer">
                    <Button
                        :disabled="isValid"
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
</template>

<script>
import Button from "./Button";
import Input from "./Input";
import Label from "./Label";
import { Modal } from "bootstrap";
export default {
    name: "Login",
    data: () => ({
        loginFormModal: null,
        newpassword: "",
        confirmpassword: "",
        msg: [],
        isValid: false,
        isVisibleNewPassword: false,

        isVisibleConfirmPassword: false,
    }),
    props: {
        showModal: Boolean,
        anonymoususer_id: String,
        label: Object,
        modelValue: String,
    },
    components: { Button, Input, Label },
    watch: {
        showModal: function (val) {
            if (val === true) {
                this.modalActive();
            }
        },
        newpassword: function (val) {
            this.newpassword = val;
            this.validatePassword(val, "N");
        },
        confirmpassword: function (val) {
            this.confirmpassword = val;
            this.validatePassword(val, "C");
        },
    },
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
        hideLoginModal: function () {
            this.loginFormModal.hide();
            this.$emit("hideLoginModal");
        },
        encrypt: async function (texttoEncrypt) {
            const password = window.prompt("Password");
            const encryptedData = await encryptData(data, password);
            encryptedDataOut.value = encryptedData;
        },
        submitReport: function () {
            this.loginFormModal.hide();
            this.$emit("submitReport");
        },
        validatePassword(value, type) {
            this.isValid = true;
            if (type === "N") {
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
                    this.msg["confirmpassword"] = "";
                    this.isValid = false;
                }
            }
        },
    },
};
</script>

<style scoped>
span.errmsg {
    padding-top: 0px;
    margin-top: 0px;
    font-size: 12px;
    color: red;
}
</style>
