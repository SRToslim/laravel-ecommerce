@extends('backend.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col">
    			<h1 class="h3">{{ translate('Contact Page Details') }}</h1>
    		</div>
    	</div>
    </div>

	<!-- Language -->
    <ul class="nav nav-tabs nav-fill border-light">
        @foreach (\App\Models\Language::all() as $key => $language)
            <li class="nav-item">
                <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('website.contactDetails', ['lang'=> $language->code] ) }}">
                    <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                    <span>{{$language->name}}</span>
                </a>
            </li>
        @endforeach
    </ul>

	<!-- Contact Page Details -->
    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0">{{ translate('Contact Details') }}</h6>
    	</div>
    	<div class="card-body">
    		<div class="row gutters-10">
				<!-- Contact Info Widget -->
    			<div class="col-lg-12">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">{{ translate('Contact Info') }}</h6>
    					</div>
    					<div class="card-body">
                            <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
    							@csrf
								<!-- Contact Name -->
                                <div class="form-group">
    								<label>{{ translate('Contact Name') }} ({{ translate('Translatable') }})</label>
    								<input type="hidden" name="types[][{{ $lang }}]" value="contactpage_name">
    								<input type="text" class="form-control" placeholder="{{ translate('Name') }}" name="contactpage_name" value="{{ get_setting('contactpage_name',null,$lang) }}">
    							</div>
                                <!-- Contact Address -->
                                <div class="form-group">
    								<label>{{ translate('Contact address') }} ({{ translate('Translatable') }})</label>
    								<input type="hidden" name="types[][{{ $lang }}]" value="contactpage_address">
    								<input type="text" class="form-control" placeholder="{{ translate('Address') }}" name="contactpage_address" value="{{ get_setting('contactpage_address',null,$lang) }}">
    							</div>
								<!-- Contact phone -->
                                <div class="form-group">
    								<label>{{ translate('Contact phone') }}</label>
    								<input type="hidden" name="types[]" value="contactpage_phone">
    								<input type="text" class="form-control" placeholder="{{ translate('Phone') }}" name="contactpage_phone" value="{{ get_setting('contactpage_phone') }}">
    							</div>
								<!-- Contact email -->
                                <div class="form-group">
    								<label>{{ translate('Contact email') }}</label>
    								<input type="hidden" name="types[]" value="contactpage_email">
    								<input type="text" class="form-control" placeholder="{{ translate('Email') }}" name="contactpage_email" value="{{ get_setting('contactpage_email') }}">
    							</div>
								<!-- Update Button -->
    							<div class="text-right">
    								<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>

				<!-- Link Widget One -->
                {{-- <div class="col-lg-12">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">{{ translate('Link Widget One') }}</h6>
    					</div>
    					<div class="card-body">
                            <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
								<!-- Title -->
    							<div class="form-group">
    								<label>{{ translate('Title') }} ({{ translate('Translatable') }})</label>
    								<input type="hidden" name="types[][{{ $lang }}]" value="widget_one">
    								<input type="text" class="form-control" placeholder="Widget title" name="widget_one" value="{{ get_setting('widget_one',null,$lang) }}">
    							</div>
								<!-- Links -->
    			                <div class="form-group">
    								<label>{{ translate('Links') }} - ({{ translate('Translatable') }} {{ translate('Label') }})</label>
    								<div class="w3-links-target">
    									<input type="hidden" name="types[][{{ $lang }}]" value="widget_one_labels">
    									<input type="hidden" name="types[]" value="widget_one_links">
    									@if (get_setting('widget_one_labels',null,$lang) != null)
    										@foreach (json_decode(get_setting('widget_one_labels',null,$lang), true) as $key => $value)
    											<div class="row gutters-5">
    												<div class="col-4">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="{{translate('Label')}}" name="widget_one_labels[]" value="{{ $value }}">
    													</div>
    												</div>
    												<div class="col">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]" value="{{ json_decode(get_setting('widget_one_links'), true)[$key] }}">
    													</div>
    												</div>
    												<div class="col-auto">
    													<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
    														<i class="las la-times"></i>
    													</button>
    												</div>
    											</div>
    										@endforeach
    									@endif
    								</div>
    								<button
    									type="button"
    									class="btn btn-soft-secondary btn-sm"
    									data-toggle="add-more"
    									data-content='<div class="row gutters-5">
    										<div class="col-4">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="{{translate('Label')}}" name="widget_one_labels[]">
    											</div>
    										</div>
    										<div class="col">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]">
    											</div>
    										</div>
    										<div class="col-auto">
    											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
    												<i class="las la-times"></i>
    											</button>
    										</div>
    									</div>'
    									data-target=".w3-links-target">
    									{{ translate('Add New') }}
    								</button>
    							</div>
								<!-- Update Button -->
    							<div class="text-right">
    								<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div> --}}

    		</div>
    	</div>
    </div>
@endsection
