<?php
session_start();
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> New Registration </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script language="javascript">
var popupWindow = null;
function positionedPopup(url,winName,w,h,t,l,scroll){
settings =
'height='+h+',width='+w+',top='+t+',left='+l+',scrollbars='+scroll+',resizable'
popupWindow = window.close(url,winName,settings)
}
</script>
</head>

<body>
	<form action="new_registration.php" method="post" class="register">
	<div class="image">
						<h2> New Registration </h2>
              <img src="images/4.jpg" width="100%" height="100px"/>
				</div>
				<br>
				<br>
				<br>
				<p>	
			<fieldset>
			<label>Occup:</label>
			<input type="text" name="ocpn" value="<?php echo $_GET['t2']; ?>">
			</fieldset>
			</p>
	</form>
	<a href="new_registration.php" onclick="positionedPopup(this.href,'myWindow','700','300','100','200','yes');return false"><img src="x.png"></a>
</body>
</html>