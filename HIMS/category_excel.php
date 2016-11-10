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
	$sql = "SELECT * FROM category_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>CATEGORY CODE</td>
					<td>CATEGORY NAME</td>
					<td>CATEGORY WOD</td>
					<td>CATEGORY STATUS</td>
					<td>CATEGORY CREATED BY</td>
					<td>CATEGORY CREATED DATE</td>
					<td>CATEGORY MODIFIED BY</td>
					<td>CATEGORY MODIFIED DATE</td>
					<td>DELETE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['cat_code'].'</td>
									<td>'.$row['cat_name'].'</td>
									<td>'.$row['cat_wod'].'</td>
									<td>'.$row['cat_status'].' </td>
									<td>'.$row['cat_createdby'].'</td>
									<td>'.$row['cat_createddate'].' </td>
									<td>'.$row['cat_modifiedby'].'</td>
									<td>'.$row['cat_modifieddate'].'</td>
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