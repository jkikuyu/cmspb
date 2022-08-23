<template>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div
                    class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"
                >
                    <a
                        href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"
                    >
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul
                        class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu"
                    >
                        <li class="nav-item">
                            <a href="#" class="align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i>
                                <span class="ms-1 d-none d-sm-inline"
                                    >Complaints</span
                                >
                            </a>
                        </li>

                        <li>
                            <a
                                href="#"
                                class="nav-link px-0 align-middle text-white"
                            >
                                <i class="nav-icon fas fa-folder"></i>
                                <span class="ms-1 d-none d-sm-inline"
                                    >User Manual</span
                                ></a
                            >
                        </li>
                        <li>
                            <a
                                href="javascript:void(0)"
                                @click="logout"
                                class="nav-link px-0 align-middle text-white"
                            >
                                <i class="fs-4 bi-people"></i>
                                <span class="ms-1 d-none d-sm-inline"
                                    >Logout</span
                                >
                            </a>
                        </li>
                    </ul>
                    <hr />
                </div>
            </div>
            <div class="col py-3">
                <DataTable
                    class="table table-hover table-striped"
                    :options="{
                        select: true,
                        bLengthChange: false,
                        bPaginate: false,
                        bFilter: false,
                        bInfo: false,
                    }"
                >
                    <thead>
                        <tr>
                            <th>Complaint No</th>
                            <th>Complaint Type</th>
                            <th>Allegation</th>
                            <th>Reported</th>
                            <th>To Whom</th>
                            <th>Description</th>
                            <th>Detail</th>
                            <th>Threat</th>
                            <th>Elaborate</th>
                            <th>Evidence</th>
                            <th>Date from</th>
                            <th>Date to</th>

                            <th>Status</th>
                        </tr>
                    </thead>
                </DataTable>
            </div>
        </div>
    </div>
</template>

<script>
import DataTable from "datatables.net-vue3";
import { onMounted, ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default {
    name: "Dashboard",
    data() {
        return {
            retoken: "",
        };
    },
    components: {
        DataTable,
    },
    props: {
        resp: Object,
        isExpired: Boolean,
    },

    /*     created() {
        if (this.resp.token) {
            console.log(this.resp);
            this.$emit("isTokenExpired", this.resp.token);
            if (this.isExpired) {
                console.log("mounted");
                this.$emit("refreshToken");
            } else {
                console.log(this.isExpired);
                console.log("here");
                //this.getComplaints(resp.id);
            }
        }
    }, */
    setup() {
        const logout = async () => {
            await axios.post("logout", {}, { withCredentials: true });

            axios.defaults.headers.common["Authorization"] = "";

            await router.push("/");
        };

        return {
            logout,
        };
    },

    methods: {
        getComplaints: async function (id) {
            const res = await fetch(
                "http://localhost:8000/api/complaints/' +id"
            );
            data = await res.json();
            return data;
        },
        /*         logout: async function () {
            localStorage.removeItem("resp");
            const res = await fetch("http://localhost:8000/api/logout");
            this.$router.push("/");
        }, */
    },
};
</script>

<style></style>
