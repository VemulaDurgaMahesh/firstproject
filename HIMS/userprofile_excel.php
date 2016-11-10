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
	$sql = "SELECT * FROM profile";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
					<td>Profile code</td>
					<td>Profile Name</td>
					<td>User Group Code</td>
					<td>User Group Name</td>
					<td>Depaetment Code</td>
					<td>Depaetment Name</td>
					<td>CREATED BY</td>
					<td>CREATED DATE</td>
					<td>MODIFIED BY</td>
					<td>MODIFIED DATE</td>
					<td>STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$x1=$row['profile_code'];
    	$str1="SELECT DISTINCT * FROM profile WHERE profile_code='$x1'";
          $result1=mysql_query($str1);
          $row1 = mysql_fetch_array($result1);
    	$x=$row1['dept_code'];
    	$y=$row1['user_groupcode'];
    	$ottname = mysql_query("SELECT dept_name FROM department_master WHERE dept_code = '$x'");
         $optname1 = mysql_fetch_array($ottname);  
        $usergname = mysql_query("SELECT user_categoryname FROM user_groupmaster WHERE user_categorycode = '$y'");
        $usergname1 = mysql_fetch_array($usergname);
				$output .= '
								<tr>
									<td> '.$row['profile_code'].'</td>
									<td>'.$row1['profile_name'].'</td>						
									<td>'.$row1['user_groupcode'].' </td>
									<td>'.$usergname1['user_categoryname'].'</td>
									<td>'.$row1['dept_code'].' </td>
									<td>'.$optname1['dept_name'].'</td>
									<td>'.$row1['createby'].'</td>
									<td>'.$row1['createdate'].'</td>
									<td>'.$row1['modifyby'].'</td>				
									<td>'.$row1['modifydate'].'</td>
									<td>'.$row1['status'].'</td>
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