<template>
    <div class="container-fluid px-3">
        <div class="content">
            <section>
                <div class="card">
                    <form ref="makereport">
                        <div class="card-body">
                            <div class="container">
                                <report-title
                                    v-if="isNewComplaint"
                                    :pagetitle="pagetitle"
                                ></report-title>
                                <div
                                    v-if="isNewComplaint"
                                    class="alert alert-primary"
                                    role="alert"
                                >
                                    Please note: All fields marked (
                                    <span style="color: #ff0000"> * </span> )
                                    are required
                                </div>
                                <div
                                    v-if="msg.warning || msg.success"
                                    class="alert"
                                    :class="{
                                        'alert-warning': msg.warning,
                                        'alert-success': msg.success,
                                    }"
                                    role="alert"
                                >
                                    {{ msg.warning ? msg.warning : "" }}
                                    {{ msg.success ? msg.success : "" }}
                                </div>
                                <div v-if="!isNewComplaint" class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label
                                            :label="fields.complaintno"
                                        ></Label>
                                    </div>
                                    <div class="col-sm-2 p-0">
                                        <h5 class="fw-bold">
                                            {{
                                                complaintData
                                                    ? complaintData.complaintno
                                                    : ""
                                            }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.anonymous"></Label
                                        ><span style="color: #ff0000"> * </span>
                                    </div>
                                    <div class="col-sm-2 p-0">
                                        <Select
                                            required
                                            :disabled="!isNewComplaint"
                                            @change="
                                                updateForm(
                                                    fields.anonymous.name,
                                                    $event.target.value
                                                )
                                            "
                                            :class="{
                                                'border border-danger':
                                                    isNewComplaint &&
                                                    !form[
                                                        fields.anonymous.name
                                                    ],
                                            }"
                                            :dropdownitems="dropdownList.yesno"
                                            :elementId="fields.anonymous.name"
                                            :value="form.anonymous"
                                        />
                                    </div>
                                </div>
                                <div v-if="!+form.anonymous" class="row mb-2">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            <Label :label="fields.first" />
                                            <span style="color: #ff0000">
                                                *
                                            </span>
                                        </div>
                                    </div>

                                    <div
                                        v-if="!+form.anonymous"
                                        class="row mb-2"
                                    >
                                        <div
                                            class="col-sm-2"
                                            :class="{
                                                'me-4': isNewComplaint,
                                                'me-5': !isNewComplaint,
                                            }"
                                        >
                                            <Input
                                                :required="!+form.anonymous"
                                                :disabled="!isNewComplaint"
                                                pattern="[^\s]+"
                                                @input="
                                                    updateForm(
                                                        fields.first.name,
                                                        $event.target.value
                                                    )
                                                "
                                                :class="{
                                                    'border border-danger':
                                                        isNewComplaint &&
                                                        !form[
                                                            fields.first.name
                                                        ],
                                                }"
                                                :elementId="fields.first.name"
                                                :placeholder="
                                                    fields.first.placeholder
                                                "
                                                :value="form.firstname"
                                            />
                                        </div>

                                        <div
                                            class="col-sm-2"
                                            :class="{
                                                'me-4': isNewComplaint,
                                                'me-5': !isNewComplaint,
                                            }"
                                        >
                                            <Input
                                                @input="
                                                    updateForm(
                                                        fields.middle.name,
                                                        $event.target.value
                                                    )
                                                "
                                                :disabled="!isNewComplaint"
                                                :elementId="fields.middle.name"
                                                :placeholder="
                                                    fields.middle.placeholder
                                                "
                                                :value="form.middlename"
                                            />
                                        </div>
                                        <div class="col-sm-2">
                                            <Input
                                                :required="!+form.anonymous"
                                                :disabled="!isNewComplaint"
                                                pattern="[^\s]+"
                                                @input="
                                                    updateForm(
                                                        fields.last.name,
                                                        $event.target.value
                                                    )
                                                "
                                                :class="{
                                                    'border border-danger':
                                                        isNewComplaint &&
                                                        !form[fields.last.name],
                                                }"
                                                :elementId="fields.last.name"
                                                :placeholder="
                                                    fields.last.placeholder
                                                "
                                                :value="form.lastname"
                                            />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-auto">
                                            <Label :label="fields.workid" />
                                        </div>

                                        <div class="col-sm-2 p-0">
                                            <Input
                                                @input="
                                                    updateForm(
                                                        fields.workid.name,
                                                        $event.target.value
                                                    )
                                                "
                                                :disabled="!isNewComplaint"
                                                :elementId="fields.workid.name"
                                                :placeholder="
                                                    fields.workid.placeholder
                                                "
                                                :value="form.wid"
                                            />
                                        </div>
                                        <div class="col-sm-auto ms-5">
                                            <Label :label="fields.nationalid" />
                                        </div>

                                        <div class="col-sm-2 p-0 me-4">
                                            <Input
                                                @input="
                                                    updateForm(
                                                        fields.nationalid.name,
                                                        $event.target.value
                                                    )
                                                "
                                                :disabled="!isNewComplaint"
                                                :elementId="
                                                    fields.nationalid.name
                                                "
                                                :placeholder="
                                                    fields.nationalid
                                                        .placeholder
                                                "
                                                :value="form.nid"
                                            />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-auto">
                                            <Label :label="fields.phoneno" />
                                            <span style="color: #ff0000">
                                                *
                                            </span>
                                        </div>

                                        <div class="p-0 col-sm-2">
                                            <Input
                                                :required="!+form.anonymous"
                                                :disabled="!isNewComplaint"
                                                @input="
                                                    updateForm(
                                                        fields.phoneno.name,
                                                        $event.target.value
                                                    )
                                                "
                                                :elementId="fields.phoneno.name"
                                                :placeholder="
                                                    fields.phoneno.placeholder
                                                "
                                                :value="form.phoneno"
                                            />
                                        </div>
                                        <div class="col-sm-auto ms-4">
                                            <Label :label="fields.email" />
                                            <span style="color: #ff0000">
                                                *
                                            </span>
                                        </div>

                                        <div class="p-0 col-sm-2">
                                            <Input
                                                :required="!+form.anonymous"
                                                :disabled="!isNewComplaint"
                                                type="email"
                                                @input="
                                                    updateForm(
                                                        fields.email.name,
                                                        $event.target.value
                                                    )
                                                "
                                                :class="{
                                                    'border border-danger':
                                                        isNewComplaint &&
                                                        !form[
                                                            fields.email.name
                                                        ],
                                                }"
                                                :elementId="fields.email.name"
                                                :placeholder="
                                                    fields.email.placeholder
                                                "
                                                :value="form.email"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label
                                            :label="fields.complainanttype"
                                        />
                                        <span style="color: #ff0000"> * </span>
                                    </div>
                                    <div class="col-sm-3 p-0">
                                        <Select
                                            required
                                            :disabled="!isNewComplaint"
                                            @change="
                                                updateForm(
                                                    fields.complainanttype.name,
                                                    $event.target.value
                                                )
                                            "
                                            :class="{
                                                'border border-danger':
                                                    isNewComplaint &&
                                                    !form[
                                                        fields.complainanttype
                                                            .name
                                                    ],
                                            }"
                                            :elementId="
                                                fields.complainanttype.name
                                            "
                                            :dropdownitems="
                                                dropdownList.complainantlist
                                            "
                                            :value="form.complainanttype"
                                        />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.allegetype" />
                                        <span style="color: #ff0000"> * </span>
                                    </div>
                                    <div class="col-sm-3 p-0">
                                        <Select
                                            required
                                            :disabled="!isNewComplaint"
                                            @change="
                                                updateForm(
                                                    fields.allegetype.name,
                                                    $event.target.value
                                                )
                                            "
                                            :class="{
                                                'border border-danger':
                                                    isNewComplaint &&
                                                    !form[
                                                        fields.allegetype.name
                                                    ],
                                            }"
                                            :dropdownitems="
                                                dropdownList.allegetypelist
                                            "
                                            :elementId="fields.allegetype.name"
                                            :value="form.allegetype"
                                        />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.reported" />
                                        <span style="color: #ff0000"> * </span>
                                    </div>
                                    <div class="col-sm-2 p-0">
                                        <Select
                                            required
                                            :disabled="!isNewComplaint"
                                            @change="
                                                updateForm(
                                                    fields.reported.name,
                                                    $event.target.value
                                                )
                                            "
                                            :class="{
                                                'border border-danger':
                                                    isNewComplaint &&
                                                    !form[fields.reported.name],
                                            }"
                                            :dropdownitems="dropdownList.yesno"
                                            :elementId="fields.reported.name"
                                            :value="form.reported"
                                        />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div
                                        v-show="!!+form.reported"
                                        class="col-sm-auto"
                                    >
                                        <Label :label="fields.towhom" />
                                        <span style="color: #ff0000"> * </span>
                                    </div>

                                    <div
                                        v-show="!!+form.reported"
                                        class="col-sm-5"
                                    >
                                        <Input
                                            :required="!!+form.reported"
                                            :disabled="!isNewComplaint"
                                            @input="
                                                updateForm(
                                                    fields.towhom.name,
                                                    $event.target.value
                                                )
                                            "
                                            class="col-sm-9"
                                            :class="{
                                                'border border-danger':
                                                    isNewComplaint &&
                                                    !form[fields.towhom.name],
                                            }"
                                            :elementId="fields.towhom.name"
                                            :value="form.towhom"
                                        />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.describe" />
                                        <span style="color: #ff0000"> * </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <TextArea
                                        required
                                        :disabled="!isNewComplaint"
                                        @input="
                                            updateForm(
                                                fields.describe.name,
                                                $event.target.value
                                            )
                                        "
                                        :class="{
                                            'border border-danger':
                                                isNewComplaint &&
                                                !form[fields.describe.name],
                                        }"
                                        :elementId="fields.describe.name"
                                        :value="form.description"
                                    />
                                </div>

                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.subjectdetail" />
                                        <span style="color: #ff0000"> * </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <TextArea
                                        required
                                        :disabled="!isNewComplaint"
                                        @input="
                                            updateForm(
                                                fields.subjectdetail.name,
                                                $event.target.value
                                            )
                                        "
                                        :class="{
                                            'border border-danger':
                                                isNewComplaint &&
                                                !form[
                                                    fields.subjectdetail.name
                                                ],
                                        }"
                                        :elementId="fields.subjectdetail.name"
                                        :value="form.detail"
                                    />
                                </div>
                                <div class="row mb-2">
                                    <DateTimePicker v-model="range" />
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.threat" />
                                    </div>
                                    <div class="col-sm-2 p-0">
                                        <Select
                                            @change="
                                                updateForm(
                                                    fields.threat.name,
                                                    $event.target.value
                                                )
                                            "
                                            :disabled="!isNewComplaint"
                                            :dropdownitems="dropdownList.yesno"
                                            :elementId="fields.threat.name"
                                            :value="form.threat"
                                        />
                                    </div>
                                </div>
                                <div v-if="!!+form.threat" class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.elaborate" />
                                    </div>
                                </div>
                                <div v-if="!!+form.threat" class="row mb-2">
                                    <TextArea
                                        @input="
                                            updateForm(
                                                fields.elaborate.name,
                                                $event.target.value
                                            )
                                        "
                                        :elementId="fields.elaborate.name"
                                    />
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label :label="fields.evidence"></Label>
                                    </div>
                                    <div class="col-sm-2 p-0">
                                        <Select
                                            @change="
                                                updateForm(
                                                    fields.evidence.name,
                                                    $event.target.value
                                                )
                                            "
                                            :disabled="!isNewComplaint"
                                            :dropdownitems="dropdownList.yesno"
                                            :elementId="fields.evidence.name"
                                            :value="form.evidence"
                                        />
                                    </div>
                                </div>
                                <div v-show="!+form.evidence" class="row mb-2">
                                    <div class="col-sm-auto">
                                        <Label
                                            :label="fields.nopossession"
                                        ></Label>
                                    </div>
                                    <div class="col-sm-2 p-0">
                                        <Select
                                            @change="
                                                updateForm(
                                                    fields.nopossession.name,
                                                    $event.target.value
                                                )
                                            "
                                            :disabled="!isNewComplaint"
                                            :dropdownitems="dropdownList.yesno"
                                            :elementId="
                                                fields.nopossession.name
                                            "
                                            :value="form.nopossession"
                                        />
                                    </div>
                                </div>
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <div class="col-sm-auto">
                                            <Label
                                                :label="fields.uploadfile"
                                            ></Label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-sm-4">
                                            <input
                                                type="file"
                                                :disabled="!isNewComplaint"
                                                class="form-control-file"
                                                name="fileList"
                                                multiple
                                                id="uploadfiles"
                                                @change="fileUploadList"
                                                aria-describedby="fileHelp"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <small
                                                id="fileHelp"
                                                class="form-text text-muted"
                                                >Please upload a file i.e .pdf,
                                                .jpg, .png, .docx. Size of image
                                                should not be more than
                                                2MB.</small
                                            >
                                        </div>
                                        <div id="fileNames= "></div>
                                    </div>
                                </div>
                                <admin-update
                                    :dropdownList="dropdownList"
                                    :fields="fields"
                                ></admin-update>

                                <div class="card-footer">
                                    <Button
                                        class="mx-2"
                                        type="button"
                                        @click="submitreport"
                                        button="submit"
                                        >Submit</Button
                                    >
                                    <Button
                                        button="cancel"
                                        @click="
                                            isNewComplaint == true
                                                ? cancelreport()
                                                : hideViewComplaint()
                                        "
                                        >Cancel</Button
                                    >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <Register
            :showModal="isModalOpen"
            :anonymoususer_id="userid"
            :label="logintext"
            @hideLoginModal="isModalOpen = false"
            @submitReport="storeReport"
        >
            <template #formname> Create Anonymous User </template>
            <template #usertitle> Anonymous User ID </template>
        </Register>
    </div>
</template>

<script>
import Select from "./Select";
import Label from "./Label";
import Input from "./Input";
import ReportTitle from "./ReportTitle";
import TextArea from "./TextArea";
import DateTimePicker from "./DateTimePicker";
import Button from "./Button";
import Register from "./Register";
import AdminUpdate from "./AdminUpdate";
import moment from "moment-timezone";
import axios from "axios";
export default {
    name: "MakeReport",

    data() {
        return {
            isModalOpen: false,
            userid: "",
            password: "",
            logintext: {
                newpassword: {
                    name: "newpassword",
                    title: "Enter New Password",
                },
                confirmpassword: {
                    name: "confirmpassword",
                    title: "Confirm New Password",
                },
                anonymousid: {
                    name: "anonymousid",
                    title: "Anonymous User ID",
                },
            },
            msg: {},
            form: {},
            range: {
                start: "",
                end: "",
            },
            datefrom: Date(),
            dateto: Date(),
            dropdownList: {},
            fileList: [],
            fields: {
                anonymous: {
                    name: "anonymous",
                    title: "Do you want to remain anonymous?",
                    placeholder: "",
                    description: "What is your relation with KWS",
                    order: 1,
                },
                complainanttype: {
                    name: "complainanttype",
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
                nationalid: {
                    name: "nid",
                    title: "National ID",
                    placeholder: "national ID",
                    description: "Government recognized Identification ID ",
                    order: 1,
                },
                workid: {
                    name: "wid",
                    title: "Employee ID",
                    placeholder: "employee ID",
                    description: "Employee Identification number",
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
                    name: "middlename",
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
                phone: {
                    name: "phone",
                    title: "Phone number",
                    placeholder: "phone number",
                    description: "phone number of the complainant",
                    order: 1,
                },
                phoneno: {
                    name: "phoneno",
                    title: "Phone Number",
                    placeholder: "Phone Number",
                    description: "Phone number of the complainant",
                    order: 1,
                },

                email: {
                    name: "email",
                    title: "Email Address",
                    placeholder: "email address",
                    description: "Email address of the complainant",
                    order: 1,
                },

                reported: {
                    name: "reported",
                    title: "Have you reported this issue to any other party",
                    placeholder: "",
                    description: "Enter complainant type",
                    order: 3,
                },
                towhom: {
                    name: "towhom",
                    title: "If yes, enter name of person or institution",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                describe: {
                    name: "description",
                    title: "Describe the incident in as much detail as possible",
                    placeholder: "",
                    description: "Enter complainant type",
                },
                subjectdetail: {
                    name: "detail",
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
                uploadfile: {
                    name: "uploadefile",
                    title: "Select file to upload",
                    placeholder: "",
                    description: "Please select file to upload",
                },
                complaintno: {
                    name: "complaintno",
                    title: "Complaint No.",
                    placeholder: "",
                    description: "Complaint No",
                },
                complaintstatus: {
                    name: "complaintstatus",
                    title: "Complaint Status.",
                    placeholder: "",
                    description: "Complaint Status",
                },
                complaintconclude: {
                    name: "complaintconclude",
                    title: "Complaint Conclusion.",
                    placeholder: "",
                    description: "Complaint Conclusion",
                },
            },
        };
    },
    components: {
        Select,
        Label,
        Input,
        TextArea,
        DateTimePicker,
        Button,
        Register,
        ReportTitle,
        AdminUpdate,
    },
    props: {
        isNewComplaint: {
            type: Boolean,
            default: true,
        },
        complaintData: Object,
        pagetitle: String,
    },
    emits: ["saveDropDownList", "hideViewComplaint"],
    created() {
        let dropdownList = sessionStorage.getItem("dropdownlist");
        if (!dropdownList) {
            console.log("emit saveDropDown");
            this.$emit("saveDropDownList");
            dropdownList = sessionStorage.getItem("dropdownlist");
        }
        this.dropdownList = JSON.parse(dropdownList);

        const storedForm = this.getFormData();
        if (storedForm) {
            this.form = {
                ...this.form,
                ...storedForm,
            };
            this.range.start = storedForm.datefrom;
            this.range.end = storedForm.dateto;
        }
    },

    watch: {
        range: function (value) {
            this.updateForm(
                "datefrom",
                moment(value.start).format("YYYY-MM-DD HH:mm")
            );
            this.updateForm(
                "dateto",
                moment(value.end).format("YYYY-MM-DD HH:mm")
            );
        },
        complaintData: function (value) {
            this.form = value;
        },
    },

    methods: {
        cancelreport() {
            sessionStorage.clear(0);
            history.back();
        },
        hideViewComplaint() {
            this.$emit("hideViewComplaint");
        },
        async submitreport(password) {
            let isEmailorId = false;

            if (this.$refs.makereport.checkValidity()) {
                this.userid = await this.getAnonymousID();

                //this.userid = data.userid;
                this.updateForm("userid", this.userid);
                this.isModalOpen = true;
                if (isEmailorId) {
                    this.storeReport(password);
                }
            } else {
                this.$forceUpdate();
                this.$refs.makereport.reportValidity();
            }
        },
        updateForm(input, value) {
            let res = value.trim();
            this.form[input] = res;

            let storedForm = this.getFormData(); // extract stored form
            if (!storedForm) storedForm = {}; // if none exists, default to empty object
            if (res) {
                storedForm[input] = res; // store new value
            }
            for (const [key, value] of Object.entries(storedForm)) {
                if (value.trim() === "") {
                    delete storedForm[key];
                }
            }

            this.saveFormData(storedForm); // save changes into sessionStorage
        },

        getFormData() {
            return JSON.parse(sessionStorage.getItem("form"));
        },
        getDropDownList() {
            //let dropdownlist = JSON.parse(sessionStorage.getItem("dropdownlist"));
            this.$emit("saveDropDownList");
            //dropdownlist = this.getDropDownList();
        },
        saveFormData(form) {
            sessionStorage.setItem("form", JSON.stringify(form));
        },

        async getToken() {
            let data = null;
            let resp = "";
            let userDetails = {};
            if (this.email) {
                userDetails = {
                    email: this.email,
                    password: this.userid,
                    firstname: this.firstname,
                    middlename: this.middlename,
                    lastname: this.lastname,
                };
            } else {
                userDetails = {
                    userid: this.userid,
                    password: this.password,
                };
            }
            let strUserDetails = JSON.stringify(userDetails);

            try {
                const { data } = await axios.post("register", userDetails, {
                    withCredentials: true,
                });
                if (data.status === "200") {
                    axios.defaults.headers.common[
                        "Authorization"
                    ] = `Bearer ${data.authorisation.token}`;
                    /*                     axios.defaults.headers.common["X-CSRF-TOKEN"] =
                        data.authorisation.x_csrf_token;
 */
                    resp = {
                        token: data.authorisation.token,
                        id: data.user.id,
                    };
                    return resp;
                } else {
                    this.msg["warning"] =
                        "The email provided has already been used, please select 'Yes' to remain anonymous and submit report";

                    setTimeout(() => (this.msg = {}), 5000);
                }
            } catch (err) {
                console.log(err);
            }
        },
        async storeReport(password) {
            let data = null;
            this.password = password;
            let formdata = new FormData();
            let resp = await this.getToken();
            if (resp.token) {
                let headers = new Headers();
                headers.append("Authorization", "bearer " + resp.token);
                headers.append("Content-type", "application/json");
                this.form["user_id"] = resp.id;

                for (const [key, value] of Object.entries(this.form)) {
                    formdata.append(key, value);
                }
                for (let i = 0; i < this.fileList.length; i++) {
                    formdata.append("files[]", this.fileList[i]);
                }

                try {
                    const { data } = await axios.post("complaints", formdata, {
                        withCredentials: true,
                    });

                    /* const res = await fetch(
                        "http://localhost:8000/api/complaints",
                        {
                            method: "POST",
                            headers: headers,
                            body: formdata,
                        }
                    );
                    data = await res.json();
                                        const { data } = await axios.post("complaints", this.form, {
                        headers: {
                            headers,
                        },
                    });
 */
                    if (data.status === "200") {
                        this.msg["success"] =
                            "The complaint has been saved successfully.";
                        window.scrollTo(0, 0);
                        setTimeout(() => {
                            this.msg = {};
                            this.cancelreport();
                        }, 5000);
                        //this.cancelreport();
                    } else {
                        this.msg["warning"] =
                            "The complaint has NOT been saved. Try again later";
                        setTimeout(() => (this.msg = {}), 5000);
                    }
                } catch (err) {
                    console.log(err);
                }
            }
        },
        async getAnonymousID() {
            let data = null;
            try {
                const { data } = await axios.get("user/randomuserid", {
                    withCredentials: true,
                });
                let userid = data.userid;
                return userid;
            } catch (err) {
                console.log(err);
            }
        },
        fileUploadList(event) {
            if (event.target.files.length == 0) {
                return;
            }
            this.fileList = event.target.files;
            console.log(this.fileList);
        },
    },
};
/* const { data } = await axios.post("api/complaints", this.form, {
    headers: {
        Authorization: `Bearer ${resp.token}`,
    },
}); */
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
.reporttitle {
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
