<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Update Profile</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{route('user.dashboard')}} " class="text-success">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" id="frmProfile" action="{{route('user.update.acount')}}" method="POST">
                            @csrf

                            <div class="row ">
                                <div class="col-12">
                                    <div class="has-icon-left mb2">
                                        <label for="photo">Profile</label>


                                        <div class="avatar-wrapper">
                                            <img class="profile-pic" id="profile-pic" src="" />
                                            <div class="upload-button">
                                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                            </div>
                                            <input id="photo" name="photo" class="file-upload" type="file" accept="image/*"/>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group has-icon-left">
                                        <label for="staffCode">Staff ID Number</label>
                                        <div class="position-relative">
                                            <input name="staffCode"  type="text" class="form-control" placeholder="staff code" id="staffCode" value="">
                                            <div  class="form-control-icon">
                                            <i class="fa fa-hash"></i>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group has-icon-left">
                                        <label for="gender">Gender</label>
                                        <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select name="gender" class="form-select" id="gender">
                                                    {{-- <option value="">-- select --</option>
                                                    <option {{$user['staff']->gender == 'M' ? 'selected' : '' }} value="M"   >Male</option>
                                                    <option {{$user['staff']->gender == 'F' ? 'selected' : ''}} value="F" >Female</option> --}}
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group has-icon-left">
                                            <label for="first_name">First Name</label>
                                            <div class="position-relative">
                                                <input name="first_name" type="text" class="form-control" placeholder="first name" id="first_name" value="">
                                                <div class="form-control-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group has-icon-left">
                                            <label for="last_name">Last Name</label>
                                            <div class="position-relative">
                                                <input name="last_name" type="text" class="form-control" placeholder="last name" id="last_name" value="">
                                                <div class=" form-control-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
    
                                </div>

                                <div class="row">

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group has-icon-left">
                                        <label for="email">Email</label>
                                        <div class="position-relative">
                                            <input name="email" type="text" class="form-control" placeholder="email" id="email" value="">
                                            <div class="form-control-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group has-icon-left">
                                        <label for="telphone">Contact</label>
                                        <div class="position-relative">
                                            <input name="telphone" type="text" class="form-control" placeholder="contact" id="telphone" value="">
                                            <div class="form-control-icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>



{{-- 
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="role">Designation | Role  </label>
                                            <fieldset class="form-group">
                                                <select name="role" class="form-select" id="role">
                                                    <option value="" > -- Select --</option>
                                                </select>
                                            </fieldset>
                                    </div>
                                </div> --}}


                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label id="lbl_departement" for="country-floating">Department</label>
                                                <fieldset class="form-group">
                                                    <select name="departement" class="form-select" id="departement">
                                                        <option value=""> -- select -- </option>
                                                        {{-- @foreach ($user['departement'] as $item)
    
                                                        <option value="{{ $item->id }}" {{$user['staff']->departement_id == $item->id ? 'selected' : ''}} > {{$item->name}} </option>
    
                                                        @endforeach --}}
    
                                                    </select>
                                                </fieldset>
                                        </div>
                                    </div>


                                </div>

                              
                                {{-- <div class="row">
                                    <div class="col-md-6 col-6 col-sm-10 col-xs-10">
                                        <div class="form-group p-20">
                                            <label for="country-floating"> sign </label>
                                            <fieldset class="form-group p-10">
    
                                                <!-- js signature widget -->
    
                                                <div class='js-signature'></div>
                                                </fieldset>
    
                                        </div>
    
                                        <button type="button" style="" id="clear-signature" class="btn btn-secondary float-right self-right" onclick="clearCanvas();" style="padding: 5px;" > Clear Signature</button>
                                  </div>
                                  <div class="col-md-6 col-6 col-sm-10 col-xs-10">
                                    <div class="form-group">
                                        <label id="lbl_departement" for="country-floating">Signature </label>
                                            <fieldset class="form-group">
                                             <img id="my-sign" class="my-sign" src="" />
                                            </fieldset>
                                    </div>
                                </div>
    
                                     
                                </div> --}}

                                <input type="hidden" id="id" name="id">

                                <!-- populate the base64 encoded image in the textarea -->
                                <textarea id="signature64" name="signed" style="display:none"></textarea>

                                <div class="col-12 d-flex justify-content-center">
                                    <button id="frmUpdate" type="submit" class="btn btn-primary me-1 mb-1">Update Profile</button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <div style="margin: auto" class="spinner-border  spinner-border-add" role="status">
                                 <span class="sr-only">..</span>
                             </div>
                             </div>

                             <div id="update-messages">
                                <div class="alert alert-success alert-success-update">' 
                                    
                                   


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->
</div>
