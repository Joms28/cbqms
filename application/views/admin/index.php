<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url() . "assets/css/bootstrap.min.css"; ?>" />
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
        <li class="active">DASHBOARD</li>
      </ol>
      <div class="col-md-9 col-md-push-3">

      </div>
      <div class="col-md-3 col-md-pull-9">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" class="active"><a href="<?php echo base_url() . "cms"; ?>">DASHBOARD</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/subject"; ?>">SUBJECT MANAGEMENT</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/class"; ?>">CLASS MANAGEMENT</a></li>
          <li role="presentation"><a href="<?php echo base_url() . "cms/user"; ?>">USER MANAGEMENT</a></li>
        </ul>
      </div>
    </div>
  </div>

</body>

</html>
