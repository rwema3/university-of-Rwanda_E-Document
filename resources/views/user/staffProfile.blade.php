@extends('user.layoult')
@section('page_title','User Request form')
@section('profile_selected', 'active')


@section('navbar')
@include('user.includes.navbar_requester')
@endsection

@section('sidebar')
@include('user.includes.sidebar_requester')
@endsection

@section('content')
@include('user.includes.user_account')
 @endsection

 @section('js')

 <script>
// $('.js-signature').jqSignature({

//     border: '1px dashed #a0a0a0',
//     });

     // initiate jq-signature
     $('.js-signature').jqSignature({
        //  autoFit: true, // allow responsive
        //  height: 152, // set height
         width: 200,
        height: 180,
         border: '1px dashed #a0a0a0', // set widget border
         background: '#f1f0fa',
         lineColor: '#15141c',
         lineWidth: 2,
         autoFit: false

     });

     // create hook for clear button
     function clearCanvas() {
         $('.js-signature').jqSignature('clearCanvas');
         $("#signature64").val(''); // clear the textarea as well
     }

     // update the generated encoded image in the textarea
     $('.js-signature').on('jq.signature.changed', function() {
         var data = $('.js-signature').jqSignature('getDataURL');
         $("#signature64").val(data);
     });


    //  image  preview
    $(document).ready(function () {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
                PopulateProfile();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });


 PopulateProfile();

});


// populate user profile form

    function PopulateProfile(){
        $('.spinner-border-add').hide();


              var url = '{{route('user.profile.details')}}';
                $.ajax({
                url: url,
                method: 'GET',
                dataType: "JSON",
                contentType: false,
                cashe: false,
                processData: false,
            }).done(function (data) {

                if (data.staff){
                var staff = data.staff.staff;
                var departements = data.staff.departement;
                var role = data.staff.role;
                var type = data.staff.type;

                console.log(data);
                $('#id').val(staff.id);
                $('#staffCode').val(staff.staffCode);
                $('#first_name').val(staff.first_name);
                $('#last_name').val(staff.last_name);
                $('#email').val(staff.email);
                $('#telphone').val(staff.telphone);

                if(staff.profile_pic){
                    console.log(staff.profile_pic);
                    $('#profile-pic').attr('src','/uploads/images/profiles/' + staff.profile_pic);
                }

                if(staff.signature){
                    console.log(staff.profile_pic);
                    $('#my-sign').attr('src','/uploads/images/signature/' + staff.signature);
                }

                var genderOption = '<option value="M" '+ (staff.gender == "M" ? "selected": "" )+' > Male </option> <option value="F" '+ ( staff.gender == "F" ? "selected": "" ) +'> Female</option>';

                $('#gender').append(genderOption);

                if(true){
                    $.each(departements, function(index, item){
                        $('#departement').append('<option value="'+ item.id+'" '  +( item.id == staff.departement_id ? "selected": 'disabled' )+ ' >'+item.name+'</option>');

                    })
                    $('#lbl_departement').html('Departement');


                   $.each(role, function(index, item){
                        $('#role').append('<option value="'+ item.id+'" '  +( item.id == staff.role_id ? "selected": 'disabled' )+ ' >'+item.name+'</option>');

                    })
                }

                    // $('#add-messages').html('<div class="alert alert-success alert-message flat">' +
                    //     '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    //     '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Staff successfully saved. </div>');

                    // $(".alert-message").delay(500).show(10, function () {
                    //     $(this).delay(3000).hide(10, function () {
                    //         $(this).remove();
                    //     });
                    // });




                    // add hidden id
                    $('#id').val(staff.id);

                    // update - form
                    $('#frmProfile').unbind('submit').bind('submit', function (e) {
                        e.preventDefault();
                        var form = $(this);

                        // form.parsley().validate();
                        // if (!form.parsley().isValid()) {
                        //     return false;
                        // }
                        $('.spinner-border-add').show();

                        $.ajax({
                            url: form.attr('action'),
                            type: 'POST',
                            data: new FormData(document.getElementById('frmProfile')),
                            cache:false,
                            contentType: false,
                            processData: false,
                        }).done(function (response) {
                            console.log(response)

                        $('.spinner-border-add').hide();


                            $('#update-messages').html('<div class="alert alert-success alert-dismissible fade show alert-success-update">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> You  successfully updated. </div>');

                            $(".alert-success-update").delay(500).show(10, function () {
                                $(this).delay(3000).hide(10, function () {
                                    $(this).remove();
                                });
                            }); //.alert


                            // setTimeout(function() {
                            //     $('#edit').modal('hide');
                            // }, 3000);




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


                }

            }).fail(function (response) {
                console.log(response.responseJSON);

                //showing errors validation on pages

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
}



 </script>

 @endsection

