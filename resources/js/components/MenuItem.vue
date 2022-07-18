<template>
    <li class="nav-item">
        <router-link class="nav-link" :to="menuitem.link">{{
            menuitem.name
        }}</router-link>
    </li>
</template>
<script>
export default {
    props: {
        menuitem: Object,
    },
};
</script>

<style></style>
