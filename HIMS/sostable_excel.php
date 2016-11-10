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
	$sql = "SELECT * FROM testformat_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>SERVICE TYPE</td>
					<td>CODE</td>
					<td>TARRIF NAME</td>
					<td>SERVICE GROUP NAME</td>
					<td>SERVICE GROUP CODE BILLING HEAD</td>
					<td>SERVICE NAME</td>
					<td>SERVICE CODE</td>
					<td>CHARGE</td>
					<td>HOSPITAL PERCENTAGE</td>
					<td>HOSPITAL CHARGE</td>
					<td>DOCTOR PERCENTAGE</td>
					<td>DOCTOR CHARGE</td>
					<td>INSTRUCTIONS</td>
					<td>APPLICATION FOR</td>
					<td>CREATED BY</td>
					<td>CREATED TIME</td>
					<td>MODIFIED BY</td>
					<td>MODIFIED TIME</td>
					<td>STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['soc_type'].'</td>

<td>'.$row['soc_code'].' </td>
<td>'.$row['soc_tariffname'].' </td>
<td>'.$row['soc_servicegroupname'].' </td>
<td>'.$row['soc_billinghead'].' </td>
<td>'.$row['soc_servicename'].' </td>
<td>'.$row['soc_servicecode'].' </td>
<td>'.$row['soc_charge'].' </td>
<td>'.$row['soc_hospitalper'].' </td>
<td>'.$row['soc_hospitalcharge'].' </td>
<td>'.$row['soc_doctorper'].' </td>
<td>'.$row['soc_doctorcharge'].' </td>
<td>'.$row['soc_instructions'].' </td>
<td>'.$row['soc_applicationfor'].' </td>
<td>'.$row['soc_createdby'].' </td>
<td>'.$row['soc_createdtime'].' </td>
<td>'.$row['soc_modifiedby'].' </td>
<td>'.$row['soc_modifiedtime'].' </td>
<td>'.$row['soc_status'].' </td>
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