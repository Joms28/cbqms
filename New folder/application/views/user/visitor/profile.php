<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cloud-Based Queuing Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/favicon.png">
    <link href="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . "assets/new/"; ?>css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="<?php echo base_url() . "visitor-dashboard"; ?>">
                        <b class="logo-icon">
                            <img src="<?php echo base_url() . "assets/new/"; ?>plugins/images/logo-icon.png" height="60" alt="homepage" />
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none"
                        href="javascript:void(0)" style="color:white"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin4" style="background-color:#01579B">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <?php
                            if($user['gender']) {
                              $image = base_url() . "assets/new/plugins/images/new-users/sg.png";
                            } else {
                              $image = base_url() . "assets/new/plugins/images/new-users/sb.png";
                            }

                            ?>
                            <a class="profile-pic" href="#">
                                <img src="<?php echo $image; ?>" alt="user-img" width="36"
                                    class="img-circle"> <b> Hi, <span class="text-white font-medium"> <?php echo $user['fname']?></span></b></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <br>
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "visitor-dashboard"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-desktop" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "visitor-profile"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "visitor-registrar"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-archive" aria-hidden="true"></i>
                                <span class="hide-menu">Registrar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "visitor-cashier"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Cashier</span>
                            </a>
                        </li>

                        <li class="text-center p-20 upgrade-btn">
                            <a href="<?php echo base_url() . "visitor-logout"; ?>"
                                class="btn d-grid btn-danger text-white" target="_blank">
                                LOGOUT</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">User Profile</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Update User Profile</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->


                    <?php if($this->session->flashdata('respond-profile')): ?>
                      <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="alert alert-success" role="alert">
                          <?php echo $this->session->flashdata('respond-profile'); ?>
                        </div>
                      </div>
          					<?php endif; ?>

                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg" style="height:180px">
                                <div class="overlay-box" style="background-color:#01579B">
                                    <div class="user-content">
                                        <?php
                                        if($user['gender']) {
										  $image = base_url() . "assets/new/plugins/images/new-users/sg.png";
										} else {
										  $image = base_url() . "assets/new/plugins/images/new-users/sb.png";
										}

                                        ?>
                                        <a href="javascript:void(0)"><img src="<?php echo $image; ?>"
                                                class="thumb-lg img-circle" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-12 col-sm-12">
                                  <h4>  <small> <b>FULL NAME</b> </small>  <br> <?php echo $user['fname']; ?> <?php echo $user['lname']; ?></h4>
                                  <h4>  <small> <b>USERNAME</b> </small>  <br> <?php echo $user['username']; ?></h4>
                                  <h4>  <small> <b>MOBILE NUMBER</b> </small>  <br> <?php echo $user['mobile']; ?></h4>
                                  <h4>  <small> <b>EMAIL ADDRESS</b> </small>  <br> <?php echo $user['email']; ?></h4>
                                  <h4>  <small> <b>MOBILE NUMBER</b> </small>  <br> <?php echo $user['mobile']; ?></h4>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">CHANGE PASSWORD</h4>
                                  <?php echo form_open(base_url() . 'visitor-profile', 'class="form-horizontal form-material"'); ?>
                                  <div class="row">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">New Password</label>
                                        <div class="col-md-12  border-bottom p-0">
                                            <input type="password" name="password" value=""
                                                class="form-control p-0 border-0"/>
                                        </div>
                                        <?php echo form_error('password', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Re-Type New Password</label>
                                        <div class="col-md-12  border-bottom p-0">
                                            <input type="password" name="repassword" value=""
                                                class="form-control p-0 border-0"/>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin:0">
                                        <div class="col-sm-12">
                                            <input class="btn btn-primary" name="editPassword" type="submit" value="CHANGE PASSWORD" />
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                  </form>
                                  </div>

                            </div>
                        </div>

                    </div>

                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">Update User Profile</h4>
                                  <?php echo form_open(base_url() . 'visitor-profile', 'class="form-horizontal form-material"'); ?>
                                  <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-6 p-0">First Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="fname" value="<?php echo $user['fname']; ?>"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-6 p-0">Last Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="lname" value="<?php echo $user['lname']; ?>"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Gender</label>

                                        <div class="col-sm-12 border-bottom">
                                            <select name="gender" class="form-select shadow-none p-0 border-0 form-control-line">
                                              <option value="0" <?php echo ($user['gender'] == 0 ? "selected" : "");?>>Male</option>
                                              <option value="1" <?php echo ($user['gender'] == 1 ? "selected" : "");?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" name="email" value="<?php echo $user['email']; ?>"
                                                class="form-control p-0 border-0" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone No</label>
                                        <div class="col-md-12  border-bottom p-0">
                                            <input type="text" name="mobile" value="<?php echo $user['mobile']; ?>"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin:0">
                                        <div class="col-sm-12">
                                            <input class="btn btn-success" name="editProfile" type="submit" value="UPDATE PROFILE" />
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                  </form>
                                  </div>

                            </div>
                        </div>
                    </div>
                    <!-- Column -->


                </div>

                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 ©  sitename.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() . "assets/new/"; ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>js/app-style-switcher.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
