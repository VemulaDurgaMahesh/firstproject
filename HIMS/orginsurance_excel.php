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
	$sql = "SELECT * FROM organisation";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$output .=' 
			<table class="table" bordered="1">
			<tr>
				<td>ORGANISATION ORIGIN</td><td>ORGANISATION CODE</td><td>ORGANISATION NAME</td><td>ORGANISATION CONTRACT NO</td><td>ORGANISATION CONTRACTDATE</td><td>ORGANISATION CONTRACT PERSON</td><td>ORGANISATION EFFECTFROM</td><td>ORGANISATION EFFECTTO</td><td>ORGANISATION AUTHORISEDPERSON</td><td>ORGANISATION OPORG</td><td>ORGANISATION OPEMP</td><td>ORGANISATION IPORG</td><td>ORGANISATION IPEMP</td><td>ORGANISATION CONSULTAIONNO</td><td>ORGANISATION CONSULTAIONDATES</td><td>ORGANISATION TARRIFPRIORITYFOR</td><td>ORGANISATION TARRIFPRIORITYIP</td><td>ORGANISATION TARRIFPRIORITYIPDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYIPDEFAULT</td><td>ORGANISATION TARRIFPRIORITYIPDEFAULTDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYOP</td><td>ORGANISATION TARRIFPRIORITYOPDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYOPDEFAULT</td><td>ORGANISATION TARRIFPRIORITYOPDEFAULTDISCOUNT</td><td>ORGANISATION REMARKS</td><td>ORGANISATION SERVICEPRIORITY</td><td>ORGANISATION DEFAULTSERVICE</td><td>ORGANISATION CONSULATATIONPRIORITY</td><td>ORGANISATION CONSULATATIONDEFAULT</td><td>ORGANISATION PROFESSIONALPRIORITY</td><td>ORGANISATION PROFESSIONALDEFAULT</td><td>ORGANISATION INVESTIGATIONPRIORITY</td><td>ORGANISATION INVESTIGATIONDEFAULT</td><td>ORGANISATION PROCEDUREPRIORITY</td><td>ORGANISATION PROCEDUREDEFAULT</td><td>ORGANISATION WARDPRIORITY</td><td>ORGANISATION WARDDEFAULT</td><td>ORGANISATION PHARMACYPRIORITY</td><td>ORGANISATION PHARMACYDEFAULT</td><td>ORGANISATION CREATEDBY</td><td>ORGANISATION CREATEDATE</td><td>ORGANISATION MODIFIEDBY</td><td>ORGANISATION MODIFIEDDATE</td><td>ORGANISATION STATUS</td>
			</tr>
		';
		while($row = mysql_fetch_array($result))
			{
				$output .= '
								<tr>
									<td> '.$row['org_origin'].'</td>
									<td>'.$row['org_orcode'].'</td>
									<td>'.$row['org_orname'].'</td>
									<td>'.$row['org_cno'].' </td>
									<td>'.$row['org_cdate'].'</td>
									<td>'.$row['org_cperson'].' </td>
									<td>'.$row['org_effectf'].'</td>
									<td>'.$row['org_effectt'].'</td>
									<td>'.$row['org_aperson'].'</td>
									<td>'.$row['org_oporgp'].'</td>
									<td>'.$row['org_opempp'].'</td>
									<td>'.$row['org_iporgp'].'</td>
									<td>'.$row['org_ipempp'].'</td>
									<td>'.$row['org_consulno'].'</td>
									<td>'.$row['org_consulday'].'</td>
									<td>'.$row['org_tarriffpriorityfor'].'</td>
									<td>'.$row['org_tarifpri_IP'].'</td>
									<td>'.$row['org_tarifpri_disc_IP'].'</td>
									<td>'.$row['org_tarifdepri_IP'].'</td>
									<td>'.$row['org_tarifdefault_disc_IP'].'</td>
									<td>'.$row['org_tpriop'].'</td>
									<td>'.$row['org_tpridisop'].'</td>
									<td>'.$row['org_dtpriop'].'</td>
									<td>'.$row['org_dtpridisop'].'</td>
									<td>'.$row['org_remarks'].'</td>
									<td>'.$row['org_scpri'].'</td>
									<td>'.$row['org_defscp'].'</td>
									<td>'.$row['org_ccpri'].'</td>
									<td>'.$row['org_defccp'].'</td>
									<td>'.$row['org_pcpri'].'</td>
									<td>'.$row['org_defpcp'].'</td>
									<td>'.$row['org_icpri'].'</td>
									<td>'.$row['org_deficp'].'</td>
									<td>'.$row['org_defprcp'].'</td>
									<td>'.$row['org_wcpri'].'</td>
									<td>'.$row['org_defwcp'].'</td>
									<td>'.$row['org_phpri'].'</td>
									<td>'.$row['org_defphcp'].'</td>
									<td>'.$row['org_createdby'].'</td>
									<td>'.$row['org_createdate'].'</td>
									<td>'.$row['org_modifyby'].'</td>
									<td>'.$row['org_modifydate'].'</td>
									<td>'.$row['org_status'].'</td>									
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