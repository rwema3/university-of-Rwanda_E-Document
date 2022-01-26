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

    <section class="section">
       <div class="row mb-2">
         <div class="col-xl-4 col-md-12 mb-4">
             <div class="card">
             <div class="card-body">
                 <div class="d-flex justify-content-between p-md-1">
                 <div class="d-flex flex-row">
                     <div class="align-self-center">
                     <i class="fa fa-plane text-success fa-3x me-4"></i>
                     </div>
                     <div>
                     <h4> All Departement Student </h4>
                     <h2 class="h1 mb-0"> {{count($student)}} </h2>
                     </div>
                 </div>
                 </div>
             </div>
             </div>
         </div>

         {{-- <div class="col-xl-4 col-md-12 mb-4">
             <div class="card">
             <div class="card-body">
                 <div class="d-flex justify-content-between p-md-1">
                 <div class="d-flex flex-row">
                     <div class="align-self-center">
                     <i class="fa fa-check text-info fa-3x me-4"></i>
                     </div>
                     <div>
                     <h4> Cleared Request</h4>
                     <h2 class="h1 mb-0"> {{count($clearedRequest)}}  </h2>
                     </div>
                 </div>
                 </div>
             </div>
             </div>
         </div> --}}




       </div>
    </section>

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
                            <th>Student Names</th>
                            <th> Year </th>
                            <th> Semester</th>
                            <th> marks</th>
                            <th> Grade</th>
                            <th> tools </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
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
                                <td> <button class="btn btn-sm">  view </button> </td>
    
    
                                                           
                            </tr>
                            @endforeach
                        </tr>


                    </tbody>
                </table>


            </div>
        </div>
    </section>


    
 </div>

@endsection

