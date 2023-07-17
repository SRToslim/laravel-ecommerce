@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0 h6">{{ translate('Create Branch') }}</h1>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('outlets.update', $branch->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Branch Name" value="{{ $branch->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Address') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" placeholder="Branch Address" value="{{ $branch->address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Phone') }}</label>
                            <div class="col-sm-9">
                                <input type="number" name="phone" class="form-control" placeholder="Branch Phone" value="{{ $branch->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Direction') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="gmap" class="form-control" placeholder="Google Map URL" value="{{ $branch->gmap }}">
                            </div>
                        </div>
                        <hr>
                        <h1 class="mb-0 h6">{{ translate('Office Time') }}</h1>
                        <hr>
                        <div class="form-group row week">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Day</th>
                                        <th>Opening Time</th>
                                        <th>Closing Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($branch->octime as $d)
                                    @php
                                        //dd($d->open_time);
                                    @endphp
                                    <tr class="day" data-id="{{ $d->day_id }}" data-open="{{ $d->open_time }}">
                                        <td id="checkBox-{{ $d->day_id }}">
                                            <div class="form-check">
                                                <input class="form-check-input rubai-{{ $d->day_id }}" type="checkbox" @if ($d->open_time != null) checked @endif>
                                            </div>
                                        </td>
                                        <td><input type="hidden" value="{{ $d->day_id }}" name="day_id[]">{{ucfirst($d->days->name)}}</td>
                                        @if ($d->open_time == null)
                                        <td id="openingTime-{{ $d->day_id }}"><span class="text-danger font-weight-bold">Offday</span></td>
                                        <td id="closingTime-{{ $d->day_id }}"></td>
                                        @else

                                        <td id="openingTime-{{ $d->day_id }}">
                                            <div class="otime-{{$d->day_id}}">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="open[{{$d->days->id}}]" id="ot8-{{$d->day_id}}" value="08" @if ($d->open_time == '08') checked @endif>
                                                    <label class="form-check-label" for="ot8-{{$d->day_id}}">{{ '08:00' }} AM</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="open[{{$d->days->id}}]" id="ot9-{{$d->day_id}}" value="09" @if ($d->open_time == '09') checked @endif>
                                                    <label class="form-check-label" for="ot9-{{$d->day_id}}">{{ '09:00' }} AM</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="open[{{$d->days->id}}]" id="ot10-{{$d->day_id}}" value="10" @if ($d->open_time == '10') checked @endif>
                                                    <label class="form-check-label" for="ot10-{{$d->day_id}}">{{ '10:00' }} AM</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="open[{{$d->days->id}}]" id="ot11-{{$d->day_id}}" value="11" @if ($d->open_time == '11') checked @endif>
                                                    <label class="form-check-label" for="ot11-{{$d->day_id}}">{{ '11:00' }} AM</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td id="closingTime-{{ $d->day_id }}">
                                            <div class="ctime-{{$d->day_id}}">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="close[{{$d->days->id}}]" id="ct6-{{$d->day_id}}" value="06" @if ($d->close_time == '06') checked @endif>
                                                    <label class="form-check-label" for="ct6-{{$d->day_id}}">{{ '06:00' }} PM</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="close[{{$d->days->id}}]" id="ct7-{{$d->day_id}}" value="07" @if ($d->close_time == '07') checked @endif>
                                                    <label class="form-check-label" for="ct7-{{$d->day_id}}">{{ '07:00' }} PM</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="close[{{$d->days->id}}]" id="ct8-{{$d->day_id}}" value="08" @if ($d->close_time == '08') checked @endif>
                                                    <label class="form-check-label" for="ct8-{{$d->day_id}}">{{ '08:00' }} PM</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="close[{{$d->days->id}}]" id="ct9-{{$d->day_id}}" value="09" @if ($d->close_time == '09') checked @endif>
                                                    <label class="form-check-label" for="ct9-{{$d->day_id}}">{{ '09:00' }} PM</label>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('.week').on('click', '.day', function() {
                var id = $(this).data('id');
                var day = $(this).attr('data-open');
                var oche = '';
                if(day == 08){
                    oche = 'checked';
                }else if (day == 09) {
                    oche = 'checked';
                }else if (day == 10) {
                    oche = 'checked';
                }else{
                    oche = 'checked';
                }

                $('#checkBox-' + id + '').on('change', function() {
                    if (!$('.rubai-' + id + '').is(':checked')) {
                        $('.otime-' + id + '').empty().append(
                            '<span class="text-danger font-weight-bold">Off Day</span>');
                        $('.ctime-' + id + '').empty();
                    } else {
                        $('#openingTime-' + id + '').html('<div class="otime-'+id+'"><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot08-'+id+'" value="08" '+oche+'><label class="form-check-label" for="ot08-'+id+'">{{'08:00'}} AM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot09-'+id+'" value="09" '+oche+'><label class="form-check-label" for="ot09-'+id+'">{{'09:00'}} AM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot10-'+id+'" value="10" '+oche+'><label class="form-check-label" for="ot10-'+id+'">{{'10:00'}} AM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot11-'+id+'" value="11" '+oche+'> <label class="form-check-label" for="ot11-'+id+'">{{'11:00'}} AM</label></div></div>');

                        $('#closingTime-' + id + '').html('<div class="ctime-'+id+'"><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct06-'+id+'" value="06"><label class="form-check-label" for="ct06-'+id+'">{{'06:00'}} PM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct07-'+id+'" value="07"><label class="form-check-label" for="ct07-'+id+'">{{'07:00'}} PM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct08-'+id+'" value="08"><label class="form-check-label" for="ct08-'+id+'">{{'08:00'}} PM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct09-'+id+'" value="09"><label class="form-check-label" for="ct09-'+id+'">{{'09:00'}} PM</label></div></div>');
                    }
                });
            });
        });
    </script>
@endsection
