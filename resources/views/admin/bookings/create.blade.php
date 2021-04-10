@extends("layouts.main_layout")


@section('head')
    <!--DATEPICKER-->
{{--    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">--}}

    <!--DATEPICKEREND-->
@endsection

@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Reserva') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('bookings.store')}}" class="checkAvaiability" id="checkAvaiability">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Usuario') }}</label>

                                <div class="col-md-6">
                                    <select id="user_id"  class="form-control @error('user_id') is-invalid @enderror" name="user_id">

                                        @foreach($users as $user)

                                            <option value="{{$user->id}}">{{$user->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Habitacion') }}</label>

                                <div class="col-md-6">
                                    <select id="housing_id"  class="form-control @error('housing_id') is-invalid @enderror" name="housing_id">

                                        @foreach($housings as $housing)

                                            <option value="{{$housing->id}}">{{$housing->room_number}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="check_in_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Entrada') }}</label>

                                <div class="col-md-6">

                                    <input size="16" type="text" class="form-control datepicker" id="check_in_date" name="check_in_date" autocomplete="off">

                                    @error('check_in_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="check_in_time" class="col-md-4 col-form-label text-md-right">{{ __('Hora de Entrada') }}</label>

                                <div class="col-md-6">
                                    <input id="check_in_time" type="text" class="form-control timepicker @error('check_in_time') is-invalid @enderror" name="check_in_time" autocomplete="off" >

                                    @error('check_in_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="check_out_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Salida') }}</label>

                                <div class="col-md-6">


                                    <input size="16" type="text" class="form-control datepicker" id="check_out_date" name="check_out_date" autocomplete="off">




                                    @error('check_out_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="check_out_time" class="col-md-4 col-form-label text-md-right">{{ __('Hora de Salida') }}</label>

                                <div class="col-md-6">
                                    <input id="check_out_time" type="text" class="form-control timepicker @error('check_out_time') is-invalid @enderror" name="check_out_time" autocomplete="off" >

                                    @error('check_out_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Crear Reserva') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>


    $(document).ready(function(){
        $('#housing_id').trigger('change')
    })

    $('#housing_id').change(function(){
         console.log( $(this).val())
        $('#checkAvaiability').attr('data-housing', $(this).val())

    })




</script>

@endsection
