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
	$sql = "SELECT * FROM wardgrop_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
			<td>WARD GROUP CODE</td><td>WARD GROUP NAME</td><td>TARIFF APPLICATION</td><td>CREATED BY</td><td>CREATED DATE</td>
			<td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['WARDGRP_CODE'].'</td>
									<td>'.$row['WARDGRP_NAME'].'</td>
									<td>'.$row['TARIFF_APPL'].'</td>
									<td>'.$row['CREATED_BY'].' </td>
									<td>'.$row['CREATED_TIME'].'</td>
									<td>'.$row['MODIFIED_BY'].' </td>
									<td>'.$row['MODIFIED_TIME'].'</td>
									<td>'.$row['Status'].'</td>
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