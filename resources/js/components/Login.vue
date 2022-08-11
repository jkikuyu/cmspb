<template>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
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
                    <!-- <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button> -->
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
                        <div class="col-sm-4">
                            <Input
                                v-model="newpassword"
                                id="newpassword"
                                name="newpassword"
                                placeholder="Password"
                                type="Password"
                            /><br />
                            <span v-if="msg.password">{{ msg.password }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 pt-2">
                            <Label :label="label.confirmpassword" />
                        </div>
                        <div class="col-sm-4">
                            <Input
                                v-model="confirmpassword"
                                id="confirmpassword"
                                name="confirmpassword"
                                placeholder="Confirm Password"
                                type="Password"
                            /><br />
                            <span v-if="msg.confirmpassword">{{
                                msg.confirmpassword
                            }}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <Button
                        :disabled="!(msg.newpassword || msg.confirmpassword)"
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
    }),
    props: {
        showModal: Boolean,
        anonymoususer_id: String,
        label: Object,
    },
    components: { Button, Input, Label },
    watch: {
        showModal: function (val) {
            if (val === true) {
                this.modalActive();
            }
        },
        anonymoususer_id: function (val) {
            console.log(val);
        },
        newpassword: function (val) {
            this.newpassword = val;
            console.log(val);
            this.validatePassword(val, "N");
        },
        confirmpassword: function (val) {
            console.log(val);
            this.confirmpassword = val;
            this.validatePassword(val, "C");
        },
    },

    methods: {
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
            this.$emit("hideLoginModal");
        },
        validatePassword(value, type) {
            if (type === "N") {
                let difference = 8 - value.length;
                if (value.length < 8) {
                    this.msg["password"] =
                        "Must be 8 characters! " +
                        difference +
                        " characters left";
                } else {
                    this.msg["password"] = "";
                }
            } else {
                if (value !== this.newpassword) {
                    this.msg["confirmpassword"] =
                        "New password and confirm password must be the same";
                } else {
                    this.msg["confirmpassword"] = "";
                }
            }
        },
    },
};
</script>

<style scoped>
span {
    padding-top: 0px;
    margin-top: 0px;
    font-size: 12px;
    color: red;
}
</style>
