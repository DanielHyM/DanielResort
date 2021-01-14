@extends("layouts.main_layout")




@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modificar Reserva') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('user.booking.update', $booking)}}">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">

                            <div class="form-group row">
                                <label for="check_in_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Entrada') }}</label>

                                <div class="col-md-6">

                                    <input size="16" type="text" class="form-control datepicker" id="check_in_date" name="check_in_date" value="{{$booking->check_in_date}}">

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
                                    <input id="check_in_time" type="text" class="form-control timepicker @error('check_in_time') is-invalid @enderror" name="check_in_time" value="{{$booking->check_in_time}}" >

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


                                    <input size="16" type="text" class="form-control datepicker" id="check_out_date" name="check_out_date" value="{{$booking->check_out_date}}" >




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
                                    <input id="check_out_time" type="text" class="form-control timepicker @error('check_out_time') is-invalid @enderror" name="check_out_time" value="{{$booking->check_out_time}}" >

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
                                        {{ __('Modificar Reserva') }}
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
