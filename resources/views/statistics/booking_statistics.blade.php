@extends("layouts.main_layout")

@section('head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Reservas'],
                ['Enero',  1000],
                ['Febrero',  1170],
                ['Marzo',  660],
                ['Abril',  1030],
                ['Mayo',  1030],
                ['Junio',  1030],
                ['Julio',  1030],
                ['Agosto',  1030],
                ['Septiembre',  1030],
                ['Octubre',  1030],
                ['Noviembre',  1030],
                ['Diciembre',  1030],
            ]);

            var options = {
                title: 'Reservas por Mes',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    </script>
@endsection


@section("content")
    <body>
    <div id="curve_chart" style="width: 70%; height: 500px; margin:auto"></div>
    </body>

@endsection
