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
	$sql = "SELECT * FROM department_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>DEPARTMENT CODE</td>
				<td>DEPARTMENT NAME</td>
				<td>DEPARTMENT STATUS</td>
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
									<td> '.$row['dept_code'].'</td>
									<td>'.$row['dept_name'].'</td>
									<td>'.$row['dept_status'].'</td>
									<td>'.$row['dept_createby'].' </td>
									<td>'.$row['dept_createdate'].'</td>
									<td>'.$row['dept_modifyby'].' </td>
									<td>'.$row['dept_modifydate'].'</td>
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