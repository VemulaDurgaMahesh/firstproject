<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<p>
	<ul class="drop_menu">
               <li>
              <a href="testformattable_search.php">
                Search
              </a>
              </li>
                <li><a href="testformat_view.php">View</a></li>                
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
$str="select * from testformat_master where TF_FormatCode='".$_GET['t6']."' OR TF_FormatName like '%".$_GET['t7']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
   echo"<tr><td>Edit</td><td>Test Format ID</td><td>Main Group Code</td><td>MAIN GROUP NAME</td><td>Test Code</td><td>Test Name</td><td>Test Format Code</td><td>Test Format name</td><td>Lab Equipment name</td><td>Report Name</td><td>Gender</td><td>Gender Specific</td><td>Default Format</td><td>Sample Needed</td><td>Growth</td><td>Specimen</td><td>Col Cap1</td><td>Col Cap2</td><td>Col Cap3</td><td>Col Cap4</td><td>Min Time</td><td>Max Time</td><td>Accreditation Needed</td><td>Clinical History</td><td>No Normal Ranges</td><td>Template Needed</td><td>Multiple Organisms Needed</td><td>Auto Verification Required</td><td>Auto Approval Required</td><td>Result Values Analysis</td><td>ParameterName</td><td>ParameterDesc</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED TIME</td></tr>";
   while($row = $result->fetch_assoc()) {
	   echo "<tr><form action='testformat_edit.php' method='get'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['TF_ID']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['TF_MainGroupCode']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['TF_MainGroupName']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['TF_TestCode']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['TF_TestName']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['TF_FormatCode']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['TF_FormatName']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['TF_LabeqName']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['TF_ReportTitle']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['TF_Gender']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['TF_GenderSpecific']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['TF_DefaultFormat']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['TF_SampleNeeded']."' readonly='readonly'></td><td><input type='text' name='t15' id='t15' value='".$row['TF_Growth']."' readonly='readonly'></td><td><input type='text' name='t16' id='t16' value='".$row['TF_Specimen']."' readonly='readonly'></td><td><input type='text' name='t17' id='t17' value='".$row['TF_Cap1']."' readonly='readonly'></td><td><input type='text' name='t18' id='t18' value='".$row['TF_Cap2']."' readonly='readonly'></td><td><input type='text' name='t19' id='t19' value='".$row['TF_Cap3']."' readonly='readonly'></td><td><input type='text' name='t20' id='t20' value='".$row['TF_Cap4']."' readonly='readonly'></td><td><input type='text' name='t21' id='t21' value='".$row['TF_Mintime']."' readonly='readonly'></td><td><input type='text' name='t22' id='t22' value='".$row['TF_Maxtime']."' readonly='readonly'></td><td><input type='text' name='t23' id='t23' value='".$row['TF_Accreditation']."' readonly='readonly'></td><td><input type='text' name='t24' id='t24' value='".$row['TF_ClinicalHistory']."' readonly='readonly'></td><td><input type='text' name='t25' id='t25' value='".$row['TF_NormalRanges']."' readonly='readonly'></td><td><input type='text' name='t26' id='t26' value='".$row['TF_TemplateNeeded']."' readonly='readonly'></td><td><input type='text' name='t27' id='t27' value='".$row['TF_MultiOrganisms']."' readonly='readonly'></td><td><input type='text' name='t28' id='t28' value='".$row['TF_AutoVerification']."' readonly='readonly'></td><td><input type='text' name='t29' id='t29' value='".$row['TF_AutoApproval']."' readonly='readonly'></td><td><input type='text' name='t30' id='t30' value='".$row['TF_ResultValueAlignment']."' readonly='readonly'></td><td><input type='text' name='t33' id='t33' value='".$row['TF_status']."' readonly='readonly'></td><td><input type='text' name='t34' id='t34' value='".$row['TF_deletestatus']."' readonly='readonly'></td><td><input type='text' name='t35' id='t35' value='".$row['TF_createdby']."' readonly='readonly'><td><input type='text' name='t36' id='t36' value='".$row['TF_createddate']."' readonly='readonly'></td><td><input type='text' name='t37' id='t37' value='".$row['TF_modifyby']."' readonly='readonly'></td><td><input type='text' name='t38' id='t38' value='".$row['TF_modifydate']."' readonly='readonly'></td></form></tr>";
  
   }
   echo"</table>"  
?>  
</body>
</html>