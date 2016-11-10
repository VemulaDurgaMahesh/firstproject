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
	$sql = "SELECT * FROM denomination_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>Denomination Code</td><td>Denomination Value</td><td>Denomination Status</td><td>Denomination Created By</td><td>Denomination Created date</td><td>Denom modify By</td><td>Denom Modify Date</td><td>Delete Status</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['denom_code'].'</td>
									<td>'.$row['denom_value'].'</td>
									<td>'.$row['denom_status'].'</td>
									<td>'.$row['denom_createby'].' </td>
									<td>'.$row['denom_createdate'].'</td>
									<td>'.$row['denom_modifyby'].' </td>
									<td>'.$row['denom_modifydate'].'</td>
									<td>'.$row['delete_status'].'</td>
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