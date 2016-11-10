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
	$sql = "SELECT * FROM company";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>HospitalName</td><td>HospitalCode</td><td>LocationCode</td><td>LocationName</td><td>LSTNumber</td><td>CSTNumber</td><td>PAN Number</td><td>VAT Number</td><td>Address1</td><td>Address2</td><td>Address3</td><td>PinCode</td><td>Created By</td><td>Created Date</td><td>Modify By</td><td>Modify Date</td><td>status</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
				<tr>
					<td> '.$row['hospname'].'</td>
					<td> '.$row['hospcode'].'</td>
					<td> '.$row['loccode'].'</td>
					<td> '.$row['locname'].'</td>
					<td> '.$row['lstnum'].'</td>
					<td> '.$row['cstnum'].'</td>
					<td> '.$row['pannum'].'</td>
					<td> '.$row['vatnum'].'</td>
					<td> '.$row['add1'].'</td>
					<td> '.$row['add2'].'</td>
					<td> '.$row['add3'].'</td>
					<td> '.$row['pincode'].'</td>
					<td> '.$row['createdby'].'</td>
					<td> '.$row['createddate'].'</td>
					<td> '.$row['modifyby'].'</td>
					<td> '.$row['modifydate'].'</td>
    				<td> '.$row['status'].'</td>
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