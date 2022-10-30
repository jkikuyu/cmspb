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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewComplaintFormLabel">
                    <slot name="formname" />
                </h5>
            </div>
            <div class="modal-body">
                Testing
            </div>
        </div>
    </div>

    </div>
</template>

<script>
export default {
    name:"ViewComplaint",
    props: {
        showModal: Boolean,
    },
    watch: {
        showModal: function (val) {
            if (val === true) {
                this.modalActive();
            }
        },
    }
}
</script>

<style>

</style>
