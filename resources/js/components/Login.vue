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
                    <h5 class="modal-title" id="loginFormLabel">Modal title</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <Button
                        type="button"
                        button="submit"
                        data-bs-dismiss="modal"
                    >
                        Login
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
import { Modal } from "bootstrap";
export default {
    name: "Login",
    data: () => ({
        loginFormModal: null,
    }),
    props: {
        showModal: Boolean,
    },
    components: { Button },
    watch: {
        showModal: function (val) {
            if (val === true) {
                this.modalActive();
            }
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
    },
};
</script>

<style scoped></style>
