<html>
<body>
<form action="#" method="post">
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
$str="select * from employee";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>EMP_CAT</td><td>EMP_DOB</td><td>EMP_DOJ</td><td>EMP_WOD</td><td>EMP_ESHIFT</td><td>EMP_ENAME</td><td>EMP_ECODE</td><td>EMP_ETYPE</td><td>EMP_GEN</td><td>EMP_QUALI</td><td>EMP_CARE</td><td>EMP_DEPT</td><td>EMP_DESIG</td><td>EMP_PFNO</td><td>EMP_LEGNO</td><td>EMP_PMODE</td><td>EMP_ACCNO</td><td>EMP_ESTATUS</td><td>EMP_PERMD</td><td>EMP_RESD</td><td>EMP_BGROUP</td><td>EMP_DEDUC</td><td>EMP_REG</td><td>EMP_PANNO</td><td>EMP_ADDR</td><td>EMP_CITY</td><td>EMP_STATE</td><td>EMP_COUNTRY</td><td>EMP_PIN</td><td>EMP_MOB</td><td>EMP_CPERSON</td><td>EMP_EMAIL</td><td>EMP_GROSS</td><td>EMP_BASIC</td><td>EMP_DA</td><td>EMP_HRA</td><td>EMP_CON</td><td>EMP_WASH</td><td>EMP_MED</td><td>EMP_CITYINC</td><td>EMP_CCA</td><td>EMP_OTHSPEC</td><td>EMP_LTA</td><td>EMP_PFS</td><td>EMP_PTAX</td><td>EMP_PF</td><td>EMP_PFE</td><td>EMP_OTHE</td><td>EMP_ESIDED</td><td>EMP_ESIEMP</td><td>EMP_HOSTEL</td><td>EMP_TDS</td><td>EMP_VOLUN</td><td>EMP_CREATEDBY</td><td>EMP_CREATEDTIME</td><td>EMP_MODIFIEDBY</td><td>EMP_MODIFIEDTIME</td><td>EMP_STATUS</td><td>EDIT</td><td>DELETE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='#' method='post'><td><input type='text' name='t1' id='t1' value='".$row['emp_cat']."' ></td><td><input type='text' name='t2' id='t2' value='".$row['emp_dob']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['emp_doj']."' ></td><td><input type='text' name='t4' id='t4' value='".$row['emp_wod']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['emp_eshift']."' ></td><td><input type='text' name='t6' id='t6' value='".$row['emp_ename']."' ></td><td><input type='text' name='t7' id='t7' value='".$row['emp_ecode']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['emp_etype']."' ></td><td><input type='text' name='t9' id='t9' value='".$row['emp_gen']."' ></td><td><input type='text' name='t10' id='t10' value='".$row['emp_quali']."' ></td><td><input type='text' name='t11' id='t11' value='".$row['emp_care']."' ></td><td><input type='text' name='t12' id='t12' value='".$row['emp_dept']."' ></td><td><input type='text' name='t13' id='t13' value='".$row['emp_desig']."' ></td><td><input type='text' name='t14' id='t14' value='".$row['emp_pfno']."' ></td><td><input type='text' name='t15' id='t15' value='".$row['emp_legno']."' ></td><td><input type='text' name='t16' id='t16' value='".$row['emp_pmode']."' ></td><td><input type='text' name='t17' id='t17' value='".$row['emp_accno']."' ></td><td><input type='text' name='t18' id='t18' value='".$row['emp_estatus']."' ></td><td><input type='text' name='t19' id='t19' value='".$row['emp_permd']."' ></td><td><input type='text' name='t20' id='t20' value='".$row['emp_resd']."' ></td><td><input type='text' name='t21' id='t21' value='".$row['emp_bgroup']."' ></td><td><input type='text' name='t22' id='t22' value='".$row['emp_deduc']."' ></td><td><input type='text' name='t23' id='t23' value='".$row['emp_reg']."' ></td><td><input type='text' name='t24' id='t24' value='".$row['emp_panno']."' ></td><td><input type='text' name='t25' id='t25' value='".$row['emp_addr']."' ></td><td><input type='text' name='t26' id='t26' value='".$row['emp_city']."' ></td><td><input type='text' name='t27' id='t27' value='".$row['emp_state']."' ></td><td><input type='text' name='t28' id='t28' value='".$row['emp_country']."' ></td><td><input type='text' name='t29' id='t29' value='".$row['emp_pin']."' ></td><td><input type='text' name='t30' id='t30' value='".$row['emp_mob']."' ></td><td><input type='text' name='t31' id='t31' value='".$row['emp_cperson']."' ></td><td><input type='text' name='t32' id='t32' value='".$row['emp_email']."' ></td><td><input type='text' name='t33' id='t33' value='".$row['emp_gross']."' ></td><td><input type='text' name='t34' id='t34' value='".$row['emp_basic']."' ></td><td><input type='text' name='t35' id='t35' value='".$row['emp_da']."' ></td><td><input type='text' name='t36' id='t36' value='".$row['emp_hra']."' ></td><td><input type='text' name='t37' id='t37' value='".$row['emp_con']."' ></td><td><input type='text' name='t38' id='t38' value='".$row['emp_wash']."' ></td><td><input type='text' name='t39' id='t39' value='".$row['emp_med']."' ></td><td><input type='text' name='t40' id='t40' value='".$row['emp_cityinc']."' ></td><td><input type='text' name='t41' id='t41' value='".$row['emp_cca']."' ></td><td><input type='text' name='t42' id='t42' value='".$row['emp_othspec']."' ></td><td><input type='text' name='t43' id='t43' value='".$row['emp_lta']."' ></td><td><input type='text' name='t44' id='t44' value='".$row['emp_pfs']."' ></td><td><input type='text' name='t45' id='t45' value='".$row['emp_ptax']."' ></td><td><input type='text' name='t46' id='t46' value='".$row['emp_pf']."' ></td><td><input type='text' name='t47' id='t47' value='".$row['emp_pfe']."' ></td><td><input type='text' name='t48' id='t48' value='".$row['emp_othe']."' ></td><td><input type='text' name='t49' id='t49' value='".$row['emp_esided']."' ></td><td><input type='text' name='t50' id='t50' value='".$row['emp_esiemp']."' ></td><td><input type='text' name='t51' id='t51' value='".$row['emp_hostel']."' ></td><td><input type='text' name='t52' id='t52' value='".$row['emp_tds']."' ></td><td><input type='text' name='t53' id='t53' value='".$row['emp_volun']."' ></td><td><input type='text' name='t54' id='t54' value='".$row['emp_createdby']."' ></td><td><input type='text' name='t55' id='t55' value='".$row['emp_createdtime']."' ></td><td><input type='text' name='t56' id='t56' value='".$row['emp_modifiedby']."' ></td><td><input type='text' name='t57' id='t57' value='".$row['emp_modifiedtime']."' ></td><td><input type='text' name='t58' id='t58' value='".$row['emp_status']."' ></td><td><input type='submit' name='edit' value='edit'></td><td><input type='submit' name='del' value='delete'></td></form></tr>";
}
echo "</table>";
?>  
</form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=1;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['edit']))
{
	$str="UPDATE employee SET emp_cat='".$_POST['t1']."',emp_dob='".$_POST['t2']."',emp_doj='".$_POST['t3']."',emp_wod='".$_POST['t4']."',emp_eshift='".$_POST['t5']."',emp_ename='".$_POST['t6']."',emp_etype='".$_POST['t8']."',emp_gen='".$_POST['t9']."',emp_quali='".$_POST['t10']."',emp_care='".$_POST['t11']."',emp_dept='".$_POST['t12']."',emp_desig='".$_POST['t13']."',emp_pfno='".$_POST['t14']."',emp_legno='".$_POST['t15']."',emp_pmode='".$_POST['t16']."',emp_accno='".$_POST['t17']."',emp_estatus='".$_POST['t18']."',emp_permd='".$_POST['t19']."',emp_resd='".$_POST['t20']."',emp_bgroup='".$_POST['t21']."',emp_deduc='".$_POST['t22']."',emp_reg='".$_POST['t23']."',emp_panno='".$_POST['t24']."',emp_addr='".$_POST['t25']."',emp_city='".$_POST['t26']."',emp_state='".$_POST['t27']."',emp_country='".$_POST['t28']."',emp_pin='".$_POST['t29']."',emp_mob='".$_POST['t30']."',emp_cperson='".$_POST['t31']."',emp_email='".$_POST['t32']."',emp_gross='".$_POST['t33']."',emp_basic='".$_POST['t34']."',emp_da='".$_POST['t35']."',emp_hra='".$_POST['t36']."',emp_con='".$_POST['t37']."',emp_wash='".$_POST['t38']."',emp_med='".$_POST['t39']."',emp_cityinc='".$_POST['t40']."',emp_cca='".$_POST['t41']."',emp_othspec='".$_POST['t42']."',emp_lta='".$_POST['t43']."',emp_pfs='".$_POST['t44']."',emp_ptax='".$_POST['t45']."',emp_pf='".$_POST['t46']."',emp_pfe='".$_POST['t47']."',emp_othe='".$_POST['t48']."',emp_esided='".$_POST['t49']."',emp_esiemp='".$_POST['t50']."',emp_hostel='".$_POST['t51']."',emp_tds='".$_POST['t52']."',emp_volun='".$_POST['t53']."',emp_modifiedby='".$_SESSION['userid']."',emp_modifiedtime='".$_POST['t57']."',emp_status='".$_POST['t58']."' WHERE emp_ecode='".$_POST['t7']."'";
	$result=$conn->query($str);
	//header("location:doctortable.php");
		
}
if(isset($_POST['del']))
{
	$str="DELETE FROM employee WHERE emp_ecode='".$_POST['t7']."'";
	$result=$conn->query($str);
	//header("location:doctortable.php");
	
}
}
?>