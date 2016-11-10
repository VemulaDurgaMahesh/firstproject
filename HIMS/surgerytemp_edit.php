
<?php

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
    var popup;
    function SelectName(selectedRow) {
      console.log(selectedRow);
      var location = "surgeytem_surgname.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300,scrollbars=1");
        popup.focus();
        return false
    }
</script><?php include('menu.php'); ?>
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
      url: "surgertmp1.php",
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
  
  x0.innerHTML = '<input type="checkbox" name="chk2">';
    x1.innerHTML = '<select name="stype[]" id="stype1" class="stype" style="margin-left:0;margin-right:0;"><option value="">--Choose Service Type---</option><OPTION value="Surgeon">Surgeon</OPTION><OPTION value="Assistant Surgeon">Assistant Surgeon</OPTION><option value="Anesthetist">Anesthetist</option>  <option value="AssistantAnesthetist">Assistant Anesthetist</option><option value="Perfusionist">Perfusionist</option><option value="Nurse">Nurse</option><option value="Other">Other</option><option value="OTCharges">OTCharges</option></select>';
    x2.innerHTML ='<select class="sgrp" name="sgrp[]" style="margin-left:0;margin-right:0;"><option value="">--Select Service--</option></select>';
  x3.innerHTML='<input type="text" name="sc[]" class="sc" readonly style="margin-left:0;margin-right:0;">';
  x4.innerHTML='<input type="text" name="quant[]" class="quant"  value="1" style="margin-left:0;margin-right:0;">';
  x5.innerHTML='<input type="text" name="rate[]" class="rate" style="margin-left:0;margin-right:0;">';
  x6.innerHTML='<input type="text" name="amount[]" class="amount" style="margin-left:0;margin-right:0;">';
  x7.innerHTML='<input type="text" name="includes[]"  style="margin-left:0;margin-right:0;">';
  x8.innerHTML='<select class="form-control" name="bh[]" style="margin-left:0;margin-right:0;">         <?php
                       $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                       $result1 = mysql_query("SELECT * FROM billing where billing_status=1");
                         while ($row = mysql_fetch_array($result1)) 
                         {
                            unset($billing_header);
                          $billing_header = $row['billing_header']; 
                          echo '<option value="'.$billing_header.'">'.$billing_header.'</option>';
                         } ?></select>';
 
  
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

  <form action="surgery_templateupdate.php" method="post" class="register" onsubmit="return validateForm()">
  <p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="surgerytemplate_search.php">
                Search
              </a>
              </li>
                <li><a href="view_surgerytemplate.php">View</a></li>
                <li>
                  <button class="button" type="submit" >Save</button></li>
          </ul>
          </div>
</p>

       <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Surgery Template Master </h2>
        </div>
    <p class="agreement">
      <label for="hname"> Template Code: </label>
       <input type="text" class="form-control" name="sgtcode" value="<?php echo $_GET['t7'] ?>" readonly style="width:185px; height:23px;">
      </p><br><br><p class="agreement">
      <label for="hcode">Template Name:</label>
      <input type="text" name="sgtn" placeholder="Template Name" value="<?php echo $_GET['t1'] ?>" style="width:185px; height:23px;">
      </p><br><br><p class="agreement">
      <label for="lcode">Surgery Name</label>
    <input type="text" id="serviceName1" name="tn1" readonly onclick="SelectName(1)" value="<?php echo $_GET['t9'] ?>" style="width:185px; height:23px;">
  <input type="text" id="serviceCode1" name="tn2"  readonly value="<?php echo $_GET['t2'] ?>" style="width:185px; height:23px;margin-left:+1px;">
  <input type="text"  id="rate1" name="tn"  readonly value="<?php echo $_GET['t11'] ?>" style="width:185px; height:23px;margin-left:+1px;">
      
      </p><br><br>
      <p>
    <input type="button" onclick="insRow('myTable')" value="Insert row" style="border:1px solid black;">
      <INPUT type="button" value="Delete Row" onclick="deleteRow('myTable')" style="border:1px solid black;"/>
    </p><br><br>
         
      <table  id="myTable" style="border: 1px solid black">
      <thead>
       <tr>
      <th> Delete </th> 
      <th> Attendent Type</th>
      <th> Service No </th>
       <th> Service Name </th> 
       <th>Quantity</th>
        <th> Rate </th> 
        <th> Amount </th> 
        <th>Price% </th> 
        <th>Billing header </th>
       </tr>
      </thead>
      <tbody>

      <?php
				
				$pdc=quote_smart($_GET['t7']);
				$str="select * from srgtmp_services where st_code=$pdc";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) 
				{
				echo "<tr><td><input type='checkbox' name='chk2'></td>";
				foreach($row as $k => $v)
				{
					if(strcmp($k,"st_code")==0)
							;
						else if(strcmp($k,"attendenttype")==0)
						{
						echo "<td>
      					<select name='stype[]' id='stype1' class='stype' style='margin-left:0;margin-right:0;'>";
							echo "		  
							<option selected='selected' value='".$v."'>".$v."</option>
							 <OPTION value='Surgeon'>Surgeon</OPTION>
						      <OPTION value='Assistant Surgeon'>Assistant Surgeon</OPTION>
						      <option value='Anesthetist'>Anesthetist</option>
						      <option value='AssistantAnesthetist'>Assistant Anesthetist</option>
						      <option value='Perfusionist'>Perfusionist</option>
						     <option value='Nurse'>Nurse</option>
						      <option value='Other'>Other</option>
						    <option value='OTCharges'>OTCharges</option>
							</select></td>";
						}
					else if(strcmp($k,"servicename")==0)
						{
							echo "<td><select class='sgrp' name='sgrp[]' style='margin-left:0;margin-right:0;'>
								<option selected='selected' value='".$v."'>".$v."</option>	
								</select></td>";
						}
						else if(strcmp($k,"srvicecode")==0)
			echo "<td><input type='text' name='sc[]' class='sc' readonly value='".$v."' style='margin-left:0;margin-right:0;'></td>";
						else if(strcmp($k,"quantity")==0)
							echo "<td><input type='text' name='quant[]'  class='quant' value='".$v."' style='margin-left:0;margin-right:0;'></td></td>";
						else if(strcmp($k,"rate")==0)
							echo " <td> <input type='text' name='rate[]' class='rate'  style='margin-left:0;margin-right:0;' value='".$v."'></td>";
						else if(strcmp($k,"amount")==0)
							echo "<td> <input type='text' name='amount[]' class='amount' style='margin-left:0;margin-right:0;' value='".$v."'></td>";
						else if(strcmp($k,"price%")==0)
							echo "<td><input type='text' name='includes[]'   style='margin-left:0;margin-right:0;' value='".$v."'></td>";
						else if(strcmp($k,"billingheader")==0)
						{
						echo "<td>
      					<select name='bh[]' style='margin-left:0;margin-right:0;'> ";
      					echo "		  
							<option selected='selected' value='".$v."'>".$v."</option>";
							$connect = mysql_connect ("localhost","root","") or die();
        					  mysql_select_db("hospital")or die(); 
						$result1 = mysql_query('SELECT * FROM billing where billing_status=1');
                         while ($row = mysql_fetch_array($result1)) 
                         {
                            unset($billing_header);
                          $billing_header = $row['billing_header']; 
                          echo '<option value="'.$billing_header.'">'.$billing_header.'</option>';
                       		}echo " ?> 	</select></td>";
						}
					}}	
				?>
  </tbody>
      </table>  
      <br>
      <p class="agreement">
      <label>Surgery Procedure</label>
     <textarea  rows="10" type="text" name="sprocedure" cols="100" style="border: 1px solid black" >
      <?php echo $_GET['t10'] ?></textarea>
</p>
</body>
</html>

