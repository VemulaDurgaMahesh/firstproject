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
	$sql = "SELECT * FROM doctor";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>DOCTOR CONSULTATION TYPE</td>
					<td>DOCTOR  TYPE</td>
					<td>DOCTOR  CODE</td>
					<td>DOCTOR NAME</td>
					<td>DOCTOR ALIAS NAME</td>
					<td>DOCTOR SPECIALIZATION</td>
					<td>DOCTOR DESIGNATION</td>
					<td>DOCTOR DEPARTMENT</td>
					<td>DOCTOR REGISTRATION </td>
					<td>DOCTOR QUALIFICATION</td>
					<td>DOCTOR DATE OF BIRTH</td>
					<td>DOCTOR CONSULTING TYPE</td>
					<td>DOCTOR PAYMENT TYPE</td>
					<td>DOCTOR PAN CARD NUMBER</td>
					<td>DOCTOR APPLICATION NUMBER</td>
					<td>DOCTOR ACCOUNT NUMBER</td>
					<td>DOCTOR ADDRESS</td>
					<td>DOCTOR CITY</td>
					<td>DOCTOR STATE </td>
					<td>DOCTOR COUNTRY</td>
					<td>DOCTOR PINCODE</td>
					<td>DOCTOR MOBILE NUMBER</td>
					<td>DOCTOR CONTACT PERSON</td>
					<td>DOCTOR EMAIL ID</td>
					<td>DOCTOR CREATEDBY</td>
					<td>DOCTOR CREATEDDATE</td>
					<td>DOCTOR MODIFYBY</td>
					<td>DOCTOR MODIFYDATE</td>
					<td>DOCTOR STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['doc_ctype'].'</td>
									
<td> '.$row['doc_ctype'].' </td>
<td> '.$row['doc_drtype'].' </td>
<td> '.$row['doc_drcode'].' </td>
<td> '.$row['doc_drname'].' </td>
<td> '.$row['doc_aname'].' </td>
<td> '.$row['doc_speci'].' </td>
<td> '.$row['doc_desig'].' </td>
<td> '.$row['doc_dept'].' </td>
<td> '.$row['doc_regis'].' </td>
<td> '.$row['doc_quali'].' </td>
<td> '.$row['doc_dob'].'</td>
<td> '.$row['doc_cgtype'].' </td>
<td> '.$row['doc_ptype'].' </td>
<td> '.$row['doc_pan'].' </td>
<td> '.$row['doc_appno'].' </td>
<td> '.$row['doc_accno'].' </td>
<td> '.$row['doc_addr'].' </td>
<td> '.$row['doc_city'].' </td>
<td> '.$row['doc_state'].' </td>
<td> '.$row['doc_coun'].' </td>
<td> '.$row['doc_pin'].' </td>
<td> '.$row['doc_mob'].' </td>
<td> '.$row['doc_cperson'].'</td>
<td> '.$row['doc_email'].'</td>
<td> '.$row['doc_createdby'].'</td>
<td> '.$row['doc_createdate'].'</td>
<td> '.$row['doc_modifyby'].'</td>
<td> '.$row['doc_modifydate'].'</td>
<td> '.$row['doc_status'].'</td>					
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