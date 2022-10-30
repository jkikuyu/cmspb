<template>
    <DatePicker mode="dateTime" :columns="2" :mode-config="modeConfig" is-range>
        <template v-slot="{ inputValue, inputEvents }">
            <div class="row">
                <div class="col-sm-auto">
                    <Label :label="start"></Label>
                </div>
                <div class="col-sm-2">
                    <Input
                        :elementId="start.name"
                        :value="inputValue.start"
                        v-on="inputEvents.start"
                    />
                </div>
                <div class="col-1"></div>
                <div class="col-sm-auto">
                    <Label :label="end"></Label>
                </div>
                <div class="col-sm-2">
                    <Input
                        readonly
                        :elementId="end.name"
                        :value="inputValue.end"
                        v-on="inputEvents.end"
                    />
                </div>
            </div>
        </template>
    </DatePicker>
</template>

<script>
import { DatePicker } from "v-calendar";
import Label from "./Label";
import Input from "./Input";
export default {
    data() {
        return {
            modeConfig: {
                type: "string",
                mask: "YYYY-MM-DD HH:mm",
            },

            masks: { L: "YYYY-MM-DD" },
            start: {
                name: "datefrom",
                title: "Date of Occurrance",
            },
            end: {
                name: "dateto",
                title: "Date Reported",
            },
        };
    },
    watch: {
        range: {
            handler: function () {
                console.log(this.range);
            },
            deep: true,
        },
    },

    components: {
        DatePicker,
        Label,
        Input,
    },

    /* watch: {
        inputValue: function (val) {
            console.log("input value ", val.start);
            console.log(val.end);
        }, */
};
</script>

<style></style>
