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
	$sql = "SELECT * FROM city_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>City Code</td>
					<td>City Name</td>
					<td>Pincode</td>
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
									<td> '.$row['city_code'].'</td>
									<td>'.$row['city_name'].'</td>
									<td>'.$row['city_pin'].'</td>
									<td>'.$row['district_name'].' </td>
									<td>'.$row['state_name'].'</td>
									<td>'.$row['country_name'].' </td>
									<td>'.$row['city_createby'].'</td>
									<td>'.$row['city_date'].'</td>
									<td>'.$row['city_modifyby'].'</td>
									<td>'.$row['city_modifydate'].'</td>
									<td>'.$row['city_status'].'</td>
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