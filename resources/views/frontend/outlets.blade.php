@extends('frontend.layouts.app')
@prepend('style')

@endprepend
@section('content')
<section class="ftco-section all-outlet">
    <div class="container">
        <!-- Top Section -->
        <div class="aiz-carousel arrow-none sm-gutters-16 mb-2 mb-md-3 align-items-baseline justify-content-between text-center">
            <!-- Title -->
            <h1 class="">
                <span class="carousel-box position-relative has-transition border-right border-top border-bottom border-left hov-animate-outline" style="padding: 10px;">{{ __('All Branches') }}</span>
            </h1>
        </div>
        <br>
        <!-- Card Section -->
        <div class="row">
            @foreach ($office as $key => $branch)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <iframe width="100%" height="100%" id="gmap_canvas" src="{{ $branch->gmap }}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="card-img-top"></iframe>
                        <div class="card-body">
                            <h5 class="card-title">{{  $branch->name  }}</h5>
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ ('Address') }}: {{ $branch->address }}</li>
                            <li class="list-group-item">{{ ('Phone') }}: <a href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a></li>
                            {{-- <li class="list-group-item">A third item</li> --}}
                        </ul>
                        <div class="card-body single-outlet" data-outletid = "{{ $branch->id }}">
                            <a href="#" class="card-link" data-toggle="modal" data-target="#myModal" data-id="myModal-{{ $branch->id}}">
                                <strong>{{ __('More Info') }}</strong>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title name" id="myModalLongTitle">{{  $branch->name  }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ ('Address') }}: <span class="address">{{ $branch->address }}</span></p>
                    <p>{{ ('Phone') }}: <span class="phone"></span></p>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Day</th>
                                <th>Opening Time</th>
                                <th>Closing Time</th>
                            </tr>
                        </thead>
                        <tbody id="outdet">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
$(document).ready(function() {
    // alert('id');
    var baseurl = '{{URL::to('/')}}' +"/";
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

    $('.all-outlet').on('click', '.single-outlet', function() {
        var id = $(this).attr('data-outletid');
        var url = baseurl+'outlets/'+id;

        // alert(url);
        $.ajax({
            method: "get",
            url:url,
            dataType: 'json',
        }).done(function(data){
            console.log(data.info);
            $('#outdet').empty();
            $('.name').empty();
            $('.address').empty();
            $('.phone').empty();
            $('.name').append(data.info.name);
            $('.address').append(data.info.address);
            $('.phone').append('<a href="tel:'+data.info.phone+'">'+data.info.phone+'</a>');
            $('#outdet').append(data.outlet);
        }).fail(function(data){
            console.log(data);
            alert('Something Wrong.');
        });
    });
});
</script>
@endsection
