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

    <div class="container-fluid">
        <div class="row">
            <div class="float-end loginpos">
                <router-link
                    class="text-muted login"
                    :to="{
                        name: 'Login',
                    }"
                    >Log in</router-link
                >
            </div>
        </div>
        <div class="row hline">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <div class="whistle">
                    <router-link
                        class="makereportlink"
                        :to="{
                            name: 'MakeReport',
                        }"
                    >
                        <img
                            src="../../assets/whistlewithsound.png"
                            alt="Whistle Blow"
                            class="whistlesize"
                        />
                        <div class="makereport">Report Incident</div>

                    </router-link>
                </div>
            </div>
            <div class="col-sm-6 m-0 p-0">
                <h5 class="float-end tollfree">Toll Free:</h5>

                <h2 class="float-end makereport pt-4">0800 5970000</h2>
            </div>
        </div>
    </div>

    <!-- <h4>
        <span>0800 5970000</span>
    </h4> -->
</template>
<script>
import Button from "../components/Button";
import MenuItem from "../components/MenuItem";
export default {
    name: "NavBar",
    components: {
        Button,
        MenuItem,
    },
    emits: ["saveDropDownList"],
    data() {
        return {
            newpassword: "",
        };
    },

    props: {
        menuitems: Array,
        dropdownitems: Object,
    },

    methods: {
        saveDropDownList: function () {
            this.$emit("saveDropDownList");
        },
    },
};
</script>
<style>
.hline {
    border-top: 10px solid #5d6d07;

    background-color: #5d6d07 !important;
    border-bottom: 10px solid #5d6d07;
}
/* h4 {
    width: 100%;
    color: #fff;
    text-align: right;
    border-top: 50px solid #5d6d07;
    border-bottom: 40px solid #5d6d07;
    line-height: 0;
    padding-right: 170px;
}
h4 span {
    background: #5d6d07;
} */
.login {
    text-decoration: underline !important;
}

.login:hover {
    text-decoration: underline !important;
}
.loginpos {
    z-index: 99999;
    position: absolute;
    width: 100%;
    top: 60px;
    text-align: right;
    padding-right: 100px;
}
.hotline {
    padding-right: 250px;
}
.tollfree {
    color: #fff;
    right: 80px;
    position: relative;
}
.whistle {
    position: absolute;
}
.whistlesize {
    width: 30% !important;
}
.makereport {
    color: #fff;
}
.navbar .navbar-nav .nav-link {
    color: #000;
    font-size: 1.1em;
}
.navbar .navbar-nav .nav-link:hover {
    background-color: #5d6d07;
    color: #fff;
}
/* li a:hover:not(.router-link-active) {
    background-color: #5d6d07;
    color: #fff;
} */
a:not([makereportlink]):hover {
    text-decoration: underline;
    color: #fff;
}
a:not([makereportlink]) {
    text-decoration: none;
}

/* li a:focus {
    background-color: #5d6d07;
    color: #fff;
} */
li .nav-link:focus {
    background-color: #5d6d07;
    text-decoration-color: #fff;
    color: #fff;
}
</style>
