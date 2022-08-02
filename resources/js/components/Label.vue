<template>
    <label :for="label.name" class="fw-bold form-label">{{
        label.title
    }}</label>
</template>

<script>
export default {
    name: "Label",
    props: {
        label: Object,
    },
};
</script>

<style scoped></style>
