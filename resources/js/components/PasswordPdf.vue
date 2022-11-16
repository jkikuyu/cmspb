<template>
    <div
        ref="modal"
        class="modal fade"
        id="downloadPasswordPDF"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="downloadPasswordPDFLabel"
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
                    <vue3-html2pdf
                        :show-layout="false"
                        :float-layout="true"
                        :enable-download="true"
                        :preview-modal="true"
                        :paginate-elements-by-height="1400"
                        filename="filename"
                        :pdf-quality="2"
                        :manual-pagination="false"
                        pdf-format="a4"
                        pdf-orientation="landscape"
                        pdf-content-width="800px"
                        @progress="onProgress($event)"
                        @hasStartedGeneration="hasStartedGeneration()"
                        @hasGenerated="hasGenerated($event)"
                        ref="html2Pdf"
                    >
                        <template v-slot:pdf-content>
                            <div class="row">
                                <div class="col-sm-5 pt-2">
                                    <Label :label="label.anonymousid" />
                                </div>
                                <div class="col-sm-4">
                                    {{ user.userid }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 pt-2">
                                    <Label :label="label.password" />
                                </div>
                                <div class="col-sm-4">
                                    {{ user.password }}
                                </div>
                            </div>
                        </template>
                    </vue3-html2pdf>
                </div>
                <div class="modal-footer">
                    <Button
                        type="button"
                        button="cancel"
                        @click="hidePasswordPDFModal()"
                    >
                        Cancel
                    </Button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue3Html2pdf from "vue3-html2pdf";
import Label from "./Label";
import Button from "./Button";
import { watch, ref, onMounted } from "vue";

export default {
    name: "PasswordPdf",
    components: {
        Vue3Html2pdf,
        Label,
        Button,
    },
    emits: ["hidePasswordPDFModal"],
    props: {
        label: Object,
        user: Object,
        showPasswordPDFModal: Boolean,
    },
    Setup(props, { emit }) {
        const filename = props.user.complaintno;
        console.log(props.showPasswordPDFModal);
        let downloadPasswordPDFModal = ref(null);
        const hidePasswordPDFModal = () => {
            downloadPasswordPDFModal.hide();
            emit("hidePasswordPDFModal");
        };
        const generatePDF = () => {
            this.$refs.html2Pdf.generatePdf();
        };
        const modalActive = () => {
            downloadPasswordPDFModal = new Modal(
                document.getElementById("downloadPasswordPDF"),
                {
                    target: "#downloadPasswordPDF",
                    backdrop: "static",
                }
            );
            downloadPasswordPDFModal.show();
        };

        watch(
            () => props.showPasswordPDFModal,
            (newval, oldval) => {
                console.log("newval", newval);
                if (newval == true) {
                    modalActive();
                }
            }
        );
        return {
            filename,
            downloadPasswordPDFModal,
            hidePasswordPDFModal,
            generatePDF,
        };
    },
};
</script>

<style></style>
