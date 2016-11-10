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
	$sql = "SELECT * FROM health_cards";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>ID</td><td>CARD TYPE CD</td><td>CARD TYPE NAME</td><td>MAX MEMBERS</td><td>INCLUDE ALL NUMBERS</td><td>VALID YEARS</td><td>VALID DAYS</td><td>CARD AMOUNT</td><td>AUTO PREFIX</td><td>REGISTRATIONS</td><td>CONSULTATIONS</td><td>OP BUILDING</td><td>IP SERVICE CHARGES</td><td>IP CONSULTATION AND PROFESSIONAL CHARGES</td><td>IP INVESTIGATION CHARGES</td><td>IP PROCEDURE CHARGES</td><td>IP WARD CHARGES</td><td>PHARMACY CHARGES</td><td>ALLOW TO CHANGE HEALTH CARD AMOUNT</td><td> CREATEDBY</td><td> CREATEDATE</td><td> MODIFIEDBY</td><td> MODIFIEDDATE</td><td> STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
				<tr>
					<td> '.$row['ID'].'</td>
					<td> '.$row['card_code'].'</td>
					<td> '.$row['card_name'].'</td>
					<td> '.$row['card_maxno'].'</td>
					<td> '.$row['includeallmembers'].'</td>
					<td> '.$row['validyears'].'</td>
					<td> '.$row['validdays'].'</td>
					<td> '.$row['cardamount'].'</td>
					<td> '.$row['autoprefix'].'</td>
					<td> '.$row['conc_registration'].'</td>
					<td> '.$row['conc_consultations'].'</td>
					<td> '.$row['conc_opbilling'].'</td>
    				<td> '.$row['ip_servicecharges'].'</td>
    				<td> '.$row['ip_consultationandprofessional'].'</td>
    				<td> '.$row['ip_investigation'].'</td>
    				<td> '.$row['ip_proceduralcharges'].'</td>
    				<td> '.$row['ip_wardcharges'].'</td>
    				<td> '.$row['ip_pharmacychrges'].'</td>
    				<td> '.$row['allowhealthamt'].'</td>
    				<td> '.$row['createdby'].'</td>
    				<td> '.$row['createddate'].'</td>
    				<td> '.$row['modifiedby'].'</td>
    				<td> '.$row['modifieddate'].'</td>
    				<td> '.$row['status'].'</td>
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