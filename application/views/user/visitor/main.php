<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Cloud-Based Queuing Management System</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/faveicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  	<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/fontawesome.min.css" rel="stylesheet" />
  </head>
  <body style="background-image: url('<?php echo base_url(); ?>assets/new/plugins/images/new-users/1.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;color:#006CB7">

		<div class="row" style="margin:10px">

			<div class="col-md-3 col-xs-2">

				<div>
					<img src="<?php echo base_url(); ?>assets/new/plugins/images/new-users/2.png" height="120" alt="">
				</div>

			</div>

		</div>

		<div class="row" style="margin:30px">

			<div class="col-md-12">

					<br>
					<br><br><br><br><br>
				<h2><b>Welcome to STI Sta. Maria<br>Cloud-Based Queuing <br>Management System (CBQMS)</b></h2>
        <a href="<?php echo base_url() . "login"; ?>" class="btn btn-primary btn-lg" style="margin-top:15px;margin-right:15px;width:100px">Sign In</a>
        <a href="<?php echo base_url() . "signup"; ?>" class="btn btn-primary btn-lg " style="margin-top:15px;margin-left:15px;width:100px">Sign Up</a>
        <!-- <div class="">
          <a class="btn btn-info btn-lg"  data-toggle="modal" data-target="#exampleModal" style="font-size:25px"><img src="<?php echo base_url(); ?>assets/new/plugins/images/3.png" alt="" style="margin:3px;margin-right:10px" height="45" width="35">Check-in</a>
        </div> -->
				<!-- <a href="<?php echo base_url() . "walkin-registrar"; ?>" class="btn btn-primary">CHECK-IN REGISTRAR</a> <br> <br>
				<a href="<?php echo base_url() . "walkin-cashier"; ?>" class="btn btn-primary">CHECK-IN CASHIER</a> <br> <br> -->
			</div>

		</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='color:black;font-family: Verdana;'>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="col-md-4">
              <div style="padding:3px">
                <h4 class="modal-title" id="exampleModalLabel"data-dismiss="modal"><i class="fa fa-arrow-left" aria-hidden="true"></i></h5>
              </div>
            </div>
            <div class="col-md-4" align="center">
              <h4 class="modal-title" id="exampleModalLabel" style=""><b>FOR WALK-INS</b></h5>
            </div>
            <div class="col-md-4">
            </div>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url()); ?>

  					<?php if($this->session->flashdata('login_error')): ?>
  						<div class="alert alert-danger" role="alert">
  							<small><?php echo $this->session->flashdata('login_error'); ?></small>
  						</div>
  					<?php endif; ?>

  						<div class="form-group">
  							<label>First Name</label>
  							<input type="text" class="form-control" name="fname" required>
  							<?php echo form_error('fname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
  						</div>

              <div class="form-group">
  							<label>Last Name</label>
  							<input type="text" class="form-control" name="lname" required>
  							<?php echo form_error('lname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
  						</div>

              <input type="hidden" name="email" value="default-email@g.com">

              <div class="form-group">
  							<label>Mobile Number</label>
  							<input type="text" class="form-control" name="mobile" required>
  							<?php echo form_error('mobile', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
  						</div>

              <div class="form-group">
  							<label>Priority</label>
                <select class="form-control" name="priority">
                  <option value="0">None</option>
                  <option value="Pregnant">Pregnant</option>
                  <option value="Person with disability">Person with disability</option>
                  <option value="Senior Citizen">Senior Citizen</option>
                </select>
  							<?php echo form_error('username', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
  						</div>
              <div class="form-group">
  							<label>Registrar or Cashier</label>
                <select class="form-control" name="type" id="transaction">
                  <option value="">*** SELECT YOUR CHOICE ***</option>
                  <option value="1">Cashier</option>
                  <option value="2">Registrar</option>
                </select>
  							<?php echo form_error('username', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
  						</div>

              <div class="form-group">
  							<label>Choose Transaction</label>
                <select class="form-control" name="transaction" id="transactionMethod">
                  <option value="">** CHOOSE YOUR TRANSACTION ***</option>
                </select>
  							<?php echo form_error('username', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
  						</div>

  						<button class="btn btn-info" disabled id="submitBtn">Check-In</button>

  					<?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $('#transaction').change(function() {
    if ($(this).val() == '1') {
    $('#submitBtn').prop('disabled', false);
       $('#transactionMethod').empty();
       var data = [
          { "value": "Tuition Fee", "customerName": "Tuition Fee" },
          { "value": "Uniform", "customerName": "Uniform" },
          { "value": "Academic Document", "customerName": "Academic Document" }
       ];
       for (var index = 0; index <= data.length; index++) {
          $('#transactionMethod').append('<option value="' + data[index].value + '">' + data[index].customerName + '</option>');
       }
    } else if($(this).val() == '2') {
    $('#submitBtn').prop('disabled', false);
       $('#transactionMethod').empty();
      var data2 = [
        [ "Official Transcript of Records (TOR)", "Official Transcript of Records (TOR)" ],
        [ "Certificate of Good Moral", "Certificate of Good Moral" ],
        [ "Certificate of Transfer", "Certificate of Transfer" ],
        [ "True Copy of Grades", "True Copy of Grades" ]
      ];
      for (var index = 0; index <= data2.length; index++) {
         $('#transactionMethod').append('<option value="' + data2[index][0] + '">' + data2[index][1] + '</option>');
      }
    } else {
      $('#submitBtn').prop('disabled', true);
    }
  });
  </script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>

  </html>
