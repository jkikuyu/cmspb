<template>
    <div class="container-fluid px-3">
        <div class="content">
            <section>
                <div class="card">
                    <form>
                        <div class="card-body">
                            <div class="container">
                                <h2 class="fs-2 mb-3 fw-bold text-center">
                                    Report Incident
                                </h2>
                                <div class="alert alert-primary" role="alert">
                                    Please note: All fields are required
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label
                                            :label="fields.anonymous"
                                        ></Label>
                                    </div>
                                    <div class="col-sm-2">
                                        <Select
                                            v-model="anonymous"
                                            :dropdownitems="yesno"
                                            :elementId="fields.anonymous.name"
                                        />
                                    </div>
                                </div>
                                <div v-if="!+anonymous" class="row mb-3">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            <Label :label="fields.first" />
                                        </div>
                                    </div>

                                    <div v-if="!+anonymous" class="row mb-3">
                                        <div class="col-sm-2 me-3">
                                            <Input
                                                v-model="firstname"
                                                :elementId="fields.first.name"
                                                :placeholder="
                                                    fields.first.placeholder
                                                "
                                            />
                                        </div>

                                        <div class="col-sm-2 me-3">
                                            <Input
                                                v-model="middlename"
                                                :elementId="fields.middle.name"
                                                :placeholder="
                                                    fields.middle.placeholder
                                                "
                                            />
                                        </div>
                                        <div class="col-sm-2 me-3">
                                            <Input
                                                v-model="lastname"
                                                :elementId="fields.last.name"
                                                :placeholder="
                                                    fields.last.placeholder
                                                "
                                            />
                                        </div>
                                        <div class="col-sm-auto ms-4 ps-2">
                                            <Label :label="fields.workid" />
                                        </div>

                                        <div class="col-sm-2">
                                            <Input
                                                v-model="wid"
                                                :elementId="fields.workid.name"
                                                :placeholder="
                                                    fields.workid.placeholder
                                                "
                                            />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-auto">
                                            <Label :label="fields.nationalid" />
                                        </div>

                                        <div class="col-sm-2 me-3">
                                            <Input
                                                v-model="nid"
                                                :elementId="
                                                    fields.nationalid.name
                                                "
                                                :placeholder="
                                                    fields.nationalid
                                                        .placeholder
                                                "
                                            />
                                        </div>
                                        <div class="col-3"></div>

                                        <div class="col-sm-auto ms-4 ps-4">
                                            <Label :label="fields.email" />
                                        </div>

                                        <div class="col-sm-2 me-3">
                                            <Input
                                                v-model="email"
                                                :elementId="fields.email.name"
                                                :placeholder="
                                                    fields.email.placeholder
                                                "
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label
                                            :label="fields.complaintanttype"
                                        ></Label>
                                    </div>
                                    <div class="col-sm-2">
                                        <Select
                                            :elementId="
                                                fields.complaintanttype.name
                                            "
                                            :dropdownitems="complainantlist"
                                        />
                                    </div>
                                    <!-- <div class="col-1 g-0"></div> -->
                                    <div class="col-sm-auto offset-sm-1">
                                        <Label
                                            :label="fields.allegetype"
                                        ></Label>
                                    </div>
                                    <div class="col-sm-3">
                                        <Select
                                            :dropdownitems="allegetypelist"
                                            :elementId="fields.allegetype.name"
                                        />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.reported"></Label>
                                    </div>
                                    <div class="col-sm-2">
                                        <Select
                                            v-model="reported"
                                            :dropdownitems="yesno"
                                            :elementId="fields.reported.name"
                                        />
                                    </div>
                                    <div
                                        v-show="!!+reported"
                                        class="col-sm-auto"
                                    >
                                        <Label :label="fields.towhom" />
                                    </div>

                                    <div v-show="!!+reported" class="col-sm-3">
                                        <Input
                                            v-model="towhom"
                                            :elementId="fields.towhom.name"
                                        />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.describe" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <TextArea
                                        v-model="describe"
                                        :elementId="fields.describe.name"
                                    />
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.subjectdetail" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <TextArea
                                        v-model="subjectdetail"
                                        :elementId="fields.subjectdetail.name"
                                    />
                                </div>
                                <div class="row mb-3">
                                    <DateTimePicker v-model="range" />
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.threat" />
                                    </div>
                                    <div class="col-sm-2">
                                        <Select
                                            v-model="threat"
                                            :dropdownitems="yesno"
                                            :elementId="fields.threat.name"
                                        />
                                    </div>
                                </div>
                                <div v-show="!!+threat" class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.elaborate" />
                                    </div>
                                </div>
                                <div v-show="!!+threat" class="row mb-3">
                                    <TextArea
                                        v-model="elaborate"
                                        :elementId="fields.elaborate.name"
                                    />
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.evidence"></Label>
                                    </div>
                                    <div class="col-sm-2">
                                        <Select
                                            v-model="evidence"
                                            :dropdownitems="yesno"
                                            :elementId="fields.evidence.name"
                                        />
                                    </div>
                                </div>
                                <div v-show="!+evidence" class="row mb-3">
                                    <div class="col-sm-auto">
                                        <Label
                                            :label="fields.nopossession"
                                        ></Label>
                                    </div>
                                    <div class="col-sm-2">
                                        <Select
                                            v-model="nopossession"
                                            :dropdownitems="yesno"
                                            :elementId="
                                                fields.nopossession.name
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <Button class="mx-2" button="submit">Submit</Button>
                            <Button button="cancel">Cancel</Button>
                        </div>

                        <!-- 
            <div class="row">
                <Select :inputItem="fields.region" />
                <Select :inputItem="fields.station" />
                <Select :inputItem="fields.department" />
            </div> -->
                    </form>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import Select from "./Select";
import Label from "./Label";
import Input from "./Input";
import TextArea from "./TextArea";
import DateTimePicker from "./DateTimePicker";
import Button from "./Button";
export default {
    data() {
        return {
            anonymous: "",
            firstname: "",
            middlename: "",
            lastname: "",
            reported: "",
            towhom: "",
            describe: "",
            subjectdetail: "",
            threat: "",
            elaborate: "",
            evidence: "",
            nopossession: "",
            region: "",
            station: "",
            department: "",
            range: "",
            fields: {
                anonymous: {
                    name: "anonymous",
                    title: "Do you want to remain anonymous?",
                    placeholder: "",
                    description: "What is your relation with KWS",
                    order: 1,
                },
                first: {
                    name: "firstname",
                    title: "Ener your (first, middle, last) names",
                    placeholder: "First Name",
                    description: "Enter your first name",
                    order: 1,
                },
                middle: {
                    name: "firstname",
                    title: "Ener your names",
                    placeholder: "Middle Name",
                    description: "What is your relation with KWS",
                    order: 1,
                },
                last: {
                    name: "lastname",
                    title: "Ener your names",
                    placeholder: "Last Name",
                    description: "What is your relation with KWS",
                    order: 1,
                },
                email: {
                    name: "email",
                    title: "Email Address",
                    placeholder: "email address",
                    description: "Email address of the complainant",
                    order: 1,
                },
                workid: {
                    name: "workid",
                    title: "Employee ID",
                    placeholder: "employee ID",
                    description: "Employee Identification number",
                    order: 1,
                },
                nationalid: {
                    name: "workid",
                    title: "National ID",
                    placeholder: "national ID",
                    description: "Government recognized Identification ID ",
                    order: 1,
                },

                complaintanttype: {
                    name: "complaintanttype",
                    title: "What is your relation with KWS",
                    placeholder: "Please select...",
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
                    id: 4,
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
        Input,
        TextArea,
        DateTimePicker,
        Button,
    },
};
/* const date = Date();
date.value.setDate(Number(date.value.getDate()) + 35);
const range = reactive({
    start: new Date(),
    end: date.value,
});*/
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
reporttitle {
    font-family: "futurabold";
    font-size: 42px;
    color: #000;
    margin-bottom: 10px;
    margin-top: 30px;
}
.content {
    padding: 0 0.5rem;
}
</style>
