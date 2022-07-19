<template>
    <form>
        <div class="card">
            <div class="card-body">
                <div class="container .container-fluid">
                    <div class="row">
                        <Select :inputItem="field.type" />
                    </div>
                    <div class="row">
                        <Select :inputItem="field.category" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer"></div>
    </form>
</template>

<script>
import Input from "./Input";
import Select from "./Select";
export default {
    data() {
        return {
            fields: [
                {
                    type: {
                        field: "",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                        order: 1,
                    },
                    category: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                        order: 2,
                    },
                    Reported: {
                        field: "reported",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                        order: 3,
                    },
                    towhom: {
                        field: "towhom",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    subjectname: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    subjectphpne: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    subjectemail: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    department: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    station: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    region: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    description: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    datefrom: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                    dateto: {
                        field: "category",
                        title: "",
                        placeholder: "",
                        description: "Enter complainant type",
                    },
                },
            ],
            typelist: [
                {
                    name: "Prover",
                    id: 1,
                },
                {
                    name: "Employee",
                    id: 2,
                },
                {
                    name: "other",
                    id: 3,
                },
            ],
            categorylist: [
                {
                    name: "Contractor",
                    id: 1,
                },
                {
                    name: "Former Employee",
                    id: 2,
                },
                {
                    name: "Contract Employee",
                    id: 3,
                },
                {
                    name: "Citizen",
                    id: 4,
                },
            ],
            yesno: [
                {
                    name: "No",
                    id: 0,
                },
                {
                    name: "Yes",
                    id: 1,
                },
            ],
        };
    },
    components: {
        Input,
        Select,
    },
};
</script>

<style></style>
