<template>
    <Label :for="InputItem.field">{{ InputItem.title }}</Label>
    <div class="mb-3 input-group input-group-sm">
        <input
            v-model="InputItem.name"
            class="input-group"
            :placeholder="InputItem.placeholder"
        />
    </div>
</template>

<script>
import Label from "./Label";
export default {
    components: { Label },
    props: {
        InputItem: Object,
    },
};
</script>

<style></style>
