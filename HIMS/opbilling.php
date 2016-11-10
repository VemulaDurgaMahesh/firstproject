<?php
session_start();
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Op Billing </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script language="javascript">
var popupWindow = null;
function positionedPopup(url,winName,w,h,t,l,scroll){
settings =
'height='+h+',width='+w+',top='+t+',left='+l+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}
</script>
<script type="text/javascript">
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
				Rate.parent().next().children('.amount').val(x);
			} 
		});
		
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
	
	x0.innerHTML = '<input type="checkbox" name="chk2">';
    x1.innerHTML = ' <img src="search.png" onclick="SelectName()" />';
    x2.innerHTML ='<input type="text" name="umr[]" id="umr[]" />';
	x3.innerHTML='<input type="text" name="umr1[]" id="umr1[]" />';
	x4.innerHTML='<input type="text" name="quant[]"  class="quant" value="1" style="margin-left:0;margin-right:0;">';
	x5.innerHTML='<input type="text" name="rate[]" id="rate[]" class="rate" readonly="" style="margin-left:0;margin-right:0;">';
	x6.innerHTML='<input type="text" name="amount[]" id="amount[]" class="amount" style="margin-left:0;margin-right:0;">';
	x7.innerHTML='<input type="text" name="concession[]"  id="concession" style="margin-left:0;margin-right:0;">';
	x8.innerHTML='<input type="text" name="servicetype[]" id="servicetype[]" readonly style="margin-left:0;margin-right:0;">';	
	x9.innerHTML='<input type="text" name="status" class="status" value="1" style="margin-left:0;margin-right:0;">';
	
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
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 

</script>
<script type="text/javascript">
    var popup;
    function SelectName() {
        popup = window.open("opbillingservice.php", "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
</script>
</head>
<body>
<?php include("menu.php");?>
	<form action="#" method="post" class="register">

	<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2>OP Billing </h2>
	</div>
				<p>
				<fieldset class="row1">
              <legend> Patient Details </legend>			
			<input type="checkbox" name="ctype" value="osp"/> <label>OSP</label>
			<label>ConsultDate:</label>
			<input type="text" name="current-date" value="<?php echo date('Y-m-d H:i:s');?>">
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>BillNum:</label>
			<input type="text" name="bno">
			<label>BillDate:</label>
			<input type="text" name="cd" value="<?php echo date('Y-m-d H:i:s');?>">
			<label>RegNum:</label>
			<input type="text" name="rgno">
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label> UMR No:</label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from new_registration";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='umrcode' value=UMR".$count." readonly>";
			?>
			<label>Patient Name:</label>
			<input type="text" name="pn">
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>M.Status</label>
			<select name="ms">
			<option value="0">--Not specified--</option> 
			 <option value="1">Married</option> 
			  <option value="2">Single</option>
			  <option value="3">widowed</option>
			  <option value="4">Divorce</option> 
			   </select>
			   <label>F/H Name:</label>
			 <select name="fthr">
			 <option value="1">S/O</option> 
			  <option value="2">W/O</option> 
			   <option value="3">B/O</option>
			   <option value="4">D/O</option> 
			   </select>
			   <input type="text" name="father">
			   <label>P.Type</label>
			<select name="bgp">
			<option value="0">--Not specified--</option> 
			 <option value="g">General</option> 
			  <option value="s">Staff</option>
			  <option value="sd">StaffDependent</option> 
			  <option value="crp">Corporate</option>
			  <option value="ins">Insurance</option>
			  </select>
			  </fieldset>
			  </p>
			  <p>
			<fieldset>
			<label>D.O.B:</label>
			<input type="date"  name="dob" placeholder="m/d/y" required="required">
			<label>Age(Y/M/D):</label>
			<input type="text" name="age">
			<label>Gender:</label>
			<select name="gndr">
			 <option value="1">Male</option> 
			  <option value="2">Female</option> 
			   </select>
			   <label>Occup:</label>
			<input type="text" name="ocpn" >
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>Ref.source:</label>
			<select name="refer">
			<option value="1">Walkin</option>
			<option value="2">Staff Doctors</option> 
			 <option value="3">Other Doctors</option> 
			 <option value='4'>Other Hospitals</option>  
			 <option value="5">Staff</option>
			 <option value="6">Organizations</option>
			 <option value="7">Others</option>
			 <option value="8">Health Co-ordinates</option>  
			 </select>
			 <label>ReferredBy:</label>
			<input type="text" name="rfrd">
			<input type="text" name="rfrd1">
			<label>Mobile No:</label>
			<input type="text" name="mbl">
			</fieldset>
		    </p>
			<p>
		    <fieldset>
		    <label>Blood Group:</label>
			<select name="bgp">
			 <option value="O+">O+</option> 
			  <option value="O-">O-</option>
			  <option value="A+">A+</option> 
			  <option value="A-">A-</option>
			  <option value="B+">B+</option>
			  <option value="B-">B-</option>
			  <option value="AB+">AB+</option>
			  <option value="AB-">AB-</option>
			   </select>
			   <label>Consultant:</label>
			<input type="text" name="cnsltnt">
			<input type="text" name="cnsltnt1">
			<input type="checkbox" name="ctype" value="cnslt"/> <label>Referal</label>
			<input type="button" name="qref" value="Quick Ref">
			</fieldset>
			</p>
			<p>
			<fieldset>
			 <input type="checkbox" name="ctype" value="oc"/> <label>overall concession</label>
			 <input type="checkbox" name="ctype" value="cp"/> <label>concession in %</label>
			 <input type="text" name="cnsltnt1"><label>:Conc in Amt</label>
			 <input type="text" name="rm">
			 <input type="button" name="rmve" value="Remove">
			 </fieldset>
			 </p>			  
			  <p>
		<input type="button" onclick="insRow('myTable')" value="Insert row" style="border:1px solid black;">
	    <INPUT type="button" value="Delete Row" onclick="deleteRow('myTable')" style="border:1px solid black;"/>
		</p><p></p>
		  <table  id="myTable" style="border: 1px solid black">
		  <thead>
		   <tr>
		  <th> Delete </th> 		  
		  <th> Search </th>
		   <th> Service name</th> 
		    <th> Service code</th> 
		   <th>Quantity</th>
		    <th> Rate </th> 
		    <th> Amount </th> 
		    <th>Concession </th> 
		    <th> Service Type</th>		    		    
		    <th> Status </th>
		  </tr>
		  </thead>
		  <tbody>
		  <tr>
		  <td><input type="checkbox" name="chk2"></td>
		  <td>
		  <img src="search.png" onclick="SelectName()" />
		  </td>
		  <td> 
		  <input type="text" name="umr[]" id="umr[]" />		  
		  </td>
		  <td> 
		  <input type="text" name="umr1[]" id="umr1[]" />
		  </td>
		  <td> 
        <input type="text" name="quant[]"  class="quant" value="1" style="margin-left:0;margin-right:0;">
        </td>
		  <td> 
		  <input type="text" name="rate[]" id="rate[]" class="rate" readonly="" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> 
		  <input type="text" name="amount[]" id="amount[]" class="amount" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> 
		  <input type="text" name="concession[]"  id="concession" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> <input type="text" name="servicetype[]" id="servicetype[]" readonly style="margin-left:0;margin-right:0;">
		  </td>		  
		  <td> <input type="text" name="status[]" class="status" value="1" style="margin-left:0;margin-right:0;">
		  </td>
		  </tr>
	</tbody>
		  </table>		
		</p>
			  <p>
			  <fieldset>
			  <label>Gross Amt</label> <input type="text" name="gamt">
			  <label>Concession</label><label>:Conc in Amt</label><input type="text" name="cnsn">
			  <label>Net Amount</label><input type="text" name="ntamt">
			  </fieldset>
			  </p>
</form>
</body>
</html>