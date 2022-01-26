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
                        <i class="fa-regular  fa-book"></i>                     </div>
                     <div>
                     <h4> All Requests</h4>
                     <h2 class="h1 mb-0"> {{count($allRequests)}} </h2>
                     </div>
                 </div>
                 </div>
             </div>
             </div>
         </div>

       </div>
    </section>
 </div>

@endsection

