<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="newregistration_excel.php" method="post">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="newregistration_search.php">
                Search
              </a>
              </li>
                <li><a href="newregistration_table.php">View</a></li>
                <li>
                  <button name="export_excel">Export</button>
                  </li>
				  </ul>
				  </div>
</p>                	
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$str="select * from new_registration";
$result=$conn->query($str);
echo "<table border='1'>";
	echo "<tr><td>EDIT</td><td>umr_no</td><td>reg_no</td><td>image</td><td>title</td><td>p_firstname</td><td>p_middlename</td><td>p_lastname</td><td>p_dob</td><td>p_age</td><td>p_gender</td><td>p_maritalstatus</td><td>p_father</td><td</td><td>p_mother</td><td>p_religion</td><td>p_nationality</td><td>p_passportno</td><td>p_bloodgroup</td><td>p_type</td><td>p_code</td><td>p_name</td><td>p_occupation</td><td>p_consultcode</td><td>p_consultantname</td><td>p_consultantdept</td><td>p_referaltype</td><td>p_referalcode</td><td>p_referalname</td><td>p_referaldept</td><td>p_address</td><td>p_citycode</td><td>p_cityname</td><td>p_statecode</td><td>p_statename</td><td>p_countrycode</td><td>p_countryname</td><td>p_zip</td><td>p_phone</td><td>p_mobile</td><td>p_fax</td><td>p_email</td><td>p_regfee</td><td>p_receiptno</td><td>p_concession</td><td>p_vailidity</td><td>p_concauthcode</td><td>p_concauthname</td><td>p_receiptmode</td><td>p_amount</td><td>p_chequeno</td><td>p_chequedate</td><td>p_bankcode</td><td>p_bankname</td><td>p_remarks</td><td>p_questionary</td><td>p_createby</td><td>p_createdate</td><td>  p_modifyby</td><td>p_modifydate</td><td>p_status</td><td>p_deletestatus</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='newregistration_edit.php' method='get'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['umr_no']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['reg_no']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['image']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['title']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['p_firstname']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['p_middlename']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['p_lastname']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['p_dob']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['p_age']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['p_gender']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['p_maritalstatus']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['p_father']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['p_mother']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['p_religion']."' readonly='readonly'></td><td><input type='text' name='t15' id='t15' value='".$row['p_nationality']."' readonly='readonly'></td><td><input type='text' name='t16' id='t16' value='".$row['p_passportno']."' readonly='readonly'></td><td><input type='text' name='t17' id='t17' value='".$row['p_bloodgroup']."' readonly='readonly'></td><td><input type='text' name='t18' id='t18' value='".$row['p_type']."' readonly='readonly'></td><td><input type='text' name='t19' id='t19' value='".$row['p_code']."' readonly='readonly'></td><td><input type='text' name='t20' id='t20' value='".$row['p_name']."' readonly='readonly'></td><td><input type='text' name='t21' id='t21' value='".$row['p_occupation']."' readonly='readonly'></td><td><input type='text' name='t22' id='t22' value='".$row['p_consultcode']."' readonly='readonly'></td><td><input type='text' name='t23' id='t23' value='".$row['p_consultantname']."' readonly='readonly'></td><td><input type='text' name='t24' id='t24' value='".$row['p_consultantdept']."' readonly='readonly'></td><td><input type='text' name='t25' id='t25' value='".$row['p_referaltype']."' readonly='readonly'></td><td><input type='text' name='t26' id='t26' value='".$row['p_referalcode']."' readonly='readonly'></td><td><input type='text' name='t27' id='t27' value='".$row['p_referalname']."' readonly='readonly'></td><td><input type='text' name='t28' id='t28' value='".$row['p_referaldept']."' readonly='readonly'></td><td><input type='text' name='t29' id='t29' value='".$row['p_address']."' readonly='readonly'></td><td><input type='text' name='t30' id='t30' value='".$row['p_citycode']."' readonly='readonly'></td><td><input type='text' name='t31' id='t31' value='".$row['p_cityname']."' readonly='readonly'></td><td><input type='text' name='t32' id='t32' value='".$row['p_statecode']."' readonly='readonly'></td><td><input type='text' name='t33' id='t33' value='".$row['p_statename']."' readonly='readonly'></td><td><input type='text' name='t34' id='t34' value='".$row['p_countrycode']."' readonly='readonly'></td><td><input type='text' name='t35' id='t35' value='".$row['p_countryname']."' readonly='readonly'></td><td><input type='text' name='t36' id='t36' value='".$row['p_zip']."' readonly='readonly'></td><td><input type='text' name='t38' id='t38' value='".$row['p_phone']."' readonly='readonly'></td><td><input type='text' name='t39' id='t39' value='".$row['p_mobile']."' readonly='readonly'></td><td><input type='text' name='t40' id='t40' value='".$row['p_fax']."' readonly='readonly'></td><td><input type='text' name='t41' id='t41' value='".$row['p_email']."' readonly='readonly'></td><td><input type='text' name='t42' id='t42' value='".$row['p_regfee']."' readonly='readonly'></td><td><input type='text' name='t43' id='t43' value='".$row['p_receiptno']."' readonly='readonly'></td><td><input type='text' name='t44' id='t44' value='".$row['p_concession']."' readonly='readonly'></td><td><input type='text' name='t45' id='t45' value='".$row['p_vailidity']."' readonly='readonly'></td><td><input type='text' name='t46' id='t46' value='".$row['p_concauthcode']."' readonly='readonly'></td><td><input type='text' name='t47' id='t47' value='".$row['p_concauthname']."' readonly='readonly'></td><td><input type='text' name='t48' id='t48' value='".$row['p_receiptmode']."' readonly='readonly'></td><td><input type='text' name='t49' id='t49' value='".$row['p_amount']."' readonly='readonly'></td><td><input type='text' name='t50' id='t50' value='".$row['p_chequeno']."' readonly='readonly'></td><td><input type='text' name='t51' id='t51' value='".$row['p_chequedate']."' readonly='readonly'></td><td><input type='text' name='t53' id='t53' value='".$row['p_bankcode']."' readonly='readonly'></td><td><input type='text' name='t54' id='t54' value='".$row['p_bankname']."' readonly='readonly'></td><td><input type='text' name='t55' id='t55' value='".$row['p_remarks']."' readonly='readonly'></td><td><input type='text' name='t56' id='t56' value='".$row['p_questionary']."' readonly='readonly'></td><td><input type='text' name='t57' id='t57' value='".$row['p_createby']."' readonly='readonly'></td><td><input type='text' name='t58' id='t58' value='".$row['p_createdate']."' readonly='readonly'></td><td><input type='text' name='t59' id='t59' value='".$row['p_modifyby']."' readonly='readonly'></td><td><input type='text' name='t60' id='t60' value='".$row['p_modifydate']."' readonly='readonly'></td><td><input type='text' name='t61' id='t61' value='".$row['p_status']."' readonly='readonly'></td><td><input type='text' name='t62' id='t62' value='".$row['p_deletestatus']."' readonly='readonly'></td>
</form></tr>";
}
echo "</table>";
?>  
</form>
</body>
</html>