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
                <h5 class="modal-title" id="ViewComplaintFormLabel">
                    <slot name="formname" />
                </h5>
            </div>
            <div class="modal-body">
                <MakeReport
                    :isNewComplaint=false
                    @hideViewComplaint="hideViewComplaintModal"
                >
                </MakeReport>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
import { watch, ref } from "vue";
import { Modal } from "bootstrap";
import MakeReport from './MakeReport.vue';
export default {
  components: { MakeReport },
    name:"ViewComplaint",
    props: {
        showModal: Boolean,
        complaintData: Object,
    },
    setup(props, { emit }) {
        let viewComplaintFormModal= ref(null);
        let isNewComplaint = false;
        const modalActive = ()=>{
            viewComplaintFormModal = new Modal(
                document.getElementById("viewcomplaint"),
                {
                    target: "#viewcomplaint",
                    backdrop: "static",
                }
            );
            viewComplaintFormModal.show();
        };
        watch(() => props.showModal, (newval,oldval) => {
            if (newval === true) {
                modalActive();
            }
        },
        ()=>props.complaintData,(newval,oldval)=>{
            console.log(newval);
        }
        );
        const hideViewComplaintModal=()=>{
            viewComplaintFormModal.hide();
            emit('hideComplaintModal');
        };
        return {
            isNewComplaint,
            hideViewComplaintModal

        };

    },
}

</script>

<style>

</style>
