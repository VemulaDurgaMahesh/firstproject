<?php
session_start();
$username=$_SESSION['username'];
$ad=$_SESSION['apc'];
if(!$_SESSION['username'])
{
   header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Welcome to HIMS </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
      <a href="logout.php" class="pull-right">Logout</a>
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Health Care Information Management Software</h1>
                        <h3></h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                        <?php
                             $connect = mysql_connect ("localhost","root","") or die();
                    mysql_select_db("hospital")or die();
                  $a=mysql_query("SELECT DISTINCT profile_module FROM profile WHERE profile_code='$ad'");
                  while($qy=mysql_fetch_array($a))
                  {
                  $gp = $qy['profile_module'];                    
                  if($gp == 'Masters') {?> 
                            <li>
                                <a  onClick=window.open("HIMS/index.php","demo","width=1500,height=768,left=150,top=200,toolbar=0,status=0,");  class="btn btn-default btn-lg"><i class="fa fa-heartbeat"></i>
                                 <span class="network-name">Masters</span></a>
                            </li>
                    <?php } else {} 
                    if($gp == 'Hospital') { ?>
                            <li>
                                <a href="#" class="btn btn-default btn-lg "><i class=""></i> <span class="network-name">Hospital</span></a>
                            </li>
                   <?php } else {} 
                    if($gp == 'Pharmacy') { ?>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class=""></i> <span class="network-name">Pharmacy</span></a>
                            </li>
                    <?php } else {} 
                    if($gp == 'Nursing') { ?>
                               <li>
                                <a href="#" class="btn btn-default btn-lg"><i class=""></i> <span class="network-name">Nursing</span></a>
                            </li>
                     <?php } else {} }; 
                     ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
