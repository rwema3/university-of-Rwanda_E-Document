<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>To Whom </title>
    <!-- MDB icon -->
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" /> --}}
    <!-- Google Fonts Roboto -->

 
    <!-- MDB -->
    <link rel="stylesheet" href=" {{ asset('user_assets/other_docs/css/mdb.min.css')}} " />
  </head>
  <body>
    <!-- Start your project here-->

    <div class="container-fluid py-2">
      <div class="row">
        <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <!-- log and name of university -->
        <div style="display:flex; padding-bottom: 20px" class="row">
          <div class="col-sm-6">
            <img src="{{ public_path('admin_assets/img/UR_logo.jpg') }}"  width="200" height="80" alt="">
          </div>
          <div class="col-sm-6" style=" float: right;">
           <h4 style="text-align: right;"><b>COLLEGE OF SCIENCE AND TECHNOLOGY </b></h4> <h4 style="text-align: right; position: relative"> <b>SCHOOL OF {{$user->school_name}}</b></h4>
          </div>
      </div>
      </div>

      <div class="col-sm-1"></div>
      <hr style="margin-top: -10rem;">
    </div>


    <!-- body header -->
    <div class="row" style="margin-top: 10px;display:block; position: relative">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <h4 style="text-align: center;"><b>OFFICE OF THE DEAN</b></h4> <br>
        <p >
          <h6 style="text-align: right;"><b>Kigali <span id="date">  </span></b></h6>
          <h6 style="text-align: right;">
            <b>Reference: UR/CST/ {{$user->school_name ?? ''}} / {{$user->school_id ?? ''}} /<span id="year"></span>
            </b></h6>
        </p><br><br>
      </div>
      <div class="col-sm-1"></div>
    </div>


    <!-- testimonial body -->
    <div class="row" style="margin-top: 0rem;">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
           <h5 style="text-decoration: underline; text-align: center;"><b>TO WHOM IT MAY CONCERNS</b></h5> <br>
          <p>
            This is to certify that <span class="highlight"> {{$user->first_name}} {{$user->last_name}} </span> 
            with reference number: {{ $user->staffCode }} has satisfied the requirements for the award of 
            Bachelor of {{$user->dept_name}} (A0) in {{$user->school_name}}: 
             {{$user->dept_name}} from the University of Rwanda, {{$user->college_name}}. 
             The candidate defended her final year project and still waiting the procedure of Graduation ceremony.
              <br></p>
          <p>
            Any assistance rendered to her is highly appreciated. <br>
          </p>

          <p>
            Yours Sincerely,
          </p>
          <p>
            <!-- college principle signature -->
          </p>
          <p>
            <h6><b>Dr. (dean of school) </b></h6><h6><b>Dean, School of Science</b></h6>
          </p>
      </div>
      <div class="col-sm-1"> 
            <div class="d-flex">
        <a class="btn btn-sm  btn-primary mb-5" href="{{route('user.toWhom.export')}}"> Download </a>
    </div></div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-3">P.O Box 3900 Kigali, Rwanda</div>
      <div class="col-sm-3"> dean.soict@ur.ac.rw</div>
      <div class="col-sm-3">www.ur.ac.rw</div>
      <div class="col-sm-1"></div>
    </div>
  </div>


    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src=" {{ asset('user_assets/other_docs/js/mdb.min.js')}} "></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <script type="text/javascript">
      n =  new Date();
      y = n.getFullYear();
      m = n.getMonth() + 1;
      d = n.getDate();
      document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
      document.getElementById("year").innerHTML= y;
    </script>

  </body>
</html>
