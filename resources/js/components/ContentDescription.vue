<template>
    <div v-html="markitdown"></div>
</template>

<script>
import { marked } from "marked";

export default {
    name: "contentDescription",
    props: {
        contentDescription: Object,
    },
    computed: {
        markitdown() {
            return marked(this.contentDescription.content);
        },
    },
};
</script>

<style></style>
