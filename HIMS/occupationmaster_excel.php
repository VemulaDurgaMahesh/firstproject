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
	$sql = "SELECT * FROM occupation_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>OCCUPATION CODE</td>
				<td>OCCUPATION NAME</td>
				<td>OCCUPATION CREATEDBY</td>
				<td>OCCUPATION CREATEDDATE</td>
				<td>OCCUPATION MODIFIED BY</td>
				<td>OCCUPATION MODIFIED DATE</td>
				<td>OCCUPATION STATUS</td>
				<td>DELETE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['occ_code'].'</td>
									<td>'.$row['occ_name'].'</td>
									<td>'.$row['occ_createby'].'</td>
									<td>'.$row['occ_createdate'].' </td>
									<td>'.$row['occ_modifyby'].'</td>
									<td>'.$row['occ_modifydate'].' </td>
									<td>'.$row['occ_status'].'</td>
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