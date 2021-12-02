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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
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
                    <a class="navbar-brand" href="<?php echo base_url() . "admin/dashboard"; ?>">
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link active" href="<?php echo base_url() . "admin/dashboard"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-desktop" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "admin/department"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-archive" aria-hidden="true"></i>
                                <span class="hide-menu">Department</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "admin/account"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-archive" aria-hidden="true"></i>
                                <span class="hide-menu">Student</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "admin/setting"; ?>"
                                aria-expanded="false">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>

                        <li class="text-center p-20 upgrade-btn">
                            <a href="<?php echo base_url() . "admin/logout"; ?>"
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


                </div>

                <div class="row">

                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                            <h2>CASHIER</h2>
                              <script>
                                  $(document).ready(function() {
                                      var ctx = $("#chart-line");
                                      var myLineChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                            labels: ["Completed", "Cancelled", "Pending"],
                                            datasets: [{
                                                data: [<?php echo $transaction_cashier_complete; ?>,<?php echo $transaction_cashier_cancel; ?>, <?php echo $transaction_cashier_pending; ?>],
                                                backgroundColor: ["#01579B", "#26B0CF","#C3D3DE"]
                                            }]
                                          },
                                          options: {
                                            legend: {
                                                display: false
                                            }
                                          }
                                      });
                                  });
                              </script>

                                <div class="page-content page-container" id="page-content">
                                    <div class="padding">
                                        <div class="row">
                                            <div class="container-fluid d-flex justify-content-center">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                                </div>
                                                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                                </div>
                                                            </div> <canvas id="chart-line" width="499" height="499" class="chartjs-render-monitor" style="display: block;"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6" style="margin-top:30px">

                                    <div style="border:1px solid #01579B; width:50px;margin:0 auto;padding:10px;background:#01579B; border-radius:10px ">
                                      <center>
                                        <span style="font-size: large;color:white;"><strong><?php echo $transaction_cashier_complete; ?></strong></span>
                                      </center>
                                    </div>

                                    <center style="padding-top:10px">
                                      <span style="font-size: 15px;color:#26B0CF"><strong>Completed Queues</strong></span>
                                    </center>
                                    <br>
                                  </div>

                                  <div class="col-sm-6" style="margin-top:30px">
                                    <div style="border:1px solid #26B0CF; width:50px;margin:0 auto;padding:10px;background:#26B0CF; border-radius:10px ">
                                      <center>
                                        <span style="font-size: large;color:white"><strong><?php echo $transaction_cashier_cancel; ?></strong></span>
                                      </center>
                                    </div>

                                    <center style="padding-top:10px">
                                      <span style="font-size: 15px;color:#26B0CF"><strong>Cancelled Queues</strong></span>
                                    </center>
                                    <br>
                                  </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                            <h2>REGISTRAR</h2>
                              <script>
                                  $(document).ready(function() {
                                      var ctx = $("#chart-lines");
                                      var myLineChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                            labels: ["Completed", "Cancelled", "Pending"],
                                            datasets: [{
                                                data: [<?php echo $transaction_registrar_complete; ?>,<?php echo $transaction_registrar_cancel; ?>, <?php echo $transaction_registrar_pending; ?>],
                                                backgroundColor: ["#01579B", "#26B0CF","#C3D3DE"]
                                            }]
                                          },
                                          options: {
                                            legend: {
                                                display: false
                                            }
                                          }
                                      });
                                  });
                              </script>

                                <div class="page-content page-container" id="page-content">
                                    <div class="padding">
                                        <div class="row">
                                            <div class="container-fluid d-flex justify-content-center">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                                </div>
                                                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                                </div>
                                                            </div> <canvas id="chart-lines" width="499" height="499" class="chartjs-render-monitor" style="display: block;"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6" style="margin-top:30px">

                                    <div style="border:1px solid #01579B; width:50px;margin:0 auto;padding:10px;background:#01579B; border-radius:10px ">
                                      <center>
                                        <span style="font-size: large;color:white;"><strong><?php echo $transaction_registrar_complete; ?></strong></span>
                                      </center>
                                    </div>

                                    <center style="padding-top:10px">
                                      <span style="font-size: 15px;color:#26B0CF"><strong>Completed Queues</strong></span>
                                    </center>
                                    <br>
                                  </div>

                                  <div class="col-sm-6" style="margin-top:30px">
                                    <div style="border:1px solid #26B0CF; width:50px;margin:0 auto;padding:10px;background:#26B0CF; border-radius:10px ">
                                      <center>
                                        <span style="font-size: large;color:white"><strong><?php echo $transaction_registrar_cancel; ?></strong></span>
                                      </center>
                                    </div>

                                    <center style="padding-top:10px">
                                      <span style="font-size: 15px;color:#26B0CF"><strong>Cancelled Queues</strong></span>
                                    </center>
                                    <br>
                                  </div>
                                </div>
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
    <script src="<?php echo base_url() . "assets/new/"; ?>js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/custom.js"></script>
</body>

</html>
