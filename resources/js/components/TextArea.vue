<template>
    <textarea
        :id="elementId"
        :name="elementId"
        @change="$emit('update:modelValue', $event.target.value)"
        rows="4"
        cols="50"
    >
    </textarea>
</template>

<script>
export default {
    props: {
        elementId: String,
        modelValue: String,
    },
};
</script>

<style></style>
