<html >
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
$(document).ready(function()
{
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

	<form action="packagemaster.php" method="post" class="register" onsubmit="return validateForm()">
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
			   <?php include('dbcon.php');
			$count=1;
			$str="select * from package_master";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input readonly type='text' name='pdcode' value=PP".$count.">";
			?>
				<label>Tariff Name</label>
				<select id="tcode" name="tcode" class="tcode" >
			<?php 
$str="select * from tariff_master";
$result=$conn->query($str);
echo "<option value='NULL'>--Select Tariff---</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
}
?>
</select>
			    <input type="text" name="tname" id="tname" class="tname"/>
		        <label> Package </label> 
				<select id="pcode" name="pcode" class="pcode">
			<?php 
			  $str="select * from soc_masters";
			  $result=$conn->query($str);
			  echo "<option value='NULL'>--Select Package---</option>";
			     while($row = $result->fetch_assoc()) {
					 	echo "<option value='".$row['soc_servicecode']."'>".$row['soc_servicename']."</option>";
				 }
				?>
</select>
	<input type="text" name="pname" id="pname" class="pname" />
	<p>
	<label> Package Type </label>	<select name="ptype">	
	<option value="Profiles" />  Profiles 
	<option value="HealthCheckups" />  HealthCheckups
	<option value="OperationPackages" />  OperationPackages
				</select>
			   <label> PreDays </label>	<input type="text" name="predays" id="predays" class="predays" value="0"/>  
			  <label> PostDays </label>	<input type="text" name="postdays" class="postdays" id="postdays" value="0"/>  
			<label> Package Duration </label>	<input type="text" name="pduration" class="pduration" id="pduration" readonly />  </p>
			<p>
			<label> Package Amount </label>	<input type="text" name="pamt" class="pamt" id="pamt" readonly /> 
			<label> Package Actual Amount </label>	<input readonly type="text" name="p_ac_amt" class="p_ac_amt" id="p_ac_amt"  value=""/>
			<label> Department </label>
		<select id="dcode" name="dcode" class="dcode">
			<?php 
				$str="select * from department_master";
				$result=$conn->query($str);
				echo "<option value='NULL'>--Select Department---</option>";
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
				}
				?>
		</select>
			 <input type="text" name="dname" class="dname" id="dname"/></p><p>
			 <label> Effect From </label> <input type="date" name="fromDate"/>
			 <label> Effect To </label> <input type="date" name="toDate"/>
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
		  <tr>
		  <td><input type="checkbox" name="chk2"></td>
		  <td>
		  <select name="stype1" id="stype1" class="stype" style="margin-left:0;margin-right:0;">
		  <option value="">--Choose Service Type---</option>
		  <option value="Services">Services</option>
		  <option value="Consultations">Consultations </option>
		  <option>Investigations</option>
		  </select>
		  </td>
		  <td> 
		  <select class="sgrp" name="sgrp[]" style="margin-left:0;margin-right:0;">
		  <option value='NULL'>--Select Service--</option>
		  </select>
		  </td>
		  <td> 
		  <input type="text" name="sc[]" class="sc" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> 
        <input type="text" name="quant[]"  class="quant" value="1" style="margin-left:0;margin-right:0;">
        </td>
		  <td> 
		  <input type="text" name="rate[]" class="rate" readonly="" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> 
		  <input type="text" name="amount[]" class="amount" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> 
		  <input type="text" name="includes[]" class="includes"  style="margin-left:0;margin-right:0;">
		  </td>
		  <td> <input type="text" name="excludes[]" class="excludes" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> <input type="text" name="notes[]" class="notes" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> <input type="text" name="status[]" class="status" value="1" style="margin-left:0;margin-right:0;">
		  </td>
		  </tr>
	</tbody>
		  </table>  
		  <p>
</p>
</body>
</html>

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
			$pdcode=quote_smart($_POST['pdcode']);
			$tcode=quote_smart($_POST['tcode']);
			
			$tname=quote_smart($_POST['tname']);
			$pcode=quote_smart($_POST['pcode']);
			$pname=quote_smart($_POST['pname']);
			$ptype=quote_smart($_POST['ptype']);
			$predays=quote_smart($_POST['predays']);
			$pamt=quote_smart($_POST['pamt']);
			$p_act_amt=quote_smart($_POST['p_ac_amt']);
			$postdays=quote_smart($_POST['postdays']);
			$pdur=$_POST['predays'] + $_POST['postdays'];
			$dcode=quote_smart($_POST['dcode']);
			$dname=quote_smart($_POST['dname']);
			
			$effectFrom=quote_smart($_POST['fromDate']);
			$effectTo=quote_smart($_POST['toDate']);
			$stype=quote_smart($_POST['stype1']);
			$createdby=quote_smart($_SESSION['userid']);
			$createdate=quote_smart(date("Y-m-d"));
			$modifyby=quote_smart("");
			$modifydate=quote_smart("");
			$stmt = $conn->prepare("INSERT INTO package_master VALUES($tname, $tcode, $pcode, $pname, $pdcode, $ptype, $pdur, $pamt, $p_act_amt,$dcode,$predays,$postdays,$effectFrom, $effectTo,'".$_SESSION['username']."', $createdate, $modifyby, $modifydate)");
			$stmt->execute();
			$stmt1= $conn->prepare("DELETE FROM package_services WHERE pdcode=$pdcode");
			$stmt1->execute();
			for($i=0;$i<count($_POST['sc']);$i++)
			{
				
				$sc=quote_smart($_POST['sc'][$i]);
				$quant=quote_smart($_POST['quant'][$i]);
				$rate=quote_smart($_POST['rate'][$i]);
				$amount=quote_smart($_POST['amount'][$i]);
				$includes=quote_smart($_POST['includes'][$i]);
				$excludes=quote_smart($_POST['excludes'][$i]);
				$notes=quote_smart($_POST['notes'][$i]);
				$status=quote_smart($_POST['status'][$i]);
				$sgrp=quote_smart($_POST['sgrp'][$i]);
				
				$stmt2 = $conn->prepare("INSERT INTO package_services values($pdcode,$stype,$sgrp, $sc, $quant, $rate, $amount, $includes, $excludes,$notes,$status)");
				$stmt2->execute();
			}
			  ?>
         <script>alert('success');window.location.href='packagemaster.php';</script>                       
         <?php
	}
		
	
?>
