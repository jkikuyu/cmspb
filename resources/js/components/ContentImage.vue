<template>
    <img
        :src="contentImage.imagepath"
        :alt="contentImage.imagepath ? contentImage.name : ''"
        class="w-100"
    />
</template>

<script>
export default {
    name: "contentImage",
    props: {
        contentImage: Object,
    },
};
</script>

<style scoped></style>
