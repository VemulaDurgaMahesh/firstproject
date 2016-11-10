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
	$sql = "SELECT * FROM referral";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>REFFERENCE TYPE</td>
					<td>REFFERENCE CODE</td>
					<td>REFFERENCE NAME</td>
					<td>REFFERENCE ALIAS NAME</td>
					<td>REFFERENCE SPECIALIZATION</td>
					<td>REFFERENCE DESIGNATION</td>
					<td>REFFERENCE DEPARTMENT</td>
					<td>REFFERENCE REGINATAION</td>
					<td>REFFERENCE QUALIFICATION</td>
					<td>REFFERENCE DATE OF BIRTH</td>
					<td>REFFERENCE PRO CODE</td>
					<td>REFFERENCE IN PATIENT</td>
					<td>REFFERENCE INVESTIGATION</td>
					<td>REFFERENCE OP CONSULTATIONS</td>
					<td>REFFERENCE PAN NUMBER</td>
					<td>REFFERENCE ACCOUNT NO</td>
					<td>REFFERENCE ADDRESS</td>
					<td>REFFERENCE CITY</td>
					<td>REFFERENCE STATE</td>
					<td>REFFERENCE COUNTRY</td>
					<td>REFFERENCE PINCODE</td>
					<td>REFFERENCE MOBILE NUMBER</td>
					<td>REFFERENCE CONTACT PERSON</td>
					<td>REFFERENCE EMAIL</td>
					<td>REFFERENCE CREATED BY</td>
					<td>REFFERENCE CREATED DATE</td>
					<td>REFFERENCE MODIFIED BY</td>
					<td>REFFERENCE MODIFIED DATE</td>
					<td>REFFERENCE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
							<tr>
									<td>    '.$row['ref_rtype'].'  </td>								
									<td>	'.$row['ref_rfcode'].' </td>
									<td> 	'.$row['ref_rname'].'  </td>
									<td> 	'.$row['ref_aname'].'  </td>
									<td> 	'.$row['ref_speci'].'  </td>
									<td> 	'.$row['ref_desig'].'  </td>
									<td> 	'.$row['ref_dept'].'   </td>
									<td> 	'.$row['ref_reg'].'    </td>
									<td>	'.$row['ref_quali'].'  </td>
									<td> 	'.$row['ref_dob'].'    </td>
									<td> 	'.$row['ref_procode'].'</td>
									<td> 	'.$row['ref_inpat'].'  </td>
									<td> 	'.$row['ref_inv'].'    </td>
									<td> 	'.$row['ref_op'].'     </td>
									<td> 	'.$row['ref_panno'].'  </td>
									<td> 	'.$row['ref_accno'].'  </td>
									<td> 	'.$row['ref_addr'].'   </td>
									<td> 	'.$row['ref_city'].'   </td>
									<td> 	'.$row['ref_state'].'  </td>
									<td> 	'.$row['ref_coun'].'   </td>
									<td> 	'.$row['ref_pin'].'    </td>
									<td> 	'.$row['ref_mob'].'    </td>
									<td> 	'.$row['ref_cperson'].'</td>
									<td> 	'.$row['ref_email'].'  </td>
									<td> 	'.$row['ref_createdby'].'</td>
									<td> 	'.$row['ref_createddate'].'</td>
									<td> 	'.$row['ref_modifiedby'].' </td>
									<td> 	'.$row['ref_modifieddate'].'</td>
									<td> 	'.$row['ref_status'].'</td>
							</tr>';
			}
			$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=download.xls");
			echo $output;
	}
}
?>