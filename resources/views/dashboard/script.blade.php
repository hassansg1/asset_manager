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
