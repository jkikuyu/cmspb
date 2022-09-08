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
                                <i class="nav-icon fa fa-edit"></i>
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
                                <i class="nav-icon far fa-question-circle"></i>
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
                                <i
                                    class="nav-icon fas fa-fw fa-sign-out-alt"
                                ></i>
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
                    :data="data"
                    :columns="columns"
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
import { onMounted, reactive } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";

export default {
    name: "Dashboard",

    components: {
        DataTable,
    },
    props: {
        resp: Object,
        isExpired: Boolean,
    },

    setup() {
        const router = new useRouter();
        const route = new useRoute();
        let data = reactive([]);

        const columns = [
            { data: "complaintno" },
            { data: "complainanttype" },
            { data: "allegetype" },
            { data: "reported" },
            { data: "towhom" },
            { data: "description" },
            { data: "detail" },
            { data: "threat" },
            { data: "elaborate" },
            { data: "evidence" },
            { data: "datefrom" },
            { data: "dateto" },
            { data: "status" },
        ];

        onMounted(async () => {
            try {
                if (!axios.defaults.headers.common["Authorization"]) {
                    await router.push("/login");
                }
                console.log(axios.defaults.headers.common["Authorization"]);
                await getComplaints(route.params.id);
            } catch (e) {
                console.log("error");
                console.log(e);
                //await router.push("/login");
            }
        });
        const getComplaints = async (id) => {
            const dt = await axios.get("complaints/" + id, {
                Authorization: axios.defaults.headers.common["Authorization"],
            });
            data.push(dt.data.data);
            console.log(data);
        };

        const logout = async (e) => {
            await axios.post("logout", {}, { withCredentials: true });

            axios.defaults.headers.common["Authorization"] = "";
            router.push({ path: "/" });
        };

        return {
            logout,
            data,
            columns,
        };
    },
};
</script>

<style></style>
