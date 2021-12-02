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
              <span class="icon-bar" style="color:white"></span>
              <span class="icon-bar" style="color:white"></span>
              <span class="icon-bar" style="color:white"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() . "visitor-dashboard"; ?>">Site Name</a>
          </div>
    </div>
  </div>
</nav>

  <div class="container">


    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">ADMIN PANEL</a></li>
        <li class="active">CASHIER</li>
      </ol>
      <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation"><a href="<?php echo base_url() . "visitor-dashboard"; ?>">DASHBOARD</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "visitor-profile"; ?>">PROFILE</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "visitor-registrar"; ?>">REGISTRAR</a></li>
          <li role="presentation" class="active"><a href="<?php echo base_url() . "visitor-cashier"; ?>">CASHIER</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "visitor-logout"; ?>">LOGOUT</a></li>
        </ul>
      </div>


      <div class="col-md-10">
        <div class="panel  panel-primary">
          <div class="panel-heading">
            PAYMENT TRANSACTION
          </div>
          <div class="panel-body" style="color:gray">

            <div class="col-md-6 col-md-push-3">

              <div style="border:2px solid black; padding:30px;border-radius:5px;color:gray">

                <div style="border:1px solid silver;padding:15px;background:#FFF7B2;border-radius:10px">
                  <center>
                    <small style="color:gray">Queue Number</small> <br>

                    <?php
                    $check = 0;
                    if($trans['priority_status'] == 1) {

                      foreach($transactions as $transaction){

                        if($transaction['user_id'] == $trans['user_id']){
                          $check++;
                          break;
                        } else if($transaction['priority_status'] == 1 && $transaction['transaction_type'] == $trans['transaction_type']) {
                          $check += 1;
                        }

                      }
                      $text = ($trans['transaction_type'] == 1 ? "C" : "R") . "P-" . sprintf("%04d", $check);

                    } else {

                      foreach($transactions as $transaction){

                        if($transaction['user_id'] == $trans['user_id']){
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
                  <h4><?php echo $users['fname'] . " " . $users['lname']; ?></h4>
                  <?php echo $users['mobile']; ?> <br> <br>
                  <?php echo ($trans['transaction_type'] == 1 ? "Cashier" : "Registrar"); ?> <br>
                  <h4><?php echo $trans['transaction_name']; ?></h4>
                </center>

              </div>

            </div>

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
