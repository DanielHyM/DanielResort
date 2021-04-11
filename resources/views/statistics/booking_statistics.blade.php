@extends("layouts.main_layout")

@section('head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        /**
         * Booking Chart
         */
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Reservas'],
                ['Enero', {{$arrMonthCount['Jan']}}],
                ['Febrero',  {{$arrMonthCount['Feb']}}],
                ['Marzo',  {{$arrMonthCount['Mar']}}],
                ['Abril',  {{$arrMonthCount['Apr']}}],
                ['Mayo',  {{$arrMonthCount['May']}}],
                ['Junio',  {{$arrMonthCount['Jun']}}],
                ['Julio',  {{$arrMonthCount['Jul']}}],
                ['Agosto',  {{$arrMonthCount['Aug']}}],
                ['Septiembre',  {{$arrMonthCount['Sep']}}],
                ['Octubre',  {{$arrMonthCount['Oct']}}],
                ['Noviembre',  {{$arrMonthCount['Nov']}}],
                ['Diciembre',  {{$arrMonthCount['Dec']}}],
            ]);

            var options = {
                title: 'Reservas por Mes',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }

        /**
         * Bar chart
         */
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawBarChart);

        function drawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ['Meses del año', 'Ganancias en Euros'],
                ['Enero', {{$arrMonthProfit['Jan']}}],
                ['Febrero',  {{$arrMonthProfit['Feb']}}],
                ['Marzo',  {{$arrMonthProfit['Mar']}}],
                ['Abril',  {{$arrMonthProfit['Apr']}}],
                ['Mayo',  {{$arrMonthProfit['May']}}],
                ['Junio',  {{$arrMonthProfit['Jun']}}],
                ['Julio',  {{$arrMonthProfit['Jul']}}],
                ['Agosto',  {{$arrMonthProfit['Aug']}}],
                ['Septiembre',  {{$arrMonthProfit['Sep']}}],
                ['Octubre',  {{$arrMonthProfit['Oct']}}],
                ['Noviembre',  {{$arrMonthProfit['Nov']}}],
                ['Diciembre',  {{$arrMonthProfit['Dec']}}],

            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Ganancias',
                },
                bars: 'vertical',
                vAxis: {format: 'decimal'},
                height: 400,
                colors: ['#1b2c9e']
            };

            var chart = new google.charts.Bar(document.getElementById('chart_div'));

            chart.draw(data, google.charts.Bar.convertOptions(options));

            var btns = document.getElementById('btn-group');

            btns.onclick = function (e) {

                if (e.target.tagName === 'BUTTON') {
                    options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            }
        }

    </script>
@endsection


@section("content")
    <body>
    <div id="curve_chart" style="width: 100%; height: 500px; margin:auto"></div><br>
    <div id="chart_div" style="width: 100%; height: 500px; margin:auto; padding: 50px"></div>
    </body>
@endsection
