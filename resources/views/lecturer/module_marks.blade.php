@extends('lecturer.layoult')
@section('page_title','User Dashboard')
@section('marks_selected','active')


@section('navbar')
@include('user.includes.navbar_requester')
@endsection

@section('content')

@php
use App\Models\user\Mark;

@endphp

<div class="main-content container-fluid">
    <div class="page-title">
       <h3>Module : |{{$module->name }} [ {{$module->code}} ] </h3>
    </div>
    
    <div class="row">
        @if (session('message'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> OKay:  </strong>  {{ session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>


    <table class="table marks-table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col"> Reg Number </th>
            <th scope="col">Marks</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
          <tr>

            <th scope="row">{{$item->id}} </th>
            <td> {{$item->first_name}} </td>
            <td> {{$item->last_name}} </td>
            <td> {{$item->staffCode}} </td>
            <td>
                @php
                    $mar = Mark::where(['module_id'=>$module->id, 'user_id'=>$item->id])->get();
                @endphp

          
                 @if (count($mar))
                 @if ($mar[0]->marks >= 50)
                 <span class="badge badge-success"> {{$mar[0]->marks}} </span>
                 @else
                 <span class="badge badge-danger"> {{$mar[0]->marks}} </span>
                 @endif
                 @else
                 <span class="badge badge-dark">?</span>
                 @endif
            </td>
            <td>


         
                    @if (count($mar))
                    <button class="btn btn-sm btn-secondary UpdateMarks" data-marks="{{$mar[0]->marks}}"  data-names="{{$item->first_name}} {{$item->last_name}}" data-module_id="{{$module->id}}"  data-student="{{$item->id}}" > Update </button>                     
                    @else
                      <button class="btn btn-sm btn-primary asignMarks" data-names="{{$item->first_name}} {{$item->last_name}}" data-module_id="{{$module->id}}"  data-student="{{$item->id}}" >Asign Marks</button>                       
                    @endif
                

            </td>
          </tr>
            @endforeach
        </tbody>
      </table>

 </div>


  <!-- Modal Asign Marks-->
  <div class="modal fade" id="add-marks" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asign marks</h5>
          <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form class="form" id="frmAddmarks" action="{{route('lecturer.create.marks')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 col-lg-10">
                       <div class="form-group has-icon-left">
                           <label for="names"> Names </label>
                           <div class="position-relative">
                               <input name="names" type="text" disabled class="form-control" placeholder="" id="names" value="">
                               <div class="form-control-icon">
                                   <i class="fa fa-user"></i>
                               </div>
                           </div>
                       </div>
                   </div>               
                  </div>

                    
                   <div class="row">
                     <div class="col-md-6 col-lg-10">
                        <div class="form-group has-icon-left">
                            <label for="marks">Marks / 100</label>
                            <div class="position-relative">
                                <input name="marks" type="text" class="form-control" placeholder="e.g 80" id="marks" value="">
                                <div class="form-control-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>               
                   </div>

                   <input type="hidden" name="module" id="module" class="module" value="">
                   <input type="hidden" name="student" id="student" class="student" value="">

    
                    <!-- populate the base64 encoded image in the textarea -->

                    <div class="col-12 d-flex justify-content-center">
                        <button id="frmUpdate" type="submit" class="btn btn-primary me-1 mb-1"> Add Marks </button>
                    </div>
              
            </form>
         </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
  </div>




  <!-- Modal Update-->
  <div class="modal fade" id="mdlUpdateMarks" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Marks</h5>
          <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form class="form" id="frmUpdatemarks" action="{{route('lecturer.update.marks')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 col-lg-10">
                       <div class="form-group has-icon-left">
                           <label for="names"> Names </label>
                           <div class="position-relative">
                               <input name="names" type="text" disabled class="form-control" placeholder="" id="edit_names" value="">
                               <div class="form-control-icon">
                                   <i class="fa fa-user"></i>
                               </div>
                           </div>
                       </div>
                   </div>               
                  </div>

                    
                   <div class="row">
                     <div class="col-md-6 col-lg-10">
                        <div class="form-group has-icon-left">
                            <label for="marks">Marks / 100</label>
                            <div class="position-relative">
                                <input name="marks" type="text" class="form-control" placeholder="e.g 80" id="edit_marks" value="">
                                <div class="form-control-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>               
                   </div>

                   <input type="hidden" name="module" id="edit_module" class="edit_module" value="">
                   <input type="hidden" name="student" id="edit_student" class="edit_student" value="">

    
                    <!-- populate the base64 encoded image in the textarea -->

                    <div class="col-12 d-flex justify-content-center">
                        <button id="frmUpdate" type="submit" class="btn btn-primary me-1 mb-1"> Update Marks </button>
                    </div>
              
            </form>
         </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
  </div>

@endsection
@section('js')
<script>
        // Manual Modal close
        $(function () {
        $('.close-modal').on('click', function () {
            $(".modal").modal('hide');

        })
    })

</script>

<script >

    // asign marks
    var markTable = $('#marks-table');
    $('.asignMarks').click( function(event){
     console.log(event);
    var names = $(this).data('names');
    var reg_no = $(this).data('student_id');
    var module = $(this).data('module_id');
    var student_id = $(this).data('student');

    console.log(module,student_id);
        $('#add-marks').modal({
            'keyboard': true,
            'backdrop': true
        });
        $('#add-marks').modal('show');

        $('#frmAddmarks #names').val(names);
        $('#frmAddmarks #module').val(module);
        $('#frmAddmarks #student').val(student_id);

    })


    // update
    $('.UpdateMarks').click( function(event){
     console.log(event);
    var names = $(this).data('names');
    var marks = $(this).data('marks');
    var module = $(this).data('module_id');
    var student_id = $(this).data('student');
    console.log(module,student_id);
        // $('#mdlUpdateMarks').modal({
        //     keyboard: true,
        //     backdrop: true
        // });
        $('#mdlUpdateMarks').modal('show');

        $('#frmUpdatemarks #edit_names').val(names);
        $('#frmUpdatemarks #edit_module').val(module);
        $('#frmUpdatemarks #edit_student').val(student_id);
        $('#frmUpdatemarks #edit_marks').val(marks);


    })
    

</script>

@endsection

