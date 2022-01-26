

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="positions_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE school</p>
                    <h2 class="bold description"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>





<!-- Edit -->

<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Schools</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>School Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}


                <form id="frmUpdate" class="form-horizontal" method="POST" action="{{route('admin.schools.update')}}">
                @csrf
                <div id="entry_1" class="form-group row form-content">
                    <label for="edit_school_name" class="col-sm-4 control-label">School Name</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_school_name" name="edit_school_name" required>
                    </div>

                </div>

                <div  class="form-group row form-content entry_2">
                    <label for="edit_stamp" class="col-sm-4 control-label">Stamp Attachement</label>

                    <div class="col-sm-7">
                      <input style="border: 1px black solid; " type="file" class="form-control" id="edit_stamp" name="stamp" >
                    </div>

                    <div class="image-edit-placeholder-container text-center d-flex justfy-content-center pt-30 m-30 w-100">
                        <img class="m-auto" height="60" src="" alt="" id="stamp-placeholder">
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
            <h5 class="modal-title" id="exampleModalCenterTitle">Add School</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>School Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}


                <form id="frmSave" class="form-horizontal" method="POST" action="{{route('admin.schools.create')}}">
                @csrf

                <div  class="entry_0 form-group row form-content">
                    <label for="college_id" class="col-sm-2 control-label">Choose College</label>

                    <div class="col-sm-8">
                        <select name="college_id" id="college_id" class="form-control" required >
                            <option value=""> -- select college -- </option>
                            @foreach ($college as $item)
                            <option value="{{ $item->id}}"> {{ $item->name }} </option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <div id="" class="entry_1 form-group row form-content">
                    <label for="school_name" class="col-sm-2 control-label">School Name</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="school_name" name="school_name" required>
                    </div>

                </div>

                <div id="" class="entry_2 form-group row form-content">
                    <label for="stamp" class="col-sm-4 control-label">Stamp Attachement</label>

                    <div class="col-sm-7">
                      <input type="file" class="form-control" id="stamp" name="stamp" required>
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


