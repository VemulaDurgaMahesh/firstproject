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
	$sql = "SELECT * FROM designation_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>DESIGNATION CODE</td>
				<td>DESIGNATION NAME</td>
				<td>DESIGNATION STATUS</td>
				<td>CREATED BY</td>
				<td>CREATED DATE</td>
				<td>MODIFIED BY</td>
				<td>MODIFIED DATE</td>
				<td>DELETE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['desg_code'].'</td>
									<td>'.$row['desg_name'].'</td>
									<td>'.$row['desg_status'].'</td>
									<td>'.$row['desg_createby'].' </td>
									<td>'.$row['desg_createdate'].'</td>
									<td>'.$row['desg_modifyby'].' </td>
									<td>'.$row['desg_modifydate'].'</td>
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