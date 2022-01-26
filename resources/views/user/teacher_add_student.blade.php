@extends('user.layoult')
@section('page_title','User Dashboard')
@section('dashboard_selected','active')


@section('sidebar')
@include('user.includes.sidebar_requester')
@endsection


@section('navbar')
@include('user.includes.navbar_requester')
@endsection

@section('content')

<div class="main-content container-fluid">
    <div class="page-title">
       <h3>Dashboard</h3>
    </div>



<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        
                        <form class="form" id="frmProfile" action="{{route('user.create.marks')}}" method="POST">
                            @csrf


                            <div class="col-md-4 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="reg_no">  Student Reg number </label>
                                    <div class="position-relative">
                                        <fieldset class="form-group">
                                            <select name="reg_no" class="form-select" id="reg_no">
                                                <option value="" selected disabled >-- select student -- </option>
                                                @foreach ($students as  $item)
                                                    <option value="{{ $item->id }}">{{$item->staffCode }} | {{$item->last_name }} / {{$item->first_name }} </option>
                                                @endforeach

                                                                                                   
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                                {{-- <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="staffCode"> Reg Number </label>
                                        <div class="position-relative">
                                            <input name="staffCode"  type="text" class="form-control" placeholder="staff code" id="staffCode" value="">
                                            <div  class="form-control-icon">
                                            <i class="fa fa-hash"></i>
                                        </div>
                                        </div>
                                    </div>
                                </div> --}}
                                
                               <div class="row">
                                 <div class="col-md-6 col-lg-4">
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

                                <div class="col-md-4 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="module"> Module </label>
                                        <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select name="module" class="form-select" id="module">
                                                    <option value="" selected disabled >-- choose module -- </option>
                                                    @foreach ($modules as  $item)
                                                        <option value="{{ $item->id }}">{{$item->code }} / {{$item->name }} </option>
                                                    @endforeach
                                                                                                       
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>


                                <!-- populate the base64 encoded image in the textarea -->

                                <div class="col-12 d-flex justify-content-center">
                                    <button id="frmUpdate" type="submit" class="btn btn-primary me-1 mb-1"> Add Marks </button>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->


    <section class="section">
        <div class="card">


    <div class="card-header">
        <a href=" {{route('user.add.marks')}} " class="btn  d-flex btn-lg     btn-primary" > Add Marks </a>
    </div>

            <div class="card-body">
                <table  id="table1" class="table display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th> Year </th>
                            <th> Semester</th>
                            <th> marks</th>
                            <th> Grade</th>
                            <th> tools </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($marks as $item)
                            
                        <tr>
                            <td> {{ $item->user_id }} </td>
                            <td> {{ $item->first_name }}  {{ $item->last_name }} </td>
                            <td> Level {{ $item->level }} </td>
                            <td> Semester {{ $item->semester }} </td>
                            <td> {{ $item->marks }} </td>
                            <td>  @if ($item->marks >80)
                                A @elseif ($item->marks >70) B ($item->marks >50) C @else D @endif 
                              </td>
                            <td> <button class="btn -btn-sm ">  view </button> </td>

                                                       
                        </tr>
                        @endforeach



                    </tbody>
                </table>


            </div>
        </div>
    </section>


    
 </div>

@endsection

