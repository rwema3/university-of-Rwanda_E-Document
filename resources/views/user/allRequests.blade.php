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
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}" class="text-success">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">mission requests status</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        @if (session('errors'))
        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
                @for ($i=0; $i< count(session('errors')); $i++)
            
                {{session('errors')[$i]}} <br>
                    
                @endfor
               
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

          </div>

        @endif
   
    </div>



    <section class="section">

        <div class="card">
        
            <div class="card-body">
                <table  id="table1" class="table display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th> Transcript Year </th>
                            <th>Status</th>
                            <th> tools </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


            </div>
        </div>
    </section>
</div>


<!-- Delete -->
<div class="modal fade" id="pay_request_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close close close-modal" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
              <h4 class="modal-title"><b> Request to pay form </b></h4>
            </div>
            <div class="modal-body">

              <form class="form-horizontal" id="frm-pay" method="POST" action="{{route('user.pay')}}">

                <input id="id" type="hidden" class="id" name="id">
                <div class="text-center">
                    {{-- <p> USE YOUR MOBILE MONEY TO PAY   </p> --}}
                    <h2 class="bold description">USE YOUR MOBILE MONEY TO PAY </h2>                 
                </div>
                <div class="row">

                    <div class="col-md-6 col-12">
                        <div class="form-group has-icon-left">
                            <label for="telphone">  Phone number </label>
                            <div class="position-relative">
                                <input required name="telphone" type="text" class="form-control"  id="telphone" value="{{ $user->telphone }}">
                                <div  class="form-control-icon">
                                <i class="fa fa-hash"></i>
                            </div>
                            </div>
                            <small> we will prompt you to pay money 3000 RWF from this mobile number </small>
                        </div>
                    </div>
                </div>

             {{-- <button type="submit" class="btn btn-primary btn-flat" name="pay"><i class="fa fa-trash"></i>  Checkout </button> --}}


             <div class="d-flex justify-content-center btn-container-update- m-auto">
                <button id="btnUpdate" type="submit" class="btn btn-primary btn-flat btnUpdate" name="pay"><i class="fa fa-save"></i> Payment Chechout</button>

                </div>

               <div class="d-flex justify-content-center">
                   <div style="margin: auto" class="spinner-border spinner-border-update" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </div>
                </div>
            </form>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left close close-modal" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              {{-- <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button> --}}
              
            </div>
        </div>
    </div>
</div>


<!-- Large modal   -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}

<div id="ModalViewRequest" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">

             <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading"> <strong>Well done!</strong> </h4>
                <p>Aww yeah, you successfully granted your doc.</p>
                <hr>
                <p class="mb-0"> Get your document.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>

            {{-- @include('user.includes.user_request_details') --}}

          </div>
          <div class="modal-footer">
            <button  type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
          </div>
    </div>
  </div>
</div>





 @endsection
 @section('js')

 <script>

var table;
var manageTable = $('#table1');
//  Data table population Function
myFunc();
function myFunc() {
    var defaultUrl = "{{ route('user.allstaffRequests') }}";

            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'staffRequests'
                },
                searching: true,
                // ordering: true,
                rowReorder: {
                selector: 'td:nth-child(2)'
                    },
                    responsive: true,
                        paging: true,
                        columns: [
                            {data: 'id'},
                         
                            {data: 'id',
                            render: function(data, type, row)
                            {
                             
                                return "level "+ row.level;

                            }
                            },

                            {data: 'id',
                            render: function(data, type, row)
                            {
                                var color = row.payment_status == 'PAID' ? "btn-success" : "btn-danger";
                              return  "<button class='btn  btn-xs btn-flat js-change-status "+ color+ "' data-id='" + data +"' data-url='/students/request/changeStatus/" + row.id + "'> "+ row.payment_status +"  </button>";

                            }
                            },

                            {
                                data: 'id',
                                render: function (data, type, row) {
                                    var actions ="";
                                    if(row.payment_status != "UNPAID"){
                                        var actions =  "<a data-toggle='' href='/student/transcript' class='btn btn-success btn-sx btn-flat js-edit js-view' data-id='" + data +
                                        "' data-reqid='"+ row.id +"'  data-url='/admin/colleges/show/" + row.id + "'> Download</a>";

                                    }
                                  
                                        if(row.payment_status == "UNPAID"){
                                            actions +=  "<button data-toggle='modal' class='btn pl-2 btn-success btn-sx btn-flat js-request-pay' data-id='" + data +
                                        "' data-reqid='"+ row.id +"'  data-url='/student/request/pay/" + row.id + "'> <i class='fa fa-money fa-lg'></i> Pay </button>";
                                        }

                                        return actions;
                                }
                            }
                        ]
                    });
                }





$(document).ready(function() {


    // Manual Modal close
    $(function () {
        $('.close-modal').on('click', function () {
            $("#ModalViewRequest").modal('hide');
            $("#pay_request_form").modal('hide');

        })
    })


 // populate request details of long view
 manageTable.on('click', '.js-view', function(){
    var reqId = $(this).data('reqid');

    $("#ModalViewRequest").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#ModalViewRequest").modal('show');

    loadRequestDetails(reqId);
 });



 manageTable.on('click', '.js-request-pay', function(){
    var reqId = $(this).data('reqid'); 

    $('#id').val(reqId);

    $("#pay_request_form").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#pay_request_form").modal('show');

    $('#id').val(reqId);


    $('#frm-pay').on('submit', function(e){

        e.preventDefault();

        $('.btn-container-update').removeClass('d-flex flex');
        $('.btn-container-update').addClass('d-none').css('display', 'none');
        $('.spinner-border-update').show().css('display', 'flex');
        
        var formData = new FormData(document.getElementById('frm-pay'));
        var form = $(this);

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        url: url,
        type: 'POST',
        data: form.serialize(),
        // dataType: 'json',
        success: function (response) {
            console.log(response);
        },
        failure: function(jqXHR , textStatus, errorThrown){
            console.log(jqXHR, textStatus, errorThrown)

        }

    });





    })



var url = "{{route('user.pay')}}";



  
 });





});






function loadRequestDetails(reqId){
    reqId = reqId;


var url = "{{route('user.requestDetails')}}";

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$.ajax({
    url: url,
    type: 'POST',
    data: {id: reqId},
    dataType: 'json',
    success: function (response) {
        console.log(response.requestDetails);
        var Details = response.requestDetails;

     var request = Details.request;
     var user =  Details.user;
     var role =  Details.role;
     var destination =  Details.destination;
     var transiportation = Details.transiportation;
     var departement = Details.departement;



    // populating the form

        $('#request_id').html(request.id);
        $('#r-names').html(user.first_name + " " + user.last_name);
        $('#r-role').html(role.name);
        $('#r-purpose').html(request.purpose);
        $('#r-return_date').html(request.return_date);

        var transiport_means = '<label for="public">'+
                              '<input type="radio" name="transiportation" id="public" value="1" '+ (request.transiportation_id == 1 ? "checked" : "" ) +' > Public  </label>' +
                            '<label  for="private">'+
                            '<input type="radio" name="transiportation" id="private" value="2" '+ (request.transiportation_id == 2 ? "checked" : "" ) +'>Private</label>'+
                            '<label  for="provided">'+
                            '<input type="radio" name="transiportation" id="provided" value="3" '+ (request.transiportation_id == 3 ? "checked" : "" ) +' >Provided</label>';

        $('#r-transiportation').html(transiport_means);

        $('#r_signature').attr('src', '/storage/'+ user.signature);
        $('#r_signature').attr('width', 200);
        $('#r_signature').attr('height', 100);

        if(Details.type == 5){
            $('#r-departement').html(departement.name);
        }

    },
    failure: function(jqXHR , textStatus, errorThrown){
        console.log(jqXHR, textStatus, errorThrown)

    }

});

}
</script>

 @endsection

