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
	$sql = "SELECT * FROM ward_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>WARD CODE</td><td>WARD NAME</td><td>WARD GROUP CODE</td><td>WARD GROUP NAME</td><td>WARD TARIFF</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>WARD ACTIVE</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td>'.$row['WARD_CODE'].'</td>
									<td>'.$row['WARD_NAME'].'</td>
									<td>'.$row['WARD_GRPCODE'].'</td>
									<td>'.$row['WARD_GRPNAME'].' </td>
									<td>'.$row['WARD_TARIFF'].'</td>
									<td>'.$row['WARD_CREATEDBY'].' </td>
									<td>'.$row['WARD_CREATEDTIME'].'</td>
									<td>'.$row['WARD_MODIFIEDBY'].'</td>
									<td>'.$row['WARD_MODIFIEDTIME'].'</td>
									<td>'.$row['WARD_ACTIVE'].'</td>
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