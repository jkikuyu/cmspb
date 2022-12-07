<template>
    <DatePicker
        mode="dateTime"
        :mode-config="modeConfig"
        :valid-hours="{ max: maxHrs }"
        :max-date="maxDate"
    >
        <template v-slot="{ inputValue, inputEvents }">
            <div class="row">
                <div class="col-sm-2">
                    <Input
                        :elementId="dateOccurred.name"
                        :value="inputValue"
                        v-on="inputEvents"
                    />
                </div>
            </div>
        </template>
    </DatePicker>
</template>

<script>
import { Calendar, DatePicker } from "v-calendar";
import Label from "./Label";
import Input from "./Input";

export default {
    name: "SingleDateTimePicker",
    components: {
        DatePicker,
        Calendar,
        Label,
        Input,
    },

    setup() {
        const maxDate = new Date();
        const currentHr = maxDate.getHours();
        const maxHrs = currentHr > 0 ? currentHr - 1 : 0;
        let dateOccurred = {
            name: "dateoccurred",
            title: "Date of Occurrance",
        };

        const modeConfig = {
            type: "string",
            mask: "YYYY-MM-DD HH:mm",
        };
        return {
            modeConfig,
            maxDate,
            dateOccurred,
            maxHrs,
        };
    },
};
</script>

<style></style>
