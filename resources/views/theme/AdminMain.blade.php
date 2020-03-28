<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                <a class="navbar-brand" href="#">Government Sikkim</a>
            </div>

                <a>
                  <img src="{{asset('assets/img/sikkimlogo.png')}}" height="20%" width="20%" alt="">
                </a>
            <div class="header-right">

                <a href="#" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="#" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="/logout" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">



                        <li>
                            <a class="active-menu" href="dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
                        </li>

              <li>
                    <a href="#"><i class="fa fa-bars"></i>File <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                  <li>
                                      <a href="\doc_file\create"><i class="fa fa-plus"></i>Add File</a>
                                  </li>
                                  <li>
                                        <a href="\doc_file"><i class="fa fa-edit"></i>Edit File</a>
                                  </li>
                              </ul>
             </li>



                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Employee <span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="/office_entity/create"><i class="fa fa-plus"></i>Add Employee</a>
                                </li>
                                <li>
                                    <a href="/office_entity"><i class="fa fa-edit"></i>Edit Employee</a>
                                </li>
                            </ul>
                        </li>



                        <li>
                            <a href="#"><i class="fas fa-address-card"></i>Desk <span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="\office_desk\create"><i class="fa fa-plus"></i>Add Desk</a>
                                </li>
                                <li>
                                    <a href="\office_desk"><i class="fa fa-edit"></i>Edit Desk</a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-exclamation-circle"></i>Task <span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="\task\create"><i class="fa fa-plus"></i>Add Task</a>
                                </li>
                                <li>
                                    <a href="\task"><i class="fa fa-edit"></i>Edit Task</a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="\delay"><i class="fa fa-folder"></i>send delay notification <span class="fa arrow"></span></a>
                        </li>


                        <li>
                            <a href="leave"><i class="fas fa-address-card"></i>leave <span class="fa arrow"></span></a>
                        </li>


                        <li>
                            <a href="store_file"><i class="fa fa-folder"></i>Store File <span class="fa arrow"></span></a>

                        </li>


                        <li>
                            <a href="#"><i class="fa fa-database"></i>Rack <span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="\rack\create"><i class="fa fa-plus"></i>Add rack</a>
                                </li>

                                <li>
                                    <a href="\rack"><i class="fa fa-edit"></i>edit rack</a>
                                </li>

                            </ul>
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-folder-open"></i>Bunch <span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="\bunch\create"><i class="fa fa-plus"></i>Add Bunch</a>
                                </li>

                                <li>
                                    <a href="\bunch"><i class="fa fa-edit"></i>Edit Bunch</a>
                                </li>

                            </ul>
                        </li>


                </ul>

        </div>

            </nav>
            <!-- /. END NAVBAR  -->

        <div id="page-wrapper">
          @yield('content')


        </div>
        <!-- /. PAGE WRAPPER  -->

    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
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
