@extends("layouts.main_layout")

@section('styles')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.6/datatables.min.css"/>

@endsection



@section("content")

    <table id="users">
        <thead>
            <tr>
                <th>Nombre:</th>
                <th>Dni:</th>
                <th>Email:</th>

            </tr>
        </thead>
        <tbody>

        </tbody>

    </table>


@endsection




@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
    /*   $(function (){
          var tabla = $('#usuarios').DataTable({

              ajax: {
                  type: 'POST',
                  url: "",
                  data: function (d) {
                      d.f_invoice_number = $('#f-invoice-number').val();
                      d.f_invoice_customer = $('#f-invoice-customer').val();
                  }
              },


          });

       });
*/

    </script>
@endsection



