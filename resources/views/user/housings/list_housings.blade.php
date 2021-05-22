@extends("layouts.main_layout")

@section('styles')
{{--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">--}}
{{--   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">--}}
{{--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.6/datatables.min.css"/>--}}

@endsection



@section("content")

    <div class="row">

    @foreach($housings as $housing)

    <div class=" col-sm-12 col-xs-12 col-lg-4 " style="padding: 20px; background-color: #F2F2F2">
        @if($housing->getMedia('housingImages')->first() != null)
        <img src="{{asset($housing->getMedia('housingImages')->first()->getUrl())}}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">Habitacion {{$housing->room_number}}</h5>
            <p class="card-text">{{$housing->description}}.</p>
            <form action="{{route('user.booking.create',$housing)}}" method="POST">
                @csrf
                <input type="submit"  class="btn btn-primary" value="Reservar">
            </form>


        </div>
    </div>
    @endforeach

    </div>
    <div class="pagination">
    {{$housings->links()}}
    </div>

@endsection


@section('script')
@endsection



