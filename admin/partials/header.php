
<?php
  $script_name =  preg_replace('/\.php$/', '', basename($_SERVER['PHP_SELF']));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | <?php echo $script_name; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin-app.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Thincms</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if($script_name == "categories" )  echo 'active';?>"><a href="categories.php">
               <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Categories</a>
             </li>
            <li class="<?php if($script_name == "posts" )  echo 'active';?>"><a href="posts.php">
              <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Posts</a>
            </li>
            <li class="<?php if($script_name == "media" )  echo 'active';?>"><a href="media.php"> 
              <span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Mdeia</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;
                        <strong>Firstname</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>Firstname Surname</strong></p>
                                        <p class="text-left small">correoElectronico@email.com</p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">
                                              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Account Settings
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="#" class="btn btn-danger btn-block">
                                              <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
