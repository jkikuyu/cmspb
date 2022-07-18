<template>
    <div class="container">
        <div class="row d-sm-flex aligh-items-center justify-content-between">
            <div
                v-for="menuitem in menuitems"
                :key="menuitem.id"
                class="col-md"
            >
                {{ menuitem.name }}
            </div>

            <div class="col-md"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        menuitems: Array,
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
