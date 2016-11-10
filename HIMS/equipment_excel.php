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
	$sql = "SELECT * FROM equipment_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>EQUIPMENT GROUP NAME</td>
				<td>EQUIPMENT CODE</td>
				<td>EQUIPMENT NAME</td>
				<td>EQUIPMENT STATUS</td>
				<td>CREATED BY</td>
				<td>CREATED DATE</td>
				<td>MODIFIED BY</td>
				<td>MODIFIED DATE</td>
				<td>EQUIPMENT LEVEL</td>
				<td>EQUIPMENT BLOCK</td>
				<td>EQUIPMENT WING</td>
				<td>EXTENSION NUMBER</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['eqp_groupname'].'</td>
									<td>'.$row['eqp_code'].'</td>
									<td>'.$row['eqp_name'].'</td>
									<td>'.$row['eqp_status'].' </td>
									<td>'.$row['eqp_createdby'].'</td>
									<td>'.$row['eqp_createddate'].' </td>
									<td>'.$row['eqp_modifyby'].'</td>
									<td>'.$row['eqp_modifydate'].'</td>
									<td>'.$row['eqp_level'].'</td>
									<td>'.$row['eqp_block'].'</td>
									<td>'.$row['eqp_wing'].'</td>
									<td>'.$row['eqp_extensionno'].'</td>
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