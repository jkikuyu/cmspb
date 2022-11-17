<template>
    <div
        ref="modal"
        class="modal fade"
        id="downloadPasswordPdf"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="downloadPasswordPdfLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="loginFormLabel">
                        <slot name="formname" />
                    </h5>
                </div>
                <div class="modal-body" id="userdetails">
                    <div class="row">
                        <h5 class="fw-bold">
                            Complaint No. {{ user.complaintno }} User
                            Credentials
                        </h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 pt-2">
                            <Label :label="label.anonymousid" />
                        </div>
                        <div class="col-sm-4 pt-2">
                            {{ user.userid }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 pt-2">
                            <Label :label="label.password" />
                        </div>
                        <div class="col-sm-4 pt-2">
                            {{ user.password }}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <Button
                        type="button"
                        button="submit"
                        @click="generatePDF()"
                    >
                        Download
                    </Button>

                    <Button
                        type="button"
                        button="cancel"
                        @click="hidePasswordPdfModal()"
                    >
                        Close
                    </Button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import html2pdf from "html2pdf.js";
import Label from "./Label";
import Button from "./Button";
import { watch, ref } from "vue";
import { Modal } from "bootstrap";

export default {
    name: "PasswordPdf",
    components: {
        html2pdf,
        Label,
        Button,
    },
    emits: ["hidePasswordPdfModal"],
    props: {
        label: Object,
        user: Object,
        showPasswordPdfModal: Boolean,
    },
    setup(props, { emit }) {
        const filename = props.user.complaintno;
        let downloadPasswordPdfModal = ref(null);
        const hidePasswordPdfModal = () => {
            downloadPasswordPdfModal.hide();
            emit("hidePasswordPdfModal");
        };
        const generatePDF = () => {
            const userdetails = document.getElementById("userdetails");
            /*let h5 = document.createElement("h5");
                         h5.innerHTML =
                "Complaint No." + props.user.complaintno + "User Credentials";
            h5.className = "fw-bold text-center";
            h5.setAttribute("id","complaintno")
            userdetails.insertBefore(h5, userdetails.firstChild);
            isPrintPdf = true; */
            html2pdf(userdetails, {
                margin: 1,
                filename: "complaint_no_" + props.user.complaintno,
                html2canvas: { dpi: 192, letterRendering: true },
                jsPDF: {
                    unit: "in",
                    format: "letter",
                    orientation: "portrait",
                },
            });
        };

        const modalActive = () => {
            downloadPasswordPdfModal = new Modal(
                document.getElementById("downloadPasswordPdf"),
                {
                    target: "#downloadPasswordPdf",
                    backdrop: "static",
                }
            );
            downloadPasswordPdfModal.show();
        };
        watch(
            () => props.showPasswordPdfModal,
            (newval, oldval) => {
                if (newval == true) {
                    modalActive();
                }
            }
        );
        return {
            downloadPasswordPdfModal,
            hidePasswordPdfModal,
            generatePDF,
        };
    },
};
</script>

<style></style>
