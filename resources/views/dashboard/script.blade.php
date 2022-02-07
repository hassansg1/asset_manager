@php $asst_function_name = getAssetFunctions(); @endphp
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
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        // legend: {
        //     type: 'scroll',
        //     orient: 'vertical',
        //     right: 0,
        //     top: 20,
        //     bottom: 20,
        //     data: data.legendData
        // },
        series: [
            {
                name: '',
                type: 'pie',
                radius: '55%',
                center: ['40%', '50%'],
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
        {{--var  nameList;--}}
        {{--    @php $asst_function_name = getAssetFunctions();--}}
        {{--    foreach ($asst_function_name as $name){ @endphp--}}
        {{--        nameList = ['{{$name->name}}'] ;--}}
        {{--@php--}}
        {{--}--}}
        {{--@endphp--}}
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
        for (var i = 0; i < nameList.length; i++) {
            var name =
                Math.random() > 0.65
                    ? makeWord(4, 1) + '·' + makeWord(3, 0)
                    : makeWord(2, 1);
            legendData.push(name);
            seriesData.push({
                name: name,
                value: 0,
            });
        }
        return {
            legendData: legendData,
            seriesData: seriesData
        };
        function makeWord(max, min) {
            const nameLen = Math.ceil(Math.random() * max + min);
            const name = [];
            for (var i = 0; i < nameLen; i++) {
                name.push(nameList[Math.round(Math.random() * nameList.length - 1)]);
            }
            return name.join('');
        }
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
