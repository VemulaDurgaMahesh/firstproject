<html>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
    var popup;
    function SelectName(selectedRow) {
      console.log(selectedRow);
      var location = "area_popup.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300,scrollbars=1");
        popup.focus();
        return false
    }
</script>
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
		<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="area_search.php">
                Search
              </a>
              </li>
                <li><a href="view_area.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>       	
			
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> Area Master </h2>
        </div><BR><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:850px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Area Code: </label>
			<input type="text" name="wgc" value="<?php echo $_GET['t7']; ?>" readonly style="width:190px; height:23px;">
			</p><BR><BR>
      <p class="agreement">
      <label for="titlename"> Area Name</label>
      <input type="text" class="form-control" name="aname" value="<?php echo $_GET['t1']; ?>" style="width:190px; height:23px;">        
      </p><BR><BR>
      <p class="agreement">
       <label for="titlename"> City Name</label>
        <input type="text"  name="cname" id="city1" value="<?php echo $_GET['t16']; ?>" readonly style="width:190px; height:23px;">   
        <input type="text"  name="ccode" id="cit1" value="<?php echo $_GET['t17']; ?>" readonly style="width:185px; height:23px;margin-left:+1px;">                  
       <input type="number" name="pincode" id="pincode1" value="<?php echo $_GET['t13']; ?>" readonly style="width:185px; height:23px;margin-left:+1px;">
       <button type="button" onclick="SelectName(1)" ><img src="search.png" /></button>
       </p>
       <p class="agreement">
       <label for="titlename"> District Name</label>
        <input type="text" name="dn" id="distname1" readonly value="<?php echo $_GET['t12']; ?>" style="width:190px; height:23px;"/>
        <input type="text" name="dc" id="distcode1" readonly value="<?php echo $_GET['t14']; ?>" style="width:185px; height:23px;margin-left:+1px;"/>
        </p><BR><BR>
       <p class="agreement">
      <label for="titlename"> State Name</label>
        <input type="text" name="sn" id="stateName1" readonly value="<?php echo $_GET['t2']; ?>" style="width:190px; height:23px;"/>
        <input type="text" name="sc" id="stateCode1" readonly value="<?php echo $_GET['t11']; ?>" style="width:185px; height:23px;margin-left:+1px;"/>
       </p>   <BR><BR>
        <p class="agreement">
       <label for="titlename"> Country Name</label>
      <input type="text" name="cn" id="countryName1" readonly value="<?php echo $_GET['t9']; ?>"  style="width:190px; height:23px;"/>
       <input type="text" name="cc" id="countryCode1" readonly value="<?php echo $_GET['t10']; ?>" style="width:185px; height:23px;margin-left:+1px;"/>
       </p> <BR><BR>
			<p class="agreement">
			<?php if($_GET['t15']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
		</div></p>
	</div>
	</form>
</body>
</html>
<?php
$connect = mysql_connect ("localhost","root","") or die();
mysql_select_db("hospital")or die();
if(isset($_POST['submit']))
{
$val1=$_GET['t7'];
$cityname=$_POST['aname'];
$ccode=$_POST['ccode'];
$sc=$_POST['sc'];
$cn=$_POST['cc'];
$dn=$_POST['dc'];
$date = date("Y-m-d H:i:s");
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str=mysql_query("UPDATE area_master SET area_name='$cityname',city_code='$ccode', district_code='$dn',state_code='$sc',country_code='$cn', area_status='$val4', area_modifyby='$username', area_modifydate=now() WHERE area_code='$val1'");
if($str)
{
	?>
   <script>alert('Updated');window.location.href='view_area.php';</script>                       
  <?php
}

else
{
	echo "Error: ";
}
}

?>