@extends('user.layoult')
@section('page_title','User Request form')
@section('apply_selected', 'active')


@section('navbar')
@include('user.includes.navbar_requester')
@endsection

@section('sidebar')
@include('user.includes.sidebar_requester')
@endsection

@section('content')

@include('user.includes.user_request_form')

 @endsection
 
 @section('js')

 @endsection

