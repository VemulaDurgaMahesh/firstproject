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
	$sql = "SELECT * FROM nurse_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>NURSE CODE</td>
				<td>NURSE NAME</td>
				<td>NURSE STATUS</td>
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
									<td> '.$row['ns_code'].'</td>
									<td>'.$row['ns_name'].'</td>
									<td>'.$row['ns_status'].'</td>
									<td>'.$row['ns_createdby'].' </td>
									<td>'.$row['ns_createddate'].'</td>
									<td>'.$row['ns_modifyby'].' </td>
									<td>'.$row['ns_modifydate'].'</td>
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