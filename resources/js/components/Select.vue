<template>
    <select
        :id="elementId"
        v-show="dropdownitems"
        class="form-select form-select-sm"
        :name="elementId"
    >
        <option selected disabled value="">Please select ...</option>
        <option
            v-for="dropdownitem in dropdownitems"
            :key="dropdownitem.id"
            :value="dropdownitem.id"
        >
            {{ dropdownitem.name }}
        </option>
    </select>
    <!-- @change="$emit('update:modelValue', $event.target.value)" -->
</template>

<script>
export default {
    name: "Select",
    components: {},
    props: {
        dropdownitems: Array,
        elementId: String,
        placeholder: String,
        // modelValue: String,
    },
};
</script>

<style></style>
