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
	$sql = "SELECT * FROM room_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
			<td>WARD CODE</td><td>WARD NAME</td><td>ROOM CODE</td><td>ROOM BLOCK</td><td>ROOM BEDNUMBER</td><td>ROOM LEVEL</td><td>ROOM EXTEN</td><td>ROOM NURSE</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>ROOM STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['ROOM_WARDCODE'].'</td>
									<td>'.$row['ROOM_WARDNAME'].'</td>
									<td>'.$row['ROOM_CODE'].'</td>
									<td>'.$row['ROOM_BLOCK'].' </td>
									<td>'.$row['ROOM_BEDNO'].'</td>
									<td>'.$row['ROOM_LEVEL'].' </td>
									<td>'.$row['ROOM_EXTEN'].'</td>
									<td>'.$row['ROOM_NURSE'].'</td>
									<td>'.$row['ROOM_CREATEBY'].'</td>
									<td>'.$row['ROOM_CREATEDATE'].'</td>
									<td>'.$row['ROOM_MODIFYBY'].'</td>
									<td>'.$row['ROOM_MODIFYDATE'].'</td>
									<td>'.$row['ROOM_STATUS'].'</td>
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