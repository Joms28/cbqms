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
                        <h4 class="page-title">REGISTRAR</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Registrar Appointment</a></li>
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
                    <?php
                    if(!$this->main->check_user_sched_registrar($this->session->userdata('user_id'))) {
                    ?>
                    <div class="col-lg-5 col-xlg-5 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">ON-SITE TICKET</h4>

                                <div style="max-width:300px;border:1px solid gray; padding:30px;border-radius:15px;color:gray;margin:0 auto">

                                  <div style="border:1px solid silver;padding:15px;background:#FFF7B2;border-radius:15px">
                                    <center>
                                      <small style="color:gray">Queue Number</small> <br>
                                      <h2 style="color:gray"><?php echo $trans['assigned_queue_num']; ?></h1>
                                    </center>
                                  </div>
                                  <br>
                                  <center>
                                    <h4><?php echo $user['fname'] . " " . $user['lname']; ?></h4>
                                    <?php echo $user['mobile']; ?> <br> <br>
                                    <?php echo ($trans['transaction_type'] == 1 ? "Cashier" : "Registrar"); ?> <br>
                                    <h4><?php echo $trans['transaction_name']; ?></h4><br>                                    
                                    
                                    <?php if($trans['status'] == '4'){ ?>
                                      <small>YOUR TICKET HAS EXPIRED YOU MAY REQUEST FOR ANOTHER APPOINTMENT TO BE ACCOMODATED</small><br><br>
                                      <button class="btn btn-primary">CREATE APPOINTMENT</button>
                                    <?php } else { ?>
                                      <small> PLEASE TAKE A PICTURE OF YOUR TICKET </small> <br>
                                      <small>TICKET IS VALID UNTIL: <b><?= $trans['expires_at'] ?></b></small>
                                    <?php }?>

                                  </center>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xlg-7 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">APPOINTMENT DETAILS</h4>
                                <h4>  <small> <b>FIRST NAME</b> </small>  <br> <?php echo $user['fname']; ?></h4>
                                <h4>  <small> <b>LAST NAME</b> </small>  <br> <?php echo $user['lname']; ?></h4>
                                <h4>  <small> <b>MOBILE NUMBER</b> </small>  <br> <?php echo $user['mobile']; ?></h4>
                                <h4>  <small> <b>EMAIL ADDRESS</b> </small>  <br> <?php echo $user['email']; ?></h4>
                                
                                <h4>  <small> <b>TRANSACTION HANDLER</b> </small>  <br> Registrar <?php echo ($trans['priority_status'] == 1 ? "(Priority)" : ""); ?></h4>
                                <h4>  <small> <b>TRANSACTION TYPE</b> </small>  <br> <?php echo $trans['transaction_name']; ?></h4>
                                <h4>  <small> <b>SCHEDULED DATE</b> </small>  <br> <?php echo $trans['sched_date']; ?></h4> <br>
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
                                          <a href="<?php echo base_url() . 'visitor-registrar/delete/' . $trans['id']; ?>" class="btn btn-danger" style="color:white">Yes</a>
                                         </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!--
                                  <button data-toggle="modal" type="button" data-target="#cancel_modal"class="btn btn-danger btn-sm text-white" id="btnconfimation-modal" >CANCEL APPOINTMENT</button>
                                    -->

                                    
                                
                          </div>
                        </div>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title" style="margin-bottom:20px;font-weight:bold">ACADEMIC DOCUMENT REQUEST</h4>
                                <?php echo form_open(base_url() . 'visitor-registrar', 'class="form-horizontal form-material"'); ?>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Choose Transaction</label>
                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" id="selecttransaction" name="transaction">
                                          <option value="">-- Select Transaction --</option>
                                          <option name="Official Transcript of Records (TOR)">Official Transcript of Records (TOR)</option>
                                          <option name="Certificate of Good Moral">Certificate of Good Moral</option>
                                          <option name="Certificate of Transfer">Certificate of Transfer</option>
                                          <option name="True Copy of Grades">True Copy of Grades</option>
                                          <option name="Enrollment/Registration and Assessment Form(RAF)">Enrollment/Registration and Assessment Form(RAF)</option>
                                          <option name="Form 137">Form 137</option>
                                          <option name="Diploma/Certificate">Diploma/Certificate</option>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Priority</label>
                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line"  name="priority">
                                          <option value="0">None</option>
                                          <option value="Pregnant">Pregnant</option>
                                          <option value="Person with disability">Person with disability</option>
                                          <option value="Senior Citizen">Senior Citizen</option>
                                        </select>
                                    </div>
                                </div>
                                <?php if(strtotime(date('h:i:s a')) >= strtotime('8:00 AM')&&strtotime(date('h:i:s a')) <= strtotime('4:00 PM')){?>
                                <button data-toggle="modal" type="button" data-target="#view_modal"class="btn btnview btn-info btn-sm" id="btnconfimation-modal" style="background-color:#707cd2; color:white;display:none;" >CREATE APPOINTMENT</button>
                                <?php }else{ ?>
                                  <div class="col-12 border-danger">
                                    <div class="alert alert-danger" role="alert">
                                      Appointment Cut-Off! You can set appointment tommorrow from 8:00 AM to 4:00 PM
                                    </div>
                                </div>
                                <?php } ?>
                                  <div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Cashier/Registrar Transactions will only be available from 8:00 AM until 4:00 PM. If you failed to come to school within the office hours,
                                          your ticket will be re-scheduled for the next day. Queue ticket will only be valid for 48 hours. Would you like to proceed?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">No</button>
                                          <button type="submit" id="proceed-yes" class="btn btn-primary">Yes</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>js/app-style-switcher.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script>
      $("#selecttransaction").on('change',function(){
        if($("#selecttransaction").val()!=""){
          $("#btnconfimation-modal").css('display','block');
        }
     //   alert("@3");
      });
    </script>
    <script src="<?php echo base_url() . "assets/new/"; ?>js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
