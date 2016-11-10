<html>
  <head>
  <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
  </head>
  <body>
  <?php include('menu.php'); ?>
<form action="#" method="post">
<p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="country_search.php">
                Search
              </a>
              </li>
                <li><a href="view_country.php">View</a></li>
                <li>
                  <button class="button" name="ed" type="submit">Save</button></li>
          </ul>
          </div>
</p>
<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Country Master </h2>
        </div>
                  <h3> Country Details</h3>
                  <br><br><br><br><br><br><br><br><br><br>
                  <div style="width:600px;margin:0 auto;">
<p>
		<label for="titlecode"> Country Code</label>
     <input type='text' name='t7' value="<?php echo $_GET['t7']?>" disabled style="width:185px; height:23px;"> 
 </p><br><br>
 <p>
 	<label for="titlename"> Country Name</label>
	<input type='text' name='t1' value="<?Php echo $_GET['t1'] ?>"  style="width:185px; height:23px;">
</p><br><br>
<p class="agreement">
			<?php if($_GET['t5']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
</p></div>
</form>

<?php
$x = $_GET['t7'];
$date = date("Y-m-d H:i:s");
if(isset($_POST['ed']))
{
$tname = $_POST['t1'];
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$connect = mysql_connect ("localhost","root","") or die();
                      mysql_select_db("hospital")or die();
$query = mysql_query("UPDATE country_master SET country_name='$tname', country_status='$val4' ,country_modifyby='$username', country_modifydate='$date' WHERE country_code='$x'");
if($query)
{
	?>
    <script>alert('Updated');window.location.href='view_country.php';</script>                       
   <?php
}

}
?>
</body>
</html>