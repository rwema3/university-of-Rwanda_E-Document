

<!-- Edit -->

<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Module</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>Module Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}


                <form id="frmUpdate" class="form-horizontal" method="POST" action="{{route('admin.modules.update')}}">
                @csrf
                <div id="" class="entry_1 form-group row form-content">
                    <label for="edit_name" class="col-sm-4 control-label"> Module Title</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                    </div>

                </div>

                <div id="" class=" entry_2 form-group row form-content">
                    <label for="edit_code" class="col-sm-4 control-label"> Module Code</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_code" name="edit_code" required>
                    </div>

                </div>


                <div id="" class=" entry_2 form-group row form-content">
                    <label for="edit_credits" class="col-sm-4 control-label"> Credits </label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_credits" name="edit_credits" required>
                    </div>

                </div>

                <div id="" class="entry_3 form-group row form-content">
                    <label for="edit_level" class="col-sm-4 control-label"> Level / Year </label>

                    <div class="col-sm-7">
                        <select name="edit_level" id="edit_level" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            <option value="1"> Level 1 </option>
                            <option value="2"> Level 2 </option>
                            <option value="3"> Level 3 </option>
                            <option value="4"> Level 4 </option>
                            <option value="5"> Level 5 </option>
                        </select>

                    </div>

                </div>


                <div id="" class="entry_3 form-group row form-content">
                    <label for="edit_semester" class="col-sm-4 control-label"> Semester </label>

                    <div class="col-sm-7">
                        <select name="edit_semester" id="edit_semester" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            <option value="1"> Level 1 </option>
                            <option value="2"> Level 2 </option>
                            {{-- <option value="3"> Level 3 </option> --}}
                        </select>

                    </div>

                </div>

                <div id="" class="entry_3 form-group row form-content">
                    <label for="edit_departement" class="col-sm-4 control-label"> Departement </label>

                    <div class="col-sm-7">
                        <select name="edit_departement" id="edit_departement" class="form-control" required >
                            <option value="" disabled selected> -- select  -- </option>
                           
                            @foreach ($departements as $item)

                            <option value="{{$item->id}}"> {{$item->name}} </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <div id="" class="entry_3 form-group row form-content">
                    <label for="edit_lecturer" class="col-sm-4 control-label"> Tuoght by Lecturer </label>

                    <div class="col-sm-7">
                        <select name="edit_lecturer" id="edit_lecturer" class="form-control" required >
                            <option value="" disabled > -- select  -- </option>
                            @foreach ($staffs as $item)

                            <option value="{{$item->id}}"> {{$item->first_name}} {{$item->first_name}} </option>

                            @endforeach

                        </select>

                    </div>

                </div>



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
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Module</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>Module Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}


                <form id="frmSave" class="form-horizontal" method="POST" action="{{route('admin.modules.create')}}">
                @csrf
                <div id="" class="entry_1 form-group row form-content">
                    <label for="name" class="col-sm-4 control-label"> Module Title</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                </div>

                <div id="" class=" entry_2 form-group row form-content">
                    <label for="code" class="col-sm-4 control-label"> Module Code</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="code" name="code" required>
                    </div>

                </div>


                <div id="" class=" entry_2 form-group row form-content">
                    <label for="credits" class="col-sm-4 control-label"> Credits </label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="credits" name="credits" required>
                    </div>

                </div>

                <div id="" class="entry_3 form-group row form-content">
                    <label for="level" class="col-sm-4 control-label"> Level / Year </label>

                    <div class="col-sm-7">
                        <select name="level" id="level" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            <option value="1"> Level 1 </option>
                            <option value="2"> Level 2 </option>
                            <option value="3"> Level 3 </option>
                            <option value="4"> Level 4 </option>
                            <option value="5"> Level 5 </option>
                        </select>

                    </div>

                </div>


                <div id="" class="entry_3 form-group row form-content">
                    <label for="semester" class="col-sm-4 control-label"> Semester </label>

                    <div class="col-sm-7">
                        <select name="semester" id="semester" class="form-control" required >
                            <option value=""> -- select  -- </option>
                            <option value="1"> Level 1 </option>
                            <option value="2"> Level 2 </option>
                            {{-- <option value="3"> Level 3 </option> --}}
                        </select>

                    </div>

                </div>

                <div id="" class="entry_3 form-group row form-content">
                    <label for="departement" class="col-sm-4 control-label"> Departement </label>

                    <div class="col-sm-7">
                        <select name="departement" id="departement" class="form-control" required >
                            <option value="" disabled > -- select  -- </option>
                            @foreach ($departements as $item)

                            <option value="{{$item->id}}"> {{$item->name}} </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <div id="" class="entry_3 form-group row form-content">
                    <label for="lecturer" class="col-sm-4 control-label"> Tuoght by Lecturer </label>

                    <div class="col-sm-7">
                        <select name="lecturer" id="lecturer" class="form-control" >
                            <option value="" disabled selected> -- select  -- </option>
                            @foreach ($staffs as $item)

                            <option value="{{$item->id}}"> {{$item->first_name}} {{$item->last_name}} </option>

                            @endforeach

                        </select>

                    </div>

                </div>


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


