@extends('user.layoult')
@section('page_title','User All Requests')
@section('requests_selected', 'active')

@section('sidebar')
@include('user.includes.sidebar_requester')
@endsection

@section('navbar')
@include('user.includes.navbar_requester')
@endsection
@section('content')

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3> Requests &  Status  </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">mission requests status</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="mission-request-container">
                    <div class="mission-header">
                        <div class="header-logo">
                            <img width="120" src=" {{asset('admin_assets/img/ur-logo-ex.png')}} " alt="">
                        </div>
                        <div class="header-text">
                            <h2>COLLEGE OF SCIENCE AND TECHNOLOGY
                            </h2>
                        </div>
                    </div>
                    <div class="mission-title">
                        <h3>IN-COUNTRY MISSION AUTHORIZATION FORM  </h3>
                        <div class="mission-id">
                            <h4> Mission Serial No </h4> <span id="request_id" class=""></span>
                        </div>
                    </div>

                    <div class="mission-content">

                        <div class="mission-entry-row">
                            <span class="number"> 01</span>
                            <div class="entry">
                            <div class="entry-label">Issued to</div>
                             <span id="r-names" class="js-detail" >  </span>
                             <div class="entry-label-2"> signature <span id="staff-signature" class="inner-entry-label">
                                 <img  src="" alt=""> </span >
                                </div>
                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 02</span>
                            <div class="entry">
                                <div class="entry-label">Department:</div>
                                <span id="r-names" class="js-detail" > Department of Computer Science/School of ICT</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 03</span>
                            <div class="entry">
                                <div class="entry-label">Function: </div>
                                <span id="r-role" class="js-detail" >  </span>
                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 04</span>
                            <div class="entry">
                                <div class="entry-label">Purpose of Mission:</div>
                                <span id="r-purpose" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 05</span>
                            <div class="entry">
                                <div class="entry-label">DeparExpected resultstment:</div>
                                <span id="r-expected-result" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 06</span>
                            <div class="entry">
                                <div class="entry-label">Destination:</div>
                                <span id="r-destination" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 07</span>
                            <div class="entry">
                                <div class="entry-label">Distance in km (to and from):</div>
                                <span id="r-distance" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 08</span>
                            <div class="entry">
                                <div class="entry-label">Departure date:</div>
                                <span id="r-departure_date" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 09</span>
                            <div class="entry">
                                <div class="entry-label">Returning date:</div>
                                <span id="r-return_date" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 10</span>
                            <div class="entry">
                                <div class="entry-label">Duration of the mission (number of days):</div>
                                <span id="r-names" class="js-detail" > ......... ......... ......... ......... ....</span>
                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 11</span>
                            <div class="entry">
                                <div class="entry-label">Transportation Means:</div>
                                <span id="r-names" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 12</span>
                            <div class="entry">
                                <div class="entry-label">Vehicle Identification:</div>
                                <span id="r-names" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row">
                            <span class="number"> 13</span>
                            <div class="entry">
                                <div class="entry-label">Name of the driver:</div>
                                <span id="r-names" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>

                        <div class="mission-entry-row">
                            <span class="number"> 14</span>
                            <div class="entry">
                                <div class="entry-label"> Name of supervisor :</div>
                                <span id="r-names" class="js-detail" >  .... ... </span>

                            </div>
                        </div>

                        <div class="mission-entry-row">
                            <span class="number"> 15</span>
                            <div class="entry">
                                <div class="entry-label">Done at  KIGALI on </div>
                                <span id="r-names" class="js-detail" > ......... ......... ......... ......... ....</span>

                            </div>
                        </div>


                        <div class="mission-entry-row no-number">
                            {{-- <span class="number"> </span> --}}
                            <div class="entry">
                                <div class="entry-label">Authorized by VC/DVCs/ Principal or Campus Director of operations</div>
                             <span id="r-names" class="js-detail" > MBONABUCYA Celestin</span>
                             <div class="entry-label-2"> signature <span id="staff-signature" class="inner-entry-label">
                                 <img  src="" alt=""> </span >
                                </div>
                            </div>
                        </div>

                        <div class="mission-entry-row no-number">
                            {{-- <span class="number"> </span> --}}
                            <div class="entry">
                                <div class="entry-label">Acknowledged by HR Office</div>
                             <span id="r-names" class="js-detail" > MBONABUCYA Celestin</span>
                             <div class="entry-label-2"> signature <span id="staff-signature" class="inner-entry-label">
                                 <img  src="" alt=""> </span >
                                </div>
                            </div>
                        </div>

                        <div class="mission-destination-part">
                            <div>


                            <h3> Visa for the destination</h3>
                            <div class="destinatination-stamps">
                                <h3>Stamp and signature </h3>
                                <div class="destination-identity">
                                    <span id="destination-stamp" class="destination-stamp"></span>
                                    <span id="destination-signature" class="destination-signature"></span>
                                </div>

                                 <div class="destination-report-date">
                                     <div class="arrival"> <div class="label">Arrival</div>  <span class="arrival" ></span> </div>
                                     <div class="departure"> <div class="label">Departure</div>  <span class="departure" ></span> </div>

                                 </div>
                            </div>
                        </div>

                        </div>




                    </div>


                </div>
            </div>
        </div>
    </section>
</div>

 @endsection
 @section('js')

 <script>

$(document).ready(function() {

    loadRequestDetails();
});

  function loadRequestDetails(){



    var url = '/staff/requestDetails';
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.ajax({
        url: url,
        type: 'POST',
        data: {id: 2},
        dataType: 'json',
        success: function (response) {
            console.log(response.requestDetails.request, response.requestDetails.function);
         var request = response.requestDetails.request;
         var user =  response.requestDetails.user;
         var role =  response.requestDetails.role;
         var destination =  response.requestDetails.destination;


        // populating the form

            $('#request_id').html(request.id);
            $('#r-names').html(user.first_name + " " + user.last_name);
            $('#r-role').html(role.name);
            $('#r-purpose').html(request.purpose);
            $('#r-expected-result').html(request.expected_result);
            $('#r-destination').html(destination.name);
            $('#r-departure_date').html(request.departure_date);
            $('#r-return_date').html(request.return_date);



        },
        failure: function(jqXHR , textStatus, errorThrown){
            console.log(jqXHR, textStatus, errorThrown)

        }

  });

  }

  </script>

 @endsection

