<template>
    <div>
        <page-header name="Home"></page-header>
        <div class="content">
            <div class="row">
                <info-box name="Source Registered" value="9" color="yellow" progress="20" icon="newspaper-o">
                    4 / 9 sources active
                </info-box>
                <info-box name="Link Registered" value="1400" color="yellow" progress="40" icon="link">
                    300 / links crawled
                </info-box>
                <info-box name="Raw Registered" value="5000" color="yellow" progress="60" icon="database">
                    4500 / 500 data processed
                </info-box>
                <info-box name="Corpus" value="666" color="yellow" progress="80" icon="book">
                    666 corpus available
                </info-box>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <div class="box box-warning">
                       <div class="box-header with-border">
                           <h3 class="box-title">Example Chart</h3>
                       </div>
                       <div class="box-body">
                           <apex-charts type="bar" :options="chartOptions" :series="series" :colors="colors"></apex-charts>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import ApexCharts from 'vue-apexcharts'
    import PageHeader from './PageHeader';
    import InfoBox from './InfoBox';
    export default {
        props: ['links'],
        components:{
            PageHeader,
            InfoBox,
            ApexCharts
        },
        data: function() {
            return {
                chartOptions: {
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
                }],
                colors: ['#2E93fA', '#66DA26', '#546E7A', '#E91E63', '#FF9800']
            }
        }
    }
</script>
