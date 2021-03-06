<?php
$this->userObject = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MVC Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="<?php echo BASE_URL?>views/css/bootstrap.min.css" rel="stylesheet">
    <?php
    if($this->userObject->isAdmin()){
        echo'<link href="'.BASE_URL.'views/css/admin.css" rel="stylesheet">';
    }
    ?>
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="<?php echo BASE_URL?>views/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo BASE_URL?>views/css/custom.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo BASE_URL?>">MVC Pro</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="<?php echo BASE_URL?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL?>blog/">Blog</a></li>
                    <li><a href="<?php echo BASE_URL?>members">Members</a></li>
                    <li><a href="<?php echo BASE_URL?>weather">Weather</a></li>
                </ul>
                <?php
                if(isset($_SESSION["uID"])){
                    echo '<ul class="nav" style="float:right; margin: 0 -10px 0 0;"><li class="nav" >';
                if($this->userObject->isAdmin()) {
                    echo ' <a class="dropdown-toggle" data-toggle="dropdown" href="#"> [ADMIN] ' . $this->userObject->getUserName();
                }
                else{
                    echo ' <a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $this->userObject->getUserName();

                }
                                   echo ' <span class="caret"></span></a>
                                        <ul class="dropdown-menu">';
                                        if($this->userObject->isAdmin()){
                                            echo '<li><a href="'.BASE_URL.'manageposts">Post Manager</a></li>';
                                            echo '<li><a href="'.BASE_URL.'managecats">Category Manager</a></li>';
                                        }
                                        echo '<li><a href="'.BASE_URL.'login/logout">Logout</a></li>';
                                        echo '</ul>
                              </li></ul>';
                }
                else{
                    echo '<ul class="nav" style="float:right; margin: 0 -10px 0 0;">';
                        echo '<li><a href="'.BASE_URL.'login/">Login</a></li>';
                        echo'<li><a href="'.BASE_URL.'register/newuser">Register</a></li>';
                    echo '</ul>';
                }

                ?>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>