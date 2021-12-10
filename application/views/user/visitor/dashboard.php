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
    <!-- Custom CSS -->
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
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" align="center">
                            <!-- <h3 class="box-title">NOW SERVING</h3>
                            <h4>Waiting to be accomodated...</h4> -->
                            <?php
                            $i = 1;
                            $j = 1;
                            foreach($data_cashiers as $cashier) {

                              if($cashier['closed'] == 0 && $j <= 1 && $cashier['status'] == 0) {
                              ?>
                              <h3 class="box-title">NEXT TO SERVER</h3>
                              <h1> <b> <?=$cashier['assigned_queue_num']?></b> </h1>
                              <h4>Waiting to be accomodated...</h4>
                              <?php
                              $j++;
                              }
                              $i++;
                            }
                            if($j == 1){
                            ?>
                            <h1>FINISHED ALL APPOINTMENT</h1>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" align="center">
                          <?php
                          $i = 1;
                          $j = 1;
                          foreach($data_registrars as $cashier) {

                            if($cashier['closed'] == 0 && $j <= 1 && $cashier['status'] == 0) {
                            ?>
                            <h3 class="box-title">NEXT TO SERVER</h3>
                            <h1> <b> <?=$cashier['assigned_queue_num']?> </b> </h1>
                            <h4>Waiting to be accomodated...</h4>
                            <?php
                            $j++;
                            }
                            $i++;
                          }
                          if($j == 1){
                          ?>
                          <h1>FINISHED ALL APPOINTMENT</h1>
                          <?php
                          }
                          ?>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
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

                              <?php
                              $i = 1;
                              $j = 1;
                              foreach($data_cashiers as $cashier) {

                                if($cashier['closed'] == 0 && $j <= 5) {
                                ?>
                                <tr <?php echo ($cashier['user_id'] == $this->session->userdata('user_id') ? "class='table-primary'" : ""); ?>>
                                  <td>
                                    <span style="font-size:20px;color:#26B0CF"><?=$cashier['assigned_queue_num']?></span>
                                  </td>
                                  <td><center>
                                    <?php
                                    if($cashier['status'] == 0) {
                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                    <?php
                                    } else if($cashier['status'] == 1) {

                                      $counter = $this->main->get_counter($cashier['agent_id'],1);

                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
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
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                            <h2>Registrar</h2>
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
                              foreach($data_registrars as $data) {

                                if($cashier['closed'] == 0 && $j <= 5) {
                                ?>
                                <tr <?php echo ($cashier['user_id'] == $this->session->userdata('user_id') ? "class='table-primary'" : ""); ?>>
                                  <td>
                                    <span style="font-size:20px;color:#26B0CF"><?=$cashier['assigned_queue_num']?></span>
                                  </td>
                                  <td><center>
                                    <?php
                                    if($cashier['status'] == 0) {
                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                    <?php
                                    } else if($cashier['status'] == 1) {

                                      $counter = $this->main->get_counter($cashier['agent_id'],2);

                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
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
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
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

                                if($cashier['closed'] == 0 && $j <= 5 && $cashier['transaction_type'] == 1) {
                                ?>
                                <tr <?php echo ($cashier['user_id'] == $this->session->userdata('user_id') ? "class='table-primary'" : ""); ?>>
                                  <td>
                                    <span style="font-size:20px;color:#26B0CF"><?=$cashier['assigned_queue_num']?></span>
                                  </td>
                                  <td><center>
                                    <?php
                                    if($cashier['status'] == 0) {
                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                    <?php
                                    } else if($cashier['status'] == 1) {

                                      $counter = $this->main->get_counter($cashier['agent_id'],1);

                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
                                    <?php
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <?php
                                $j++;
                                } else if($cashier['closed'] == 0 && $j <= 5 && $cashier['transaction_type'] == 2) {
                                ?>
                                <tr <?php echo ($cashier['user_id'] == $this->session->userdata('user_id') ? "class='table-primary'" : ""); ?>>
                                  <td>
                                    <span style="font-size:20px;color:#26B0CF"><?=$cashier['assigned_queue_num']?></span>
                                  </td>
                                  <td><center>
                                    <?php
                                    if($cashier['status'] == 0) {
                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                                    <?php
                                    } else if($cashier['status'] == 1) {

                                      $counter = $this->main->get_counter($cashier['agent_id'],2);

                                    ?>
                                    <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
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
