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
	$sql = "SELECT * FROM specilization_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>SPLZN CODE</td><td>SPLZN NAME</td><td>SPLZN STATUS</td><td>SPLZN CREATED BY</td><td>SPLZN CREATED DATE</td><td>SPLZN MODIFIED BY</td><td>SPLZN MODIFIED DATE</td><td>DELETE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['spl_code'].'</td>
									<td>'.$row['spl_name'].'</td>
									<td>'.$row['spl_status'].'</td>
									<td>'.$row['spl_createby'].' </td>
									<td>'.$row['eqp_createdby'].'</td>
									<td>'.$row['spl_createdate'].'</td>
									<td>'.$row['spl_modifyby'].'</td>
									<td>'.$row['spl_modifydate'].'</td>
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