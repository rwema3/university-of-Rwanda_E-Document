<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student| transcript</title>
    <style>
        .transcript{
          height:auto;
          width:54vw;
          margin:0 auto;
          font-weight:bold;
        }
        .transcript-head{
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        border-bottom: 2px solid gray
        }
        .transcript-head>div{
            margin:auto;
        }
        hr{
            border: '1px solid #a0a0a0',
        }
        .campus-logo{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            align-items: center;
        }
        .campus-college-name{

        }
        .transcript-subhead{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            padding-top: 10px;
        }
        .school-detail{

        }
        .student-picture{

        }
        .student-detail-table table{
         width:100%;
         text-align:center;
         margin-bottom:20px;
        }
       
        .academic-year-table table{
         margin-bottom:20px;
         width:100%;
        }
        .marks-table table{
        
         width:100%;
        }
        .deliberation-table table{
         
          width:100%;
        }
        .chiefs-signatures{
            display:block;
            flex-direction:column;
        }
        .signatures{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
        }

    </style>
</head>
<body>
    {{-- {{dd()}} --}}
    <div style="position:relative"  class="transcript">
       <div style="display:flex; flex-direction:row; justify-content: space-between ; align-items:center" class="transcript-head">
          
          <div class="campus-logo">
            <img src="{{ public_path('admin_assets/img/UR_logo.jpg') }}"  width="200" height="60" alt="">
          </div>
         
          <div style="float:right; position: relative;" class="campus-college-name">
           <h2>College of science and Technology</h2>
          </div>
       </div>
       <hr>

       <div style="display:flex; flex-direction:row; justify-content: space-between ; align-items:center"   class="transcript-subhead">
            <div style="position: relative;" class="school-detail">
            <h3>SCHOOL OF {{$academic->school_name}}</h3>
              <h3>DAPARTMENT OF {{$academic->dpt_name}}</h3>
              <h3>PROVISIONAL STATEMENT OF RESULT</h3>
            </div>
            <div style="position: relative; float: right;" class="student-picture">
              <img src="{{ $profile }}" width="120" height="120" alt="">
            </div>
       </div>
       <div class="student-detail-table">
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Registration Number</th>
                    <th>Date of Birth</th>
                    <th> Statement Number </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{$data['student']->first_name}}  {{$data['student']->last_name}}  </td>
                    <td> {{$data['student']->staffCode}}  </td>
                    <td>1-Jan-1997</td>
                    <td> CS/019/0014 </td>
                </tr>
            </tbody>
        </table>
       </div>
       <div class="academic-year-table">
        <table border="1">
            <tr>
                <td colspan="6" align="center" > THIRD YEAR </td>
                <td colspan="6" align="center" >2019-2020</td>
            </tr>
            <tr>
                <td colspan="6" align="center">FIRST SEMESTER</td>
                <td colspan="6" align="center">SECOND SEMESTER</td>
            </tr>
            @php
                $long = count($semester1) > count($semester2) ? count($semester1) : count($semester2);
                $credits = 0;
                $total_marks = 0;
                $numberCourse = 0;

            @endphp

            <tr>
                <td colspan="3" style="width:26.5%" align="center">MODULE CODE AND NAME</td>
                <td  style="width:8%">CREDIT</td>
                <td  style="width:8%">MARKS</td>
                <td  style="width:8%">GRADE</td>
                <td colspan="3" style="width:26.5%" align="center">MODULE CODE AND NAME</td>
                <td style="width:8%">CREDIT</td>
                <td  style="width:8%">MARKS</td>
                <td style="width:8%">GRADE</td>
            </tr>
        </table>
       </div>
       <div class="marks-table">
         <!-- This is where to put dynamic marks data -->
         <table border="1">
            
             @for ($i=0; $i<$long; $i++)
             @if ($i < count($semester1))
             @php
                 $credits += $semester1[$i]->credits;
                 $total_marks += $semester1[$i]->marks;
                 $numberCourse++;

             @endphp

             <tr>
             <td style="width:26.5%"> {{$semester1[$i]->module_name}} </td>
             <td style="width:8%"> {{$semester1[$i]->credits}} </td>
             <td style="width:8%"> {{$semester1[$i]->marks}} </td>
             <td style="width:8%">
                   @if($semester1[$i]->marks > 80)
                       {{ 'A' }}
                       @elseif($semester1[$i]->marks > 70)
                       {{ 'B' }}
                    
                     @elseif ($semester1[$i]->marks > 50)
                            {{ 'C' }}
                           
                     @else
                     {{'XX'}}
                     @endif
                       
               </td>
             @else
             <tr>
             <td style="width:26.5%">  </td>
             <td style="width:8%">  </td>
             <td style="width:8%">  </td>
             <td style="width:8%">  </td>
             @endif

             @if ($i < count($semester2))
             @php
             $credits += $semester1[$i]->credits;
             $total_marks += $semester2[$i]->marks;
             $numberCourse++;
             @endphp

             <td style="width:26.5%"> {{$semester2[$i]->module_name}}</td>
             <td style="width:8%"> {{$semester2[$i]->credits}} </td>
             <td style="width:8%"> {{$semester2[$i]->marks}}</td>
             <td style="width:8%"> 
                @if($semester2[$i]->marks > 80)
                {{ 'A' }}
                @elseif($semester2[$i]->marks > 70)
                {{ 'B' }}
             
              @elseif ($semester2[$i]->marks > 50)
                     {{ 'C' }}
                    
              @else
              {{'XX'}}
              @endif
                
            </td>
            </tr>
             @else
             <td style="width:26.5%"> </td>
             <td style="width:8%">  </td>
             <td style="width:8%">  </td>
             <td style="width:8%">  </td>
            </tr>
             @endif
            
             @endfor
            
         </table>
       </div>
       <div class="deliberation-table">
            <table border="1">
                <tr>
                    <td style="width:50%">Total Credits Points</td>
                    <td style="width:50%"> {{$credits}} </td>
                </tr>
                <tr>
                    <td style="width:50%">Total Credits Accumulated</td>
                    <td style="width:50%"> {{$credits}} </td>
                </tr>
                <tr>
                    <td style="width:50%"> Average</td>
                    <td 
                    style="width:50%"> @php
                        $avg = round($total_marks / $numberCourse,2);
                    @endphp {{$avg}}</td>
                </tr>
                <tr>
                    <td>Remarks</td>
                    <td> Progress </td>
                </tr>
            </table>
       </div>
       <div style="position:relative" class="chiefs-signatures">
           <div style="position:relative" class="signatures">
              <div style="position:relative" class="hod-signature">
                <h3>Head of department, {{$academic->dpt_name}} </h3>
                <img src="{{ public_path('admin_assets/img/hod_signature.PNG') }}" alt="" srcset="">
              </div>
              <div style="position:relative; float: right;" class="dean-signature">
                <h3>Dean, School of ICT</h3>
                <img src="{{public_path('admin_assets/img/dean_signature.PNG')}}" alt="" srcset="">
              </div>
           </div>
           <div style="position:relative" class="date-of-issue">

            @php
              $todayDate = date("Y-m-d");
            @endphp
           <p> Date: {{$todayDate}} </p>
           </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>