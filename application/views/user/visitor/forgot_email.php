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

				<div class="col-md-3">
					<a href="<?php echo base_url() . "login"; ?>" class="btn btn-info" style="margin-bottom:10px">BACK</a>
					<div class="card shadow">
					  <h5 class="card-header" style="color:gray">
					    RESET PASSWORD
					  </h5>
					  <div class="card-body">
							<?php echo form_open(base_url() . 'forgot'); ?>

							<?php if($this->session->flashdata('login_error')): ?>
								<div class="alert alert-danger" role="alert">
									<small><?php echo $this->session->flashdata('login_error'); ?></small>
								</div>
							<?php endif; ?>

								<div class="form-group">
									<label style="color:gray">EMAIL ADDRESS</label>
									<input type="text" class="form-control" name="email" placeholder="">
									<?php echo form_error('email', '<small><span style="color:red;font-size: small">', '</strong></small><br>'); ?>
								</div>


								<button class="btn btn-primary btn-block">SEND</button>

							<?php echo form_close(); ?>
					  </div>
					</div>
				</div>



			</div>

		</div>



  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>

  </html>
