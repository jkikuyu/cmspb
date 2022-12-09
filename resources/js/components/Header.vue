<template>
    <header>
        <NavBar :menuitems="menuitems" @saveDropDownList="saveDropDownList" />
    </header>
</template>

<script>
import NavBar from "./NavBar";

export default {
    name: "Header",

    components: { NavBar },
    emits: ["saveDropDownList"],

    props: {
        menuitems: Array,
    },
    methods: {
        saveDropDownList: function () {
            //console.log("header");
            this.$emit("saveDropDownList");
        },
    },
};
</script>

<style></style>
