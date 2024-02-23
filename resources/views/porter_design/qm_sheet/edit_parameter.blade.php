@extends('porter_design.layouts.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@section('main')
<div class="container-fluid">
    <div class="titlTops cardBox my-2 d-flex justify-content-between align-items-center">
        <div class="">
            <h3 class="fw-bold mb-1 boxTittle">{{$qm_sheet_data->name}}</h3>
        </div>
        <a href="/qm_sheet/{{Crypt::encrypt($qm_sheet_data->id)}}/list_parameter" class="btn btn-primary btn-bold">
            List All Parameter
        </a>
    </div>
    <div class="cardBox my-2 px-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(
                array(
                'route' => 'update_parameter',
                'class' => 'kt-form',
                'role'=>'form',
                'data-toggle'=>"validator")
                ) !!}
                <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}">
                <input type="hidden" name="qm_sheet_id" value="{{$qm_sheet_data->id}}">
                <input type="hidden" name="parameter_id" value="{{$param_data->id}}">
                <div class=" mainTbl pe-1">
                    <div class="form-contentMet">
                        <div class="mb-3 w-50">
                            <label>Parameter*</label>
                            <input type="text" name="parameter" class="form-control col-lg-6" required
                                value="{{$param_data->parameter}}" />
                        </div>
                    </div>
                    <div class="form-contentMet">
                        <div class="mb-3 w-100">
                            <label>Is non scoring ?</label>
                            <input type="checkbox" name="non_scoring" value="1"
                                {{($param_data->is_non_scoring)?'checked':''}}>
                        </div>
                    </div>
                    <hr><br>
                    <p>Add Sub - Parameters</p>
                    <div id="kt_repeater_qm_sheet">
                        <div class="form-group  row" id="kt_repeater_qm_sheet">
                            <div data-repeater-list="subs" class="col-lg-12">

                                @foreach($param_data->qm_sheet_sub_parameter as $kksp=>$vvsp)
                                <div data-repeater-item class="form-group align-items-center">
                                    <input type="hidden" name="sp_pm_id" value="{{$vvsp->id}}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__control">
                                                    <input type="text" class="form-control"
                                                        placeholder="Sub - Parameter name" name="sub_parameter"
                                                        value="{{$vvsp->sub_parameter}}">
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__control">
                                                    <input type="text" pattern="[0-9]+([\,|\.][0-9]+)?"
                                                        class="form-control" placeholder="Weightage" name="weight"
                                                        value="{{$vvsp->weight}}">

                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__control">
                                                    <textarea class="form-control" placeholder="Sub - Parameter details"
                                                        name="details">{{$vvsp->details}}</textarea>
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>

                                        <div class="col-md-2">
                                            <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill"
                                                @click="onQmSheetSubParameterDelete({{$vvsp->id}})">
                                                <span>
                                                    <i class="la la-trash-o"></i>
                                                    <span>Delete</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <br />
                                    <span class="form-text text-muted">This will only applicable when "Is non scoring"
                                        is un-checked!</span><br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_pass" value="1"
                                                    {{($vvsp->pass)?'checked':''}}> Pass
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{
                                            Form::select('s_pass_alert_box_id',$all_alert_box_list,$vvsp->pass_alert_box_id,['class'=>'form-control','placeholder'=>"Select
                                            alert box if any!"]) }}
                                        </div>
                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_fail" value="1"
                                                    {{($vvsp->fail)?'checked':''}}> Fail
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{
                                            Form::select('s_fail_alert_box_id',$all_alert_box_list,$vvsp->fail_alert_box_id,['class'=>'form-control','placeholder'=>"Select
                                            alert box if any!"]) }}
                                        </div>
                                        <div class="col-md-4">
                                            {{
                                            Form::select('s_fail_reason_type_box_id',$all_reason_types,explode(',',$vvsp->fail_reason_types),['class'=>'form-control customSelect','multiple'=>'multiple','style'=>"height:80px;"])
                                            }}
                                        </div>
                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_critical" value="1"
                                                    {{($vvsp->critical)?'checked':''}}> Critical
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{
                                            Form::select('s_critical_alert_box_id',$all_alert_box_list,$vvsp->critical_alert_box_id,['class'=>'form-control','placeholder'=>"Select
                                            alert box if any!"]) }}
                                        </div>
                                        <div class="col-md-4">
                                            {{
                                            Form::select('s_critical_reason_type_box_id',$all_reason_types,explode(',',$vvsp->critical_reason_types),['class'=>'form-control customSelect','multiple'=>'multiple','style'=>"height:80px;"])
                                            }}
                                        </div>
                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_na" value="1"
                                                    {{($vvsp->na)?'checked':''}}> N/A
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{
                                            Form::select('s_na_alert_box_id',$all_alert_box_list,$vvsp->na_alert_box_id,['class'=>'form-control','placeholder'=>"Select
                                            alert box if any!"]) }}
                                        </div>

                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_pwd" value="1"
                                                    {{($vvsp->pwd)?'checked':''}}> PWD
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{
                                            Form::select('s_pwd_alert_box_id',$all_alert_box_list,$vvsp->pwd_alert_box_id,['class'=>'form-control','placeholder'=>"Select
                                            alert box if any!"]) }}
                                        </div>
                                        <div class="col-md-4">
                                            {{
                                            Form::select('s_pwd_reason_type_box_id',$all_reason_types,explode(',',$vvsp->pwd_reason_types),['class'=>'form-control customSelect','multiple'=>'multiple','style'=>"height:80px;"])
                                            }}
                                        </div>
                                    </div>

                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                                    <h6>Non Scoring Observation Option Group</h6>

                                    <div class="form-group col-md-5">
                                        <label>Please select a group*</label>
                                        {{
                                        Form::select('non_scoring_option_group',list_non_scoring_obs_options(),$vvsp->non_scoring_option_group,['class'=>'form-control','placeholder'=>"Select
                                        an option!"]) }}
                                        <span class="form-text text-muted">This will only applicable when "Is non
                                            scoring" is checked!</span>
                                    </div>

                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                </div>
                                @endforeach

                                <div data-repeater-item class="form-group align-items-center">
                                    <input type="hidden" name="sp_pm_id">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__control">
                                                    <input type="text" class="form-control"
                                                        placeholder="Sub - Parameter name" name="sub_parameter">
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__control">
                                                    <input type="text" pattern="[0-9]+([\,|\.][0-9]+)?"
                                                        class="form-control" placeholder="Weightage" name="weight">
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="kt-form__group--inline">
                                                <div class="kt-form__control">
                                                    <textarea class="form-control" placeholder="Sub - Parameter details"
                                                        name="details"></textarea>
                                                </div>
                                            </div>
                                            <div class="d-md-none kt-margin-b-10"></div>
                                        </div>

                                        <div class="col-md-2">
                                            <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
                                                <span>
                                                    <i class="la la-trash-o"></i>
                                                    <span>Delete</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <br />
                                    <span class="form-text text-muted">This will only applicable when "Is non scoring"
                                        is un-checked!</span><br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_pass" value="1"> Pass
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{ Form::select('s_pass_alert_box_id',$all_alert_box_list,null,['class'=>'form-control','placeholder'=>"Select alert box if any!"]) }}
                                        </div>
                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_fail" value="1"> Fail
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{ Form::select('s_fail_alert_box_id',$all_alert_box_list,null,['class'=>'form-control','placeholder'=>"Select alert box if any!"]) }}
                                        </div>
                                        <div class="col-md-4">
                                            {{ Form::select('s_fail_reason_type_box_id',$all_reason_types,null,['class'=>'form-control customSelect','multiple'=>'multiple','style'=>"height:80px;"]) }}
                                        </div>
                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_critical" value="1"> Critical
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{ Form::select('s_critical_alert_box_id',$all_alert_box_list,null,['class'=>'form-control','placeholder'=>"Select alert box if any!"]) }}
                                        </div>
                                        <div class="col-md-4">
                                            {{ Form::select('s_critical_reason_type_box_id',$all_reason_types,null,['class'=>'form-control customSelect','multiple'=>'multiple','style'=>"height:80px;"]) }}
                                        </div>
                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_na" value="1"> N/A
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{ Form::select('s_na_alert_box_id',$all_alert_box_list,null,['class'=>'form-control','placeholder'=>"Select alert box if any!"]) }}
                                        </div>

                                    </div>

                                    <br />
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--state-success">
                                                <input type="checkbox" name="s_pwd" value="1"> PWD
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            {{ Form::select('s_pwd_alert_box_id',$all_alert_box_list,null,['class'=>'form-control','placeholder'=>"Select alert box if any!"]) }}
                                        </div>
                                        <div class="col-md-4">
                                            {{ Form::select('s_pwd_reason_type_box_id',$all_reason_types,null,['class'=>'form-control customSelect','multiple'=>'multiple','style'=>"height:80px;"]) }}
                                        </div>
                                    </div>

                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                                    <h6>Non Scoring Observation Option Group</h6>

                                    <div class="form-group col-md-5">
                                        <label>Please select a group*</label>
                                        {{
                                        Form::select('non_scoring_option_group',list_non_scoring_obs_options(),null,['class'=>'form-control','placeholder'=>"Select
                                        an option!"]) }}
                                        <span class="form-text text-muted">This will only applicable when "Is non
                                            scoring" is checked!</span>
                                    </div>

                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <div data-repeater-create="" class="btn btn-primary btn-sm">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add</span>
                                    </span>
                                </div>
                            </div>
                        </div><br><hr>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                </form>
            </div>
        </div>

    </div>
    @endsection

    @section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(".customSelect").select2({});
    </script>
    {!! Html::script('assets/vendors/base/vendors.bundle.js')!!}
    {!! Html::script('assets/demo/default/base/scripts.bundle.js')!!}

    <!--end::Global Theme Bundle -->

    <!--begin::Page Vendors(used by this page) -->
    {!! Html::script('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')!!}
    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    {!! Html::script('assets/app/custom/general/dashboard.js')!!}
    <!--end::Page Scripts -->
    {!! Html::script('assets/app/bundle/app.bundle.js')!!}
    {!! Html::script('assets/app/custom/general/my-script.js')!!}
    {!! Html::script('assets/app/custom/general/components/extended/sweetalert2.js')!!}

    @include('shared.form_js')

    @endsection


    @section('css')
    @endsection