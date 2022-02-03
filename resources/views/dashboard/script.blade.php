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
            left: 'left',
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
            },
        ]
    };
    option && myChart.setOption(option);
    function genData(count) {
        // prettier-ignore
        const nameList = [
            '赵', '钱', '孙', '李', '周', '吴', '郑', '王', '冯', '陈', '褚', '卫', '蒋', '沈', '韩', '杨', '朱', '秦', '尤', '许', '何', '吕', '施', '张', '孔', '曹', '严', '华', '金', '魏', '陶', '姜', '戚', '谢', '邹', '喻', '柏', '水', '窦', '章', '云', '苏', '潘', '葛', '奚', '范', '彭', '郎', '鲁', '韦', '昌', '马', '苗', '凤', '花', '方', '俞', '任', '袁', '柳', '酆', '鲍', '史', '唐', '费', '廉', '岑', '薛', '雷', '贺', '倪', '汤', '滕', '殷', '罗', '毕', '郝', '邬', '安', '常', '乐', '于', '时', '傅', '皮', '卞', '齐', '康', '伍', '余', '元', '卜', '顾', '孟', '平', '黄', '和', '穆', '萧', '尹', '姚', '邵', '湛', '汪', '祁', '毛', '禹', '狄', '米', '贝', '明', '臧', '计', '伏', '成', '戴', '谈', '宋', '茅', '庞', '熊', '纪', '舒', '屈', '项', '祝', '董', '梁', '杜', '阮', '蓝', '闵', '席', '季', '麻', '强', '贾', '路', '娄', '危'
        ];
        const legendData = [];
        const seriesData = [];
        for (var i = 0; i < count; i++) {
            var name =
                Math.random() > 0.65
                    ? makeWord(4, 1) + '·' + makeWord(3, 0)
                    : makeWord(2, 1);
            legendData.push(name);
            seriesData.push({
                name: name,
                value: Math.round(Math.random() * 100000)
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
