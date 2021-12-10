<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Cloud-Based Queuing Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  	<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body style="background-image: url('<?php echo base_url(); ?>assets/new/plugins/images/new-users/1.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;color:#006CB7">

		<div class="container-fluid" style="background:	rgba(255,250,205,0.6);background-size: cover;height:100%">

			<div class="row justify-content-md-center" style="padding:30px">

				<div class="col-md-6">
					<a href="<?php echo base_url() . "login"; ?>" class="btn btn-info" style="margin-bottom:10px">BACK</a>
					<div class="card shadow">
					  <h5 class="card-header" style="color:gray">
					    CHECK-IN
					  </h5>
					  <div class="card-body" style="color:gray">
              <?php echo form_open(base_url() . "walkin"); ?>

    					<?php if($this->session->flashdata('login_error')): ?>
    						<div class="alert alert-danger" role="alert">
    							<small><?php echo $this->session->flashdata('login_error'); ?></small>
    						</div>
    					<?php endif; ?>

    						<div class="form-group">
    							<label>Last Name</label>
    							<input type="text" class="form-control" name="lname" value="" >
    							<?php echo form_error('lname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
    						</div>

                <div class="form-group">
    							<label>First Name</label>
    							<input type="text" class="form-control" name="fname" >
    							<?php echo form_error('fname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
    						</div>

                <input type="hidden" name="email" value="default-email@g.com">

                <div class="form-group">
    							<label>Mobile Number</label>
    							<input type="text" class="form-control" name="mobile" >
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
    							<label>Registrar or Cashier</label><label style="color:red">*</label>
                  <select class="form-control" name="type" id="transaction">
                    <option value="">-- Select Department --</option>
                    <option value="1">Cashier</option>
                    <option value="2">Registrar</option>
                  </select>
    							<?php echo form_error('username', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
    						</div>

                <div class="form-group">
    							<label>Choose Transaction</label><label style="color:red">*</label>
                  <select class="form-control" name="transaction" id="transactionMethod">
                    <option value="">-- Choose Transaction --</option>
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
            { "value": "Sales", "customerName": "Sales" },
            { "value": "Academic Document", "customerName": "Academic Document" },
            { "value": "Enrollment/Payment", "customerName": "Enrollment/Payment" },
            
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
          [ "True Copy of Grades", "True Copy of Grades" ],
          [ "Enrollment/Registration and Assessment Form(RAF)", "Enrollment/Registration and Assessment Form(RAF)" ],
          [ "Form 137", "Form 137" ],
          [ "Diploma/Certificate", "Diploma/Certificate" ],
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
