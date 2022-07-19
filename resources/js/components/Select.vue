<template>
    <Label :for="InputItem.name">{{ InputItem.name }}</Label>
    <select
        v-for="dropdownitem in dropdownitems"
        :key="dropdownitem.id"
        class="form-select form-select-sm"
    >
        <option :value="dropdownitem.id">{{ dropdownitem.name }}</option>
    </select>
</template>

<script>
import Label from "./Label";
export default {
    components: {
        Label,
    },
    props: {
        InputItem: Object,
        DropDownItems: Object,
    },
};
</script>

<style></style>
