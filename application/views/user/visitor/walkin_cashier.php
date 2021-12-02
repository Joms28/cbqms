<!DOCTYPE html>
<html lang="en">
<head>
<title>Cloud-Based Queuing Management System</title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url() . "assets/css/bootstrap.min.css?t=" . time(); ?>"  rel="stylesheet" />
	<link href="<?php echo base_url() . "assets/css/bootstrap-theme.min.css?t=" . time(); ?>"  rel="stylesheet" />
</head>
<body>

<div class="container">

	<div class="row">

		<div class="col-sm-8 col-md-push-2" style="margin-top:100px">

			<div class="panel panel-default">

				<div class="panel-heading">
					<h3 class="panel-title"><strong>Walk In - Cashier</strong></h3>
				</div>

				<div class="panel-body">

					<?php echo form_open(base_url() . 'walkin-cashier'); ?>

					<?php if($this->session->flashdata('login_error')): ?>
						<div class="alert alert-danger" role="alert">
							<small><?php echo $this->session->flashdata('login_error'); ?></small>
						</div>
					<?php endif; ?>

						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="fname">
							<?php echo form_error('fname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
						</div>

            <div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="lname">
							<?php echo form_error('lname', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
						</div>

            <div class="form-group">
							<label>Email Address</label>
							<input type="text" class="form-control" name="email">
							<?php echo form_error('email', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
						</div>

            <div class="form-group">
							<label>Mobile Number</label>
							<input type="text" class="form-control" name="mobile">
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
							<label>Choose Transaction</label>
              <select class="form-control" name="transaction">
                <option name="Tuition Fee">Tuition Fee</option>
                <option name="Sales">Sales</option>
                <option name="Academic Document">Academic Document</option>
              </select>
							<?php echo form_error('username', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
						</div>


						<button class="btn btn-primary">SUBMIT</button>


					<?php echo form_close(); ?>

				</div>

			</div>

		</div>

		<div class="col-sm-4">
		</div>

	</div>

</div>

</body>
</html>
