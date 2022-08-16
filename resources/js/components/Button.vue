<template>
    <button
        type="button"
        :class="{
            'btn btn-primary': button === 'submit',
            'btn btn-default': button === 'cancel',
        }"
    >
        <span
            :class="{
                'navbar-toggler-icon': button === 'navbar',
            }"
        ></span>
        <slot />
    </button>
</template>

<script>
export default {
    name: "Button",
    props: {
        button: {
            type: String,
            default: "navbar",
        },
    },
};
</script>

<style scoped>
.btn-default {
    background-color: #f8f9fa;
    border-color: #ddd;
    color: #444;
}
.btn-default:hover {
    color: #444;
    background-color: #e9ecef;
    border-color: #ddd;
}
</style>
