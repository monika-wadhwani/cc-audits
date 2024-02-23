@extends('porter_design.layouts.app')
@section('main')

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="cardBox cardBoxSpace h-100 bg-white pb-0 mb-3">
                <div class="d-flex justify-content-between flex-wrap mb-3 gap-2">
                    <h2 class="tittle fs-5 mb-0 fw-bold">Audit Scores Summary</h2>
                    <div class="d-flex align-items-center gap-3">
                        <label for="" class="mb-0 fw-bold text-primary">Date:</label>
                        <div class="position-relative">
                            <input type="text" id="checkInIDate" name="date_range" class="form-control " value
                                placeholder="20-3-2012 to 12-2-3023">
                            <img src="{{asset('/assets/design/img/Icon awesome-calendar-alt.svg')}}" class="calenderIcon" alt="calebdericon">
                        </div>
                        <a href="#" class="btn btn-sm btn-primary" onclick="get_data()">Search</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Total Audits</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id="total_audit"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-pine fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    22% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary1.png')}}" width="30px" alt="img">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Total Agents</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id ="total_agents"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-danger fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    22% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary7.svg')}}" width="30px" alt="img">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Quality Score</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id="quality_score"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-danger fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    30% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary2.png')}}" width="30px" alt="img">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Fatal Error</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id="fatal_errors"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-pine fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    30% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary3.png')}}" width="30px" alt="img">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Rebuttal Raise</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id="total_rebuttals"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-danger fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    30% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary8.svg')}}" width="30px" alt="img" height="25">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Accept Rebuttal</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id="rebuttal_accepted"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-danger fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    30% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary9.svg')}}" width="30px" alt="img">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Communication Score</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id ="communication_score"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-pine fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    22% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary4.png')}}" width="30px" alt="img">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">Process Score</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id="process_score"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-danger fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    22% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary5.png')}}" width="30px" alt="img">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 mb-3 ps-md-1">
                                <a href="#" class="audTotls">
                                    <h6 class="w-100">System Score</h6>
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <h3 class="text-black" id="system_score"></h3>
                                            {{-- <p class="text-secondary fw-light"><span class="text-danger fw-semibold"><i
                                                        class="fa fa-angle-double-up" aria-hidden="true"></i>
                                                    22% </span>Last Month</p> --}}
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <img src="{{asset('/assets/design/img/summary10.svg')}}" width="30px" alt="img" height="25">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-3 ps-md-1">
                        <div class="audTotls align-items-start">
                            <div class="d-flex justify-content-between w-100 align-items-center">
                                <h2 class="tittle mb-0">Quality Scores</h2>
                                <div class="position-relative qualiFy">
                                    <!-- <input type="text" id=""
                                            class="form-control crntWeek" value
                                            placeholder="Current Week"> -->
                                    <input type="week" placeholder="Current Week" id="datepicker" class="form-control">
                                    <img src="{{asset('/assets/design/img/Icon awesome-calendar-alt.svg')}}" class="calenderIcon"
                                        alt="calebdericon">
                                </div>
                            </div>
                            <div id="scoreChrt" class="w-100" style="height: 190px;"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tabFatalk mb-3">
                <h2 class="tittle fs-5 mb-4 fw-bold">Team Quality Scores Summary</h2>
                <div class="table-responsive ">
                    <table class="responsive-table table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Auditor ID</th>
                                <th class="text-center">Total Audits</th>
                                <th class="text-center">Communication Score%</th>
                                <th class="text-center">Process Score%</th>
                                <th class="text-center">System Score%</th>
                                <th class="text-center">Fatal Errors</th>
                                <th class="text-center">Fatal Error%</th>
                                <th class="text-center">Quality Score%</th>
                            </tr>
                        </thead>
                        <tbody id="team_quality_score_table">
                          
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <td>Total</td>
                                <td class="text-center">10</td>
                                <td class="text-center">90%</td>
                                <td class="text-center">100%</td>
                                <td class="text-center">96%</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0%</td>
                                <td class="text-center">95%</td>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3 pe-md-2 mb-3">
                    <div class="tabFatalk">
                        <h2 class="tittle fs-5 mb-4 fw-bold">Team Fatal Errors Summary</h2>
                        <ul class="nav nav-pills mb-3 gap-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pillFatal1" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Process Fatal
                                    Errors</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pillFatal2" type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">System Fatal
                                    Errors</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pillFatal3" type="button" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">Communication
                                    Fatal Errors</button>
                            </li>
                        </ul>
                        <h3 class="tittle fw-bold">Process Fatal Errors</h3>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pillFatal1" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <table class="responsive-table table table-striped" width="100%">
                                    <tbody>
                                        <tr class="bg-white">
                                            <th>Description</th>
                                            <th>Error</th>
                                            <th>Count</th>
                                            <th>%Age</th>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr class="border-top border-black">
                                            <td colspan="2" class="fw-bold">Total</td>
                                            <td colspan="2" class="fw-bold">22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pillFatal2" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <table class="responsive-table table table-striped" width="100%">
                                    <tbody>
                                        <tr class="bg-white">
                                            <th>Description</th>
                                            <th>Error</th>
                                            <th>Count</th>
                                            <th>%Age</th>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr class="border-top border-black">
                                            <td colspan="2" class="fw-bold">Total</td>
                                            <td colspan="2" class="fw-bold">22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pillFatal3" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <table class="responsive-table table table-striped" width="100%">
                                    <tbody>
                                        <tr class="bg-white">
                                            <th>Description</th>
                                            <th>Error</th>
                                            <th>Count</th>
                                            <th>%Age</th>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <div
                                                    class='d-flex justify-content-center align-items-center flex-column'>
                                                    <lottie-player src="{{asset('/assets/design/img/delivery-truck.json')}}"
                                                        background="transparent" speed="1"
                                                        style="width: 320px; height: 280px;" loop
                                                        autoplay></lottie-player>
                                                    <h5 class="fw-bold" style="margin-top: -60px">No
                                                        Data Found</h5>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 ps-md-2 mb-3">
                    <div class="tabFatalk">
                        <h2 class="tittle fs-5 mb-4 fw-bold">Team Markdown Summary</h2>
                        <ul class="nav nav-pills mb-3 gap-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pillFatal4" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Process Fatal
                                    Errors</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pillFatal5" type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">System Fatal
                                    Errors</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pillFatal6" type="button" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">Communication
                                    Fatal Errors</button>
                            </li>
                        </ul>
                        <h3 class="tittle fw-bold">Process Fatal Errors</h3>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pillFatal4" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <table class="responsive-table table table-striped" width="100%">
                                    <tbody>
                                        <tr class="bg-white">
                                            <th>Description</th>
                                            <th>Error</th>
                                            <th>Count</th>
                                            <th>%Age</th>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr class="border-top border-black">
                                            <td colspan="2" class="fw-bold">Total</td>
                                            <td colspan="2" class="fw-bold">22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pillFatal5" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <table class="responsive-table table table-striped" width="100%">
                                    <tbody>
                                        <tr class="bg-white">
                                            <th>Description</th>
                                            <th>Error</th>
                                            <th>Count</th>
                                            <th>%Age</th>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr class="border-top border-black">
                                            <td colspan="2" class="fw-bold">Total</td>
                                            <td colspan="2" class="fw-bold">22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pillFatal6" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <table class="responsive-table table table-striped" width="100%">
                                    <tbody>
                                        <tr class="bg-white">
                                            <th>Description</th>
                                            <th>Error</th>
                                            <th>Count</th>
                                            <th>%Age</th>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr>
                                            <td>Wrong Information Related to
                                                Process</td>
                                            <td>EPFWIP1</td>
                                            <td>2</td>
                                            <td>27%</td>
                                        </tr>
                                        <tr class="border-top border-black">
                                            <td colspan="2" class="fw-bold">Total</td>
                                            <td colspan="2" class="fw-bold">22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tabFatalk ">
                <div class="d-md-flex justify-content-between align-items-center">
                    <h2 class="tittle fs-5 mb-4 fw-bold">Rebuttal score</h2>
                    <span class="fw-semibold text-primary mb-0" id="overall_accept_per"></span>
                </div>
                <div class="table-responsive ">
                    <table class="responsive-table table table-striped" width="100%">
                        <thead>
                                <tr>
                                    <th>Auditor ID</th>
                                    <th class="text-center">Total Audits</th>
                                    <th class="text-center">Rebuttals Raised</th>
                                    <th class="text-center">Valid Rebuttals</th>
                                    <th class="text-center">Auditor Error</th>
                                    <th class="text-center">No Error</th>
                                    <th class="text-center">BOD Given</th>
                                    <th class="text-center">Rebuttal Accepted%</th>
                                  
                                </tr>
                        </thead>   
                        <tbody id="table_body">
                           

                        </tbody>
                    </table>
                </div>
                {{-- <div class="cstm_pagination">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                        <a class="page-link prev-button"><img src="{{asset('/assets/design/img/prev-icon.svg')}}" alt="" width="12" height="12"></a>
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                        </ul>
                        <a class="page-link next-button" href="#"><img src="{{asset('/assets/design/img/next-icon.svg')}}" alt="" width="12"
                                height="12"></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- modal start  -->
@endsection


{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}


@section('js')
@include('porter_design.shared.agent_dashbaord_js')


<script>
     var start_date = '';
        var end_date = '';
const firstdate = moment().startOf('month').format('YYYY-MM-DD');
        const lastdate = moment().endOf('month').format("YYYY-MM-DD");
        score_summary(firstdate, lastdate)
        rebuttal_score(firstdate, lastdate)
        team_quality_rebuttal_score(firstdate, lastdate)
        $(document).ready(function() {
            $(function() {
                $('#checkInIDate').daterangepicker({
                    autoApply: true,
                }, function(start, end, label) {});
            });
        })

        function get_data() {
            var dateElement = document.getElementById('checkInIDate');
            if (dateElement) {
                var dateRange = dateElement.value;
                var dates = dateRange.split(' - ');
                if (dates.length === 2) {
                    var start_date = formatDate(dates[0]);
                    var end_date = formatDate(dates[1]);
                    score_summary(start_date, end_date);
                    rebuttal_score(start_date, end_date);
                    team_quality_rebuttal_score(start_date, end_date);
                } else {
                    console.error("Invalid date range format");
                }
            } else {
                console.error("Element with ID 'date_range' not found");
            }
        }

        function formatDate(dateString) {
            var parts = dateString.split('/');
            return parts[2] + '-' + parts[0] + '-' + parts[1];
        }



score_summary("2023-10-01", "2023-10-30")
rebuttal_score("2023-10-01", "2023-10-31")
team_quality_rebuttal_score("2023-10-01", "2023-10-31")
function score_summary(start_date, end_date) {
    var base_url = window.location.origin;
    $.ajax({
        type: "GET",
        url: base_url + "/qtl_dashboard2/score_summary/"+start_date+"/"+end_date,
        success: function(Data) {
            $("#total_audit").html(Data.data.audit_count);
            $("#total_agents").html(Data.data.total_agents);
            $("#total_rebuttals").html(Data.data.total_rebuttals);
            $("#rebuttal_accepted").html(Data.data.rebuttal_accepted);    
            $("#quality_score").html(Data.data.quality_score.toFixed(2) +"%");
            $("#fatal_errors").html(Data.data.fatal_errors);
            $("#communication_score").html(Data.data.communication_score.toFixed(2) +"%");
            $("#system_score").html(Data.data.system_score.toFixed(2) +"%");
            $("#process_score").html(Data.data.process_score.toFixed(2) +"%");
               
        }
    });
}  


var scoreChrt = Highcharts.chart('scoreChrt', {
        chart: {
            type: 'bar',
        },
        title: {
            text: null
        },
        xAxis: {
            categories: ['Communication', 'Process', 'System'],
            title: {
                enabled: false
            },
            gridLineWidth: 1,
            lineWidth: 1, // Set the width of the x-axis line
            lineColor: '#e6e6e6',
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify',
                formatter: function () {
                    return this.value + '%'; // Add a percent symbol after the y-axis values
                }
            },

            // gridLineWidth: 1,
            opposite: true,
        },
        tooltip: {
            valueSuffix: ' %'
        },
        plotOptions: {
            bar: {
                borderRadius: 0,
                dataLabels: {
                    enabled: true,
                    formatter: function () {
                        return this.y + '%'; // Add a percent symbol after the y-axis values
                    }
                },
                title: {
                    enabled: false
                },
                groupPadding: .2,
                // Apply gradient color to the bars
                color: {
                    linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                    stops: [
                        [0, '#7467F0'],   // End color
                        [1, '#2896E9'],  // Start color
                    ]
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Score',
            data: [87.50, 92.85, 80.40]  // Reduce the value for the first bar to 400
        }]
    });

    function rebuttal_score(start_date, end_date){
        var base_url = window.location.origin;
        $.ajax({
            type: "GET",
            url: base_url + "/qtl_dashboard2/rebuttal_score/"+start_date+"/"+end_date,
            success: function(Data) {
                console.log(Data.data)
                $("#overall_accept_per").html("Overall Audits Rebuttal Accepted : "+Data.data.overall_accept_per+"%");
                $("#table_body").append(Data.data.html);
            }
        });
    }

    function team_quality_rebuttal_score(start_date, end_date){
        var base_url = window.location.origin;
        $.ajax({
            type: "GET",
            url: base_url + "/qtl_dashboard2/team_quality_rebuttal_score/"+start_date+"/"+end_date,
            success: function(Data) {
                console.log(Data.data)
                $("#team_quality_score_table").html(Data.data.html);
            }
        });
    }
</script>
@endsection
