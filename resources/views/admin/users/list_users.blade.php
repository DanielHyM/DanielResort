@extends("layouts.main_layout")

@section('styles')
{{--   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">--}}
{{--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.6/datatables.min.css"/>--}}
{{--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>--}}

@endsection



@section("content")

    <div class="row">
        <div class="col-12">

            <table id="users" class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Email</th>
                    <th>Fecha de Creacion</th>
                    <th>Rol</th>

                </tr>
                </thead>
                <tbody>

                </tbody>

            </table>


        </div>
    </div>



@endsection




@section('script')

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
       $(function (){
          var tabla = $('#users').DataTable({

              processing: true,
              serverSide: true,
              language:{
                  url:'{{asset('dataTableTranslations/Spanish.json')}}'
              },
              ajax: {
                  type: 'POST',
                  url: "{{route('users.listUsers')}}",

              },
              columns: [
                  { data: 'name' },
                  { data: 'dni' },
                  { data: 'email' },
                  { data: 'updated_at' },
                  { data: 'rol' }
              ],
             searching:false,




          });

       });


    </script>
@endsection



