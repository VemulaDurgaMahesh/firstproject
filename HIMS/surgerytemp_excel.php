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
	$sql = "SELECT * FROM surgery_template";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
<td>Template Code</td>
	<td>Template Name</td>
	<td>Surgery Code</td>
	<td>Surgery Name</td>
	<td>Surgery Procedure</td>
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
									<td> '.$row['st_code'].'</td>									
									<td> '.$row['st_name'].' ></td>
									<td> '.$row['st_sgcode'].' ></td>
									<td> '.$row['soc_servicename'].' ></td>
									<td> '.$row['st_procedure'].' ></td>
									<td> '.$row['st_createdby'].' ></td>
									<td> '.$row['st_createddate'].' ></td>
									<td> '.$row['st_modifyby'].' ></td>
									<td> '.$row['st_modifydate'].' ></td>
									<td> '.$row['st_status'].' ></td>																	
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