@extends('user.layoult')
@section('page_title','Change Password')
@section('changepass_selected', 'active')


@section('navbar')
@include('user.includes.navbar_requester')
@endsection

@section('sidebar')
@include('user.includes.sidebar_requester')
@endsection

@section('content')
@include('user.includes.user_change_password')
 @endsection

 @section('js')

 <script>

 </script>

 @endsection

