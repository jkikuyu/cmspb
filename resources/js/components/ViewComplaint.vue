<template>
    <div
        ref="modal"
        class="modal fade"
        id="viewcomplaint"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="ViewComplaintFormLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2
                        class="col-12 fs-2 mb-2 fw-bold text-center modal-title"
                        id="ViewComplaintFormLabel"
                    >
                        {{ pagetitle }}
                    </h2>
                </div>
                <div class="modal-body">
                    <make-report
                        :isNewComplaint="false"
                        :complaintData="complaintData"
                        @hideViewComplaint="hideViewComplaintModal"
                        @saveDropDownList="saveDropDownList"
                        :pagetitle="pagetitle"
                    >
                    </make-report>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { watch, ref, onMounted } from "vue";
import { Modal } from "bootstrap";
import MakeReport from "./MakeReport.vue";
export default {
    components: { MakeReport },
    name: "ViewComplaint",
    emits: ["saveDropDownList", "hideComplaintModal"],
    props: {
        showModal: Boolean,
        complaintData: Object,
    },
    setup(props, { emit }) {
        let viewComplaintFormModal = ref(null);
        const pagetitle = "Incident Report";
        let isNewComplaint = false;
        const modalActive = () => {
            viewComplaintFormModal = new Modal(
                document.getElementById("viewcomplaint"),
                {
                    target: "#viewcomplaint",
                    backdrop: "static",
                }
            );
            viewComplaintFormModal.show();
        };
        watch(
            () => props.showModal,
            (newval, oldval) => {
                if (newval == true) {
                    modalActive();
                }
            }
        );
        const saveDropDownList = () => {
            emit("saveDropDownList");
        };
        const hideViewComplaintModal = () => {
            viewComplaintFormModal.hide();
            emit("hideComplaintModal");
        };
        return {
            isNewComplaint,
            pagetitle,
            hideViewComplaintModal,
            saveDropDownList,
        };
    },
};
</script>

<style></style>
