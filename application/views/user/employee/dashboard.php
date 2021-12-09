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
    <link href="<?php echo base_url() . "assets/new/"; ?>css/style.min.css" rel="stylesheet">
</head>

<body>
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
                    <a class="navbar-brand" href="<?php echo base_url() . "employee-dashboard"; ?>">
                        <b class="logo-icon">
                            <img src="<?php echo base_url() . "assets/new/"; ?>plugins/images/logo-icon2.png" height="60" alt="homepage" />
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
                              $image = base_url() . "assets/new/plugins/images/new-users/Cashier_Icon.png";
                            } else {
                              $image = base_url() . "assets/new/plugins/images/new-users/Admin_Icon.png";
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link active" href="<?php echo base_url() . "employee-dashboard"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-desktop" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "employee-profile"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "employee-log"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-archive" aria-hidden="true"></i>
                                <span class="hide-menu">Logs</span>
                            </a>
                        </li>

                        <li class="text-center p-20 upgrade-btn">
                            <a href="<?php echo base_url() . "employee-logout"; ?>"
                                class="btn d-grid btn-danger text-white">
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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
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
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->

                <div class="row">

                  <?php if($this->session->flashdata('respond-process')): ?>
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                      <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('respond-process'); ?>
                      </div>
                    </div>
                  <?php endif; ?>

                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" align="center">
                            <!-- <h3 class="box-title">NOW SERVING</h3>
                            <h1> <b> P-001 </b> </h1>
                            <h4>Waiting to be accomodated...</h4> -->
                            <div class="row">
                              <div class="col-md-4">

                                <div style="background:#26B0CF;width:130px;height:120px;padding:20px;border-radius:30px;">
                                  <i style="font-size:80px;margin:auto 0;padding:0;color:white" class="fas fa-users" aria-hidden="true"></i>
                                </div>

                              </div>

                              <div class="col-md-8">
                                <center>
                                <h3><b>Total Pending Appointment</b></h4>
                                <span style="font-size:60px"><?php echo sprintf("%02d", $this->main->get_total_available_transaction($user['level'])); ?></span>
                                </center>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" align="center">
                            <!-- <h3 class="box-title">NOW SERVING</h3>
                            <h1> <b> P-001 </b> </h1>
                            <h4>Waiting to be accomodated...</h4> -->
                            <div class="row">
                              <div class="col-md-4">

                                <div style="background:#26B0CF;width:130px;height:120px;padding:20px;border-radius:30px;">
                                  <i style="font-size:80px;margin:auto 0;padding:0;color:white" class="fas fa-child" aria-hidden="true"></i>
                                </div>

                              </div>

                              <div class="col-md-8">
                                <center>
                                <h3><b>Total Appointment</b></h4>
                                <span style="font-size:60px"><?php echo sprintf("%02d", $this->main->get_processed_transaction($user['id'])); ?></span>
                                </center>
                              </div>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="row">

                    <?php
                    if($user['level'] == 1) {
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                            <h2>Cashier</h2>
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th><span style="font-size:20px;color:#26B0CF">Queue No.</span></th>
                                  <th><center><span style="font-size:20px;color:#26B0CF">Action</span></center></th>
                                </tr>
                              </thead>
                            <tbody>
                              <?php $counter = 0; ?>
                              <?php foreach($data_cashiers as $cashier) { ?>                                
                                <tr>
                                  <td>
                                    <span style="font-size:20px;color:#26B0CF"><?= $cashier['assigned_queue_num']; ?></span>
                                  </td>
                                  <td><center>                                  
                                    <?php if($cashier['agent_id'] == 0) { ?>
                                      <?php if($counter == 0){ ?>
                                        <a href="<?php echo base_url(); ?>employee-process-appointment/<?php echo $cashier['id']; ?>" class="btn btn-info btn-sm" style="color:white"><b>PROCESS APPOINTMENT</b></a>                                        
                                      <?php } else {?>                                                                       
                                        <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                      <?php } ?>
                                    <?php } else { ?>                                        
                                      <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                    <?php } ?>
                                  </center></td>
                                </tr>
                              <?php $counter++; ?>
                              <?php } ?>
                            </tbody>
                          </table>
                          <span> <i>Display limit (5)</i> </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                            <h2>Priority</h2>
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th><span style="font-size:20px;color:#26B0CF">Queue No.</span></th>
                                  <th><center><span style="font-size:20px;color:#26B0CF">Action</span></center></th>
                                </tr>
                              </thead>
                            <tbody>                              
                              <?php $counter2 = 0; ?>
                              <?php foreach($data_priorities as $cashier_priority) { ?>                                
                                <tr>
                                  <td>
                                    <span style="font-size:20px;color:#26B0CF"><?= $cashier_priority['assigned_queue_num']; ?></span>
                                  </td>
                                  <td><center>                                  
                                    <?php if($cashier_priority['agent_id'] == 0) { ?>
                                      <?php if($counter2 == 0){ ?>
                                        <a href="<?php echo base_url(); ?>employee-process-appointment/<?php echo $cashier_priority['id']; ?>" class="btn btn-info btn-sm" style="color:white"><b>PROCESS APPOINTMENT</b></a>                                        
                                      <?php } else {?>                                                                       
                                        <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                      <?php } ?>
                                    <?php } else { ?>                                        
                                      <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                    <?php } ?>
                                  </center></td>
                                </tr>
                              <?php $counter2++; ?>
                              <?php } ?>                              
                            </tbody>
                          </table>
                          <span> <i>Display limit (5)</i> </span>
                        </div>
                    </div>

                    <?php
                    } else if ($user['level'] == 2) {
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                            <h2>Appointment - Registrar</h2>
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th><span style="font-size:20px;color:#26B0CF">Queue No.</span></th>
                                  <th><center><span style="font-size:20px;color:#26B0CF">Action</span></center></th>
                                </tr>
                              </thead>
                            <tbody>
                              <?php
                              $i = 1;
                              $j = 1;
                              foreach($data_registrars as $cashier) {

                                if($cashier['closed'] == 0 && $j <= 5) {
                                ?>
                                <tr>
                                  <td>
                                    <span style="font-size:20px;color:#26B0CF">R-<?php echo sprintf("%04d", $i)?></span>
                                  </td>
                                  <td><center>
                                    <?php
                                    if($cashier['status'] == 0) {

                                      if($this->main->employee_check_have_transaction($this->session->userdata('user_id'))) {
                                      ?>
                                      <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                      <?php
                                      } else {
                                      ?>
                                      <a href="<?php echo base_url(); ?>employee-process-appointment/<?php echo $cashier['id']; ?>" class="btn btn-info btn-sm" style="color:white"><b>PROCESS APPOINTMENT</b></a>
                                      <?php
                                      }

                                    } else if($cashier['status'] == 1){

                                      if($cashier['agent_id'] == $this->session->userdata('user_id')){
                                      ?>

                                      <a href="<?php echo base_url(); ?>employee-appointment/<?php echo $cashier['id']; ?>" class="btn btn-info btn-sm" style="color:white"><b>VIEW DETAIL</b></a>

                                      <?php
                                      } else {
                                      ?>

                                      <span style="font-size:20px;color:#26B0CF">Admitted</span></center>

                                      <?php
                                      }
                                      ?>

                                    <?php
                                    }
                                    ?>

                                  </td>
                                </tr>
                                <?php
                                $j++;
                                }
                                $i++;
                              }
                              ?>
                            </tbody>
                          </table>
                          <span> <i>Display limit (5)</i> </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                            <h2>Priority</h2>
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th><span style="font-size:20px;color:#26B0CF">Queue No.</span></th>
                                  <th><center><span style="font-size:20px;color:#26B0CF">Action</span></center></th>
                                </tr>
                              </thead>
                            <tbody>
                              <?php
                              $i = 1;
                              $j = 1;
                              foreach($data_priorities as $cashier) {

                                if($cashier['transaction_type'] == 2) {

                                  if($cashier['closed'] == 0 && $j <= 5) {
                                  ?>
                                  <tr>
                                    <td>
                                      <span style="font-size:20px;color:#26B0CF">RP-<?php echo sprintf("%04d", $i)?></span>
                                    </td>
                                    <td><center>
                                      <?php
                                      if($cashier['status'] == 0) {

                                        if($this->main->employee_check_have_transaction($this->session->userdata('user_id'))) {
                                        ?>
                                        <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?php echo base_url(); ?>employee-process-appointment/<?php echo $cashier['id']; ?>" class="btn btn-info btn-sm" style="color:white"><b>PROCESS APPOINTMENT</b></a>
                                        <?php
                                        }

                                      } else if($cashier['status'] == 1){

                                        if($cashier['agent_id'] == $this->session->userdata('user_id')){
                                        ?>
                                        <a href="<?php echo base_url(); ?>employee-appointment/<?php echo $cashier['id']; ?>" class="btn btn-info btn-sm" style="color:white"><b>VIEW DETAIL</b></a>
                                        <?php
                                        } else {
                                        ?>
                                        <span style="font-size:20px;color:#26B0CF">Admitted</span></center>
                                        <?php
                                        }
                                      ?>
                                      <?php
                                      }
                                      ?>
                                    </td>
                                  </tr>
                                  <?php
                                  $j++;
                                  }
                                  $i++;
                                }

                              }
                              ?>
                            </tbody>
                          </table>
                          <span> <i>Display limit (5)</i> </span>
                        </div>
                    </div>
                    <?php
                    }
                    ?>


                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 ©  cloudqms.live
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
    <script src="<?php echo base_url() . "assets/new/"; ?>js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/custom.js"></script>
</body>

</html>
