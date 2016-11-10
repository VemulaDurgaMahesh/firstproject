<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00;}
</style>
<body>
<form action="" method="post">
<p>
		<div>
<ul class="drop_menu">
            
              <li><a href="view_company.php">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="company_excel.php" >Export</button></a>
              </li> 
              <li>                
              <a> <button name="" formaction="" >Print</button></a>
              </li> 
				  </ul>
				  </div>
</p>
<?php 
  $connect = mysql_connect ("localhost","root","") or die();
  mysql_select_db("hospital")or die(); 
$str="SELECT * from company";
$result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>HospitalName</td><td>HospitalCode</td><td>LocationCode</td><td>LocationName</td><td>LSTNumber</td><td>CSTNumber</td><td>PAN Number</td><td>VAT Number</td><td>Address1</td><td>Address2</td><td>Address3</td><td>PinCode</td><td>Created By</td><td>Created Date</td><td>Modify By</td><td>Modify Date</td><td>status</td></form></tr>";
     while($row = mysql_fetch_array($result)) 
     {
	echo "<tr><form action='company_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['hospname']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['hospcode']."'></td><td><input type='text' name='t3' id='t3' value='".$row['loccode']."'></td><td><input type='text' name='t4' id='t4' value='".$row['locname']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['lstnum']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['cstnum']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['pannum']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['vatnum']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['add1']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['add2']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['add3']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['pincode']."' readonly='readonly'></td>
  <td><input type='text' name='t14' id='t14' value='".$row['createdby']."' readonly='readonly'></td>
  <td><input type='text' name='t15' id='t15' value='".$row['createddate']."' readonly='readonly'></td>
  <td><input type='text' name='t16' id='t16' value='".$row['modifyby']."' readonly='readonly'></td>
  <td><input type='text' name='t17' id='t17' value='".$row['modifydate']."' readonly='readonly'></td>
  <td><input type='text' name='t13' id='t13' value='".$row['status']."' readonly='readonly'></td></form></tr>";
    }
echo "</table>";
?>  
</form>
</body>
</html>