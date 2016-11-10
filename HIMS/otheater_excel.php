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
	$sql = "SELECT * FROM operation_theater";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
			<td>OT Code</td>
	<td>OT Name</td>
	<td>OT type Name </td>
	<td> OT type code</td>
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
									<td> '.$row['ot_code'].'</td>
									<td>'.$row['ot_name'].'</td>
									<td>'.$row['ott_name'].'</td>
									<td>'.$row['ott_name'].' </td>
									<td>'.$row['ot_createdby'].'</td>
									<td>'.$row['ot_createddate'].' </td>
									<td>'.$row['ot_modifyby'].'</td>
									<td>'.$row['ot_modifydate'].'</td>
									<td>'.$row['ot_status'].'</td>
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