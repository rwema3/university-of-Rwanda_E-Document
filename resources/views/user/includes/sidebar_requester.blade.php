
               <div class="sidebar-menu">
                <ul class="menu">

                   <li class="sidebar-item @yield('dashboard_selected')">
                      <a href=" {{route('user.dashboard')}} " class='sidebar-link'>
                      <i class="fa fa-home text-success"></i>
                      <span>Dashboard</span>
                      </a>
                   </li>

                   <li class="sidebar-item @yield('apply_selected')">
                      <a href="{{route('user.requestForm')}} " class='sidebar-link'>
                      <i class="fa fa-tasks text-success" aria-hidden="true"></i>
                      <span>Apply </span>
                      </a>
                   </li>
                   <li class="sidebar-item @yield('requests_selected')">
                      <a href=" {{route('user.allRequests')}} " class='sidebar-link'>
                      <i class="fa fa-book text-success"></i>
                      <span>Requests Status</span>
                      </a>
                   </li>
                   <li class="sidebar-item @yield('toWhom_selected')">
                     <a href="{{route('user.toWhom.export')}}" class='sidebar-link'>
                     <i class="fa fa-envelope text-success" aria-hidden="true"></i>
                     <span> ToWhom  </span>
                     </a>
                  </li>
                  <li class="sidebar-item @yield('testmonial_selected')">
                     <a href="{{route('user.testimonial.export')}}" class='sidebar-link'>
                        <i class="fa fa-envelope text-success" aria-hidden="true"></i>
                        <span> Testimonial  </span>
                     </a>
                  </li>
                 

                 <li class="sidebar-item @yield('profile_selected')">
                    <a href=" {{route('user.account')}} " class='sidebar-link'>
                    <i class="fa fa-user text-success"></i>
                    <span>Profile</span>
                    </a>
                 </li>
                </ul>
             </div>
             <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
          </div>
       </div>
