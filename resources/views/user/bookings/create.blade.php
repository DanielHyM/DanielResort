@extends("layouts.main_layout")




@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reservar Alojamiento') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('user.booking.store', $housing)}}">
                            @csrf
                            <div class="form-group row">
                                <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Planta') }}</label>

                                <div class="col-md-6">
                                    <input id="floor" type="text" class="form-control @error('floor') is-invalid @enderror" name="floor" value="{{ old('floor',$housing->floor) }}" required disabled>

                                    @error('floor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('Numero Habitacion') }}</label>

                                <div class="col-md-6">
                                    <input id="room_number" type="text" class="form-control @error('room_number') is-invalid @enderror" name="room_number"  value="{{$housing->room_number}}" disabled>

                                    @error('room_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"  value="{{$housing->description}}" required disabled>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Precio por Noche') }}</label>

                                <div class="col-md-6">
                                    <input id="price_per_night" type="number" class="form-control @error('price_per_night') is-invalid @enderror" name="price_per_night" value="{{$housing->price_per_night}}" disabled >

                                    @error('price_per_night')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-12">
                                    <img src="{{asset($housing->getMedia('housingImages')->first()->getUrl())}}" style="width: 200px;height: 200px;" >

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="check_in_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Entrada') }}</label>

                                <div class="col-md-6">


                                    <input size="16" type="text" class="form-control datepicker" id="check_in_date" name="check_in_date">

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
                                    <input id="check_in_time" type="text" class="form-control timepicker @error('check_in_time') is-invalid @enderror" name="check_in_time" >

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


                                    <input size="16" type="text" class="form-control datepicker" id="check_out_date" name="check_out_date">




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
                                    <input id="check_out_time" type="text" class="form-control timepicker @error('check_out_time') is-invalid @enderror" name="check_out_time" >

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
                                        {{ __('Reservar Alojamiento') }}
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
