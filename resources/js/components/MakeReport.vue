<template>
    <form>
        <div class="container">
            <div class="row mb-3">
                <div class="col-sm-auto">
                    <Label :label="fields.complaintanttype"></Label>
                </div>
                <div class="col-sm-2">
                    <Select
                        :id="fields.complaintanttype"
                        :dropdownitems="complainantlist"
                    />
                </div>
                <!-- <div class="col-1 g-0"></div> -->
                <div class="col-sm-auto offset-sm-1">
                    <Label :label="fields.allegetype"></Label>
                </div>
                <div class="col-sm-3">
                    <Select :dropdownitems="allegetypelist" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-auto">
                    <Label :label="fields.reported"></Label>
                </div>
                <div class="col-sm-1">
                    <Select :dropdownitems="yesno" />
                </div>
            </div>
            <!-- 
            <div class="col-sm-2">

                <Select :inputItem="fields.reported" />
                <Select :inputItem="fields.towhom" />
            </div>
           
            <div class="row">
                <Select :inputItem="fields.describe" />
                <Select :inputItem="fields.subjectdetail" />
            </div>
            <div class="row">
                <Select :inputItem="fields.threat" />
                <Select :inputItem="fields.elaborate" />
            </div>
            <div class="row">
                <Select :inputItem="fields.evidence" />
                <Select :inputItem="fields.nopossession" />
            </div>
            <div class="row">
                <Select :inputItem="fields.datefrom" />
                <Select :inputItem="fields.dateto" />
            </div>
            <div class="row">
                <Select :inputItem="fields.region" />
                <Select :inputItem="fields.station" />
                <Select :inputItem="fields.department" />
            </div> -->
        </div>
    </form>
</template>

<script>
import Select from "./Select";
import Label from "./Label.vue";
export default {
    data() {
        return {
            fields: {
                complaintanttype: {
                    name: "complaintanttype",
                    title: "What is your relation with KWS",
                    placeholder: "",
                    description: "What is your relation with KWS",
                    order: 1,
                },
                allegetype: {
                    name: "allegetype",
                    title: "What is the nature of allegation? ",
                    placeholder: "",
                    description: "Enter complainant type",
                    order: 2,
                },
                reported: {
                    name: "reported",
                    title: "Has this issue been reported to any other party",
                    placeholder: "",
                    description: "Enter complainant type",
                    order: 3,
                },
                towhom: {
                    name: "towhom",
                    title: "If yes, enter name of person",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                describe: {
                    name: "describe",
                    title: "Describe the incident in as much detail as possible",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                subjectdetail: {
                    name: "subjectdetail",
                    title: "Who is involved in the incident (Suspects), phone number(s), email(s)?",
                    Name: "",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                threat: {
                    name: "threat",
                    title: "Is there a threat to your personal safety, fear of victimisation or retaliation as a result of making this report?",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                elaborate: {
                    name: "elaborate",
                    title: "Please elaborate by stating who and why you have been threatened",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                evidence: {
                    name: "evidence",
                    title: "Do you have evidence you can forward?",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                nopossession: {
                    name: "nopossession",
                    title: "If No, do you know where the evidence can be found?",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                department: {
                    name: "department",
                    title: "Department",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                station: {
                    name: "station",
                    title: "Station",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                region: {
                    name: "region",
                    title: "Region",
                    placeholder: "",
                    description: "Enter complainant type",
                },

                datefrom: {
                    name: "datefrom",
                    title: "The start date when the inicident occurred",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                dateto: {
                    name: "dateto",
                    title: "The end date when the incident occurred",
                    placeholder: "",
                    description: "Enter complainant type",
                },
            },

            allegetypelist: [
                {
                    name: "Fraud",
                    id: 1,
                },
                {
                    name: "Corruption",
                    id: 2,
                },
                {
                    name: "Theft",
                    id: 3,
                },
                {
                    name: "Unethical Behaviour",
                    id: 3,
                },
            ],
            complainantlist: [
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
                {
                    name: "Supplier",
                    id: 5,
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
        Select,
        Label,
    },
};
</script>

<style>
label,
a {
    font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    line-height: 1.5;
    font-size: 1rem;
    text-align: left;
    color: #212529;
}
</style>
