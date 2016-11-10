<?php
session_start();//session starts here
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> E-Chit </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>
</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        

        <div id="wrapper">
            <div id="login" >
                <section class="login_content">
                    <form role="form" method="post" action="login.php">
                        <h1>Login Form</h1>
                        <div>
                            <input autocomplete="off" type="text" name="username"  placeholder="Username" required="" />
                        </div>
                        <div>
                            <input autocomplete="off" type="password" name="password"  placeholder="Password" required="" />
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="login" name="login" >
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>
<?php  //Start the Session

$connect = mysql_connect ("localhost","root","") or die();
mysql_select_db("hospital")or die();

//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `users_masters` WHERE user_id='$username' and user_password='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
$pc=mysql_fetch_array($result);
$_SESSION['apc']=$pc['user_profilecode'];
$ad=$_SESSION['apc'];
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1)
{

$_SESSION['username'] = $username;
}else{?>

<div class="alert alert-warning">
  <strong>Error!</strong> Invalid user name password.
</div>
<?php 
}
}
//3.1.4 if the user is logged in Greets the user with messages
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
  if($username)
    {

        echo "<script>window.open('index.php','_self')</script>";

        $_SESSION['username']=$username;//here session is used and value of $username stores in $_SESSION.

    }
 
}else{}
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<?php
    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
 ?>
    
