<!DOCTYPE html>
<html lang="en">
<head>
<title>Cloud-Based Queuing Management System</title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url() . "assets/new/"; ?>css/style.min.css" rel="stylesheet">
</head>
<body style="background:#FFF7B2">

<div class="container">

	<div class="row">

		<div class="col-md-12" style="margin-top:100px">


      <div class="panel panel-default">

        <div class="panel-heading">
        </div>

        <div class="panel-body" style="margin:0 auto">

          <center>

						<a href="<?php echo base_url() . "walkin";?>" class="btn btn-info" style="margin-left:-265px;color:white">BACK</a> <br>  <br>
						<div style="max-width:330px;border:1px solid gray; padding:30px;border-radius:15px;color:gray;;background:white">

							<div style="border:1px solid silver;padding:15px;background:#FFF7B2;border-radius:15px">
								<center>
									<small style="color:gray">Queue Number </small> <br>

                  <?php
                  $check = 0;
                  if($trans['priority_status'] == 1) {

                    foreach($transactions as $transaction){

                      if($transaction['user_id'] == $trans['user_id'] && $transaction['transaction_type'] == $trans['transaction_type']){
                        $check++;
                        break;
                      } else if($transaction['priority_status'] == 1 && $transaction['transaction_type'] == $trans['transaction_type']) {
                        $check += 1;
                      }

                    }
                    $text = ($trans['transaction_type'] == 1 ? "C" : "R") . "P-" . sprintf("%04d", $check);

                  } else {

                    foreach($transactions as $transaction){

                      if($transaction['user_id'] == $trans['user_id'] && $transaction['transaction_type'] == $trans['transaction_type']){
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

								<small> PLEASE TAKE A PICTURE OF YOUR TICKET </small> <br>
              </center>

            </div>


          </center>

        </div>

      </div>


		</div>

		<div class="col-sm-4">
		</div>

	</div>

</div>

</body>
</html>
