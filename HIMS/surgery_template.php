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
  x8.innerHTML='<select class="form-control" name="bh[]" style="margin-left:0;margin-right:0;"><?php
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

  <form action="surgery_template.php" method="post" class="register" onsubmit="return validateForm()">
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
       <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM surgery_template") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $srtcode = 'STM'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $srtcode = 'STM'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="wgc" value="<?php echo $srtcode ?>" disabled style="width:185px; height:23px;">
      </p><br><br><p class="agreement">
      <label for="hcode">Template Name:</label>
      <input type="text" name="sgtn" placeholder="Template Name" style="width:185px; height:23px;">
      </p><br><br><p class="agreement">
      <label for="lcode">Surgery Name</label>
    <input type="text" id="serviceName1" name="tn1" readonly onclick="SelectName(1)" style="width:185px; height:23px;">
  <input type="text" id="serviceCode1" name="tn2"  readonly style="width:185px; height:23px;margin-left:+1px;">
  <input type="text"  id="rate1" name="tn"  readonly style="width:185px; height:23px;margin-left:+1px;">
      
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
      <tr>
      <td><input type="checkbox" name="chk2"></td>
      <td>
      <select name="stype[]" id="stype1" class="stype" style="margin-left:0;margin-right:0;">
      <option value="">--Choose Service Type---</option>      
     <OPTION value="Surgeon">Surgeon</OPTION>
      <OPTION value="Assistant Surgeon">Assistant Surgeon</OPTION>
      <option value="Anesthetist">Anesthetist</option>
      <option value="AssistantAnesthetist">Assistant Anesthetist</option>
      <option value="Perfusionist">Perfusionist</option>
     <option value="Nurse">Nurse</option>
      <option value="Other">Other</option>
    <option value="OTCharges">OTCharges</option>
      </select>
      </td>
      <td> 
      <select class="sgrp" name="sgrp[]" style="margin-left:0;margin-right:0;">
      <option value='NULL'>--Select Service--</option>
      </select>
      </td>
      <td> 
      <input type="text" name="sc[]" class="sc" readonly style="margin-left:0;margin-right:0;">
      </td>
      <td> 
        <input type="text" name="quant[]"  class="quant" value="1" style="margin-left:0;margin-right:0;">
        </td>
      <td> 
      <input type="text" name="rate[]" class="rate"  style="margin-left:0;margin-right:0;">
      </td>
      <td> 
      <input type="text" name="amount[]" class="amount" style="margin-left:0;margin-right:0;">
      </td>
      <td> 
      <input type="text" name="includes[]"   style="margin-left:0;margin-right:0;">
      </td>
      <td>         
        <select name="bh[]" style="margin-left:0;margin-right:0;"> 
         <?php
                      
                       $result1 = mysql_query("SELECT * FROM billing where billing_status=1");
                         while ($row = mysql_fetch_array($result1)) 
                         {
                            unset($billing_header);
                          $billing_header = $row['billing_header']; 
                          echo '<option value="'.$billing_header.'">'.$billing_header.'</option>';
                         } ?>
        </select>
      </td>      
      </tr>
  </tbody>
      </table>  
      <br>
      <p class="agreement">
      <label>Surgery Procedure</label>
     <textarea  rows="10" type="text" name="sprocedure" cols="100" style="border: 1px solid black">
      Surgery Procedure</textarea>
</p>
</body>
</html>

<?php
  if(($_SERVER['REQUEST_METHOD'] == 'POST'))
  {
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
    include('dbcon.php');
       $sgtcode=$srtcode;      
       $sgtname=$_POST['sgtn'];     
      $sgcode=$_POST['tn2'];     
      $ptype=$_POST['sprocedure'];
     
  
      $stmt = mysql_query("INSERT INTO surgery_template (st_code,st_name,st_sgcode,st_procedure,st_createdby) VALUES('$sgtcode', '$sgtname', '$sgcode', '$ptype','".$_SESSION['username']."')");  
      if($stmt)
      {
       
       for($i=0;$i<count($_POST['stype']);$i++)
      {
        $sgtcode1=quote_smart($srtcode); 
         
        $stype=quote_smart($_POST['stype'][$i]);
        $quant=quote_smart($_POST['quant'][$i]);
        $rate=quote_smart($_POST['rate'][$i]);
        $amount=quote_smart($_POST['amount'][$i]);
        $includes=quote_smart($_POST['includes'][$i]);
        $billing=quote_smart($_POST['bh'][$i]);
        if($i<count($_POST['sc']))
        {        
        $sc=quote_smart($_POST['sc'][$i]);
        }
        else
        {          
          $sc=quote_smart("");
        }

        $x="INSERT INTO srgtmp_services values ($sgtcode1,$stype,$sc,$sc,$quant, $rate, $amount, $includes, $billing)";        
        $stmt2 = mysql_query($x); 
        if($stmt2)
        {
          ?>
         <script>alert('success');window.location.href='surgery_template.php';</script>                       
         <?php
            
      }
        }
             
      
  }
}
    
  
?>
