<?php
 $connection = mysql_connect('localhost', 'root', '');
    if (!$connection)
      {
       die("Database Connection Failed" . mysql_error());
         }
         $select_db = mysql_select_db('hospital');
       if (!$select_db)
       {
          die("Database Selection Failed" . mysql_error());
       }
$output = '';
if(isset($_POST["export_excel"]))
{
	$count = 1;
	$sql = "SELECT * FROM employee";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
<td>EMPLOYEE CATEGORY</td>
<td>EMPLOYEE DATE OF BIRTH</td>
<td>EMPLOYEE DATE OF JOINING</td>
<td>EMPLOYEE WEEK OF DAY</td>
<td>EMPLOYEE SHIFT</td>
<td>EMPLOYEE NAME</td>
<td>EMPLOYEE CODE</td>
<td>EMPLOYEE TYPE</td>
<td>EMPLOYEE GENDER</td>
<td>EMPLOYEE QUALIFICATION</td>
<td>EMPLOYEE CARE OF</td>
<td>EMPLOYEE DEPARTMENT</td>
<td>EMPLOYEE DESIGNATION </td>
<td>EMPLOYEE PF NUMBER</td>
<td>EMPLOYEE LEDGER NUMBER</td>
<td>EMPLOYEE PAYMENT MODE</td>
<td>EMPLOYEE ACCOUNT NUMBER</td>
<td>EMPLOYEE STATUS</td>
<td>EMPLOYEE PERMANENT DATE</td>
<td>EMPLOYEE RESIGNED DATE</td>
<td>EMPLOYEE BLOOD GROUP</td>
<td>EMPLOYEE DEDUCTIONS </td>
<td>EMPLOYEE REGISTRATION NUMBER</td>
<td>EMPLOYEE PAN NUMBER</td>
<td>EMPLOYEE ADDRESS</td>
<td>EMPLOYEE CITY</td>
<td>EMPLOYEE STATE</td>
<td>EMPLOYEE COUNTRY</td>
<td>EMPLOYEE PINCODE NUMBER</td>
<td>EMPLOYEE MOBILE NUMBER</td>
<td>EMPLOYEE CONTACT PERSON</td>
<td>EMPLOYEE EMAIL ID</td>
<td>EMPLOYEE GROSS</td>
<td>EMPLOYEE BASIC</td>
<td>EMPLOYEE DA</td>
<td>EMPLOYEE HRA</td>
<td>EMPLOYEE CONVEYANCE</td>
<td>EMPLOYEE WASH</td>
<td>EMPLOYEE MEDICAL</td>
<td>EMPLOYEE CITY/INCHARGE</td>
<td>EMPLOYEE CCA</td>
<td>EMPLOYEE OTHERS/SPECIAL</td>
<td>EMPLOYEE LTA/WARD</td>
<td>EMPLOYEE PF</td>
<td>EMPLOYEE PTAX</td>
<td>EMPLOYEE PF NUMBER</td>
<td>EMPLOYEE PF EMPLOYER</td>
<td>EMPLOYEE OTHERS</td>
<td>EMPLOYEE ESI DED</td>
<td>EMPLOYEE ESI EMPLOYER</td>
<td>EMPLOYEE HOSTEL</td>
<td>EMPLOYEE TDS</td>
<td>EMPLOYEE VOLUNTARY PF</td>
<td>EMPLOYEE CREATEDBY</td>
<td>EMPLOYEE CREATEDTIME</td>
<td>EMPLOYEE MODIFIEDBY</td>
<td>EMPLOYEE MODIFIEDTIME</td>
<td>EMPLOYEE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['emp_cat'].'</td>
									<td> '.$row['emp_dob'].' </td>
									<td> '.$row['emp_doj'].' </td>
									<td> '.$row['emp_wod'].' </td>
									<td> '.$row['emp_eshift'].' </td>
									<td> '.$row['emp_ename'].' </td>
									<td> '.$row['emp_ecode'].' </td>
									<td> '.$row['emp_etype'].' </td>
									<td> '.$row['emp_gen'].' </td>
									<td> '.$row['emp_quali'].' </td>
									<td> '.$row['emp_care'].' </td>
									<td> '.$row['emp_dept'].' </td>
									<td> '.$row['emp_desig'].' </td>
									<td> '.$row['emp_pfno'].' </td>
									<td> '.$row['emp_legno'].' </td>
									<td> '.$row['emp_pmode'].' </td>
									<td> '.$row['emp_accno'].' </td>
									<td> '.$row['emp_estatus'].' </td>
									<td> '.$row['emp_permd'].' </td>
									<td> '.$row['emp_resd'].' </td>
									<td> '.$row['emp_bgroup'].' </td>
									<td> '.$row['emp_deduc'].' </td>
									<td> '.$row['emp_reg'].' </td>
									<td> '.$row['emp_panno'].' </td>
									<td> '.$row['emp_addr'].' </td>
									<td> '.$row['emp_city'].' </td>
									<td> '.$row['emp_state'].' </td>
									<td> '.$row['emp_country'].' </td>
									<td> '.$row['emp_pin'].' </td>
									<td> '.$row['emp_mob'].' </td>
									<td> '.$row['emp_cperson'].' </td>
									<td> '.$row['emp_email'].' </td>
									<td> '.$row['emp_gross'].' </td>
									<td> '.$row['emp_basic'].' </td>
									<td> '.$row['emp_da'].' </td>
									<td> '.$row['emp_hra'].' </td>
									<td> '.$row['emp_con'].' </td>
									<td> '.$row['emp_wash'].' </td>
									<td> '.$row['emp_med'].' </td>
									<td> '.$row['emp_cityinc'].' </td>
									<td> '.$row['emp_cca'].' </td>
									<td> '.$row['emp_othspec'].' </td>
									<td> '.$row['emp_lta'].' </td>
									<td> '.$row['emp_pfs'].' </td>
									<td> '.$row['emp_ptax'].' </td>
									<td> '.$row['emp_pf'].' </td>
									<td> '.$row['emp_pfe'].' </td>
									<td> '.$row['emp_othe'].' </td>
									<td> '.$row['emp_esided'].' </td>
									<td> '.$row['emp_esiemp'].' </td>
									<td> '.$row['emp_hostel'].' </td>
									<td> '.$row['emp_tds'].' </td>
									<td> '.$row['emp_volun'].' </td>
									<td> '.$row['emp_createdby'].' </td>
									<td> '.$row['emp_createdtime'].' </td>
									<td> '.$row['emp_modifiedby'].' </td>
									<td> '.$row['emp_modifiedtime'].' </td>
									<td> '.$row['emp_status'].' </td>			
</tr>
';
			}
			$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=download.xls");
			echo $output;
	}
}
?>