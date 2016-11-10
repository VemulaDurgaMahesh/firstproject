<?php

	if(($_SERVER['REQUEST_METHOD'] == 'POST'))
	{
		
		include('dbcon.php');
		
		function quote_smart($str)
		{
			if(is_string($str))
			{
				$str="'".$str."'";
				return $str;
			}
			else
			{
				return $str;
			}
		}
		
	}
		
	
?>

<html>

<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
function updateActualAmt()
{
		sum=0;
		$( ".amount" ).each(function( ) {
			sum=sum+parseInt($( this ).val());
			
		});
		$("#p_ac_amt").val(sum);
}
function updateDuration()
{
		sum = parseInt($( "#predays" ).val()) + parseInt($( "#postdays" ).val());
		$("#pduration").val(sum);
			
		
}
$(document).ready(function()
{
	$("#pname").val($("#pcode").val());
	$("#tname").val($("#tcode").val());
	updateDuration();
	$("#dname").val($("#dcode").val());
	$(".tcode").change(function()
	{
		var id=$(this).val();
		$("#tname").val(id);
	});
	
	
	$(document).on('change', '.sgrp', function(event) {
		var id=$(this).val();
		$(this).parent().next().children('.sc').val(id);
		var val1=$(this).parent().prev().children('.stype').val();
		if(val1=="Consultations")        
			var dataString = 'id13='+ id;
		else
			var dataString = 'id12='+id;
		var Rate = $(this).parent().next().next().next().children('.rate');
		$.ajax
		({
			type: "POST",
			url: "pack1.php",
			data: dataString,
			cache: false,
			success: function(data)
			{
				Rate.val(data);
				var id1=Rate.parent().prev().children('.quant').val();
				var x=data*id1;
				Rate.parent().next().children('.amount').val(x).trigger("change");
			} 
		});
		
		
	});
	
	$(document).on('change', '.amount', function(event) {

		sum=0;
		
		$( ".amount" ).each(function( ) {
			sum=sum+parseInt($( this ).val());
			
		});
		$("#p_ac_amt").val(sum);
	});
	
   $(".pcode").change(function()
	{
		var id=$(this).val();
		$("#pname").val(id);
		var dataString = 'id10='+id;
		$.ajax
		({
			type: "POST",
			url: "pack1.php",
			data: dataString,
			cache: false,
			success: function(data)
			{
				$("#pamt").val(data);
			} 
		});
	});

   $(document).on('change', '.quant', function(event) {
		var id1=parseInt($(this).val());
				var id2=parseInt($(this).parent().next().children('.rate').val());
				var x=id2*id1;
	  $(this).parent().next().next().children('.amount').val(x);
	  
	 });
	 
	
	 
	 
	 $('#postdays').change(function () { 
		var id=parseInt($(this).val());
		var id1=parseInt($('#predays').val());
		var x=id+id1;
	  $("#pduration").val(x);
	 });
     $(".dcode").change(function()
	{
		var id=$(this).val();
		$("#dname").val(id);
	});
	

	$(document).on('change', '.stype', function(event) {
		var id=$(this).val();
		var dataString = 'id11='+ id;
		var thisElement = $(this);
		$.ajax
		({
			type: "POST",
			url: "pack.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				thisElement.parent().next().children('.sgrp').html(html);
			} 
		});
	});		
});
</script>
<?php include('menu.php'); ?>
<script>

function deleteRow(id,row) {
    document.getElementById(id).deleteRow(row);
	
}

function insRow(id) {
    var filas = document.getElementById("myTable").rows.length;
    var x = document.getElementById(id).insertRow(filas);
	var x0 = x.insertCell(0);
    var x1 = x.insertCell(1);
	var x2 = x.insertCell(2);
	var x3 = x.insertCell(3);
	var x4 = x.insertCell(4);
	var x5 = x.insertCell(5);
	var x6 = x.insertCell(6);
	var x7 = x.insertCell(7);
	var x8 = x.insertCell(8);
	var x9 = x.insertCell(9);
	var x10 = x.insertCell(10);
	x0.innerHTML = '<input type="checkbox" name="chk2">';
    x1.innerHTML = '<select name="stype1" id="stype1" class="stype" style="margin-left:0;margin-right:0;"><option>--Choose Service Type---</option><option value="Services">Services</option><option value="Consultations">Consultations </option><option>Investigations </option></select>';
    x2.innerHTML ='<select class="sgrp" name="sgrp[]" style="margin-left:0;margin-right:0;"><option value="">--Select Service--</option></select>';
	x3.innerHTML='<input type="text" name="sc[]" class="sc" style="margin-left:0;margin-right:0;">';
	x4.innerHTML='<input type="text" name="quant[]" class="quant"  value="1" style="margin-left:0;margin-right:0;">';
	x5.innerHTML='<input type="text" name="rate[]" readonly="" class="rate" style="margin-left:0;margin-right:0;">';
	x6.innerHTML='<input type="text" name="amount[]" class="amount" style="margin-left:0;margin-right:0;">';
	x7.innerHTML='<input type="text" name="includes[]" class="includes"  style="margin-left:0;margin-right:0;">';
	x8.innerHTML='<input type="text" name="excludes[]" class="excludes" style="margin-left:0;margin-right:0;">';
	x9.innerHTML='<input type="text" name="notes[]" class="nodes" style="margin-left:0;margin-right:0;">';
	x10.innerHTML='<input type="text" name="status[]" class="status" value="1" style="margin-left:0;margin-right:0;">';
	
}
function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
				updateActualAmt();
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
 function validateForm()
 {
		
	 if($("#tcode").val() == 'NULL'  )
	 {
		 alert("Please select tariff name");
		 return false;
	 }
	 else if($("#pcode").val() == 'NULL' )
	 {
		 alert("Please select Package");
		 return false;
	 }
	 else if($("#dcode").val() == 'NULL'  )
	 {
		 alert("Please select Department");
		 return false;
	 }
	 var flag = 1;
	 $( ".sgrp" ).each(function( ) {
			if($(this ).val() =='NULL')
				flag=0;
			
		});
	 
	 if(flag == 0 )
	 {
		 alert("Please select Service Group");
		 return false;
	 }
	 return true;
 }

</script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
</head>
<body>

	<form action="updatePackagemaster.php" method="post" class="register" onsubmit="return validateForm()">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="packagemastersearch.php">
                Search
              </a>
              </li>
                <li><a href="packageMastersView.php">View</a></li>
                <li>
                  <button class="button" type="submit" >Save</button></li>
				  </ul>
				  </div>
</p>
	           <h1>  Package Master </h1>
			
			   <label> Package Design Code </label>	
			   <?php 
			echo "<input readonly type='text' name='pdcode' value=".$_POST['pm_pkgdesigncode'].">";
			?>
				<label>Tariff Name</label>
				<select id="tcode" name="tcode" class="tcode" >
			<?php 
$str="select * from tariff_master";
$result=$conn->query($str);
    while($row = $result->fetch_assoc()) {
		if(strcmp($row['tariff_code'],$_POST['pm_tariffcode'])==0)
			echo "<option selected='selected' value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
		else
			echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
}
?>
</select>
			    <input readonly type="text" name="tname" id="tname" class="tname"/>
		        <label> Package </label> 
				<select id="pcode" name="pcode" class="pcode">
			<?php 
			  $str="select * from soc_masters";
			  $result=$conn->query($str);
			  while($row = $result->fetch_assoc()) {
					 if(strcmp($row['soc_servicecode'],$_POST['pm_pkgcode'])==0)
						 echo "<option selected='selected' value='".$row['soc_servicecode']."'>".$row['soc_servicename']."</option>";
					else
					 	echo "<option value='".$row['soc_servicecode']."'>".$row['soc_servicename']."</option>";
				 }
				?>
</select>
			     <input readonly type="text" name="pname" id="pname" class="pname" />
				 <p>
				 <label> Package Type </label>	<select name="ptype">
				<?php echo "<option selected='selected' value='".$_POST['pm_pkgtype']."'>".$_POST['pm_pkgtype']."</option>";?>				 
			    <option value="Profiles" />  Profiles 
				<option value="HealthCheckups" />  HealthCheckups
				<option value="OperationPackages" />  OperationPackages
				</select>
			   <label> PreDays </label>	
			   <input type="text" name="predays" id="predays" class="predays" <?php echo "value =".$_POST['pm_predays']; ?> />  
			  <label> PostDays </label>	
			  <input type="text" name="postdays" class="postdays" id="postdays" <?php echo "value =".$_POST['pm_postdays']; ?> />  
			<label> Package Duration </label>	<input readonly type="text" name="pduration" class="pduration" id="pduration" readonly />  </p>
			<p>
			<label> Package Amount </label>	<input readonly type="text" name="pamt" class="pamt" id="pamt" readonly <?php echo "value =".$_POST['pm_pkgamount']; ?> /> 
			<label> Package Actual Amount </label>	<input readonly type="text" name="p_ac_amt" class="p_ac_amt" id="p_ac_amt"  <?php echo "value =".$_POST['pm_pkgactualamt']; ?> >
			<label> Department </label>
		<select id="dcode" name="dcode" class="dcode">
			<?php 
				$str="select * from department_master";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
					if(strcmp($row['tariff_code'],$_POST['pm_pkgdeptcode'])==0)
						 echo "<option selected='selected' value='".$row['dept_code']."'>".$row['dept_name']."</option>";
					 else
					echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
				}
				?>
		</select>
			 <input readonly type="text" name="dname" class="dname" id="dname" ></p><p>
			 <label> Effect From </label> <input type="date" <?php echo "value=".$_POST['pm_effectfrom'];?> name="fromDate">
			 <label> Effect To </label> <input type="date" <?php echo "value=".$_POST['pm_effectto'];?> name="toDate">
		</p><p>
		<input type="button" onclick="insRow('myTable')" value="Insert row" style="border:1px solid black;">
	    <INPUT type="button" value="Delete Row" onclick="deleteRow('myTable')" style="border:1px solid black;"/>
		</p><p></p>
		  <table  id="myTable" style="border: 1px solid black">
		  <thead>
		   <tr>
		  <th> Delete </th> 
		  <th> Service Type</th>
		  <th> Service group </th>
		   <th> Service/Consultant </th> 
		   <th>Quantity</th>
		    <th> Rate </th> 
		    <th> Amount </th> 
		    <th>Includes </th> 
		    <th>Excludes </th>
		    <th>Notes</th> 
		    <th> Status </th>
		  </tr>
		  </thead>
		  <tbody>
		 
		  <?php
				
				$pdc=quote_smart($_POST['pm_pkgdesigncode']);
				$str="select * from package_services where pdcode=$pdc";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td><input type='checkbox' name='chk2'></td>";
					foreach($row as $k => $v)
					{
						if(strcmp($k,"pdcode")==0)
							;
						else if(strcmp($k,"pm_servicetype")==0)
						{
							echo "<td><select name='stype1' id='stype1' class='stype' style='margin-left:0;margin-right:0;'>";
							echo "		  
							<option selected='selected' value='".$v."'>".$v."</option>
							<option value='Services'>Services</option>
							<option value='Consultations'>Consultations </option>
							<option>Investigations</option>
							</select></td>";
						}	
						else if(strcmp($k,"pm_servicegroup")==0)
						{
							echo "<td><select class='sgrp' name='sgrp[]' style='margin-left:0;margin-right:0;'>
								<option selected='selected' value='".$v."'>".$v."</option>	
								</select></td>";
						}
						else if(strcmp($k,"pm_serviceconsult")==0)
							echo "<td><input readonly type='text' name='sc[]' class='sc' style='margin-left:0;margin-right:0;'value='".$v."'></td>";
						else if(strcmp($k,"pm_quantity")==0)
							echo "<td><input type='text' name='quant[]'  class='quant' value='".$v."' style = 'margin-left:0;margin-right:0;'></td>";
						else if(strcmp($k,"pm_rate")==0)
							echo " <td><input type='text' name='rate[]' class='rate' readonly value='".$v."'style='margin-left:0;margin-right:0;'> </td>";
						else if(strcmp($k,"pm_amount")==0)
							echo "<td><input readonly type='text' name='amount[]' class='amount' value='".$v."'style='margin-left:0;margin-right:0;'> </td>";
						else if(strcmp($k,"pm_includes")==0)
							echo "<td><input type='text' name='includes[]' class='includes'  value='".$v."'style='margin-left:0;margin-right:0;'></td>";
						else if(strcmp($k,"pm_excludes")==0)
							echo "<td> <input type='text' name='excludes[]' class='excludes' value='".$v."'style='margin-left:0;margin-right:0;'></td>";	
						else if(strcmp($k,"pm_notes")==0)
							echo "<td> <input type='text' name='notes[]' class='notes' value='".$v."'style='margin-left:0;margin-right:0;'></td>";
						else if(strcmp($k,"pm_status")==0)
							echo "<td> <input type='text' name='status[]' class='status' value='".$v."' style='margin-left:0;margin-right:0;'> </td>";
					}
					echo "</tr>";
				}
				
		  ?>
		  
	</tbody>
		  </table>  
		  <p>
</p>
</body>
</html>

