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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

</head>

<body>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
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
                    <a class="navbar-brand" href="<?php echo base_url() . "admin/dashboard"; ?>">
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() . "admin/dashboard"; ?>"
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
                                <span class="hide-menu">Visitor</span>
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
                        <h4 class="page-title">DEPARTMENTS</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">DEPARTMENTS</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- Column -->
                    <?php if($this->session->flashdata('respond-department')): ?>
                      <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="alert alert-success" role="alert">
                          <?php echo $this->session->flashdata('respond-department'); ?>
                        </div>
                      </div>
          					<?php endif; ?>
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">ACCOUNT LIST</h4>
                                <a href="<?php echo base_url() . "admin/department/create"; ?>" style="margin-bottom:10px" class="btn btn-primary">CREATE ACCOUNT</a>
                                <table id="table_id" class="display table table-bordered">
                                    <thead class="table-bordered">
                                        <tr>
                                            <th>User Name</th>
                                            <th>Position</th>
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      foreach($users as $usr){
                                      ?>
                                      <tr>
                                        <td><?php echo $usr['username']; ?></td>
                                        <td><?php echo ($usr['level'] == 1 ? "CASHIER" : "REGISTRAR"); ?></td>
                                        <td><?php echo $usr['fname'] . " " . $usr['lname']; ?></td>
                                        <td><?php echo $usr['email']; ?></td>
                                        <td><?php echo date("F d, Y", strtotime($usr['created_at'])); ?></td>
                                      </tr>
                                      <?php
                                      }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2021 ??  cloudqms.live
            </footer>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>
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
