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
	$sql = "SELECT * FROM healthcardholder";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>CHONo</td><td>CARD TYPE CODE</td><td>CARD NO</td><td>CARD VALID FROM</td><td>CARD VALID TO</td><td>ADDRESS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
				<tr>
					<td> '.$row['chono'].'</td>
					<td> '.$row['card_type1'].'</td>
					<td> '.$row['cardno'].'</td>
					<td> '.$row['cardvalidfrom'].'</td>
					<td> '.$row['cardvalidto'].'</td>
					<td> '.$row['address'].'</td>
					<td> '.$row['createdby'].'</td>
					<td> '.$row['createddate'].'</td>
					<td> '.$row['modifiedby'].'</td>
					<td> '.$row['modifieddate'].'</td>
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