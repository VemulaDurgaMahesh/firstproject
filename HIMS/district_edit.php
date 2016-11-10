
<html>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
    var popup;
    function SelectName(selectedRow) {
      console.log(selectedRow);
      var location = "district_popup.php?rowID="+selectedRow;
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
              <a href="district_search.php">
                Search
              </a>
              </li>
                <li><a href="view_district.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>       	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> District Master </h2>
        </div><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:800px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">District Code: </label>
			<input type="text" name="wgc" value="<?php echo $_GET['t7']; ?>" readonly="readonly" style="width:185px; height:23px;">
			</p><BR><BR><p class="agreement">
			<label for="hcode">District Name:</label>
			<input type="text" name="wgn" value="<?php echo $_GET['t1']; ?>" style="width:185px; height:23px;">
			</p><BR><BR>
			<p class="agreement">
			<label for="hcode">State</label>
			<input type="text" name="stateName1" id="stateName1" readonly value="<?php echo $_GET['t2']; ?>" style="width:185px; height:23px;">
			<input type="text" name="stateCode1" id="stateCode1" readonly value="<?php echo $_GET['t11']; ?>" style="width:185px; height:23px;margin-left:+1px;"><button type="button" onclick="SelectName(1)" ><img src="search.png" /></button>
			</p>
			<p class="agreement">
			<label for="hcode">Country</label>
			<input type="text" name="countryName1" id="countryName1" readonly value="<?php echo $_GET['t9']; ?>" style="width:185px; height:23px;">
			<input type="text" name="countryCode1" id="countryCode1" readonly value="<?php echo $_GET['t10']; ?>" style="width:185px; height:23px;margin-left:+1px;">
			</p><BR><BR>
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
$val2=$_POST['wgn'];
$val3=$_POST['stateCode1'];
$cn=$_POST['countryCode1'];
$date = date("Y-m-d H:i:s");
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str=mysql_query("UPDATE district_master SET district_name='$val2', state_code='$val3',country_code='$cn', district_status='$val4', d_mby='$username', d_mdate='$date' WHERE district_code='$val1'");
if($str)
{
	?>
    <script>alert('Updated'); window.location.href='view_district.php';</script>                       
   <?php
}

else
{
	echo "Error: ";
}
}

?>