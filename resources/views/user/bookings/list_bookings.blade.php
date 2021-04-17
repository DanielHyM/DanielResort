@extends("layouts.main_layout")

@section('styles')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.6/datatables.min.css"/>

@endsection



@section("content")

    <table id="bookingsUser" class="table table-striped table-bordered ">
        <thead>
            <tr>

                <th>Habitacion</th>
                <th>Fecha de Entrada</th>
                <th>Hora de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Hora de Salida</th>
                <th>Precio total</th>
                <th>Fecha de Compra</th>
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
            var table = $('#bookingsUser').DataTable({

                processing: true,
                serverSide: true,
                language:{
                    url:'{{asset('dataTableTranslations/Spanish.json')}}'
                },
                ajax: {
                    type: 'POST',
                    url: "{{route('user.booking.listBookings')}}",

                },
                columns: [

                    { data: 'housing_id' },
                    { data: 'check_in_date' },
                    { data: 'check_in_time' },
                    { data: 'check_out_date' },
                    { data: 'check_out_time' },
                    { data: 'total_price' },
                    { data: 'created_at' },
                    { data: 'actions' },




                ],
                searching:false,




            });

            $(document).on('click','.btnDeleteBookingUser',function(event){
                event.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podras deshacer los cambios!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, borrar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = $(event.currentTarget).attr('href');
                        $.post(url,{_method:'delete'})
                            .done(function(response){
                                table.draw();

                                Swal.fire(
                                    '¡Borrado!',
                                    'Registro Eliminado.',
                                    'success'
                                )

                            })
                            .fail(function(response){

                                Swal.fire(
                                    '¡Ups!',
                                    'Ha habido un error.',
                                    'error'
                                )

                            });


                    }
                })


            });

        });


    </script>
@endsection



