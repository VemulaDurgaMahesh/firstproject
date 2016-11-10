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
	$sql = "SELECT * FROM new_registration";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
			<td>umr_no</td><td>reg_no</td><td>image</td><td>title</td><td>p_firstname</td><td>p_middlename</td><td>p_lastname</td><td>p_dob</td><td>p_age</td><td>p_gender</td><td>p_maritalstatus</td><td>p_father</td><td</td><td>p_mother</td><td>p_religion</td><td>p_nationality</td><td>p_passportno</td><td>p_bloodgroup</td><td>p_type</td><td>p_code</td><td>p_name</td><td>p_occupation</td><td>p_consultcode</td><td>p_consultantname</td><td>p_consultantdept</td><td>p_referaltype</td><td>p_referalcode</td><td>p_referalname</td><td>p_referaldept</td><td>p_address</td><td>p_citycode</td><td>p_cityname</td><td>p_statecode</td><td>p_statename</td><td>p_countrycode</td><td>p_countryname</td><td>p_zip</td><td>p_phone</td><td>p_mobile</td><td>p_fax</td><td>p_email</td><td>p_regfee</td><td>p_receiptno</td><td>p_concession</td><td>p_vailidity</td><td>p_concauthcode</td><td>p_concauthname</td><td>p_receiptmode</td><td>p_amount</td><td>p_chequeno</td><td>p_chequedate</td><td>p_bankcode</td><td>p_bankname</td><td>p_remarks</td><td>p_questionary</td><td>p_createby</td><td>p_createdate</td><td>  p_modifyby</td><td>p_modifydate</td><td>p_status</td><td>p_deletestatus</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td>'.$row['umr_no'].' </td>
									<td>'.$row['reg_no'].' </td>
									<td>'.$row['image'].'</td>
									<td>'.$row['title'].' </td>
									<td>'.$row['p_firstname'].'</td>
									<td>'.$row['p_middlename'].'</td>
									<td>'.$row['p_lastname'].' </td>
									<td>'.$row['p_dob'].' </td>
									<td>'.$row['p_age'].' </td>
									<td>'.$row['p_gender'].' </td>
									<td>'.$row['p_maritalstatus'].' </td>
									<td>'.$row['p_father'].' </td>
									<td>'.$row['p_mother'].' </td>
									<td>'.$row['p_religion'].' </td>
									<td>'.$row['p_nationality'].' </td>
									<td>'.$row['p_passportno'].' </td>
									<td>'.$row['p_bloodgroup'].' </td>
									<td>'.$row['p_type'].' </td>
									<td>'.$row['p_code'].' </td>
									<td>'.$row['p_name'].' </td>
									<td>'.$row['p_occupation'].' </td>
									<td>'.$row['p_consultcode'].' </td>
									<td>'.$row['p_consultantname'].' </td>
									<td>'.$row['p_consultantdept'].' </td>
									<td>'.$row['p_referaltype'].' </td>
									<td>'.$row['p_referalcode'].' </td>
									<td>'.$row['p_referalname'].' </td>
									<td>'.$row['p_referaldept'].' </td>
									<td>'.$row['p_address'].' </td>
									<td>'.$row['p_citycode'].' </td>
									<td>'.$row['p_cityname'].' </td>
									<td>'.$row['p_statecode'].' </td>
									<td>'.$row['p_statename'].' </td>
									<td>'.$row['p_countrycode'].' </td>
									<td>'.$row['p_countryname'].' </td>
									<td>'.$row['p_zip'].' </td>
									<td>'.$row['p_phone'].' </td>
									<td>'.$row['p_mobile'].' </td>
									<td>'.$row['p_fax'].' </td>
									<td>'.$row['p_email'].' </td>
									<td>'.$row['p_regfee'].' </td>
									<td>'.$row['p_receiptno'].' </td>
									<td>'.$row['p_concession'].' </td>
									<td>'.$row['p_vailidity'].' </td>
									<td>'.$row['p_concauthcode'].' </td>
									<td>'.$row['p_concauthname'].' </td>
									<td>'.$row['p_receiptmode'].' </td>
									<td>'.$row['p_amount'].'</td>
									<td>'.$row['p_chequeno'].' </td>
									<td>'.$row['p_chequedate'].' </td>
									<td>'.$row['p_bankcode'].'</td>
									<td>'.$row['p_bankname'].'</td>
									<td>'.$row['p_remarks'].' </td>
									<td>'.$row['p_questionary'].'</td>
									<td>'.$row['p_createby'].' </td>
									<td>'.$row['p_createdate'].' </td>
									<td>'.$row['p_modifyby'].'</td>
									<td>'.$row['p_modifydate'].'</td>
									<td>'.$row['p_status'].'</td>
									<td>'.$row['p_deletestatus'].'</td>
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