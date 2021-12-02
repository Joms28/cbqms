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
        <li>SUBJECT MANAGEMENT</li>
        <li class="active">CREATE SUBJECT</li>
      </ol>
      <div class="col-md-9 col-md-push-3">
        <div class="panel  panel-primary">
          <div class="panel-heading">
            CLASS MANAGEMENT
          </div>
          <div class="panel-body" style="padding:10px">

            <?php echo form_open(base_url() . 'cms/class/create'); ?>
              <div class="form-group">
                <label>SCHOOL YEAR</label>
                <select  class="form-control" name="sy">
                  <?php
                  for($i = 2021; $i <= 2031; $i++) {
                  ?>
                    <option value="<?php echo $i; ?>-<?php echo $i + 1; ?>">SY. <?php echo $i; ?>-<?php echo $i + 1; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>GRADE / LEVEL</label>
                <select  class="form-control" name="level">
                  <?php
                  for($i = 1; $i <= 12; $i++) {
                  ?>
                    <option value="<?php echo $i; ?>">GRADE <?php echo $i; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>CLASS NAME</label>
                <input type="text" class="form-control" placeholder="Enter Subject Code..." name="name">
                <?php echo form_error('code', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
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
          <li role="presentation" class="active"><a href="<?php echo base_url() . "cms/class"; ?>">CLASS MANAGEMENT</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/user"; ?>">USER MANAGEMENT</a></li>
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
