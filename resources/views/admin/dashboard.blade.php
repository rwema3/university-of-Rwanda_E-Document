@extends('admin.layout')
@section('page_title','Dashboard')
@section('dashboard_select','active')
@section('content')

      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">

                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-paper text-warning"> </i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Colleges</p>
                      <p class="card-title"> {{ count($colleges) }}  <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  <a href="{{ route('admin.colleges') }}"> View List </a>
                  {{-- Update Now --}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-paper text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Schools</p>
                      <p class="card-title"> {{ count($schools) }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>
                  <a href="{{ route('admin.schools') }}"> View List</a>

                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-paper text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"> Departements </p>
                      <p class="card-title"> {{ count($departements) }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>

                  <a href=" {{ route('admin.departements') }} "> View List </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-badge text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"> Lecturers </p>
                      <p class="card-title"> {{ count($staffs) }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"> </i>
                  <a href="{{ route('admin.staffs') }}"> View List </a>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        
        </div>
        <div class="row">
          <div class="col-md-4">
        
          </div>
          <div class="col-md-8">
          
          </div>
        </div>
      </div>

@endsection

@section('js')
<script src="{{ asset('admin_assets/demo/demo.js') }}"></script>
<script>
    $(document).ready(function() {
      demo.initChartsPages();
    });
  </script>
@endsection
