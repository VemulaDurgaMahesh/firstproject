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
	$sql = "SELECT * FROM testformat_master";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
<td>Test Format ID</td><td>Main Group Code</td><td>MAIN GROUP NAME</td><td>Test Code</td><td>Test Name</td><td>Test Format Code</td><td>Test Format name</td><td>Lab Equipment name</td><td>Report Name</td><td>Gender</td><td>Gender Specific</td><td>Default Format</td><td>Sample Needed</td><td>Growth</td><td>Specimen</td><td>Col Cap1</td><td>Col Cap2</td><td>Col Cap3</td><td>Col Cap4</td><td>Min Time</td><td>Max Time</td><td>Accreditation Needed</td><td>Clinical History</td><td>No Normal Ranges</td><td>Template Needed</td><td>Multiple Organisms Needed</td><td>Auto Verification Required</td><td>Auto Approval Required</td><td>Result Values Analysis</td><td>ParameterName</td><td>ParameterDesc</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED TIME</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['TF_ID'].'</td>									
									<td> '.$row['TF_MainGroupCode'].' ></td>
									<td> '.$row['TF_MainGroupName'].' ></td>
									<td> '.$row['TF_TestCode'].' ></td>
									<td> '.$row['TF_TestName'].' ></td>
									<td> '.$row['TF_FormatCode'].' ></td>
									<td> '.$row['TF_FormatName'].' ></td>
									<td> '.$row['TF_LabeqName'].' ></td>
									<td> '.$row['TF_ReportTitle'].' ></td>
									<td> '.$row['TF_Gender'].' ></td>
									<td> '.$row['TF_GenderSpecific'].' ></td>
									<td> '.$row['TF_DefaultFormat'].' ></td>
									<td> '.$row['TF_SampleNeeded'].' ></td>
									<td> '.$row['TF_Growth'].' ></td>
									<td> '.$row['TF_Specimen'].' ></td>
									<td> '.$row['TF_Cap1'].' ></td>
									<td> '.$row['TF_Cap2'].' ></td>
									<td> '.$row['TF_Cap3'].' ></td>
									<td> '.$row['TF_Cap4'].' ></td>
									<td> '.$row['TF_Mintime'].' ></td>
									<td> '.$row['TF_Maxtime'].' ></td>
									<td> '.$row['TF_Accreditation'].' ></td>
									<td> '.$row['TF_ClinicalHistory'].' ></td>
									<td> '.$row['TF_NormalRanges'].' ></td>
									<td> '.$row['TF_TemplateNeeded'].' ></td>
									<td> '.$row['TF_MultiOrganisms'].' ></td>
									<td> '.$row['TF_AutoVerification'].' ></td>
									<td> '.$row['TF_AutoApproval'].' ></td>
									<td> '.$row['TF_ResultValueAlignment'].' ></td>
									<td> '.$row['TF_status'].' ></td>
									<td> '.$row['TF_deletestatus'].' ></td>
									<td> '.$row['TF_createdby'].' ></td>
									<td> '.$row['TF_createddate'].' ></td>
									<td>'.$row['TF_modifyby'].' ></td>
									<td>'.$row['TF_modifydate'].' ></td>			
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