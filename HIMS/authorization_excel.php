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
	$sql = "SELECT * FROM author_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>Designation</td><td>Auth Code</td><td>Ref Code</td><td>Auth Name</td><td>Opcnscn</td><td>ipcnscn</td><td>vocherapproval</td><td>opcrdt</td><td>ipcrdt</td><td>mfdapdtrans</td><td>opcncln</td><td>ipcncln</td><td>dscgewostlmnt</td><td>opphcnscn</td><td>patntbillcnvrsn</td><td>fnbdue</td><td>opphdue</td><td>fnbcnscn</td><td>createdby</td><td>createddate</td><td>modifyby</td><td>modifydate</td><td>status</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
				<tr>
					<td> '.$row['designtn'].'</td>
					<td> '.$row['am_code'].'</td>
					<td> '.$row['refcode'].'</td>
					<td> '.$row['athname'].'</td>
					<td> '.$row['opcnscn'].'</td>
					<td> '.$row['ipcnscn'].'</td>
					<td> '.$row['vocherapproval'].'</td>
					<td> '.$row['opcrdt'].'</td>
					<td> '.$row['ipcrdt'].'</td>
					<td> '.$row['mfdapdtrans'].'</td>
					<td> '.$row['opcncln'].'</td>
					<td> '.$row['ipcncln'].'</td>
    				<td> '.$row['dscgewostlmnt'].'</td>
    				<td> '.$row['opphcnscn'].'</td>
    				<td> '.$row['patntbillcnvrsn'].'</td>
    				<td> '.$row['fnbdue'].'</td>
    				<td> '.$row['opphdue'].'</td>
    				<td> '.$row['fnbcnscn'].'</td>
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