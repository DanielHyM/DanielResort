@extends("layouts.main_layout")

@section('styles')
{{--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">--}}
{{--   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">--}}
{{--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.6/datatables.min.css"/>--}}

@endsection



@section("content")

    <table id="housings" class="table table-striped table-bordered ">
        <thead>
            <tr>
                <th>Planta</th>
                <th>Numero Habitacion</th>
                <th>Descripcion</th>
                <th>Precio/Noche</th>
                <th>Fecha de creacion</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>

        </tbody>

    </table>


@endsection




@section('script')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function (){
            var tabla = $('#housings').DataTable({

                processing: true,
                serverSide: true,
                language:{
                    url:'{{asset('dataTableTranslations/Spanish.json')}}'
                },
                ajax: {
                    type: 'POST',
                    url: "{{route('housings.listHousings')}}",

                },
                columns: [
                    { data: 'floor' },
                    { data: 'room_number' },
                    { data: 'description' },
                    { data: 'price_per_night' },
                    { data: 'created_at' },
                    { data: 'actions' }

                ],
                searching:false,




            });

        });

    </script>
@endsection



