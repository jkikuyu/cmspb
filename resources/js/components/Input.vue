<template>
    <input
        type="text"
        :id="elementId"
        :name="elementId"
        @change="$emit('update:modelValue', $event.target.value)"
        :placeholder="placeholder"
    />
</template>

<script>
export default {
    name: "Input",

    props: {
        elementId: String,
        modelValue: String,
        placeholder: String,
    },
};
</script>

<style></style>
