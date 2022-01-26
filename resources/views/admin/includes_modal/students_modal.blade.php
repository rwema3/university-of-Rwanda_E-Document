

<!-- Edit -->

<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>Student Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}


                <form id="frmUpdate" class="form-horizontal" method="POST" action="{{route('admin.students.update')}}">
                @csrf
                <div id="" class="entry_1 form-group row form-content">
                    <label for="edit_first_name" class="col-sm-4 control-label">First Name</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_first_name" name="edit_first_name" required>
                    </div>

                </div>

                <div id="" class=" entry_2 form-group row form-content">
                    <label for="edit_last_name" class="col-sm-4 control-label">Last Name</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_last_name" name="edit_last_name" required>
                    </div>

                </div>

                <div id="" class="entry_3 form-group row form-content">
                    <label for="edit_email" class="col-sm-4 control-label">Email</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_email" name="edit_email" required>
                    </div>

                </div>

                <div  class="entry_4 form-group row form-content">
                    <label for="edit_gender" class="col-sm-4 control-label">Select Gender</label>

                    <div class="col-sm-7">
                        <select name="edit_gender" id="edit_gender" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            <option value="M"> Male </option>
                            <option value="F"> Female </option>
                        </select>

                    </div>

                </div>

                <div id="" class="entry_6 form-group row form-content">
                    <label for="edit_staffCode" class="col-sm-4 control-label">Student Reg N <sup>o</sup> </label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_staffCode" name="edit_staffCode" required>
                    </div>
                </div>


                <div  class="entry_4 form-group row form-content">
                    <label for="edit_level_id" class="col-sm-4 control-label"> Academic Level </label>

                    <div class="col-sm-7">
                        <select name="edit_level_id" id="edit_level_id" class="form-control" required >

                        </select>

                    </div>

                </div>



                {{-- <div  class="form-group row form-content entry_2">
                    <label for="edit_stamp" class="col-sm-4 control-label">Stamp Attachement</label>

                    <div class="col-sm-7">
                      <input style="border: 1px black solid; " type="file" class="form-control" id="edit_stamp" name="stamp" >
                    </div>

                    <div class="image-edit-placeholder-container text-center d-flex justfy-content-center pt-30 m-30 w-100">
                        <img class="m-auto" height="60" src="" alt="" id="stamp-placeholder">
                    </div>
                </div> --}}

                <input type="hidden" id="id" name="id">

                <div class="d-flex justify-content-center btn-container-update- m-auto">
                <button id="btnUpdate" type="submit" class="btn btn-primary btn-flat btnUpdate" name="update"><i class="fa fa-save"></i> Update</button>

                </div>

                <div class="d-flex justify-content-center">
                   <div style="margin: auto" class="spinner-border spinner-border-update" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </div>

            </form>
            <div id="update-messages"></div>

            </fieldset>
            <div class="modal-footer mt-40">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
        </div>
    </div>
</div>
</div>



{{-- add new --}}

<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>Student Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}


                <form id="frmSave" class="form-horizontal" method="POST" action="{{route('admin.students.create')}}">
                @csrf

                <div id="" class="entry_1 form-group row form-content">
                    <label for="first_name" class="col-sm-4 control-label">First Name</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>

                </div>

                <div id="" class=" entry_2 form-group row form-content">
                    <label for="last_name" class="col-sm-4 control-label">Last Name</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>

                </div>

                <div id="" class="entry_3 form-group row form-content">
                    <label for="email" class="col-sm-4 control-label">Email</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="email" name="email" required>
                    </div>

                </div>

                <div  class="entry_4 form-group row form-content">
                    <label for="gender" class="col-sm-4 control-label">Select Gender</label>

                    <div class="col-sm-7">
                        <select name="gender" id="gender" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            <option value="M"> Male </option>
                            <option value="F"> Female </option>
                        </select>

                    </div>

                </div>

                <div id="" class="entry_6 form-group row form-content">
                    <label for="staffCode" class="col-sm-4 control-label">Student Code</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="staffCode" name="staffCode" required>
                    </div>
                </div>



                <div  class="entry_5 form-group row form-content">
                    <label id="lbl_departement" for="departement_id"  class="col-sm-4 control-label">Departement</label>

                    <div class="col-sm-7">
                        <select name="departement_id" id="departement_id" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            @foreach ($departements as $item)
                            <option value="{{ $item->id}}"> {{ $item->name }} </option>
                            @endforeach

                        </select>
                        {{--  shoose to assign a leader --}}
                        <label  for="leader_assign" id="lbl_leader_assign">  </label>
                    </div>

                </div>

                <div  class="entry_4 form-group row form-content">
                    <label for="level_id" class="col-sm-4 control-label"> Academic Level </label>

                    <div class="col-sm-7">
                        <select name="level_id" id="level_id" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            @foreach ($levels as $item)
                             <option value="{{ $item->id}}"> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>

                </div>


                {{-- <div id="" class="entry_2 form-group row form-content">
                    <label for="stamp" class="col-sm-4 control-label">Stamp Attachement</label>

                    <div class="col-sm-7">
                      <input type="file" class="form-control" id="stamp" name="stamp" required>
                    </div>

                </div> --}}


                <div class="d-flex justify-content-center btn-container-add m-auto">
                <button id="btnSave" type="submit" class="btn btn-primary btn-flat btnSave" name="add"><i class="fa fa-save"></i> Save</button>

                </div>

               <div class="d-flex justify-content-center">
                   <div style="margin: auto" class="spinner-border  spinner-border-add" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </div>

            </form>
            <div id="add-messages"></div>


            </fieldset>
            <div class="modal-footer mt-40">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
        </div>
    </div>
</div>
</div>


