
<html>
<head>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <title>DanielResort</title>
    <style>

        a{
            margin: 2px;
        }

        .body-content{
            margin-top: 50px;

        }

        .card-header{
            background-color: #007BFF;
            color: white;
            font-weight: bolder;

        }

        #logout-form-menu{
            display: none;
        }

        form{
            margin: 0 auto;
            width: 500px;
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
    @yield('script')
</body>

</html>
