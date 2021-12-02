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
        <li class="active">SUBJECT MANAGEMENT</li>
      </ol>
      <div class="col-md-9 col-md-push-3">
        <div class="panel  panel-primary">
          <div class="panel-heading">
            SUBJECT MANAGEMENT
          </div>
          <div class="panel-body" style="padding:10px;padding-bottom:0">
            <a href="<?php echo base_url() . "cms/subject/create"; ?>" style="margin-bottom:10px" class="btn btn-primary">CREATE SUBJECT</a>
            <div class="table">
              <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                      </div>
                  </div>
                  <table  id="example" class="table table-bordered" >
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Level</th>
                              <th>Date Added</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($subjects as $subject){
                        ?>
                        <tr>
                          <td><?php echo $subject['id']; ?></td>
                          <td><?php echo $subject['code']; ?></td>
                          <td><?php echo $subject['name']; ?></td>
                          <td>GRADE <?php echo $subject['level']; ?></td>
                          <td><?php echo $subject['created_at']; ?></td>
                          <td>
                            <a href="" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#update-<?php echo $subject['id']; ?>">EDIT</a>
                            <a href="" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-<?php echo $subject['id']; ?>">DELETE</a>
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
          <li role="presentation" class="active"><a href="<?php echo base_url() . "cms/subject"; ?>">SUBJECT MANAGEMENT</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/class"; ?>">CLASS MANAGEMENT</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/user"; ?>">USER MANAGEMENT</a></li>
        </ul>
      </div>
    </div>
  </div>
  <?php
  foreach($subjects as $subject){
  ?>
  <div class="modal fade" id="delete-<?php echo $subject['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title" id="exampleModalLongTitle"><b>DELETE CONFIRMATION</b></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete?<br><b><?php echo $subject['name']; ?></b>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'cms/subject/delete/' . $subject['id']; ?>">CONFIRM</a>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CANCEL</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="update-<?php echo $subject['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title" id="exampleModalLongTitle"><b>UPDATE SUBJECT</b></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url() . 'cms/subject/update/' . $subject['id']); ?>
            <div class="form-group">
              <label>SUBJECT CODE</label>
              <input type="text" class="form-control" placeholder="" name="code" value="<?php echo $subject['code']; ?>">
              <?php echo form_error('code', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
            </div>
            <div class="form-group">
              <label>SUBJECT NAME</label>
              <input type="text" class="form-control" name="name" value="<?php echo $subject['name']; ?>">
              <?php echo form_error('name', '<small><span style="color:red;font-size: small">', '</strong></small>'); ?>
            </div><div class="form-group">
              <label>GRADE / LEVEL</label>
              <select  class="form-control" name="level">
                <?php
                for($i = 1; $i <= 12; $i++) {
                ?>
                  <option value="<?php echo $i; ?>" <?php echo ($subject['level'] == $i ? "selected" : ""); ?>>GRADE <?php echo $i; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" >UPDATE</button>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CANCEL</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  ?>


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>

</html>
