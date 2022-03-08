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
                top: 30,
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
            value: {{$asset_count}},
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
    renderComplianceChart(4);

    function renderComplianceChart(versionId, parentClauseId = null) {
        $.ajax({
            type: "GET",
            url: '{{ url('chart/compliance_chart') }}',
            data: {
                versionId: versionId,
                parentClauseId: parentClauseId,
            },
            success: function (result) {
                if (result.status) {
                    $('#compliance_table').html(result.table);
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
                            orient: 'horizontal',
                            top: 'top'
                        },
                        series: [
                            {
                                name: 'Compliance',
                                type: 'pie',
                                radius: '60%',
                                data: result.data,
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
                }
            },
        });
    }
</script>
