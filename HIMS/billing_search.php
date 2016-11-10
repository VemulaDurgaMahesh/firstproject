
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="billing_search_view.php" method="GET">
<p>
<table border=1 class="act">
	<tr><td>BILLING HEADER</td>
<td>BILLING SERVICETYPE</td>
</tr>
    <tr><td><input type='text' name='t1' id='t1'></td><td><select name="t2" id="t2">
	<option value='WardCharges'>WardCharges</option>
				 <option value='ConsultationCharges'>ConsultationCharges</option>
				 <option value='LaboratoryCharges'>LaboratoryCharges</option>
				 <option value='ServiceCharges'>ServiceCharges</option>
				 <option value='InvestigationCharges'>InvestigationCharges</option>
				 <option value='PharmacyCharges'>PharmacyCharges</option>
				 <option value='ProcedureCharges'>ProcedureCharges</option>
				 <option value='ProfessionalCharges'>ProfessionalCharges</option>
				</select></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>
</html>