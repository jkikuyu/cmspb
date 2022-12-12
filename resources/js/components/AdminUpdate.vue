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
                :disabled="!isEdtConclusion"
                :dropdownitems="dropdownList.complaintstatus"
                :elementId="fields.complaintstatus.name"
                :value="form.status"
            />
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.complaintconclude" />
        </div>
        <div class="row mb-2">
            <TextArea
                :disabled="!isEdtConclusion"
                required="isCompleted"
                :class="{
                    'border border-danger': isCompleted,
                }"
                :elementId="fields.complaintconclude.name"
                :value="form.conclusion"
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
        isEdtConclusion: Boolean,
        form: Object,
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
