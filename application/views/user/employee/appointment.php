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
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" id="opn"
                                aria-expanded="false">
                                <i class="fas fa-sync" aria-hidden="true"></i>
                                <span class="hide-menu">EOD</span>
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
                        <h4 class="page-title"><?php echo ($trans['transaction_type'] == 1 ? "CASHIER" : "REGISTRAR"); ?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Appointment Ticket</a></li>
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
                    <?php if($this->session->flashdata('respond-registrar')): ?>
                      <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="alert alert-success" role="alert">
                          <?php echo $this->session->flashdata('respond-registrar'); ?>
                        </div>
                      </div>
          					<?php endif; ?>
                    <!-- Column -->
                    <div class="col-lg-5 col-xlg-5 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">VIRTUAL TICKET</h4>

                                <div style="max-width:300px;border:1px solid gray; padding:30px;border-radius:15px;color:gray;margin:0 auto">

                                  <div style="border:1px solid silver;padding:15px;background:#FFF7B2;border-radius:15px">
                                    <center>
                                      <small style="color:gray">Queue Number</small> <br>

                                      <?php
                                      $check = 0;
                                      if($trans['priority_status'] == 1) {

                                        foreach($transactions as $transaction){

                                          if($transaction['user_id'] == $trans['user_id'] && $transaction['closed'] == 0 && $transaction['transaction_type'] == $trans['transaction_type']){
                                            $check++;
                                            break;
                                          } else if($transaction['priority_status'] == 1 && $transaction['transaction_type'] == $trans['transaction_type']) {
                                            $check += 1;
                                          }

                                        }
                                        $text = ($trans['transaction_type'] == 1 ? "C" : "R") . "P-" . sprintf("%04d", $check);

                                      } else {

                                        foreach($transactions as $transaction){

                                          if($transaction['user_id'] == $trans['user_id'] && $transaction['closed'] == 0 && $transaction['transaction_type'] == $trans['transaction_type']){
                                            $check++;
                                            break;
                                          } else if($transaction['priority_status'] == 0 && $transaction['transaction_type'] == $trans['transaction_type']) {
                                            $check++;
                                          }

                                        }
                                        $text = ($trans['transaction_type'] == 1 ? "C" : "R") . "-" . sprintf("%04d", $check);

                                      }

                                      ?>

                                      <h2 style="color:gray"><?php echo $text; ?></h1>
                                    </center>
                                  </div>
                                  <br>
                                  <center>
                                    <h4><?php echo $usr['fname'] . " " . $usr['lname']; ?></h4>
                                    <?php echo $usr['mobile']; ?> <br> <br>
                                    <?php echo ($trans['transaction_type'] == 1 ? "Cashier" : "Registrar"); ?> <br>
                                    <h4><?php echo $trans['transaction_name']; ?></h4><br>

                                    <small> PLEASE TAKE A PICTURE OF YOUR TICKET </small> <br>

                                  </center>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xlg-7 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">APPOINTMENT DETAILS</h4>
                                <h4>  <small> <b>FIRST NAME</b> </small>  <br> <?php echo $usr['fname']; ?></h4>
                                <h4>  <small> <b>LAST NAME</b> </small>  <br> <?php echo $usr['lname']; ?></h4>
                                <h4>  <small> <b>MOBILE NUMBER</b> </small>  <br> <?php echo $usr['mobile']; ?></h4>
                                <h4>  <small> <b>EMAIL ADDRESS</b> </small>  <br> <?php echo $usr['email']; ?></h4>
                                
                                <h4>  <small> <b>PRIORITY</b> </small>  <br> <?php echo $trans['priority_type']; ?></h4>
                                <h4>  <small> <b>TRANSACTION TYPE</b> </small>  <br> <?php echo $trans['transaction_name']; ?></h4>
                                <h4>  <small> <b>SCHEDULED DATE</b> </small>  <br> <?php echo $trans['sched_date']; ?></h4> <br>
                                <?php if($this->session->flashdata('respond-registrar') != 'This transaction was moved to pending due to multiple calls'){?>                      
                                  <a href="<?php echo base_url() . 'bleep/' . $trans['id'] . ""; ?>" class="btn btn-success" style="color:white">CALL</a>
                                <?php } ?>
                                <div class="modal fade" id="complete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Are you sure you want to complete this appointment?  
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">No</button>
                                          <a href="<?php echo base_url() . 'employee-appointment/' . $trans['id'] . "/complete"; ?>" class="btn btn-info" style="color:white">Yes</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php if($this->session->flashdata('respond-registrar') != 'This transaction was moved to pending due to multiple calls'){?>
                                    <button data-toggle="modal" type="button" data-target="#complete_modal"class="btn btn-info text-white" id="btnconfimation-modal" >COMPLETE</button>
                                  <?php }?>
                                  <div class="modal fade" id="cancel_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Are you sure you want to cancel this appointment?  
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">No</button>
                                          <a href="<?php echo base_url() . 'employee-appointment/' . $trans['id'] . "/cancel"; ?>" class="btn btn-danger" style="color:white">Yes</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>            
                                  <?php if($this->session->flashdata('respond-registrar') != 'This transaction was moved to pending due to multiple calls'){?>                      
                                    <button data-toggle="modal" type="button" data-target="#cancel_modal"class="btn btn-danger text-white" id="btnconfimationcancel-modal" >CANCEL</button>
                                  <?php }?>
                                  <?php if($this->session->flashdata('respond-registrar') == 'This transaction was moved to pending due to multiple calls'){?>
                                    <a href="<?= base_url('employee-dashboard'); ?>" class="btn btn-secondary text-white">BACK</a>
                                  <?php }?>
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
            <footer class="footer text-center"> 2021 ??  cloudqms.live
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    
    <div class="modal fade" id="eod_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Are you sure you want to process all available & unprocessed appointments tomorrow? This action is irreversible.
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">No</button>
                                          <a  href="<?php echo base_url() . "employee-log"; ?>"class="btn btn-info" style="color:white">Yes</a>
                                        </div>
                                      </div>
                                    </div>
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
    <script src="<?php echo base_url() . "assets/new/"; ?>js/custom.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    
    <script>
      
      $("#opn").click(function(){
$('#eod_modal').modal('show');
                              });
    </script>
</body>

</html>
