<template>
    <header>
        <NavBar :menuitems="menuitems" />
    </header>
</template>

<script>
import NavBar from "./NavBar";

export default {
    components: { NavBar },
    props: {
        menuitems: Array,
    },
};
</script>

<style></style>
