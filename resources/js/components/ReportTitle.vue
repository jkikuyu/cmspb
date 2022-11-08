<template>
    <h2 class="fs-2 mb-2 fw-bold text-center">
        {{ pagetitle }}
    </h2>

</template>

<script>
export default {
    name: "ReportTitle",
    props:{
        pagetitle: {
            default: "Report Incident",
            type: String
        }
    }

}
</script>

<style>

</style>
