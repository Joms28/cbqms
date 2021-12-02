<!DOCTYPE html>
<html>
<head>
  <title></title>
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
            <a class="navbar-brand" href="#">Site Name</a>
          </div>
    </div>
  </div>
</nav>

  <div class="container">


    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">ADMIN PANEL</a></li>
        <li>USER MANAGEMENT</li>
        <li class="active">REGISTER USER</li>
      </ol>
      <div class="col-md-9 col-md-push-3">
        <div class="panel  panel-primary">
          <div class="panel-heading">
            REGISTER USER
          </div>
          <div class="panel-body" style="padding:10px">


            <?php echo form_open(base_url() . 'cms/user/create'); ?>
              <div class="form-group">
                <label>ACCOUNT TYPE</label>
                <select  class="form-control" name="type">
                    <option value="1">TEACHER ACCOUNT</option>
                    <option value="2">STUDENT ACCOUNT</option>
                </select>
              </div>
              <div class="form-group">
                <label>FIRST NAME</label>
                <input type="text" class="form-control" placeholder="Enter First Name..." name="fname">
                <?php echo form_error('fname', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
              </div>
              <div class="form-group">
                <label>MIDDLE NAME</label>
                <input type="text" class="form-control" placeholder="Enter Middle Name..." name="mname">
                <?php echo form_error('mname', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
              </div>
              <div class="form-group">
                <label>LAST NAME</label>
                <input type="text" class="form-control" placeholder="Enter Last Name..." name="lname">
                <?php echo form_error('lname', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
              </div>
              <div class="form-group">
                <label>CONTACT NO.</label>
                <input type="text" class="form-control" placeholder="Enter Contact No..." name="contact">
                <?php echo form_error('contact', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
              </div>
              <div class="form-group">
                <label>EMAIL ADDRESS</label>
                <input type="text" class="form-control" placeholder="Enter Email Address..." name="email">
                <?php echo form_error('email', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
              </div>

              <button class="btn btn-primary" type="submit">CREATE</button>

            </form>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-md-pull-9">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation"><a href="<?php echo base_url() . "cms"; ?>">DASHBOARD</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/subject"; ?>">SUBJECT MANAGEMENT</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/class"; ?>">CLASS MANAGEMENT</a></li>
          <li role="presentation" class="active"><a href="<?php echo base_url() . "cms/user"; ?>">USER MANAGEMENT</a></li>
        </ul>
      </div>
    </div>
  </div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>

</html>
