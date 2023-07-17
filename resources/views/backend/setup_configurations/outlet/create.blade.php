@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0 h6">{{ translate('Create Branch') }}</h1>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('outlets.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Branch Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Address') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" placeholder="Branch Address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Phone') }}</label>
                            <div class="col-sm-9">
                                <input type="number" name="phone" class="form-control" placeholder="Branch Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ translate('Branch Direction') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="gmap" class="form-control" placeholder="Google Map URL">
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
                                    @foreach ($day as $d)
                                        <tr class="day" data-id="{{ $d->id }}" data-day="{{ $d->name }}">
                                            <td id="checkBox-{{ $d->id }}">
                                                <div class="form-check">
                                                    <input class="form-check-input rubai-{{ $d->id }}" type="checkbox">
                                                </div>
                                            </td>
                                            <td><input type="hidden" value="{{ $d->id }}" name="day_id[]">{{ ucfirst($d->name) }}
                                            </td>
                                            <td id="openingTime-{{ $d->id }}"><span class="text-danger font-weight-bold">Off
                                                    Day</span>
                                            </td>
                                            <td id="closingTime-{{ $d->id }}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
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
                var day = $(this).attr('data-day');
                // alert(day);
                $('#checkBox-' + id + '').on('change', function() {
                    if (!$('.rubai-' + id + '').is(':checked')) {
                        $('.otime-' + id + '').empty().append(
                            '<span class="text-danger">Off Day</span>');
                        $('.ctime-' + id + '').empty();
                    } else {
                        $('#openingTime-' + id + '').html('<div class="otime-'+id+'"><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot08-'+id+'" value="08"><label class="form-check-label" for="ot08-'+id+'">{{'08:00'}} AM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot09-'+id+'" value="09"><label class="form-check-label" for="ot09-'+id+'">{{'09:00'}} AM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot10-'+id+'" value="10"><label class="form-check-label" for="ot10-'+id+'">{{'10:00'}} AM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="open['+id+']" id="ot11-'+id+'" value="11"> <label class="form-check-label" for="ot11-'+id+'">{{'11:00'}} AM</label></div></div>');

                        $('#closingTime-' + id + '').html('<div class="ctime-'+id+'"><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct06-'+id+'" value="06"><label class="form-check-label" for="ct06-'+id+'">{{'06:00'}} PM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct07-'+id+'" value="07"><label class="form-check-label" for="ct07-'+id+'">{{'07:00'}} PM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct08-'+id+'" value="08"><label class="form-check-label" for="ct08-'+id+'">{{'08:00'}} PM</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="close['+id+']" id="ct09-'+id+'" value="09"><label class="form-check-label" for="ct09-'+id+'">{{'09:00'}} PM</label></div></div>');
                    }
                });

            });
        });
    </script>
@endsection