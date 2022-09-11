<template>
    <div
        v-for="menuitem in filteredMenuItems"
        :key="menuitem.id"
        class="container"
    >
        <div class="row">
            <div v-if="menuitem.id % 2 > 0" class="col-sm-6">
                <h2>{{ menuitem.title }}</h2>
                <hr />
                <ContentDescription :contentDescription="menuitem">
                </ContentDescription>
            </div>
            <div class="col-sm-6 d-none d-lg-block d-md-block">
                <ContentImage :contentImage="menuitem"> </ContentImage>
            </div>
            <div v-if="menuitem.id % 2 == 0" class="col-sm-6">
                <h2>{{ menuitem.title }}</h2>
                <hr />
                <ContentDescription :contentDescription="menuitem">
                </ContentDescription>
            </div>
        </div>
    </div>
</template>

<script>
import ContentDescription from "./ContentDescription";
import ContentImage from "./ContentImage";

export default {
    components: {
        ContentDescription,
        ContentImage,
    },
    emits: ["saveDropDownList"],

    props: {
        menuitems: Array,
    },

    computed: {
        filteredMenuItems() {
            return this.menuitems.filter(
                (a) => a.resource_path === this.$route.path
            );
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
