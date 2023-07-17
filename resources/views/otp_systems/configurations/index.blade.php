@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Twilio Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="twillo">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWILIO_SID">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('TWILIO SID') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_SID" value="{{ env('TWILIO_SID') }}"
                                    placeholder="TWILIO SID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWILIO_AUTH_TOKEN">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('TWILIO AUTH TOKEN') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_AUTH_TOKEN"
                                    value="{{ env('TWILIO_AUTH_TOKEN') }}" placeholder="TWILIO AUTH TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="VALID_TWILLO_NUMBER">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('VALID TWILIO NUMBER') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="VALID_TWILLO_NUMBER"
                                    value="{{ env('VALID_TWILLO_NUMBER') }}" placeholder="VALID TWILLO NUMBER">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Nexmo Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="nexmo">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="NEXMO_KEY">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('NEXMO KEY') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="NEXMO_KEY" value="{{ env('NEXMO_KEY') }}"
                                    placeholder="NEXMO KEY" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="NEXMO_SECRET">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('NEXMO SECRET') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="NEXMO_SECRET"
                                    value="{{ env('NEXMO_SECRET') }}" placeholder="NEXMO SECRET" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('SSL Wireless Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="ssl_wireless">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSL_SMS_API_TOKEN">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('SSL SMS API TOKEN') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SSL_SMS_API_TOKEN"
                                    value="{{ env('SSL_SMS_API_TOKEN') }}" placeholder="SSL SMS API TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSL_SMS_SID">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('SSL SMS SID') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SSL_SMS_SID"
                                    value="{{ env('SSL_SMS_SID') }}" placeholder="SSL SMS SID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSL_SMS_URL">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('SSL SMS URL') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SSL_SMS_URL"
                                    value="{{ env('SSL_SMS_URL') }}" placeholder="SSL SMS URL">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Fast2SMS Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="fast2sms">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="AUTH_KEY">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('AUTH KEY') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="AUTH_KEY"
                                    value="{{ env('AUTH_KEY') }}" placeholder="AUTH KEY" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ENTITY_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('ENTITY ID') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="ENTITY_ID"
                                    value="{{ env('ENTITY_ID') }}" placeholder="{{ translate('Entity ID') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ROUTE">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('ROUTE') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control aiz-selectpicker" name="ROUTE" required>
                                    <option value="dlt_manual" @if (env('ROUTE') == 'dlt_manual') selected @endif>
                                        {{ translate('DLT Manual') }}</option>
                                    <option value="p" @if (env('ROUTE') == 'p') selected @endif>
                                        {{ translate('Promotional Use') }}</option>
                                    <option value="t" @if (env('ROUTE') == 't') selected @endif>
                                        {{ translate('Transactional Use') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="LANGUAGE">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('LANGUAGE') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control aiz-selectpicker" name="LANGUAGE" required>
                                    <option value="english" @if (env('LANGUAGE') == 'english') selected @endif>English
                                    </option>
                                    <option value="unicode" @if (env('LANGUAGE') == 'unicode') selected @endif>Unicode
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SENDER_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('SENDER ID') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SENDER_ID"
                                    value="{{ env('SENDER_ID') }}" placeholder="6 digit SENDER ID">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('MIMO Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="mimo">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIMO_USERNAME">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MIMO_USERNAME') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MIMO_USERNAME"
                                    value="{{ env('MIMO_USERNAME') }}" placeholder="MIMO_USERNAME" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIMO_PASSWORD">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MIMO_PASSWORD') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MIMO_PASSWORD"
                                    value="{{ env('MIMO_PASSWORD') }}" placeholder="MIMO_PASSWORD" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIMO_SENDER_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MIMO_SENDER_ID') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MIMO_SENDER_ID"
                                    value="{{ env('MIMO_SENDER_ID') }}" placeholder="MIMO_SENDER_ID" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('MIMSMS Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="mimsms">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIM_API_KEY">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MIM_API_KEY') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MIM_API_KEY"
                                    value="{{ env('MIM_API_KEY') }}" placeholder="MIM_API_KEY" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIM_SENDER_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MIM_SENDER_ID') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MIM_SENDER_ID"
                                    value="{{ env('MIM_SENDER_ID') }}" placeholder="MIM_SENDER_ID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIM_BASE_URL">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MIM_BASE_URL') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MIM_BASE_URL"
                                    value="{{ env('MIM_BASE_URL') }}" placeholder="MIM_BASE_URL" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('MSEGAT Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="msegat">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MSEGAT_API_KEY">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MSEGAT_API_KEY') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MSEGAT_API_KEY"
                                    value="{{ env('MSEGAT_API_KEY') }}" placeholder="MSEGAT_API_KEY" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MSEGAT_USERNAME">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MSEGAT_USERNAME') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MSEGAT_USERNAME"
                                    value="{{ env('MSEGAT_USERNAME') }}" placeholder="MSEGAT_USERNAME" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MSEGAT_USER_SENDER">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MSEGAT_USER_SENDER') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MSEGAT_USER_SENDER"
                                    value="{{ env('MSEGAT_USER_SENDER') }}" placeholder="MSEGAT_USER_SENDER" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('SPARROW Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="msegat">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SPARROW_TOKEN">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('SPARROW_TOKEN') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SPARROW_TOKEN"
                                    value="{{ env('SPARROW_TOKEN') }}" placeholder="SPARROW_TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MESSGAE_FROM">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('MESSGAE_FROM') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="MESSGAE_FROM"
                                    value="{{ env('MESSGAE_FROM') }}" placeholder="MESSGAE_FROM" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('ZENDER Credentials') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="zender">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ZENDER_API_SECRET">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('ZENDER API SECRET') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="ZENDER_API_SECRET"
                                    value="{{ env('ZENDER_API_SECRET') }}" placeholder="ZENDER_API_SECRET" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ZENDER_DEVICE_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('ZENDER DEVICE UNIQUE ID') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="ZENDER_DEVICE_ID"
                                    value="{{ env('ZENDER_DEVICE_ID') }}" placeholder="ZENDER DEVICE UNIQUE ID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ZENDER_MODE">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('ZENDER MODE') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control aiz-selectpicker" name="ZENDER_MODE" required id="ZENDER_MODE">
                                    <option value="devices" @if (env('ZENDER_MODE') == 'devices') selected @endif>
                                        {{ translate('devices') }}</option>
                                    <option value="credits" @if (env('ZENDER_MODE') == 'credits') selected @endif>
                                        {{ translate('credits') }}</option>                                  
                                </select>
                            </div>
                        </div>            
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ZENDER_MODE_TYPE">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('ZENDER MODE TYPE') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control aiz-selectpicker" name="ZENDER_MODE_TYPE" required disabled id="ZENDER_MODE_TYPE">
                                    <option value="device" @if (env('ZENDER_MODE_TYPE') == 'device') selected @endif>
                                        DEVICE </option>
                                    <option value="gateway" @if (env('ZENDER_MODE_TYPE') == 'gateway') selected @endif>
                                        GATEWAY </option>                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ZENDER_SIM">
                            <div class="col-lg-3">
                                <label class="col-from-label">{{ translate('ZENDER SIM') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control aiz-selectpicker" name="ZENDER_SIM" required>
                                    <option value="1" @if (env('ZENDER_SIM') == '1') selected @endif>
                                        SIM 1</option>
                                    <option value="2" @if (env('ZENDER_SIM') == '2') selected @endif>
                                        SIM 2</option>                                  
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $("#ZENDER_MODE").change(function() {
        var value = $(this).val();
        let changeVal = '';
        if(value=="devices"){
            changeVal = 'device';
        }else{
            changeVal = 'gateway';
        }
        $("#ZENDER_MODE_TYPE").val(changeVal).change();
  
      });
    </script>
@endsection
