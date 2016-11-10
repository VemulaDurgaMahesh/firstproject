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
	$sql = "SELECT * FROM user_changepass";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>PasswordCode</td>
					<td>User id</td>
					<td>User Name </td>
					<td> Remarks</td>
					<td>CREATED BY</td>
					<td>CREATED DATE</td>
					<td>STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$x=$row['user_id'];
    			$ottname = mysql_query("SELECT user_name FROM users_masters WHERE user_id = '$x'");
                 $optname1 = mysql_fetch_array($ottname);   
                 $output .= '  
								<tr>
									<td> '.$row['user_pwdno'].'</td>
									<td>'.$row['user_id'].'</td>						
									<td>'.$optname1['user_name'].'</td>									
									<td>'.$row['user_remarks'].' </td>									
									<td>'.$row['user_createdby'].'</td>
									<td>'.$row['user_createdate'].'</td>
									<td>'.$row['user_status'].'</td>
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