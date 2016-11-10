<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 

if(isset($_POST['submit']))
{
if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from users_masters WHERE user_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from users_masters");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>User Name</td>
	<td>User id</td>
	<td>User Group</td>	
	<td>Depatment Name</td>
	<td>Status</td>
	<td>Designation</td>
	<td>Profile Code</td>	
	<td>Group Code</td>
	<td>Profile Name</td>
	<td>Password Changed Date</td>
	<td>Password Changed Count</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['user_deptcode'];
    	$dep=mysql_query("SELECT * FROM department_master WHERE dept_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$y=$row['user_profilecode'];
    	$pro=mysql_query("SELECT * FROM profile WHERE profile_code='$y'");
    	$pro1=mysql_fetch_array($pro);
    	$z=$pro1['user_groupcode'];
    	$cat=mysql_query("SELECT * FROM user_groupmaster WHERE user_categorycode='$z'");    	
    	$cat1=mysql_fetch_array($cat);
    	$uid = $row['user_id'];
    	$count = mysql_query("SELECT COUNT(user_createdate) as ucont,max(user_createdate) FROM user_changepass WHERE user_id='$uid'");
    	$count1 = mysql_fetch_array($count);
    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['user_name'] ?></td>
	<td><?php  echo $row['user_id'] ?></td>
	<td><?php echo $cat1['user_categoryname'] ?></td>	
	<td><?php  echo $dep1['dept_name'] ?></td>
	<td><?php  echo $row['user_status'] ?></td>
	<td><?php  echo $row['user_designation'] ?></td>
	<td><?php  echo $row['user_profilecode'] ?></td>
	<td><?php  echo $pro1['user_groupcode'] ?></td>
	<td><?php  echo $pro1['profile_name'] ?></td>
	<td align='center'><?php  echo $count1['user_createdate'] ?></td>
	<td align='center'><?php  echo $count1['ucont'] ?></td>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from users_masters WHERE user_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from users_masters");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
<td>User Name</td>
	<td align="center">User id</td>
	<td align="center">User Group</td>	
	<td align="center">Depatment Name</td>
	<td align="center">Status</td>
	<td align="center">Designation</td>
	<td align="center">Profile Code</td>	
	<td align="center">Group Code</td>
	<td align="center">Profile Name</td>
	<td align="center">Password Changed Date</td>
	<td align="center">Password Changed Count</td>
	
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['user_deptcode'];
    	$dep=mysql_query("SELECT * FROM department_master WHERE dept_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$y=$row['user_profilecode'];
    	$pro=mysql_query("SELECT * FROM profile WHERE profile_code='$y'");
    	$pro1=mysql_fetch_array($pro);
    	$z=$pro1['user_groupcode'];
    	$cat=mysql_query("SELECT * FROM user_groupmaster WHERE user_categorycode='$z'");
    	$cat1=mysql_fetch_array($cat);
    	$uid = $row['user_id'];
    	$count = mysql_query("SELECT COUNT(user_createdate) as ucont,max(user_createdate) FROM user_changepass WHERE user_id='$uid'");
    	$count1 = mysql_fetch_array($count);
    	
    	
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['user_name'].'</td>		
		<td> '.$row['user_id'].'</td>
		<td> '.$cat1['user_categoryname'].'</td>
		<td> '.$dep1['dept_name'].'</td>
		<td> '.$row['user_status'].'</td>
		<td> '.$row['user_designation'].'</td>		
		<td> '.$row['user_profilecode'].'</td>
		<td> '.$pro1['user_groupcode'].'</td>
		<td> '.$pro1['profile_name'].'</td>
		<td align="center"> '.$count1['user_createdate'].'</td>
		<td  align="center"> '.$count1['ucont'].'</td></tr>';		

		
		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=users.xls");
			echo $output;
}

elseif(isset($_POST['print']))
{
?>
<html>
<head>
<meta charset="UTF-8">
        <title>Doctor | Suraksha Hospital</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row no-print">
 <div class="col-xs-12">
 <button class="btn btn-primary-small"  onclick="window.print();"><i class="fa fa-print"></i> Print</button>
 </div>
 </div>
 <br>
 <?php
if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from users_masters WHERE user_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from users_masters");
}
echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td align='center'>S.no</td>
	<td align='center'>User Name</td>
	<td align='center'>User id</td>
	<td align='center'>User Group</td>	
	<td align='center'>Depatment Name</td>
	<td align='center'>Status</td>
	<td align='center'>Designation</td>
	<td align='center'>Profile Code</td>	
	<td align='center'>Group Code</td>
	<td align='center'>Profile Name</td>
	<td align='center'>Password Changed Date</td>
	<td align='center'>Password Changed Count</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['user_deptcode'];
    	$dep=mysql_query("SELECT * FROM department_master WHERE dept_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$y=$row['user_profilecode'];
    	$pro=mysql_query("SELECT * FROM profile WHERE profile_code='$y'");
    	$pro1=mysql_fetch_array($pro);
    	$z=$pro1['user_groupcode'];
    	$cat=mysql_query("SELECT * FROM user_groupmaster WHERE user_categorycode='$z'");
    	$cat1=mysql_fetch_array($cat);
    	$uid = $row['user_id'];
    	$count = mysql_query("SELECT COUNT(user_createdate) as ucont,max(user_createdate) FROM user_changepass WHERE user_id='$uid'");
    	$count1 = mysql_fetch_array($count);
    	?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td><?php  echo $row['user_name'] ?></td>
	<td><?php  echo $row['user_id'] ?></td>
	<td><?php echo $cat1['user_categoryname'] ?></td>	
	<td><?php  echo $dep1['dept_name'] ?></td>
	<td><?php  echo $row['user_status'] ?></td>
	<td><?php  echo $row['user_designation'] ?></td>
	<td><?php  echo $row['user_profilecode'] ?></td>
	<td><?php  echo $pro1['user_groupcode'] ?></td>
	<td><?php  echo $pro1['profile_name'] ?></td>
	<td align='center'><?php  echo $count1['user_createdate'] ?></td>
	<td align='center'><?php  echo $count1['ucont'] ?></td>
	</tr>
<?php
}
echo "</table>";
echo "</center>";
?>
</body>
</html>
<?php
}
?>
</body>
</html>
