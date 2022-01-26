@extends('admin.layout')

@section('page_title','Schools')
@section('school_select','active')
@section('content')

<div class="content ">

    <div  class="row breadcrumb-container d-flex justify-content-between pr-30">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb bg-info">

              <li class="breadcrumb-item "><a href="#" class="text-dark">Dashboard</a></li>

              <li class="breadcrumb-item text-dark active" aria-current="page">Schools</li>
            </ol>

          </nav>
          <div class="mr-30">
            <a  href="#" data-toggle="modal" class="btn btn-primary btn-sm btn-flat btn-Add"><i class="fa fa-plus"></i> New School</a>
          </div>
   </div>

  <div style="margin: 50px" class="container mt-30">
    <div class="row">

        <table id="SchoolTable" class="display nowrap mt-3 " style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>School Stamp</th>
                    <th>School Name</th>
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
@include('admin.includes_modal.school_modal');
@endsection

@section('js')
<script>

    var table;
    var manageTable = $('#SchoolTable');

    //  Data table population Function

    function myFunc() {
        var defaultUrl = "{{ route('admin.schools.generalList') }}";

                table = manageTable.DataTable({
                    ajax: {
                        url: defaultUrl,
                        dataSrc: 'schools'
                    },
                    searching: true,
                    // ordering: true,
                    paging: true,
                    columns: [
                        {data: 'id'},
                        {data: 'id',
                        render: function(data, type, row)
                        {
                            if(row.stamp){
                                return '<img width="90" src="../uploads/images/stamps/' + row.stamp + '">';
                            }
                            else{
                                return '<img width="90" src="../admin_assets/img/ur_logo.png">';

                            }

                        }
                        },
                        {data: 'name'},
                        {data: 'id',

                        render: function(data, type, row)
                        {
                            var status = row.status == true ? '<span class"text-success"> Active </span>' : '<span class"text-danger"> Disactive </span>';
                            return status;
                        }
                        },
                        {
                            data: 'id',
                            render: function (data, type, row) {

                                return "<button class='btn btn-success btn-sm btn-flat js-edit' data-id='" + data +
                                    "' data-url='/admin/schools/show/" + row.id + "'> <i class='fa fa-pen'></i>Edit</button>" +

                                    "<button class='btn btn-danger btn-sm btn-flat js-change-status ' data-id='" + data +
                                    "' data-url='/admin/schools/changeStatus/" + row.id + "'> <i class='fa fa-trash'></i>Change Status</button>";

                            }
                        }
                    ]
                });
            }


        $(document).ready(function(){
            myFunc();

        $('.spinner-border-add').hide();

        // add

    $('.btn-Add').on('click', function(){
        var addNew_button = '<div class="add_field"><button class="btn btn-sm btn-add-field">add</button></div>';
        $("#addnew").modal({
            backdrop: 'static',
            keyboard: false
        });

        });

        //Edit and update
                manageTable.on('click', '.js-edit', function () {
                    $('#edit').modal('show');
                    $('.btn-container-update').removeClass('d-flex');
                    $('.btn-container-update').addClass('d-none');
                    $('.spinner-border-update').show();

                    var url = $(this).attr('data-url');
                    var id = $(this).attr('data-id');
                    console.log(url);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {id: id},
                        dataType: 'json',
                        success: function (response) {
                            // console.log(response.school);

                    $('.btn-container-update').removeClass('d-none');
                    $('.btn-container-update').addClass('d-flex');
                    $('.spinner-border-update').hide();

                    $("#edit_school_name").val(response.school.name);
                    if(response.school.stamp){
                    $("#stamp-placeholder").attr( 'src', '../uploads/images/stamps/' + response.school.stamp);
                    }
                    else{
                    $("#stamp-placeholder").attr( 'src', '../admin_assets/img/ur_logo.png');
                    }

                            // add hidden id
                            $('#id').val(response.school.id);
                            // update - form
                            $('#frmUpdate').unbind('submit').bind('submit', function (e) {
                                e.preventDefault();
                                var form = $(this);
                                console.log(form);

                                // form.parsley().validate();
                                // if (!form.parsley().isValid()) {
                                //     return false;
                                // }
                                $('.spinner-border-add').show();

                                $.ajax({
                                    url: form.attr('action'),
                                    type: 'POST',
                                    data: new FormData(document.getElementById('frmUpdate')),
                                    cache:false,
                                    contentType: false,
                                    processData: false,
                                }).done(function (response) {
                                   form[0].reset();
                                    // reload the table
                                    table.destroy();
                                    myFunc();
                                    $('#update-messages').html('<div class="alert alert-success alert-success-update">' +
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> School  successfully updated. </div>');

                                    $(".alert-success-update").delay(500).show(10, function () {
                                        $(this).delay(3000).hide(10, function () {
                                            $(this).remove();
                                        });
                                    }); //.alert


                                    setTimeout(function() {
                                        $('#edit').modal('hide');
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
                            }); // /update - form

                        } // /success
                    }); // ajax function
                });

                manageTable.on('click', '.js-change-status', function()
                {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url: '/admin/schools/show/'+ id,
                        type: 'GET',
                        data: {id: id},
                        dataType: 'json',
                        success: function (response) {
                            var status = response.school.status;
                            if(status == 1){
                    var html = '<form id="frmChangeStatus" action="/admin/schools/changeStatus" method="POST" >'+
                    '<input type="hidden" id="id" name="id" value="'+id+'" >'+
                    '<div class="d-flex justify-content-start m-3" > <label for="active_status"> <input id="active_status" type="radio" name="status"  checked value="1">active </label></div>'+
                    '<div class="d-flex justify-content-start m-3" > <label for="disactive_status">  <input id="disactive_status" type="radio" name="status" value="0">disactive </label></div>'+
                    '<div class="d-flex justify-content-start m-3" > <input type="submit" name="submit" value="change"></div>'+
                    '<div id="changeStatus-messages" class="changeStatus-messages mt-10 text-center"> </div>'+
                    '</form>';

                     }
                     else{
                        var html = '<form id="frmChangeStatus" action="/admin/schools/changeStatus" method="POST" >'+
                    '<input type="hidden" id="id" name="id" value="'+id+'" >'+
                    '<div class="d-flex justify-content-start m-3" > <label for="active_status"> <input id="active_status" type="radio" name="status"  value="1">Active </label> </div>'+
                    '<div class="d-flex justify-content-start m-3" > <label for="disactive_status">  <input id="disactive_status" type="radio" name="status" checked value="0">disactive </labe></div>'+
                    '<div class="d-flex justify-content-start m-3" > <input type="submit" name="submit" value="change"></div>'+
                    '<div id="changeStatus-messages" class="changeStatus-messages mt-10 text-center"> </div>'+
                    '</form>';
                     }

                        Swal.fire({
                                    title: '<strong>Change status</strong>',
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
                                   form[0].reset();
                                    table.destroy();
                                    myFunc();
                                    $('#changeStatus-messages').html('<div class="alert alert-success alert-success-update">' +
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> School  successfully updated. </div>');

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
                    '<form id="frmChangeStatus" action="admin/schools/Changestatus" method="POST" >'+
                    '<div class="d-flex justify-content-start m-3" > <input type="radio" name="status" value="1">active</div>'+
                    '<div class="d-flex justify-content-start m-3" > <input type="radio" name="status" value="0">disactive</div>'+
                    '<div class="d-flex justify-content-start m-3" > <input id="btn-change-college-status" type="submit" class="btn btn-sm btn-primary" name="submit" value="change"></div>'+
                    '</form>'
                    ,
                })
                
                $('#btn-change-college-status');




                })


        $('#frmSave').submit(function(event){
            event.preventDefault();
                    var form = $(this);
                    var btn = $('#btnSave');
                    var formData = new FormData(this);

                    $('.btn-container-add').removeClass('d-flex');
                    $('.btn-container-add').addClass('d-none');
                    $('.spinner-border-add').show();

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: formData,
                        dataType: "JSON",
                        contentType: false,
                        cashe: false,
                        processData: false,
                    }).done(function (data) {
                        console.log(data);


                        if (data.result=="ok"){
                            btn.button('reset');
                            form[0].reset();

                            // reload the table
                            table.destroy();
                            myFunc();
                            $('#add-messages').html('<div class="alert alert-success alert-message flat">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> School successfully saved. </div>');

                            $(".alert-message").delay(500).show(10, function () {
                                $(this).delay(3000).hide(10, function () {
                                    $(this).remove();
                                });
                            });

                            $('.btn-container-add').removeClass('d-none');
                            $('.btn-container-add').addClass('d-flex');
                            $('.spinner-border-add').hide();
                        }
                    }).fail(function (response) {
                        console.log(response.responseJSON);

                        btn.button('reset');
    //                    showing errors validation on pages

                        var option = "";
                        option+=response.responseJSON.message;
                        var data=response.responseJSON.errors;
                        $.each(data,function (i, value) {
                            console.log(value);

                            $.each(value,function (j, values) {
                                option += '<p>' + values + '</p>';
                            });
                        });
                        $('#add-messages').html('<div class="alert alert-danger alert-message flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>'+option+'</div>');

                        $(".alert-message").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });

                        $('.btn-container-add').removeClass('d-none');
                        $('.btn-container-add').addClass('d-flex');
                        $('.spinner-border-add').hide();

                        //alert("Internal server error");
                    });
                    return false;

             })

    })



    </script>

    @endsection
