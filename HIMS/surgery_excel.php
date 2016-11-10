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
	$sql = "SELECT * FROM surgery_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>Surgery Design Code</td>
    <td>Tariff Code</td>
    <td>Surgery code</td>
    <td>Surgery Name</td>
    <td>Surgery Type Code</td>
    <td>Department Code</td>
    <td>Department Name</td>
    <td>Surgery Amount</td>
    <td>Estimated Time</td>
    <td>Effect From</td>
    <td>Effect to</td>
    <td>Remarks</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td>'.$row['sg_code'].'</td>
									<td>'.$row['sg_tcode'].'</td>
									<td>'.$row['sg_procedure'].'</td>
									<td>'.$row['soc_servicename'].' </td>
									<td>'.$row['sg_sgtcode'].'</td>
									<td>'.$row['sg_dept'].' </td>
									<td>'.$row['dept_name'].'</td>
									<td>'.$row['sg_amount'].'</td>									
									<td>'.$row['sg_estime'].'</td>
									<td>'.$row['sg_effectfrom'].'</td>
									<td>'.$row['sg_effectto'].'</td>
									<td>'.$row['sg_remarks'].'</td>
									<td>'.$row['sg_createdby'].'</td>
									<td>'.$row['sg_createddate'].'</td>
									<td>'.$row['sg_modifyby'].'</td>
									<td>'.$row['sg_modifydate'].'</td>
									<td>'.$row['sg_status'].'</td>
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