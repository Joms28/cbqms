
<?php
  $url1=$_SERVER['REQUEST_URI'];
  header("Refresh: 4; URL=$url1");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cloud-Based Queuing Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/new/"; ?>plugins/images/favicon.png">
    <?php
    if($bleep) {
    ?>
    <audio controls autoplay hidden>
     <source src="<?php echo base_url() . "assets/1.wav"?>" type="audio/wav">
                unsupported !!
    </audio>
    <?php
    $this->main->update_bleep(0);
    }
    ?>

    <link href="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . "assets/new/"; ?>css/style.min.css" rel="stylesheet">
  </head>
  <body style="background:#1F78B4">


    <div class="container-fluid" style="padding:20px">
        <!-- ============================================================== -->
        <!-- PRODUCTS YEARLY SALES -->
        <!-- ============================================================== -->

        <div class="row">

          <div class="col-md-12">
            <div style="border-radius:20px;background-color:#C50000;color:white" class="white-box shadow-sm" align="center">
              <h1>LIVE QUEUES</h1>
            </div>
          </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" align="center">
                    <!-- <h3 class="box-title">NOW SERVING</h3>
                    <h4>Waiting to be accomodated...</h4> -->
                    <?php
                    $i = 1;
                    $j = 1;
                    foreach($data_cashiers as $cashier) {

                      if($cashier['closed'] == 0 && $j <= 1 && $cashier['status'] == 0) {
                      ?>
                      <h3 class="box-title">NEXT TO SERVER</h3>
                      <h1> <b> C-<?php echo sprintf("%04d", $i)?> </b> </h1>
                      <h4>Waiting to be accomodated...</h4>
                      <?php
                      $j++;
                      }
                      $i++;
                    }
                    if($j == 1){
                    ?>
                    <h1>FINISHED ALL APPOINTMENT</h1>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" align="center">
                  <?php
                  $i = 1;
                  $j = 1;
                  foreach($data_registrars as $cashier) {

                    if($cashier['closed'] == 0 && $j <= 1 && $cashier['status'] == 0) {
                    ?>
                    <h3 class="box-title">NEXT TO SERVER</h3>
                    <h1> <b> R-<?php echo sprintf("%04d", $i)?> </b> </h1>
                    <h4>Waiting to be accomodated...</h4>
                    <?php
                    $j++;
                    }
                    $i++;
                  }
                  if($j == 1){
                  ?>
                  <h1>FINISHED ALL APPOINTMENT</h1>
                  <?php
                  }
                  ?>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                    <h2>Cashier</h2>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th><span style="font-size:20px;color:#26B0CF">Queue No.</span></th>
                          <th><center><span style="font-size:20px;color:#26B0CF">Action</span></center></th>
                        </tr>
                      </thead>
                    <tbody>

                      <?php
                      $i = 1;
                      $j = 1;
                      foreach($data_cashiers as $cashier) {

                        if($cashier['closed'] == 0 && $j <= 5) {
                        ?>
                        <tr>
                          <td>
                            <span style="font-size:20px;color:#26B0CF"><?=$cashier['assigned_queue_num']?></span>
                          </td>
                          <td><center>
                            <?php
                            if($cashier['status'] == 0) {
                            ?>
                            <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                            <?php
                            } else if($cashier['status'] == 1) {

                              $counter = $this->main->get_counter($cashier['agent_id'],1);

                            ?>
                            <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                        $j++;
                        }
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <span> <i>Display limit (5)</i> </span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                    <h2>Registrar</h2>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th><span style="font-size:20px;color:#26B0CF">Queue No.</span></th>
                          <th><center><span style="font-size:20px;color:#26B0CF">Action</span></center></th>
                        </tr>
                      </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $j = 1;
                      foreach($data_registrars as $cashier) {

                        if($cashier['closed'] == 0 && $j <= 5) {
                        ?>
                        <tr>
                          <td>
                            <span style="font-size:20px;color:#26B0CF"><?=$cashier['assigned_queue_num']?></span>
                          </td>
                          <td><center>
                            <?php
                            if($cashier['status'] == 0) {
                            ?>
                            <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                            <?php
                            } else if($cashier['status'] == 1) {

                              $counter = $this->main->get_counter($cashier['agent_id'],2);

                            ?>
                            <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                        $j++;
                        }
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <span> <i>Display limit (5)</i> </span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div style="border-radius:20px;color:#26B0CF" class="white-box shadow-sm" >
                    <h2>Priority</h2>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th><span style="font-size:20px;color:#26B0CF">Queue No.</span></th>
                          <th><center><span style="font-size:20px;color:#26B0CF">Action</span></center></th>
                        </tr>
                      </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $j = 1;
                      foreach($data_priorities as $cashier) {

                        if($cashier['closed'] == 0 && $j <= 5 && $cashier['transaction_type'] == 1) {
                        ?>
                        <tr>
                          <td>
                            <span style="font-size:20px;color:#26B0CF"><?=$cashier['assigned_queue_num']?></span>
                          </td>
                          <td><center>
                            <?php
                            if($cashier['status'] == 0) {
                            ?>
                            <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                            <?php
                            } else if($cashier['status'] == 1) {

                              $counter = $this->main->get_counter($cashier['agent_id'],1);

                            ?>
                            <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                        $j++;
                        } else if($cashier['closed'] == 0 && $j <= 5 && $cashier['transaction_type'] == 2) {
                        ?>
                        <tr>
                          <td>
                            <span style="font-size:20px;color:#26B0CF">RP-<?php echo sprintf("%04d", $i)?></span>
                          </td>
                          <td><center>
                            <?php
                            if($cashier['status'] == 0) {
                            ?>
                            <span style="font-size:20px;color:#26B0CF">Waiting</span></center>
                            <?php
                            } else if($cashier['status'] == 1) {

                              $counter = $this->main->get_counter($cashier['agent_id'],2);

                            ?>
                            <span style="font-size:20px;color:#26B0CF">Go to Counter <?php echo $counter; ?></span></center>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                        $j++;
                        }
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <span> <i>Display limit (5)</i> </span>
                </div>
            </div>
        </div>

    </div>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() . "assets/new/"; ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>js/app-style-switcher.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() . "assets/new/"; ?>js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url() . "assets/new/"; ?>js/pages/dashboards/dashboard1.js"></script>
  </body>
</html>
