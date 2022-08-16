<template>
    <header>
        <NavBar :menuitems="menuitems" />
    </header>
</template>

<script>
import NavBar from "./NavBar";

export default {
    name: "Header",

    components: { NavBar },
    props: {
        menuitems: Array,
    },
};
</script>

<style></style>
