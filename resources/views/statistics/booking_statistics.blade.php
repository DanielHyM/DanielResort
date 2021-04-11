@extends("layouts.main_layout")

@section('head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
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
                ['Agosto',  {{$arrMonthCount['Auo']}}],
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
    </script>
@endsection


@section("content")
    <body>
    <div id="curve_chart" style="width: 100%; height: 500px; margin:auto"></div>
    </body>

@endsection
