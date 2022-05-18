<script>
    renderComplianceChart();
    assetsChart();
    assetsFunctions();
    function renderComplianceChart(parentClauseId = null) {
        let versionId = $('#select_version').val();
        let locationId = $('#select_location').val();
        $.ajax({
            type: "GET",
            url: '{{ url('chart/compliance_chart') }}',
            data: {
                versionId: versionId,
                parentClauseId: parentClauseId,
                locationId: locationId,
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

    function  assetsChart(){
        $.ajax({
            type: "GET",
            url: '{{ url('chart/assets_chart') }}',
            success: function (result) {
                if (result.status) {
                    var chartDom = document.getElementById('assetsChart');
                    var myChart = echarts.init(chartDom);
                    var option;

                    option = {
                        title: {
                            text: 'Number of Assets',
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
                                name: 'Access From',
                                type: 'pie',
                                radius: '50%',
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

    function assetsFunctions(){
        $.ajax({
            type: "GET",
            url: '{{ url('chart/assets_functions_chart') }}',
            success: function (result) {
                if (result.status) {
                    var chartDom = document.getElementById('assetsFunctions');
                    var myChart = echarts.init(chartDom);
                    var option;
                    option = {
                        title: {
                            text: '',
                            left: 'center'
                        },
                        tooltip: {
                            trigger: 'item'
                        },

                        series: [
                            {
                                name: result.data.name,
                                type: 'pie',
                                radius: '100%',
                                center: ['50%', '50%'],
                                data: result.data,
                                roseType: 'circle',
                                label: {
                                    color: 'rgba(0, 0, 0)'
                                },
                                labelLine: {
                                    lineStyle: {
                                        color: 'rgba(0, 0, 0)'
                                    },
                                    smooth: 0.2,
                                    length: 10,
                                    length2: 20
                                },
                                itemStyle: {
                                    color: '#b23431',
                                },
                                animationType: 'scale',
                                animationEasing: 'elasticOut',
                                animationDelay: function (idx) {
                                    return Math.random() * 200;
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
