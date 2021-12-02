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
        <li class="active">CLASS MANAGEMENT</li>
      </ol>
      <div class="col-md-9 col-md-push-3">
        <div class="panel  panel-primary">
          <div class="panel-heading">
            CLASS MANAGEMENT
          </div>
          <div class="panel-body" style="padding:10px;padding-bottom:0">
            <a href="<?php echo base_url() . "cms/class/create"; ?>" style="margin-bottom:10px" class="btn btn-primary">CREATE CLASS</a>
            <div class="table">
              <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                      </div>
                  </div>
                  <table  id="example" class="table table-bordered" >
                      <thead>
                          <tr>
                              <th>Subject Name</th>
                              <th>Teacher</th>
                              <th>Schedule</th>
                              <th>Student</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($subjects as $subject){
                        ?>
                        <tr>
                          <td><?php echo $subject['name']; ?></td>
                            <td>Not Assigned</td>
                              <td>Not Assigned</td>
                                <td>0</td>
                                  <td>
                                    <a href="" class="btn btn-xs btn-warning">EDIT</a>
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
          <li role="presentation" class="active"><a href="<?php echo base_url() . "cms/class"; ?>">CLASS MANAGEMENT</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/user"; ?>">USER MANAGEMENT</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title" id="exampleModalLongTitle">Modal title</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                  </div>
              </div>
              <table  id="example" class="table table-bordered" >
                  <thead>
                      <tr>
                          <th>Subject Name</th>
                          <th>Teacher Name</th>
                          <th>Schedule</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($classes as $class){
                    ?>
                    <tr>
                      <td><?php echo $class['id']; ?></td>
                      <td>GRADE <?php echo $class['level']; ?></td>
                      <td><?php echo $class['sy'] . "-" . ($class['sy'] + 1); ?></td>
                      <td><?php echo $class['sy'] . "-" . ($class['sy'] + 1); ?></td>
                      <td>
                        <a href="" class="btn btn-xs btn-warning">EDIT</a>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
