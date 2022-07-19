<template>
    <div class="container">
        <ContentDescription
            v-for="menuitem in filteredMenuItems"
            :key="menuitem.id"
            :contentDescription="menuitem"
        ></ContentDescription>
    </div>
</template>

<script>
import ContentDescription from "./ContentDescription";
export default {
    components: {
        ContentDescription,
    },
    props: {
        menuitems: Array,
    },

    computed: {
        filteredMenuItems() {
            return this.menuitems.filter((a) => a.link === this.$route.path);
        },
    },
};
</script>

<style>
.container {
    flex: 1 0 auto;
    /* Prevent Chrome, Opera, and Safari from letting these items shrink to smaller than their content's default minimum size. */
    padding: 20px;
}
</style>
