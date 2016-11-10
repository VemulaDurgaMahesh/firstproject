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
	$sql = "SELECT * FROM tariff_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>TARRIF CODE</td>
				<td>TARRIF NAME</td>
				<td>TARRIF CONTACTPERSON</td>
				<td>TARRIF EFFECTFROM</td>
				<td>TARRIF EFFECTTO</td>
				<td>TARRIF STATUS</td>
				<td>TARRIF CREATED BY</td>
				<td>TARRIF CREATED DATE</td>
				<td>TARRIF MODIFIED BY</td>
				<td>TARRIF MODIFIED DATE</td>
				<td>DELETE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['tariff_code'].'</td>
									<td>'.$row['tariff_name'].'</td>
									<td>'.$row['tariff_contactperson'].'</td>
									<td>'.$row['tariff_effectfrom'].' </td>
									<td>'.$row['tariff_effectto'].'</td>
									<td>'.$row['tariff_status'].' </td>
									<td>'.$row['tariff_createdby'].'</td>
									<td>'.$row['tariff_createddate'].'</td>
									<td>'.$row['tariff_modifyby'].'</td>
									<td>'.$row['tariff_modifydate'].'</td>
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