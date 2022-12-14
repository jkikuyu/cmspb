<template>
    <div class="row">
        <div class="col-sm-4">
            <img class="w-50" src="../../assets/kws.svg" alt="KWS Logo" />
        </div>
        <div class="col-sm-8 text-start">
            <h4>Incident Report</h4>
        </div>
    </div>
    <hr />
    <div class="row mb-2">
        <h5 class="fw-bold">User Credentials</h5>
        <div class="col-sm-5">
            <Label :label="label.anonymousid" />
        </div>
        <div class="col-sm-4">
            {{ user.userid }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <Label :label="label.password" />
        </div>
        <div class="col-sm-4">
            {{ user.password }}
        </div>
    </div>

    <hr />
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.datereported" />
        </div>
        <div class="col-sm-auto">
            {{ datereported }}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.complaintno" />
        </div>
        <div class="col-sm-auto fw-bold">
            {{ user.complaintno }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.anonymous" />
        </div>
        <div class="col-sm-1">
            {{
                form.anonymous
                    ? dropdownList.yesno[form.anonymous].name
                    : "Please select"
            }}
        </div>
    </div>
    <div class="row mb-auto" v-show="!+form.anonymous">
        <div class="col-sm-auto">
            <Label :label="fields.first" />
        </div>
        <div class="col-sm-auto">
            {{ form.firstname }}
            {{ form.middlename ? " " + form.middlename : "" }}
            {{ " " + form.lastname }}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.complainanttype" />
        </div>
        <div class="col-sm-auto">
            {{
                dropdownList.complainantlist
                    .filter((d) => {
                        return d.id == form.complainanttype;
                    })
                    .map((d) => {
                        return d.name;
                    })
            }}
        </div>
    </div>
    <div class="row mb-2" v-show="!+form.complainttype">
        <div class="col-sm-auto">
            <Label :label="fields.workid" />
        </div>
        <div class="col-sm-auto">
            {{ form.wid }}
        </div>
        <div class="col-sm-auto ms-5">
            <Label :label="fields.nationalid" />
        </div>
        <div class="col-sm-auto">
            {{ form.nid }}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.contactyou" />
        </div>
        <div class="col-sm-auto">
            {{
                form.contactyou
                    ? dropdownList.yesno[form.contactyou].name
                    : "Please select..."
            }}
        </div>
    </div>
    <div class="row mb-2" v-show="!+fields.contactyou">
        <div class="col-sm-auto">
            <Label :label="fields.phoneno" />
        </div>
        <div class="col-sm-auto">
            {{ form.phoneno }}
        </div>
        <div class="col-sm-auto">
            <Label :label="fields.email" />
        </div>
        <div class="col-sm-auto">
            {{ form.email }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.allegetype" />
        </div>
        <div class="col-sm-auto">
            {{
                dropdownList.allegetypelist
                    .filter((d) => {
                        return d.id == form.allegetype;
                    })
                    .map((d) => {
                        return d.name;
                    })
            }}
        </div>
    </div>
    <div v-show="form.allegetype == 0" class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.specify" />
        </div>
        <div class="col-sm-auto">
            {{ form.specify }}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.reported" />
        </div>
        <div class="col-sm-auto">
            {{
                form.reported
                    ? dropdownList.yesno[form.reported].name
                    : "Please select..."
            }}
        </div>
    </div>
    <div class="row mb-2" v-show="!!+form.reported">
        <div class="col-sm-auto">
            <Label :label="fields.towhom" />
        </div>
        <div class="col-sm-auto">
            {{ form.towhom }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-auto">
            <Label :label="fields.describe" />
        </div>
    </div>
    <div class="row mb-2 ms-1">
        {{ form.description }}
    </div>
    <div class="row">
        <div class="col-sm-auto">
            <Label :label="fields.subjectdetail" />
        </div>
    </div>
    <div class="row mb-2 ms-1">
        {{ form.detail }}
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.dateOccurred" />{{ ":" }}
        </div>
        <div class="col-sm-auto mb-2">
            {{ form.dateoccurred }}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.threat" />{{
                form.threat
                    ? dropdownList.yesno[form.threat].name
                    : "Please select..."
            }}
        </div>
    </div>
    <div v-show="!!+form.threat">
        <div class="row mb-2">
            <Label :label="fields.elaborate" />
        </div>
        <div class="row mb-2 ms-1">
            {{ form.elaborate }}
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.evidence" />
        </div>
        <div class="col-sm-2 p-0">
            {{
                form.evidence
                    ? dropdownList.yesno[form.evidence].name
                    : "Please select..."
            }}
        </div>
    </div>
    <div v-show="!!+form.evidence">
        <div class="row">
            <Label :label="fields.uploadfile"></Label>
        </div>
        <div class="row">
            <div
                v-for="(selectedFile, index) in selectedFiles"
                :key="index"
                class="m-0"
            >
                <ul>
                    {{
                        index + 1
                    }}{{
                        "."
                    }}

                    {{
                        selectedFile.name
                    }}
                </ul>
            </div>
        </div>
    </div>
    <div v-show="!+form.evidence" class="row mb-2">
        <div class="col-sm-auto">
            <Label :label="fields.nopossession" />
        </div>
        <div class="col-sm-auto">
            {{
                form.nopossession
                    ? dropdownList.yesno[form.nopossession].name
                    : "Please select..."
            }}
        </div>
    </div>
</template>

<script>
import Label from "./Label";

export default {
    name: "ComponentToPrint",
    components: {
        Label,
    },
    props: {
        label: Object,
        form: Object,
        fields: Object,
        user: Object,
        datereported: String,
        dropdownList: Object,
        selectedFiles: Object,
    },
    /*     emits: ["saveDropDownList"],
    setup(props, { emit }) {
        let dropdownList = sessionStorage.getItem("dropdownlist");
        if (!dropdownList) {
            emit("saveDropDownList");
            dropdownList = sessionStorage.getItem("dropdownlist");
        }
        dropdownList = JSON.parse(dropdownList);
        console.log(dropdownList);
        return {
            dropdownList,
        };
    }, */
};
</script>

<style></style>
