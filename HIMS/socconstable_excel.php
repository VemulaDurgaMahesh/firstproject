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
	$sql = "SELECT * FROM soc_consultation";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
<td>TARRIF NAME</td>
<td>CONSULTANT CODE</td>
<td>CONSULTANCY NAME</td>
<td>NORMAL CHARGES </td>
<td>NORMAL HOSPITAL CHARGES</td>
<td>EMEREGENCY CHARGES</td>
<td>EMEREGENCY HOSPITAL CHARGES</td>
<td>REVISIT CHARGES</td>
<td>REVISIT HOSPITAL CHAREGES</td>
<td>REGISTRATION FEE</td>
<td>NUMBER OF DAYS</td>
<td>NUMBER OF VISITS</td>
<td>CREATED BY</td>
<td>CREATED DATE</td>
<td>MODIFIED BY</td>
<td>MODIFIEDDATE</td>
<td>STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['soc_tname'].'</td>							
									<td> '.$row['soc_concode'].'</td>
									<td> '.$row['soc_conname'].'</td>
									<td> '.$row['soc_nch'].'</td>
									<td> '.$row['soc_nchch'].'</td>
									<td> '.$row['soc_emch'].'</td>
									<td> '.$row['soc_emhch'].'</td>
									<td> '.$row['soc_rech'].'</td>
									<td> '.$row['soc_rehch'].'</td>
									<td> '.$row['soc_regfee'].'</td>
									<td> '.$row['soc_nod'].'</td>
									<td> '.$row['soc_nov'].'</td>
									<td> '.$row['soc_createdby'].'</td>
									<td> '.$row['soc_createddate'].'</td>
									<td> '.$row['soc_modifiedby'].'</td>
									<td> '.$row['soc_modifieddate'].'</td>
									<td> '.$row['soc_status'].'</td>
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