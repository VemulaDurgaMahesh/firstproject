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
	$sql = "SELECT * FROM users_masters";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>User Name</td>
				    <td>User ID</td>
				    <td>Designation</td>
				    <td>Designation Code</td>     
				    <td>Department Code</td>
				    <td>Department Name</td>
				    <td>Profile Code</td>   
				    <td>Profile Name</td> 
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
									<td> '.$row['user_name'].'</td>
									<td>'.$row['user_id'].'</td>
									<td>'.$row['user_designation'].'</td>
									<td>'.$row['user_designationcode'].' </td>
									<td>'.$row['user_deptcode'].'</td>
									<td>'.$row['dept_name'].' </td>
									<td>'.$row['user_profilecode'].'</td>
									<td>'.$row['profile_name'].'</td>
									<td>'.$row['user_createby'].'</td>
									<td>'.$row['user_createdate'].'</td>
									<td>'.$row['user_modifyby'].'</td>
									<td>'.$row['user_modifydate'].'</td>									
									<td>'.$row['user_status'].'</td>
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