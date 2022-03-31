<script>
    renderComplianceChart();
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
</script>
