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
        <li class="active">USER MANAGEMENT</li>
      </ol>
      <div class="col-md-9 col-md-push-3">
        <div class="panel  panel-primary">
          <div class="panel-heading">
            USER MANAGEMENT
          </div>
          <div class="panel-body" style="padding:10px">
            <a href="<?php echo base_url() . "cms/user/create"; ?>" style="margin-bottom:10px" class="btn btn-primary">REGISTER STUDENT</a>
            <ul class="nav nav-tabs" style="margin-bottom:5px">
              <li role="presentation"><a href="<?php echo base_url() . "cms/user"; ?>">TEACHER</a></li>
              <li role="presentation" class="active"><a href="<?php echo base_url() . "cms/user/student"; ?>">STUDENT</a></li>
              <li role="presentation"><a href="#">PENDING ACCOUNTS</a></li>
            </ul>

            <div class="table">
              <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                      </div>
                  </div>
                  <table  id="example" class="table table-bordered" >
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Full Name</th>
                              <th>Level</th>
                              <th>Status</th>
                              <th>Date Registered</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($users as $user){
                        ?>
                        <tr>
                          <td><?php echo $user['id']; ?></td>
                          <td><?php echo $user['first_name'] . " " . $user['last_name']; ?></td>
                          <td><?php echo ($user['level'] == 0 ? "NO RECORD YET" : $user['level']); ?></td>
                          <td>
                            <?php echo ($user['status'] == 0 ? "<a href='' class='btn btn-xs btn-warning'>UNENROLLED</a>" : "<a href='' class='btn btn-xs btn-success'>ASSIGNED</a>"); ?>
                          </td>
                          <td><?php echo $user['created_at']; ?></td>
                          <td>
                            PENDING ACTION
                            <!-- <a href="" class="btn btn-xs btn-primary">ENROLLED SUBJECTS</a> -->
                          </td>
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
