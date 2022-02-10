<script>
    var chartDom = document.getElementById('pie-chart1');
    var myChart = echarts.init(chartDom);
    const data = genData();
    var option;
    option = {
        title: {
            text: '',
            subtext: '',
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : Total Assets ({c})'
        },
        legend: {
            type: 'scroll',
            data: data.legendData
        },
        series: [
            {
                name: '',
                type: 'pie',
                top:30,
                data: data.seriesData,
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    option && myChart.setOption(option);
    function genData() {
        // prettier-ignore
        const nameList = [
            @php $asst_function_name = getAssetFunctions();
                foreach ($asst_function_name as $name){ @endphp
                '{{$name->name}}',
            @php
                }
            @endphp
        ];
        const legendData = [];
        const seriesData = [];
        @php $asst_function_name = getAssetFunctions();
                foreach ($asst_function_name as $name){
                $asset_count = getFunctionsWiseAssetCount($name->id);
        @endphp
        legendData.push({
            name: "{{$name->name}}",
        });
        seriesData.push({
            name: "{{$name->name}}",
            value:{{$asset_count}},
        });
            @php }
            @endphp
        return {
            legendData: legendData,
            seriesData: seriesData
        };
    }
</script>

<script>
    var chartDom = document.getElementById('pie-chart');
    var myChart = echarts.init(chartDom);
    var option;

    option = {
        title: {
            text: '',
            subtext: '',
            left: 'center'
        },
        tooltip: {
            trigger: 'item'
        },
        legend: {
            orient: 'vertical',
            left: 'left'
        },
        series: [
            {
                name: 'Assets',
                type: 'pie',
                radius: '50%',
                data: [
                    { value: {{$computer_assets}}, name: 'Computer ('+{{$computer_assets}}+')' },
                    { value: {{$lone_assets}}, name: 'Lone ('+{{$lone_assets}}+')' },
                    { value: {{$network_assets}}, name: 'Network ('+{{$network_assets}}+')' },
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };

    option && myChart.setOption(option);
</script>



<script>

    renderChart('{{ json_encode($values) }}');

    function renderChart(values) {
        values = JSON.parse(values);
        var options = {
            chart: {
                height: 500,
                type: 'pie'
            },
            series: values,
            labels: ["Yes : " +values[0], "No : " +values[1], "Partial : " +values[2], "Not Evaluated : " +values[3]],
            colors: ["#129812", "#ff0000", "#d3d348", "#50a5f1"],
            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                verticalAlign: 'middle',
                floating: false,
                fontSize: '14px',
                offsetX: 0
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240
                    },
                    legend: {
                        show: false
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#pie_chart"), options);
        chart.render(); // Donut chart
    }
</script>
