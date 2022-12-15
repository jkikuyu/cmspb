<template>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.complaintstatus" />
        </div>
        <div class="col-sm-2 p-0 me-4">
            <Select
                @change="form.status = $event.target.value"
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
                v-model="form.conclusion"
                :disabled="!isEdtConclusion"
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
    emits: ["updateForm"],
    props: {
        dropdownList: Object,
        fields: Object,
        isEdtConclusion: Boolean,
        form: Object,
    },
    setup(props, { emit }) {
        let isCompleted = ref(false);
        let cstatus = ref("0");
        const updateForm = (input, value) => {
            emit("updateForm");
        };

        return {
            isCompleted,
        };
    },
};
</script>

<style></style>
