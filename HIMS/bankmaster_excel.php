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
	$sql = "SELECT * FROM bank_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>BANK CODE</td>
				<td>BANK NAME</td>
				<td>BANK BRANCH</td>
				<td>BANK ADDRESS</td>
				<td>BANK STATUS</td>
				<td>BANK CREATED BY</td>
				<td>BANK CREATED DATE</td>
				<td> BANK MODIFIED BY</td>
				<td>BANK MODIFIED DATE</td>
				<td>BANK ACCOUNT TYPE</td>
				<td>BANK ACCOUNT NUMBER</td>
				<td>BANK MICR</td>
				<td>BANK IFSC</td>
				<td>BANK BSR</td>
				<td>DELETE STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['bank_code'].'</td>
									<td>'.$row['bank_name'].'</td>
									<td>'.$row['bank_branch'].'</td>
									<td>'.$row['bank_address'].' </td>
									<td>'.$row['bank_status'].'</td>
									<td>'.$row['bank_createdby'].' </td>
									<td>'.$row['bank_createddate'].'</td>
									<td>'.$row['bank_modifyby'].'</td>
									<td>'.$row['bank_modifydate'].'</td>
									<td>'.$row['bank_acctype'].'</td>
									<td>'.$row['bank_accno'].'</td>
									<td>'.$row['bank_micr'].'</td>
									<td>'.$row['bank_ifsc'].'</td>
									<td>'.$row['bank_bsr'].'</td>
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