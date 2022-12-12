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
                    <h5 class="modal-title fw-bold" id="downloadPdfFormLabel">
                        <slot name="formname" />
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>
                            <slot name="contenttext" />
                        </h5>
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
    <div v-show="isContentVisible" id="userdetails">
        <content-to-print
            :label="label"
            :form="form"
            :fields="fields"
            :user="user"
            :datereported="datereported"
            :dropdownList="dropdownList"
            :selectedFiles="selectedFiles"
        />
    </div>
</template>

<script>
import html2pdf from "html2pdf.js";
import Label from "./Label";
import Button from "./Button";
import { watch, ref } from "vue";
import { Modal } from "bootstrap";
import ContentToPrint from "./ContentToPrint";

export default {
    name: "PasswordPdf",
    components: {
        html2pdf,
        Label,
        Button,
        ContentToPrint,
    },
    emits: ["hidePasswordPdfModal"],
    props: {
        label: Object,
        user: Object,
        showPasswordPdfModal: Boolean,
        fields: Object,
        form: Object,
        datereported: String,
        dropdownList: Object,
        selectedFiles: Object,
    },
    setup(props, { emit }) {
        const filename = props.user.complaintno;
        let isContentVisible = ref(false);
        let downloadPasswordPdfModal = ref(null);
        const hidePasswordPdfModal = () => {
            downloadPasswordPdfModal.hide();
            isContentVisible.value = false;
            emit("hidePasswordPdfModal");
        };
        const generatePDF = () => {
            const userdetails = document.getElementById("userdetails");
            isContentVisible.value = true;
            html2pdf(userdetails, {
                margin: 1,
                filename: "complaint_no_" + props.user.complaintno,
                html2canvas: { dpi: 192, letterRendering: true },
                jsPDF: {
                    unit: "in",
                    format: "a4",
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
            isContentVisible,
            hidePasswordPdfModal,
            generatePDF,
        };
    },
};
</script>

<style></style>
