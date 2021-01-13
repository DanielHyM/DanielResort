
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
            width: 500px;
        }

        body{
            background-color: #e5e5e5;

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

           var array = ["2021-01-13","2021-01-14","2021-01-15","2021-01-21"]

            $(".datepicker").datepicker({
                minDate: 0,

                beforeShowDay: function(date){
                    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    return [ array.indexOf(string) == -1 ]
                }

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


    </script>
    @yield('script')

</body>

</html>
