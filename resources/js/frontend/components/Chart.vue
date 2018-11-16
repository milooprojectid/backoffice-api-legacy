<template>
        <div class="box box-warning">
            <!--<div class="box-header with-border">-->
                <!--<h3 class="box-title">Example Chart</h3>-->
            <!--</div>-->
            <div class="box-body">
                <apex-charts type="bar" :options="options" :series="series"></apex-charts>
            </div>
        </div>
</template>

<script>
    import ApexCharts from 'vue-apexcharts'
    export default {
        components: {
            ApexCharts
        },
        data: () => ({
            options: {
                chart: {
                    id: 'vuechart'
                },
                xaxis: {
                    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
                }
            },
            series: [{
                name: 'series-1',
                data: [30, 40, 45, 50, 49, 60, 70, 91]
            }]
        })
    }
</script>

<style scoped>

</style>
