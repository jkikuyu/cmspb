<template>
    <div
        v-for="menuitem in filteredMenuItems"
        :key="menuitem.id"
        class="container"
    >
        <div class="row">
            <div class="col-6"></div>
        </div>
        <div class="row">
            <div v-if="menuitem.id === 1" class="col-sm-1 d-block d-sm-none">
                <router-link
                    class="btn-kws px-5 py-3 fs-3"
                    :to="{
                        name: 'MakeReport',
                    }"
                >
                    Report Now
                </router-link>
            </div>
            <div v-if="menuitem.id % 2 > 0" class="col-sm-6">
                <h2>{{ menuitem.title }}</h2>
                <hr />
                <ContentDescription :contentDescription="menuitem">
                </ContentDescription>
            </div>
            <div class="col-sm-6 d-none d-lg-block d-md-block">
                <div class="col-sm-6 float-end">
                    <div v-if="menuitem.id === 1">
                        <router-link
                            class="btn-kws px-5 py-3 fs-3"
                            :to="{
                                name: 'MakeReport',
                            }"
                        >
                            Report Now
                        </router-link>
                    </div>
                </div>
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
import Button from "./Button";
export default {
    name: "PageContent",
    components: {
        ContentDescription,
        ContentImage,
        Button,
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

<style scoped>
/* .btn-kws {
    background-color: $green-kws;
    text-decoration: none;
    color: #fff;
} */
.btn-kws {
    background-color: #1c87c9;
    -webkit-border-radius: 40px;
    border-radius: 40px;
    border: none;
    color: #eeeeee;
    cursor: pointer;
    display: inline-block;
    font-family: sans-serif;
    font-size: 20px;
    padding: 5px 15px;
    text-align: center;
    text-decoration: none;
}
@keyframes glowing {
    0% {
        background-color: #819900;
        box-shadow: 0 0 5px #819900;
    }
    50% {
        background-color: #819900;
        box-shadow: 0 0 20px #819900;
    }
    100% {
        background-color: #5d6d07;
        box-shadow: 0 0 5px #5d6d07;
    }
}
.btn-kws {
    animation: glowing 1500ms infinite;
}
.container {
    flex: 1 0 auto;
    /* Prevent Chrome, Opera, and Safari from letting these items shrink to smaller than their content's default minimum size. */
    padding: 20px;
}
</style>
