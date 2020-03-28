
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="{{asset('assets/css/basic.css')}}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Govt of Sikkim</a>
            </div>

            <a>
              <img src="{{asset('assets/img/sikkimlogo.png')}}" height="20%" width="20%" alt="">
            </a>
            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">



                    <li>
                        <a class="active-menu" href="admindashboard"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Office <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\office\create"><i class="fa fa-toggle-on"></i>Add Office</a>
                            </li>
                            <li>
                                <a href="\office"><i class="fa fa-bell "></i>Edit Office</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Departments <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\office_department\create"><i class="fa fa-toggle-on"></i>Add department</a>
                            </li>
                            <li>
                                <a href="\office_department"><i class="fa fa-bell "></i>Edit department</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Post <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\officepost\create"><i class="fa fa-toggle-on"></i>Add POST</a>
                            </li>
                            <li>
                                <a href="\officepost"><i class="fa fa-bell "></i>Edit POST</a>
                            </li>
                        </ul>
                    </li>

                  


                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Employee <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="/office_entity/create"><i class="fa fa-toggle-on"></i>Add Employee</a>
                            </li>
                            <li>
                                <a href="/office_entity"><i class="fa fa-bell "></i>Edit Employee</a>
                            </li>
                        </ul>
                    </li>









                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Desk <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\office_desk\create"><i class="fa fa-toggle-on"></i>Add Desk</a>
                            </li>
                            <li>
                                <a href="\office_desk"><i class="fa fa-bell "></i>Edit Desk</a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>File <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\doc_file\create"><i class="fa fa-toggle-on"></i>Add File</a>
                            </li>
                            <li>
                                <a href="\doc_file"><i class="fa fa-bell "></i>Edit File</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Task <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\task\create"><i class="fa fa-toggle-on"></i>Add Task</a>
                            </li>
                            <li>
                                <a href="\task"><i class="fa fa-bell "></i>Edit Task</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Message <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\def_message\create"><i class="fa fa-toggle-on"></i>Add message</a>
                            </li>
                            <li>
                                <a href="\def_message"><i class="fa fa-bell "></i>Edit message</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Action <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="\file_action\create"><i class="fa fa-toggle-on"></i>Add Action</a>
                            </li>
                            <li>
                            </li>
                            <a href="\file_action"><i class="fa fa-bell "></i>Edit Action</a>
                        </ul>
                    </li>




            <li>
                <a href="#"><i class="fa fa-desktop "></i>Store File <span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                    <li>
                        <a href="\task\create"><i class="fa fa-toggle-on"></i>Update File location</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-desktop "></i>Rack <span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                    <li>
                        <a href="\rack\create"><i class="fa fa-toggle-on"></i>Add rack</a>
                    </li>

                    <li>
                        <a href="\rack"><i class="fa fa-toggle-on"></i>edit rack</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-desktop "></i>Bunch <span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                    <li>
                        <a href="\bunch\create"><i class="fa fa-toggle-on"></i>Add Bunch</a>
                    </li>

                    <li>
                        <a href="\bunch"><i class="fa fa-toggle-on"></i>Edit Bunch</a>
                    </li>

                </ul>
            </li>



            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
          @yield('content')


        </div>
        <!-- /. PAGE WRAPPER  -->

    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        team CodeBluff
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>




</body>
</html>
