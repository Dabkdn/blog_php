<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if($title) {
      echo $title;
    }
    else {
      echo 'Blog App';
    }?></title>
    <meta name="description" content="softdevelopinc">
    <meta name="author" content="softdevelopinc@gmail.com">

    <!-- Le styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="media/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="media/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="media/bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="media/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="media/css/custom.css">

    <?php 
  global $enableOB;
	if($enableOB) {
		ob_start("html_helpers::_media"); 
		echo "CSSABOVE";
	}
	echo html_helpers::cssHeader();
	?>

        <script src="media/js/jquery.min.js"></script>
        <script src="media/bootstrap/js/bootstrap.min.js"></script>
</head>

<body role="document" cz-shortcut-listen="true">

    <!-- Fixed navbar -->
    <nav id="top-nav" class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id='home-btn' href="<?php echo html_helpers::url('/'); ?>">Home</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if( isset( $_SESSION['userName'] ) && $_SESSION['userRole'] == 1) { ?>
                      <li><a href="<?php echo html_helpers::url(array('ctl'=>'blogs')); ?>">Blog</a></li>
                    <?php } ?>
                    <?php
                      if( isset( $_SESSION['userName'] ) )
                      {
                    ?>
                    <li>
                    <a href="<?php echo html_helpers::url(array('ctl'=>'blogs', 'act'=>'add')); ?>" class="">Add Blog</a>
                    </li>
                    <li>
                        <a class="logout-btn" href="<?php echo html_helpers::url(
                          array('ctl'=>'login', 
                          'act'=>'logout')); ?>">Logout
                        </a>
                    </li>
                    <li><p style="color:#ffffff;line-height: 50px;margin: 0 0 0 10px;">welcome <?php echo $_SESSION['userName'];?></p></li>
                    <?php
                      }
                      else 
                      {
                    ?>
                    <li><a class="login-btn" href="<?php echo html_helpers::url(array('ctl'=>'login')); ?>">Login</a></li>
                    <li><a class="login-btn" href="<?php echo html_helpers::url(array('ctl'=>'register')); ?>">Register</a></li>
                    <?php
                      }
                    ?>
                            <!--li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li-->
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container theme-showcase" role="main">