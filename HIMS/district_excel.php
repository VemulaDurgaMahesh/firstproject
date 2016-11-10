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
	$sql = "SELECT * FROM district_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
						<td>District Code</td>
						<td>District Name</td>
						<td>State Name</td>
						<td>Country Name</td>	
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
									<td> '.$row['district_code'].'</td>
									<td>'.$row['district_name'].'</td>
									<td>'.$row['state_name'].'</td>
									<td>'.$row['country_name'].' </td>
									<td>'.$row['d_cby'].'</td>
									<td>'.$row['d_cdate'].' </td>
									<td>'.$row['d_mby'].'</td>
									<td>'.$row['d_mdate'].'</td>
									<td>'.$row['district_status'].'</td>
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