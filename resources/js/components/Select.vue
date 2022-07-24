<template>
    <select
        :id="elementId"
        v-show="dropdownitems"
        class="form-select form-select-sm"
        :name="elementId"
        @change="$emit('update:modelValue', $event.target.value)"
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
</template>

<script>
export default {
    /*     watch: {
        modelValue: function (val) {
            console.log("!!! model value changed ", val);
        },
    },*/
    components: {},
    props: {
        dropdownitems: Array,
        elementId: String,
        placeholder: String,
        modelValue: String,
    },
};
</script>

<style></style>
