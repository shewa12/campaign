<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard-{{ $title}}</title>

    <!-- Bootstrap -->
    <link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->

    <link href="{{url('public/admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('public/admin/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{url('public/admin/css/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{url('public/admin/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    
    <link href="{{url('public/admin/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{url('public/admin/css/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('public/admin/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!--richtext css start-->
    <link rel="stylesheet" href="{{url('public/admin/texteditor/richtext.min.css')}}">
    <link rel="stylesheet" href="{{url('public/admin/css/my.css')}}">
    <style type="text/css">
      .total,.grand-total {
        font-size: 18px;
        font-weight: bold;
        color:#dd7369;
        text-align: right;
      }
      .grand-total h3{
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #e3e3e3;
        color:#f84c3b;
        font-weight: bold;
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
              @include('admin.profileinfo')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
              @include('admin.sidebar')
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <?php 
                  /*
                  $id= $this->session->id;
                  $q= $this->db->select('image')
                                     ->where('id', $id)
                                     ->get('admin_login');
                  if(count($q)){
                   $row= $q->row();
                   $image= $row->image;
                  }
                  */
                  ?>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li>
                      <a href="{{route('setting')}}">
                        <span>Settings</span>
                      </a>
                    </li>                    
                    <li>
                      <a href="{{route('changePassword')}}">
                        <span>Change Password</span>
                      </a>
                    </li>
                   
                    <li>
                      <a href="{{ url('/logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                  </li>
                  </ul>
                </li>

<!--
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
-->
              </ul>
            </nav>
          </div>
        </div>

        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; All Rights & Reserved <a href="{{url('')}}">Worklog</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
<script type="text/javascript" src="{{url('public/admin/js/2.1.4-jquery.js')}}"></script>
<script type="text/javascript" src="{{url('public/admin/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('public/admin/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{url('public/admin/js/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{url('public/admin/js/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{url('public/admin/js/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{url('public/admin/js/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('public/admin/js/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{url('public/admin/js/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{url('public/admin/js/jquery.flot.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.flot.pie.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.flot.time.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.flot.stack.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{url('public/admin/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{url('public/admin/js/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{url('public/admin/js/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{url('public/admin/js/jquery.vmap.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.vmap.world.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{url('public/admin/js/moment.min.js')}}"></script>
    <script src="{{url('public/admin/js/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{url('public/admin/js/custom.min.js')}}"></script>

    @yield('js')

  </body>
</html>
