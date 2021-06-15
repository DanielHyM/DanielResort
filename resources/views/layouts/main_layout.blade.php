
<html>
<head>

    @yield('head')
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('jqueryUI/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timepicker.min.css') }}" rel="stylesheet">




    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">


    <title>DanielResort</title>
    <style>

        #curve_chart{
            box-shadow: 0px 5px 20px 1px;
            border-radius: .4em;

        }

        #chart_div{
            box-shadow: 0px 5px 20px 1px;
            border-radius: .4em;
        }

         input[type=submit]{

            background: linear-gradient(to bottom, #57B2FF, #0086F8);
            box-shadow: 0px 5px 20px 1px;
             border-radius: .4em;
        }

        .navbar{

            background: linear-gradient(to bottom, #57B2FF, #0086F8);
            box-shadow: 0px 5px 20px 1px;
        }

        .card-header{

            background: linear-gradient(to bottom, #57B2FF, #0086F8);
            box-shadow: 0px 5px 20px 1px;
            border-radius: .4em;
        }

        .card-body{

            box-shadow: 0px 5px 20px 1px;
            border-radius: .4em;
        }

        a:hover{

            box-shadow: 0px 5px 20px 1px;
            border-radius: .2em;
        }

        #danielResortIcon{

            width:50px;
            height: 50px;
        }

        #carouselExampleIndicators{

            width: 800px;
            margin: 0 auto;
        }

        a{
            margin: 2px;
        }
        .body-content{

            margin-top: 50px;
            text-align: center;
            padding: 0 50px;
            height: 100%;
        }
        #mainText{
            margin-top: 20px;
        }

        .card-header{
            background-color: #007BFF;
            font-weight: bolder;
            color: white;

        }

        #logout-form-menu{
            display: none;
        }

        form{
            margin: 0 auto;

        }

        body, html{
            background-color: #FBFBFD;
            width: 100%;
            height: 100%;

        }

        select.custom-select.custom-select-sm.form-control.form-control-sm{
            width: 35%;

        }

        #users_length > label {
            float: left;
        }

        #users_info{
            float: left;
        }




        .footer-content{
            position: absolute;
            bottom: 0px;
            width: 100%;
            height: 50px;
            background-color: #007BFF;
            background-attachment: scroll;
            position: fixed;
            color: white;
            background: linear-gradient(to top, #57B2FF, #0086F8);
            box-shadow: 0px 5px 20px 1px;



        }

        .footer a{
            color: white;
        }

        .pagination{
            overflow: visible;
            padding-bottom: 30px;
        }

        .carousel-inner{
            background: linear-gradient(to bottom, #57B2FF, #0086F8);
            box-shadow: 0px 5px 20px 1px;
            border-radius: .4em;




        }







    </style>
    @yield('styles')
</head>
    <body style="font-family: 'Roboto', sans-serif;">

    @include("layouts.top_nav")



    <div class="body-content">
        @yield("content")
    </div>




    <div class="footer-content">
        @yield("footer")

            <footer class=" text-center text-lg-start">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                    © 2021 Copyright:
                    <label>DanielResorts todos los derechos reservados</label>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('jqueryUI/jquery-ui.js')}}"></script>
    <script src="{{asset('js/timepicker.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">

        $(function () {

          // var array = ["2021-01-13","2021-01-14","2021-01-15","2021-01-21"]

            $(".datepicker").datepicker({
                minDate: 0,
                dateFormat: 'dd-mm-yy',

                // beforeShowDay: function(date){
                //     var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                //     return [ array.indexOf(string) == -1 ]
                // }

            });

            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
                minTime: '9',
                maxTime: '8:00pm',
                startTime: '09:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

        });


        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function () {
            $("#fecha").datepicker();
        });


        function checkHousingAvailability(housingId,checkInDate,checkOutDate,checkInTime,checkOutTime){
            $.get('{{route('checkHousingAvailability')}}',{
                checkInDate:checkInDate,
                checkOutDate:checkOutDate,
                housingId:housingId,
                checkInTime:checkInTime,
                checkOutTime:checkOutTime
            }).done(function(response){
                if(!response.availability){
                    Swal.fire(
                        '¡Ups!',
                        'Reserva no disponible para esa fecha.',
                        'error'
                    )
                }else{
                    $('.checkAvaiability').submit();
                }
            })
        }

        $('.checkAvaiability button[type="submit"]').click(function(event){
            event.preventDefault();
            var housingId = $('.checkAvaiability').data('housing');
            var checkInDate = $('#check_in_date').val();
            var checkOutDate = $('#check_out_date').val();
            var checkInTime = $('#check_in_time').val();
            var checkOutTime = $('#check_out_time').val();

            checkHousingAvailability(housingId,checkInDate,checkOutDate,checkInTime,checkOutTime)

        })


    </script>
    @yield('script')

</body>

</html>
