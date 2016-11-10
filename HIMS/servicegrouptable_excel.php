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
	$sql = "SELECT * FROM servicegroup_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
			<td>SERVICE GROUP CODE</td><td>SERVICE GROUP NAME</td><td>SERVICE GROUP DPT CODE</td>
			<td>SERVICE GROUP STATUS</td><td>SERVICE GROUP CREATED BY</td><td>SERVICE GROUP CREATED NAME</td><td>SEVICE GROUP MODIFY BY</td><td>SERVICE GROUP MODIFY DATE</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['servicegroup_code'].'</td>
									<td>'.$row['servicegroup_name'].'</td>
									<td>'.$row['servicegroup_dptcode'].'</td>							
									<td>'.$row['servicegroup_status'].'</td>
									<td>'.$row['servicegroup_createdby'].' </td>
									<td>'.$row['servicegroup_createdname'].'</td>
									<td>'.$row['servicegroup_modifyby'].'</td>
									<td>'.$row['servicegroup_modifydate'].'</td>
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