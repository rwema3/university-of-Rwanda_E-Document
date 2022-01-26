<nav class="navbar navbar-header navbar-expand navbar-light">
    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
       data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
       aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
           @if (!auth()->user()->hasRole('user'))

           <li class="dropdown nav-icon">
            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge bg-info">2</span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                <h6 class="py-2 px-4">Notifications</h6>
                <ul class="list-group rounded-none">
                    <li class="list-group-item border-0 align-items-start">
                    <div class="row mb-2">
                    <div class="col-md-12 notif">
                            <a href="leave_details.html"><h6 class="text-bold">John Doe</h6>
                            <p class="text-xs">
                                applied for leave at 05-21-2021
                            </p></a>
                        </div>
                    <div class="col-md-12 notif">
                            <a href="leave_details.html"><h6 class="text-bold">Jane Doe</h6>
                            <p class="text-xs">
                                applied for leave at 05-21-2021
                            </p></a>
                        </div>
                      </div>
                    </li>
                </ul>
            </div>
        </li>

        @endif

          <li class="drnavbarSupportedContentopdown">
             <a href="#" data-bs-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="avatar me-1">

                   <img src="  {{ asset('user_assets/assets/images/admin.png') }} " alt="" srcset="">
                </div>
                <div class="d-none d-md-block d-lg-inline-block"> {{ auth()->user()->last_name}} </div>
             </a>
             <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{route('user.account')}} "><i data-feather="user"></i> Account</a>
                <a class="dropdown-item" href="{{route('user.editPassword')}} "><i data-feather="key"></i> Change Password </a>
                {{-- <a class="dropdown-item" href="update_password.html"><i data-feather="settings"></i> Settings</a> --}}
                <div class="dropdown-divider"></div>
                <a id="l-logaut" class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('frmLogaut').submit();"><i data-feather="log-out"></i> Logout</a>
                <form id="frmLogaut" action=" {{route('logout')}} " method="post">
                    @csrf
                </form>

             </div>
          </li>
       </ul>
    </div>
 </nav>
