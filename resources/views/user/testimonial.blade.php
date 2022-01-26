<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Testmonial</title>

    <!-- MDB -->
  
  </head>
  <body>
    <!-- Start your project here-->

    <div class="container-fluid py-2">
      <div class="row">
        <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <!-- log and name of university -->
        <div class="row">
          <div class="col-sm-6">
            <img src="{{ public_path('admin_assets/img/UR_logo.jpg') }}"  width="200" height="60" alt="">
          </div>
          <div class="col-sm-6" style="">
           <h4 style="text-align: right;"><b>COLLEGE OF SCIENCE</b></h4><h4 style="text-align: right;"><b>AND TECHNOLOGY</b></h4>
          </div>
        
      </div>
      </div>
      <div class="col-sm-1"></div>
      <hr style="margin-top: -10rem;">
    </div>
    <!-- body header -->
    <div style="display: block; position: relative; overflow:auto" id="r_student" class="display" >
      <div class="col-sm-1"></div>
      <div class="col-sm-8">
        <h4 style="text-align: center;"><b>OFFICE OF PRINCIPLE</b></h4>
      </div>
      <div style="display:block; float: right;" class="col-sm-2">
        <img style="position: relative; display:block" src="{{ $profile }}" width="120" height="120" alt="">
      </div>
      <div class="col-sm-1"></div>
    </div>

    <!-- testimonial body -->
    <div class="row" style="display:block; position: relative">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
           <h5 style="text-decoration: underline; text-align: center;"><b>ACADEMIC TESTIMONIAL</b></h5> <br>
          <p>
            This is to certify that Ms. <span class="highlight"> {{ $user['first_name'] }} {{$user->last_name}}  </span> 
            with reference number:<span class="highlight"> {{$user->staffCode}} </span> has successfully completed all the academic requirements for the award of degree of Bachelor of
             <span class="highlight"> {{ $user->dept_name }} </span> (Hons) IN 
              <span class="highlight"> {{$user->school_name}} </span> : {{$user->dept_name}}, (class) CLASS HONOURS, (division)  DIVISION under Department of {{$user->dept_name}}.
               The degree was conferred on the Graduation Ceremony wchich took place on (date: day Month year). <br></p>

          <p>
            This provisional certificate serves any purpose it might be required for and it is valid for only four months from the date of issue. The degree certificate will be delivered to (personal pronoun) in due course. <br>
          </p>
          <p>
            issued at Kigali on <span id="date"></span>,
          </p>
          <p>
            <!-- college principle signature -->
          </p>
          <p>
            <h6><b>Dr. Ignace Gatare </b></h6><h6><b>Principal</b></h6><h6><b>College of Science and Technology</b></h6>
            <h6><b>University of Rwanda</b></h6>
          </p>
      </div>

      <div class="col-sm-1"></div>
    </div>
    <hr>
    <div style="display:flex; flex-direction:row; justify-content: space-between ; align-items:center; position: relative;"   class="display:flex" class="row">
      <div style="flex: 1" class="col-sm-2"></div>
      <div style="flex: 1" class="col-sm-3">P.O Box 3900 Kigali, Rwanda</div>
      <div style="flex: 1" class="col-sm-3"> principal.cst@ur.ac.rw</div>
      <div style="flex: 1" class="col-sm-3">www.ur.ac.rw</div>
      <div style="flex: 1" class="col-sm-1"></div>
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
      // document.getElementById("year").innerHTML= y;
    </script>

  </body>
</html>
