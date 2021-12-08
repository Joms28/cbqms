<!DOCTYPE html>
<html>
<head>
<title>Cloud-Based Queuing Management System</title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url() . "assets/css/bootstrap.min.css"; ?>" />
  <script src="<?php echo base_url() . "assets/js/jquery.min.js"; ?>" type="text/javascript"> </script>
  <script src="<?php echo base_url() . "assets/js/bootstrap.min.js"; ?>" type="text/javascript"> </script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/datatables.min.css"; ?>"/>
  <script type="text/javascript" src="<?php echo base_url() . "assets/js/datatables.min.js"; ?>"></script>
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Cloud QMS</a>
          </div>
    </div>
  </div>
</nav>

  <div class="container">


    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">ADMIN PANEL</a></li>
        <li class="active">SETTINGS</li>
      </ol>
      <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation"><a href="<?php echo base_url() . "admin/dashboard"; ?>">DASHBOARD</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "admin/department"; ?>">DEPARTMENTS</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "admin/account"; ?>">ACCOUNTS</a></li>
          <li role="presentation" class="active"><a href="<?php echo base_url() . "admin/setting"; ?>">SETTINGS</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "admin/logout"; ?>">LOGOUT</a></li>
        </ul>
      </div>


      <div class="col-md-10">
        <div class="panel  panel-primary">
          <div class="panel-heading">
            CHANGE PASSWORD
          </div>
          <div class="panel-body" style="padding:10px">


                        <?php echo form_open(base_url() . 'admin/setting/password'); ?>
                        <!-- <div class="form-group">
                          <label>OLD PASSWORD</label>
                          <input type="password" class="form-control" placeholder="Enter Password..." name="password">
                          <?php echo form_error('password', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
                        </div> -->
                          <div class="form-group">
                            <label>NEW PASSWORD</label>
                            <input type="password" class="form-control" placeholder="Enter Password..." name="password">
                            <?php echo form_error('password', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
                          </div>
                          <div class="form-group">
                            <label>RE-TYPE PASSWORD</label>
                            <input type="password" class="form-control" placeholder="Re-Type Password..." name="re-password">
                            <?php echo form_error('contact', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
                          </div>

                          <button class="btn btn-primary" type="submit">SUBMIT</button>


          </div>
        </div>
      </div>


    </div>
  </div>
  <!-- Modal -->
  <!-- <?php
  foreach($classes as $class){
  ?>
  <div class="modal fade" id="close-<?php echo $class['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title" id="exampleModalLongTitle"><b>CLOSSING CONFIRMATION</b></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to close the class for enrollment?<br><b><?php echo $class['name']; ?></b>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'cms/class/close/' . $class['id']; ?>">CONFIRM</a>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CANCEL</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  ?> -->
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>

</html>
