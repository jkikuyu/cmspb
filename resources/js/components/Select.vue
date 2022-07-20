<template>
    <select id="id" v-show="dropdownitems" class="form-select form-select-sm">
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
    components: {},
    props: {
        dropdownitems: Array,
        id: String,
    },
};
</script>

<style></style>
