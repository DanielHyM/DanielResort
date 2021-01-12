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
                    <th>Acciones</th>

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
          var table = $('#users').DataTable({

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
                  { data: 'created_at' },
                  { data: 'rol' },
                  { data: 'actions' }
              ],
             searching:false,




          });

          $(document).on('click','.btnDeleteUser',function(event){
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



