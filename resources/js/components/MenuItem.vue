<template>
    <li class="nav-item">
        <router-link class="nav-link" :to="menuitem.resource_path">{{
            menuitem.name
        }}</router-link>
    </li>
</template>
<script>
export default {
    name: "MenuItem",

    props: {
        menuitem: Object,
    },
};
</script>

<style></style>
