@extends('finace.layout')
@section('page_title','Dashboard')
@section('dashboard_select','active')
@section('content')

      <div class="content">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-10">
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
                      <p class="card-category"> Transcript Requests </p>
                      <p class="card-title"> {{ count($trasncript) }}  <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  <a href="{{ route('hof.transcript.requests') }}"> View List </a>
                </div>
              </div>
            </div>
          </div>

{{--           
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
                      <p class="card-category"> Studens </p>
                      <p class="card-title"> {{ count($students) }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>
                  <a href="{{ route('hod.students') }}"> View List</a>

                </div>
              </div>
            </div>
          </div>
 --}}

          {{-- <div class="col-lg-3 col-md-6 col-sm-6">
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
                      <p class="card-category">  </p>
                      <p class="card-title"> {{  }} <p>
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
          </div> --}}

          
          {{-- <div class="col-lg-3 col-md-6 col-sm-6">
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
                  <a href="{{ route('hod.staffs') }}"> View List </a>

                </div>
              </div>
            </div>
          </div>
         --}}
        
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
