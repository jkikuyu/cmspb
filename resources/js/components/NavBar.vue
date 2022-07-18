<template>
    <nav
        id="main-navigation"
        class="main-navigation text-white links-white headings-white"
        aria-label="main"
    >
        <div class="container p-lg-0">
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img
                        class="w-50"
                        src="../../assets/kws.svg"
                        alt="KWS Logo"
                    />
                </a>

                <Button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarToggler"
                    aria-controls="navbarToggler"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                ></Button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav mx-auto">
                        <MenuItem
                            v-for="menuitem in menuitems"
                            :key="menuitem.id"
                            :menuitem="menuitem"
                        />
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="row float-end tollfree">Toll Free:</div>
    <h4>
        <span>0800 5970000</span>
    </h4>
</template>
<script>
import Button from "../components/Button";
import MenuItem from "../components/MenuItem";
import { inject } from "vue";
export default {
    components: {
        Button,
        MenuItem,
    },
    props: {
        menuitems: Array,
    },
};
</script>
<style>
h4 {
    width: 100%;
    color: #fff;
    text-align: right;
    border-top: 50px solid #5d6d07;
    border-bottom: 20px solid #5d6d07;
    line-height: 0;
    padding-right: 50px;
}
h4 span {
    background: #5d6d07;
}
.tollfree {
    color: #fff;
    right: 150px;
    position: absolute;
}
</style>
