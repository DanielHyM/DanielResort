@extends("layouts.main_layout")

<style>
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .description-texts{
            width: 100%;
        }
        .google-maps{
            width:50%;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .description-texts{
            width: 100%;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .description-texts{
            width: 100%;
        }
        google-maps{
            width: 100%;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .description-texts{
            width: 50%;

        }
        .gmap_canvas{
            margin-left: 40px;
            margin-top:  20px;
        }


    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .description-texts{
            width: 50%;

        }
        .gmap_canvas{
            margin-left: 40px;
            margin-top:  20px;
        }
    }


</style>


@section("content")

    <center><h2>Daniel Resorts, Calidad y Confort</h2></center>
<div  style="float: left;  margin-top: 10px" class=" description-texts">
   <div class="row card-body" style="text-align: justify; font-size: 20px; margin-top: 15px">
       Daniel Resorts es un hotel diseñado exclusivamente para el descanso y el confort de nuestros clientes, el resort dispone de las mayores
       comodidades y tecnologías para que todos puedan disfrutar de la tranquilidad y la brisa especial de las islas canarias.
       Disponemos de un total de trescientas habitaciones disponibles,las cuales están totalmente equipadadas y preparadas para recibir a nuestros clientes.
   </div>
    <div class="row card-body"style="text-align: justify; font-size: 20px; margin-top: 15px">
        La vocación de servicio y calidad de Daniel Resorts nos permite estar preparados para cubrir las necesidades de nuestros clientes.
        Facilitamos presupuestos ágiles y personalizados.
        Además, nuestra filosofía “No sólo Business” permite disfrutar de una oferta adicional,
        no sólo enfocada a los negocios sino a los momentos de ocio durante los cuales poder disfrutar de las terrazas, solariums, piscinas o jacuzzis.
    </div>
    <div class="row card-body"  style="text-align: justify; font-size: 20px; margin-top: 15px">
        La calidad, variedad y creatividad de nuestra oferta gastronómica, unidas a la gran profesionalidad de nuestro equipo del departamento de alimentación y
        bebidas ofrecen una propuesta experimentada que puede ser personalizada según las necesidades.
    </div><div class="row card-body"  style="text-align: justify; font-size: 20px; margin-top: 15px">
        Daniel Resorts cuenta en sus establecimientos con un total de 42 salones, lo cual representa una dimensión total de 5.000 metros cuadrados dedicados exclusivamente
        a la celebración de todo tipo de eventos en distintas ciudades de España.
        Son espacios nobles decorados de forma elegante que, unidos a la excelente insonorización y la más moderna tecnología, son una garantía de éxito.
    </div>




</div>

<div class="row google-maps">
   <!--Google map-->
   <div class="gmap_canvas card-body"><iframe  height="743" width="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=santa%20cruz%20de%20tenerife&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
   <!--Google Maps-->
</div>



@endsection
