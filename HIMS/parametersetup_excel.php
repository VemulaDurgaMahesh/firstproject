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
	$sql = "SELECT * FROM parameter_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>LabGroup</td><td>Lab Group Code</td><td>ParameterCode</td><td>ParameterName</td><td>ParameterMethod</td><td>ParaMeterShortName</td><td>Parameter Text Size</td><td>Parameter Text Display</td><td>Accreditaion Needed</td><td>New Organism Interface</td><td>AntiBiotics</td><td>Units Only</td><td>Description Only</td><td>Normal Ranges</td><td>Critical ranges</td><td>Default Ranges</td><td>Gender</td><td>Min Age</td><td>UOM1</td><td>Max Age</td><td>UOM2</td><td>Description</td><td>Symbol</td><td>Min Range</td><td>Max Range</td><td>Units Normal Range</td><td>Min Critical</td><td>Max Critical</td><td>Min Default</td><td>Max Default</td><td>CreatedBy</td><td>CraetedDate</td><td>MoodifyBy</td><td>ModifiedDate</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['p_labgroupname'].'</td>
									<td>'.$row['p_labgroupcode'].'</td>
									<td>'.$row['p_pcode'].'</td>
									<td>'.$row['p_pname'].' </td>
									<td>'.$row['p_method'].'</td>
									<td>'.$row['p_shortname'].' </td>
									<td>'.$row['p_textsize'].'</td>
									<td>'.$row['p_pdisplay'].'</td>
									<td>'.$row['p_acrneed'].'</td>
									<td>'.$row['p_neworgint'].'</td>
									<td>'.$row['p_antibiotics'].'</td>
									<td>'.$row['p_unitsonly'].'</td>
									<td>'.$row['p_descriponly'].'</td>
									<td>'.$row['p_normalranges'].'</td>
									<td>'.$row['p_criticalranges'].'</td>
									<td>'.$row['p_defaultranges'].'</td>
									<td>'.$row['p_gender'].'</td>
									<td>'.$row['p_minage'].'</td>
									<td>'.$row['p_uom1'].'</td>
									<td>'.$row['p_maxage'].'</td>
									<td>'.$row['p_uom2'].'</td>
									<td>'.$row['p_desc'].'</td>
									<td>'.$row['p_symb'].'</td>
									<td>'.$row['p_minrange'].'</td>
									<td>'.$row['p_maxrange'].'</td>
									<td>'.$row['p_unitsnormalrange'].'</td>
									<td>'.$row['p_mincritical'].'</td>
									<td>'.$row['p_maxcritical'].'</td>
									<td>'.$row['p_mindefault'].'</td>
									<td>'.$row['p_maxdefault'].'</td>
									<td>'.$row['createdby'].'</td>
									<td>'.$row['createdate'].'</td>
									<td>'.$row['modifyby'].'</td>
									<td>'.$row['modifydate'].'</td>
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