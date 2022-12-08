<template>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.complaintstatus" />
        </div>
        <div class="col-sm-2 p-0 me-4">
            <Select
                required
                :class="{
                    'border border-danger': isCompleted,
                }"
                :disabled="!isNewComplaint"
                :dropdownitems="dropdownList.complaintstatus"
                :elementId="fields.complaintstatus.name"
            />
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.complaintconclude" />
        </div>
        <div class="row mb-2">
            <TextArea
                :disabled="!isNewComplaint"
                required="isCompleted"
                :class="{
                    'border border-danger': isCompleted,
                }"
                :elementId="fields.complaintconclude.name"
            />
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import Label from "./Label";
import Select from "./Select";
import TextArea from "./TextArea";

export default {
    name: "AdminUpdate",
    components: { Label, Select, TextArea },
    props: {
        dropdownList: Object,
        fields: Object,
        isNewComplaint: Boolean,
    },
    setup(props, { emit }) {
        let isCompleted = ref(false);

        return {
            isCompleted,
        };
    },
};
</script>

<style></style>
