@extends('porter_design.layouts.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('main')
<div class="container-fluid">
    <div class="titlTops cardBox my-2 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1 boxTittle">Basic Details</h3>
        </div>
    </div>
    <div class="cardBox my-2 px-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(
                array(
                'url' => 'temp_audit/update_basic_audit_data',
                'class' => 'kt-form kt-form--label-right',
                'role'=>'form',
                'data-toggle'=>"validator")
                ) !!}
                <input type="hidden" name="audit_id" value="{{Crypt::encrypt($audit_data->id)}}">
                <div class=" mainTbl pe-1">
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label for="exampleFormControlInput" class="form-label">Communication Instance ID(Call
                                ID):</label>
                            <input type="text" name="call_id" class="form-control" value="{{$raw_data->call_id}}">
                        </div>
                        <div class="mb-3 w-50">
                            <label>Client:</label>
                            <input type="text" class="form-control" readonly="readonly"
                                value="{{$raw_data->client->name}}">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Partner:</label>
                            <input type="text" class="form-control" readonly="readonly"
                                value="{{$raw_data->partner->name}}">
                        </div>
                        <div class="mb-3 w-50">
                            <label>Audit Date:</label>
                            <input type="text" class="form-control" id="kt_datetimepicker_audit_component" readonly
                                placeholder="Select date & time" required="required" value="{{$audit_data->audit_date}}"
                                name="audit_date" />
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Agent Name:</label>
                            <input type="text" class="form-control" readonly="readonly"
                                value="{{$raw_data->agent_name}}">
                        </div>
                        <div class="mb-3 w-50">
                            <label>QA Name:</label>
                            <input type="text" class="form-control" readonly="readonly"
                                value="{{$raw_data->getQA->name}}">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>QA TL Name:</label>
                            <input type="text" class="form-control" readonly="readonly"
                                value="{{$audit_data->qa_qtl_detail->get_qtl_name->name}}">
                        </div>
                        <div class="mb-3 w-50">
                            <label>Campaign Name:</label>
                            <input type="text" name="campaign_name" class="form-control"
                                value="{{$raw_data->campaign_name}}">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Audit Type:</label>
                            <input type="text" class="form-control" name="audit_type"
                                value="{{$audit_data->audit_type}}">
                        </div>
                        <div class="mb-3 w-50">
                            <label>Location:</label>
                            <input type="text" class="form-control" name="location" value="{{$raw_data->location}}">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Call Type:</label>
                            <select class="form-control customSelect" id="" name="call_types">
                                <option value="Random Call" @if($audit_data->call_types == "Random Call") selected
                                    @endif>Random Call</option>
                                <option value="Agent Error" @if($audit_data->call_types == "Agent Error") selected
                                    @endif>Agent Error</option>
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <label>Case ID:</label>
                            <input type="text" class="form-control" name="case_id" value="{{$raw_data->case_id}}">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Disposition:</label>
                            <input type="text" class="form-control" value="{{$raw_data->disposition}}"
                                name="disposition">
                        </div>
                        <div class="mb-3 w-50">
                            <label>Language for QA*:</label>
                            <input type="text" class="form-control" name="language_2" required
                                value="{{$audit_data->language_2}}">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Customer Name*:</label>
                            <input type="text" class="form-control" name="customer_name"
                                value="{{$raw_data->customer_name}}" required>
                        </div>
                        <div class="mb-3 w-50">
                            <label>Cusotmer contact number*:</label>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{$raw_data->phone_number}}" required>
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>CRN No./Order ID*:</label>
                            <input type="text" class="form-control" name="order_id" value="{{$audit_data->order_id}}"
                                required>
                        </div>
                        <div class="mb-3 w-50">
                            <label>QRC:</label>
                            {{
                            Form::select('qrc_2',['Query'=>'Query','Request'=>'Request','Complaint'=>'Complaint'],$audit_data->qrc_2,['class'=>'form-control','required'=>'required'])
                            }}
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Vehicle Type:</label>
                            <input type="text" class="form-control" name="vehicle_type"
                                value="{{$audit_data->vehicle_type}}" name="call_time">
                        </div>
                        <div class="mb-3 w-50">
                            <label>Call Time:</label>
                            <input type="text" class="form-control" value="{{$raw_data->call_time}}" name="call_time">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Call Duration:</label>
                            <input type="text" class="form-control" value="{{$raw_data->call_duration}}"
                                name="call_duration">
                        </div>
                        <div class="mb-3 w-50">
                            <label>Refrence Number:</label>
                            <input type="text" class="form-control" value="{{$audit_data->refrence_number}}"
                                name="refrence_number">
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Caller Type</label>
                            <select class="form-control customSelect m-select2" id="caller_type_select"
                                name="caller_type">
                                <option value="Partner" @if($audit_data->caller_type == 'Partner') selected
                                    @endif>Partner</option>
                                <option value="Customer" @if($audit_data->caller_type == 'Customer') selected
                                    @endif>Customer</option>
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <label>Order Stage:</label>
                            @if ($audit_data->order_stage != null)
                            <select class="form-control customSelect m-select2" id="orderStage" name="order_stage">
                                <option value="{{ $audit_data->order_stage }}">{{ $audit_data->order_stage }}</option>
                            </select>
                            @else
                            <select class="form-control customSelect m-select2" id="orderStage"
                                name="order_stage"></select>
                            @endif
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Issues:</label>
                            @if ($audit_data->issues != null)
                            <select class="form-control customSelect m-select2" id="issue" name="issue">
                                <option value="{{ $audit_data->issues }}">{{ $audit_data->issues }}</option>
                            </select>
                            @else
                            <select class="form-control customSelect m-select2" id="issue" name="issue"></select>
                            @endif
                        </div>
                        <div class="mb-3 w-50">
                            <label>Sub Issues:</label>
                            @if ($audit_data->sub_issues != null)
                            <select class="form-control customSelect m-select2" id="sub_issue" name="sub_issue">
                                <option value="{{ $audit_data->sub_issues }}">{{ $audit_data->sub_issues }}</option>
                            </select>
                            @else
                            <select class="form-control customSelect m-select2" id="sub_issue"
                                name="sub_issue"></select>
                            @endif
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Scanerio:</label>
                            @if ($audit_data->scanerio != null)
                            <select class="form-control customSelect m-select2" id="scanerio" name="scanerio">
                                <option value="{{ $audit_data->scanerio }}">{{ $audit_data->scanerio }}</option>
                            </select>
                            @else
                            <select class="form-control customSelect m-select2" id="scanerio" name="scanerio"></select>
                            @endif
                        </div>
                        <div class="mb-3 w-50">
                            <label>Scanerio Codes:</label>
                            @if ($audit_data->scanerio_codes != null)
                            <select class="form-control customSelect m-select2" id="scanerio_code" name="scanerio_code">
                                <option value="{{ $audit_data->scanerio_codes }}">{{ $audit_data->scanerio_codes }}
                                </option>
                            </select>
                            @else
                            <select class="form-control customSelect m-select2" id="scanerio_code"
                                name="scanerio_code"></select>
                            @endif
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Error Reason Type:</label>
                            <select class="form-control customSelect m-select2" id="error_reason_type"
                                name="error_reason_type">
                                @foreach($errorReasons as $val)
                                <option value="{{$val}}" @if($val==$audit_data->error_reason_type ) selected
                                    @endif>{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <label>Error Reasons:</label>
                            @if ($audit_data->error_code_reasons != null)
                            <select class="form-control customSelect m-select2" id="error_reasons" name="error_reasons">
                                <option value="{{ $audit_data->error_code_reasons }}">{{ $audit_data->error_code_reasons
                                    }}</option>
                            </select>
                            @else
                            <select class="form-control customSelect m-select2" id="error_reasons"
                                name="error_reasons"></select>
                            @endif
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Error Code:</label>
                            @if ($audit_data->new_error_code != null)
                            <select class="form-control customSelect m-select2" id="new_error_code"
                                name="new_error_code">
                                <option value="{{ $audit_data->new_error_code }}">{{ $audit_data->new_error_code }}
                                </option>
                            </select>
                            @else
                            <select class="form-control customSelect m-select2" id="new_error_code"
                                name="new_error_code"></select>
                            @endif
                        </div>
                        <div class="mb-3 w-50">
                            <label>Is Call Fatal:</label>
                            @if($audit_data->is_critical)
                            <input type="text" class="form-control is-invalid" id="inputWarning1" readonly="readonly"
                                value="YES" />
                            @else
                            <input type="text" class="form-control is-valid" id="inputSuccess1" readonly="readonly"
                                value="NO" />
                            @endif
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Overall Score:</label>
                            @if($audit_data->is_critical)
                            <input type="text" class="form-control is-invalid" id="inputWarning1" readonly="readonly"
                                value="{{$audit_data->overall_score}}" />
                            @else
                            <input type="text" class="form-control is-valid" id="inputSuccess1" readonly="readonly"
                                value="{{$audit_data->overall_score}}" />
                            @endif
                        </div>
                        <div class="mb-3 w-50">
                            <label>Feedback to Agent*:</label>
                            <textarea class="form-control" name="feedback">{{$audit_data->feedback}}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-sm">Update Basic Data</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Cancel</button>
                </div>
                </form>
            </div>
        </div>

    </div>



    <div class="titlTops cardBox my-2 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1 boxTittle">Audit Observation Details</h3>
        </div>
    </div>
    <div class="cardBox my-2 px-3">
        <div class="row">
            <div class="col-md-2 kt-font-bolder">Behavior</div>
            <div class="col-md-10 kt-font-bolder">
                <div class="row">
                    <div class="col-md-2 kt-font-bolder">Parameter</div>
                    <div class="col-md-2 kt-font-bolder">Observation</div>
                    <div class="col-md-1 kt-font-bolder">Scored</div>
                    <div class="col-md-2 kt-font-bolder">Failure Type</div>
                    <div class="col-md-2 kt-font-bolder">Failure Reason</div>
                    <div class="col-md-2 kt-font-bolder">Remarks</div>
                    <div class="col-md-1 kt-font-bolder">Update</div>
                </div>
            </div>
        </div>
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg" id="seprator"></div>
        @foreach($final_data as $key=>$value)
        <div class="row" style="border-bottom:1px solid #ccc; ">
            <div class="col-md-2 kt-font-bolder kt-font-primary flex-item">{{$value['name']}}</div>
            <div class="col-md-10 sp-row">
                @foreach($value['sp'] as $skey=>$svalue)
                <div class="row flex-container">

                    <div class="col-md-2 kt-font-bold">
                        {{$svalue['name']}} <i class="la la-info-circle kt-font-warning sp-details-top"
                            title="{{$svalue['detail']}}"></i>
                    </div>
                    <div class="col-md-2">
                        {{$svalue['selected_option']}}
                    </div>
                    <div class="col-md-1">
                        {{$svalue['scored']}}
                    </div>
                    <div class="col-md-2">
                        {{($svalue['reason_type'])?$svalue['reason_type']:'-'}}
                    </div>
                    <div class="col-md-2">
                        {{$svalue['reason']?$svalue['reason']:'-'}}
                    </div>
                    <div class="col-md-2">
                        <p style="width: 100%; display: block; overflow-wrap: break-word;">
                            {{($svalue['remark'])?$svalue['remark']:'-'}} </p>
                    </div>
                    <div class="col-md-1">
                        <temp-audit-parameter-updater audit-id="{{$audit_data->id}}" parameter-id="{{$value['id']}}"
                            sub-parameter-id="{{$svalue['id']}}" rebuttal-id="0">
                        </temp-audit-parameter-updater>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        <br>
        {{Form::open([ 'method' => 'post', 'url' =>
        'transfer_audit_from_temp_to_main_pool','onsubmit'=>"move_confirm()"])}}
        <input type="hidden" name="audit_id" value="{{Crypt::encrypt($audit_data->id)}}">
        <input type="hidden" name="qm_sheet_id" value="{{Crypt::encrypt($audit_data->qm_sheet_id)}}">
        <button class="btn btn-brand btn-success btn-sm">Move To Main Pool</button>
        </form>
    </div>
</div>
    @endsection
    @section('js')
@include('shared.form_js')
<script type="text/javascript">
	window.scrollTo(0,document.body.scrollHeight);
	function move_confirm() {
			var x = confirm("Are you sure you want to move this audit to main pool?");
			if (x) {
				return true;
			}
			else {
				event.preventDefault();
				return false;
			}
		}
</script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- <script> $(".customSelect").select2({});</script> -->
    <script src="/assets/app/custom/general/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#caller_type_select').click(function () {
                $('#caller_type_select').click();
            });
        });
        $(document).ready(function () {
            $('#caller_type_select').change(function () {
                var val = $(this).val();
                $.ajax({
                    url: "{{ route('temp_audit.getOrder.stage') }}",
                    method: "get",
                    data: {
                        val: val,
                    },
                    success: function (res) {
                        $('#orderStage').html('<option value="">Select Option</option>');
                        console.log(res);
                        $.each(res.order_stage, function (key, value) {
                            $('#orderStage').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#orderStage').click(function () {
                $('#orderStage').click();
            });
        });
        $(document).ready(function () {
            $('#orderStage').change(function () {
                var val = $(this).val();
                var caller_type_select = $('#caller_type_select').val();
                $.ajax({
                    url: "{{ route('temp_audit.getIssues') }}",
                    method: "get",
                    data: {
                        val: val,
                        caller_type_select: caller_type_select,
                    },
                    success: function (res) {
                        $('#issue').html('<option value="">Select Option</option>');
                        console.log(res);
                        $.each(res.issue, function (key, value) {
                            $('#issue').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#issue').click(function () {
                $('#issue').click();
            });
        });
        $(document).ready(function () {
            $('#issue').change(function () {
                var caller_type_select = $('#caller_type_select').val();
                var orderStage = $('#orderStage').val();
                var val = $(this).val();

                $.ajax({
                    url: "{{ route('temp_audit.getSubIssues') }}",
                    method: "get",
                    data: {
                        val: val,
                        caller_type_select: caller_type_select,
                        orderStage: orderStage,
                    },
                    success: function (res) {
                        $('#sub_issue').html('<option value="">Select Option</option>');
                        console.log(res);
                        $.each(res.sub_issue, function (key, value) {
                            $('#sub_issue').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#sub_issue').click(function () {
                $('#sub_issue').click();
            });
        });
        $(document).ready(function () {
            $('#sub_issue').change(function () {
                var val = $(this).val();
                var caller_type_select = $('#caller_type_select').val();
                var orderStage = $('#orderStage').val();
                var issue = $('#issue').val();
                $.ajax({
                    url: "{{ route('temp_audit.getscanerio') }}",
                    method: "get",
                    data: {
                        val: val,
                        caller_type_select: caller_type_select,
                        orderStage: orderStage,
                        issue: issue
                    },
                    success: function (res) {
                        $('#scanerio').html('<option value="">Select Option</option>');
                        console.log(res);
                        $.each(res.scenario, function (key, value) {
                            $('#scanerio').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#scanerio').click(function () {
                $('#scanerio').click();
            });
        });
        $(document).ready(function () {
            $('#scanerio').change(function () {
                var val = $(this).val();
                var caller_type_select = $('#caller_type_select').val();
                var orderStage = $('#orderStage').val();
                var issue = $('#issue').val();
                var sub_issue = $('#sub_issue').val();
                $.ajax({
                    url: "{{ route('temp_audit.getScanerioCode') }}",
                    method: "get",
                    data: {
                        val: val,
                        caller_type_select: caller_type_select,
                        orderStage: orderStage,
                        issue: issue,
                        sub_issue: sub_issue,
                    },
                    success: function (res) {
                        $('#scanerio_code').html('<option value="">Select Option</option>');
                        console.log(res);
                        $.each(res.scenerio_code, function (key, value) {
                            $('#scanerio_code').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#error_reason_type').click(function () {
                $('#error_reason_type').click();
            });
        });
        $(document).ready(function () {
            $('#error_reason_type').change(function () {
                var val = $(this).val();
                $.ajax({
                    url: "{{ route('temp_audit.error_reason_type') }}",
                    method: "get",
                    data: {
                        val: val,
                    },
                    success: function (res) {
                        $('#error_reasons').html('<option value="">Select Option</option>');
                        console.log(res);
                        $.each(res.error_reasons, function (key, value) {
                            $('#error_reasons').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#error_reasons').click(function () {
                $('#error_reasons').click();
            });
        });
        $(document).ready(function () {
            $('#error_reasons').change(function () {
                var val = $(this).val();
                var error_reason_type = $('#error_reason_type').val();

                $.ajax({
                    url: "{{ route('temp_audit.new_error_code') }}",
                    method: "get",
                    data: {
                        val: val,
                        error_reason_type: error_reason_type,
                    },
                    success: function (res) {
                        $('#new_error_code').html('<option value="">Select Option</option>');
                        console.log(res);
                        $.each(res.error_codes, function (key, value) {
                            $('#new_error_code').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="{{url('js/app.js')}}"></script>
    @endsection
    @section('css')
    @endsection