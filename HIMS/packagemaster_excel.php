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
	$sql = "SELECT * FROM package_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>pm_tariffname</td>
				<td>pm_tariffcode</td>
				<td>pm_pkgcode</td>
				<td>pm_pkgname</td>
				<td>pm_pkgdesigncode</td>
				<td>pm_pkgtype</td>
				<td>pm_pkgduration</td>
				<td>pm_pkgamount</td>
				<td>pm_pkgactualamt</td>
				<td>pm_predays</td>
				<td>pm_postdays</td>
				<td>pm_effectfrom</td>
				<td>pm_effectto</td>			
				<td>pm_createby</td>
				<td>pm_createdate</td>
				<td>pm_modifyby</td>
				<td>pm_modifydate</td>
				</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td>'.$row['pm_tariffname'].'</td>
									<td>'.$row['pm_tariffcode'].'</td>
									<td>'.$row['pm_pkgcode'].'</td>
									<td>'.$row['pm_pkgname'].'</td>
									<td>'.$row['pm_pkgdesigncode'].'</td>
									<td>'.$row['pm_pkgtype'].'</td>
									<td>'.$row['pm_pkgduration'].'</td>
									<td>'.$row['pm_pkgamount'].'</td>
									<td>'.$row['pm_pkgactualamt'].'</td>
									<td>'.$row['pm_predays'].'</td>
									<td>'.$row['pm_postdays'].'</td>
									<td>'.$row['pm_effectfrom'].'</td>
									<td>'.$row['pm_effectto'].'</td>									
									<td>'.$row['pm_createby'].' </td>
									<td>'.$row['pm_createdate'].'</td>
									<td>'.$row['pm_modifyby'].'</td>
									<td>'.$row['pm_modifydate'].'</td>									
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