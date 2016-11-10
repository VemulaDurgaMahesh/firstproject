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
	$sql = "SELECT * FROM user_groupmaster";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>User Category Code</td>
					<td>User Category Name</td>
					<td>Dept Name </td>
					<td>Dept code</td>
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
									<td> '.$row['user_categorycode'].'</td>
									<td>'.$row['user_categoryname'].'</td>
									<td>'.$row['dept_name'].'</td>
									<td>'.$row['user_categorydeptcode'].' </td>
									<td>'.$row['user_groupcreateby'].'</td>
									<td>'.$row['user_groupcreatedate'].' </td>
									<td>'.$row['user_groupmodifyby'].'</td>
									<td>'.$row['user_groupmodifydate'].'</td>
									<td>'.$row['user_categorystatus'].'</td>				
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