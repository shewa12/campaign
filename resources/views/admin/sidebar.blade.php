
<!--sidebar menu for teacher start-->
       <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
                
            <ul class="nav side-menu">
              <?php  $role= Auth::user()->role;?>
              <?php if($role===1):?>
                  <li><a href="{{route('campaign')}}"><i class="fas fa-rocket"></i> My Campaign</a>
                  </li>                  
                  <li><a href="{{route('faq')}}"><i class="fas fa-question-circle"></i> FAQ</a>
                  </li>                  
                  <li><a href="{{route('affiliate')}}"><i class="fas fa-users"></i> Affilaite Program</a>
                  </li>
              <?php endif;?>              

              <?php if($role===2):?>
                  <li><a href="{{route('employee')}}"><i class="fas fa-rocket"></i> Asigned Campaign</a>
                  </li>              
              <?php endif;?>              

              <?php if($role===3):?>
              
                  <li><a href="{{route('home')}}"><i class="fas fa-th"></i> Dashboard</a>
                  <!--<li><a href="{{route('campaignAdmin')}}"><i class="fas fa-rocket"></i> Campaigns</a>
                  </li> -->   
                  <li><a href="{{route('users')}}"><i class="fas fa-user-friends"></i> Employee</a>
                  </li>
                  <li><a href="{{route('appUsers')}}"><i class="fas fa-users"></i> Users</a>
                  </li>

              <?php endif;?>  
              </ul>
             
              </div>


            </div>
<!--sidebar menu for teacher end-->
