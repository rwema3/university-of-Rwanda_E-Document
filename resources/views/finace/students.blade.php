@extends('finace.layout')

@section('page_title','Staff')
@section('students_select','active')
@section('content')

<div class="content ">

    <div  class="row breadcrumb-container d-flex justify-content-between pr-30">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb bg-info">

              <li class="breadcrumb-item "><a href="#" class="text-dark">Dashboard</a></li>

              <li class="breadcrumb-item text-dark active" aria-current="page">Student</li>
            </ol>

          </nav>
          {{-- <div class="mr-30">
            <a  href="#" data-toggle="modal" class="btn btn-primary btn-sm btn-flat btn-Add"><i class="fa fa-plus"></i>Add Staff</a>
          </div> --}}
   </div>

  <div style="margin: 50px" class="container mt-30">
    <div class="row">

        <table class="table table-striped table-bordered" id="StaffTable" class="display mt-3" style="width:100%">
            <thead>
                <tr>
                    <th># ID</th>
                    <th>Profile </th>
                    <th>Names</th>
                    <th> Email </th>
                    <th>Gender</th>
                    <th>Staff Code</th>
                    <th> Cleared </th>
                    <th>Status</th>
                    <th>Tools</th>
                </tr>

             </thead>
            <tbody>
        </tbody>

        </table>
        </div>
  </div>

</div>


@endsection
@section('modals')
@include('admin.includes_modal.students_modal');
@endsection

@section('js')
<script>

    var table;
    var manageTable = $('#StaffTable');

    //  Data table population Function

    function myFunc() {
        var defaultUrl = "{{ route('admin.students.generalList') }}";

                table = manageTable.DataTable({
                    ajax: {
                        url: defaultUrl,
                        dataSrc: 'staffs'
                    },
                    searching: true,
                    rowReorder: {
                    selector: 'td:nth-child(2)'
                        },
                    // responsive: true,
                    ordering: true,
                //     columns: [
                //     { responsivePriority: 5 },
                //     { responsivePriority: 4 },
                //     { responsivePriority: 3 },
                //     { responsivePriority: 2 },
                //     { responsivePriority: 1 }
                // ],
                    paging: true,
                    columns: [
                        {data: 'staffCode'},
                        {data: 'user_id',
                        render: function(data, type, row)
                        {
                            if(row.profile_pic){
                                return '<img width="90" src="../uploads/images/profiles/' + row.profile_pic + '">';
                            }
                            else{
                                return '<img width="90" src="../uploads/images/profiles//user-temp.png">';

                            }

                        }
                        },
                        {data: 'user_id',
                        render: function(data, type, row)
                        {
                            return row.first_name + " "+ row.last_name;
                        }
                        },
                        {data: 'email'},
                        {data: 'user_id',

                        render: function(data, type, row)
                        {
                            var status = row.gender == "M" ? '<span class"text-success badge badge-info"> Male  </span>' : '<span class"text-danger badge badge-info"> Female </span>';
                            return status;
                        }
                        },
                        {data: 'staffCode'},
                        {data: 'id',

                        render: function(data, type, row)
                        {
                            var status = row.cleared_finace == true ? '<span class"text-success badge badge-success"> Cleared </span>' : '<span class"text-danger badge badge-danger"> Not Cleared </span>';
                            return status;
                        }
                        }, 
                        {data: 'user_id',

                        render: function(data, type, row)
                        {
                            var status = row.status == true ? '<span class"text-success"> Active </span>' : '<span class"text-danger"> Disactive </span>';
                            return status;
                        }
                        },
                        {
                            data: 'user_id',
                            render: function (data, type, row) {

                                if(!row.cleared_finace){
                                    return "<button class='btn btn-success btn-sm btn-flat js-change-clear-status' data-id='" + data +
                                    "' data-url='/finace/students/" + row.request_id + "'> <i class='fa fa-pen'></i> Clear Finance </button>";

                                }
                                else{
                                    return "<button class='btn btn-success btn-sm btn-flat js-change-clear-status' data-id='" + data +
                                    "' data-url='/finace/students/" + row.request_id + "'> <i class='fa fa-pen'></i> Unclear Finance </button>";

                                }

                           
                            }
                        }
                    ]
                });
            }


        $(document).ready(function(){
            myFunc();

        $('.spinner-border-add').hide();

        // add

        manageTable.on('click', '.js-change-clear-status', function()
                {
                    var id = $(this).attr('data-id'); console.log(id);

                    $.ajax({
                        url: '/finace/students/'+ id,
                        type: 'GET',
                        // data: {id: id},
                        dataType: 'json',
                        success: function (response) {
                            var user = response.user;
                            console.log(user.user);

                            if(user.cleared_finace == false){
                        var html = '<form id="frmChangeStatus" action="/finace/student/clear/" method="POST" >'+
                        '<input type="hidden" id="id" name="id" value="'+user.id+'" >'+
                        '<div class="d-flex justify-content-start m-3" > <label for="active_status"> <input id="active_status" type="radio" name="status"  checked value="1"> Make Clear Finace </label></div>'+
                        '<div class="d-flex justify-content-start m-3" > <label for="disactive_status">  <input id="disactive_status" type="radio" name="status" value="0">Make UnClear Finace </label></div>'+
                        '<div class="d-flex justify-content-start m-3" > <input type="submit" name="submit" value="change"></div>'+
                        '<div id="changeStatus-messages" class="changeStatus-messages mt-10 text-center"> </div>'+
                        '</form>';
                        }
                        else{
                            var html = '<form id="frmChangeStatus" action="/finace/student/clear/" method="POST" >'+
                        '<input type="hidden" id="id" name="id" value="'+user.id+'" >'+
                        '<div class="d-flex justify-content-start m-3" > <label for="active_status"> <input id="active_status" type="radio" name="status"  value="0"> Make Clear Finace </label> </div>'+
                        '<div class="d-flex justify-content-start m-3" > <label for="disactive_status">  <input id="disactive_status" type="radio" name="status" checked value="0"> Make UnClear Finace</labe></div>'+
                        '<div class="d-flex justify-content-start m-3" > <input type="submit" name="submit" value="change"></div>'+
                        '<div id="changeStatus-messages" class="changeStatus-messages mt-10 text-center"> </div>'+
                        '</form>';
                        }

                        Swal.fire({
                                    title: '<strong>Clear Student</strong>',
                                    icon: 'info',
                                    html: html,

                                    })

                          // change status - form
                                 $('#frmChangeStatus').unbind('submit').bind('submit', function (e) {
                                e.preventDefault();
                                var form = $(this);
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: form.attr('action'),
                                    type: 'POST',
                                    data: form.serialize()
                                }).done(function (response) {
                                    console.log(response);
                                    console.log(response)
                                   form[0].reset();
                                    table.destroy();
                                    myFunc();
                                    $('#changeStatus-messages').html('<div class="alert alert-success alert-success-update">' +
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Student Cleared status  successfully updated. </div>');

                                    $(".alert-success-update").delay(500).show(10, function () {
                                        $(this).delay(3000).hide(10, function () {
                                            $(this).remove();
                                        });
                                    }); //.alert

                                    setTimeout(function() {
                                        swal.close();
                                    }, 3000);



                                }).fail(function (response) {
                                    console.log(response);
                                    var errors = "";
                                    errors+="<b>"+response.responseJSON.message+"</b>";
                                    var data=response.responseJSON.errors;

                                    $.each(data,function (i, value) {
                                        console.log(value);
                                        if (i=='name'){
                                            $('#ename').html(value[0])
                                        }
                                        $.each(value,function (j, values) {
                                            errors += '<p>' + values + '</p>';
                                        });
                                    });
                                    $('#update-messages').html('<div class="alert alert-danger flat">' +
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                        '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>'+errors+'</div>');

                                    $(".alert-success").delay(500).show(10, function () {
                                        $(this).delay(3000).hide(10, function () {
                                            $(this).remove();
                                        });
                                    });
                                });	 // /ajax

                                return false;
                            }); // / change status - form

                        }

                    });



                Swal.fire({
                title: '<strong>Change status</strong>',
                // icon: 'info',
                html:
                    '<form id="frmChangeStatus" action="admin/staffs/Changestatus" method="POST" >'+
                    '<div class="d-flex justify-content-start m-3" > <input type="radio" name="status" value="1">active</div>'+
                    '<div class="d-flex justify-content-start m-3" > <input type="radio" name="status" value="0">disactive</div>'+
                    '<div class="d-flex justify-content-start m-3" > <input id="btn-change-college-status" type="submit" class="btn btn-sm btn-primary" name="submit" value="change"></div>'+
                    '</form>'
                    ,
                })

                $('#btn-change-college-status');

                })

    })



    </script>

    @endsection
