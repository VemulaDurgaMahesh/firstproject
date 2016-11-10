<html lang="en">
<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>

	<title>HOSPITAL CARE INFORMATION SYSTEM</title>
	<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
	
	<script type="text/javascript">
	var popup;
    function SelectName(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
     function SelectName1(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata1.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName2(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata2.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName3(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata3.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName4(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata4.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName5(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata5.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName6(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata6.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName7(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata7.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName8(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata8.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName9(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata9.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName10(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Carddata10.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
	</script>
<script type="text/javascript">
	$(document).ready(function()
{
	
	$(".wg").change(function()
	{
		var id=$(this).val();
		$("#wg1").val(id);
          var dataString = 'id6='+id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$(".tarapp").html(html);
				var val1=$( "#tarapp option:selected").val();
				$("#tarapp1").val(val1);
			} 
		});
	});
	$(".mg").change(function() {
		var id=$(this).val();
          $("#mg1").val(id);
	});
$('#noneAboveCheck').change(function () {                
      $('#noneAbove').toggle(this.checked);
    }).change();

    if ($('#incarcerated, #support').attr("checked")) {
     
      $('#noneAboveCheck').attr('disabled', true);
    } else {
      $('#noneAboveCheck').attr('disabled', false);
    }

});
</script>
</head>

<body>
<?php include('menu.php');
include('dbcon.php'); ?>
<form action="#" method="post" class="register">
<p>
	<ul class="drop_menu">
               <li>
              <a href="healthcardholder_search.php">
                Search
              </a>
              </li>
                <li><a href="healthcardholdertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>			
		</select>
			
			<p class="agreement">
			<label>CHONo </label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from healthcardholder";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
            echo "<input type='text' id='chno' name='chno' value=HCH".$count." class='long' style='width:190px; height:23px;''></p>";
            ?>
					
			<p class="agreement">
			<label>CardType </label>
			<table style="border:none;">
			<tr><td style="border:none;"><input type='text' id='cardcode1' name='cardcode' class="long" style="width:190px; height:23px;"></td>
			<td style="border:none;"><button type="button" onclick="SelectName(1)" ><img src="search.png"></button></td>
			<td style="border:none;"><input type='text' id='cardname1' name='cardname' class="long" style="width:190px; height:23px;margin-left:15px;"></td></tr></table>
			</p>
			<p class="agreement">
			<label>CardNo </label>
			<input type='text' id='cardno' name='cardno' class="long"style="width:190px; height:23px;" >
			
			<label style="width:120px;">Card Amount </label>
			<input type='text' id='cardamount1' name='cardamount' class="long"style="width:190px; height:23px;" >
			
			<label style="width:120px;">Balance Amount </label>
			<input type='text' id='balamount1' name='balamount' class="long" style="width:190px; height:23px;">
			</p>
			<p class="agreement">
			<label>Card Valid Years </label>
			<input type='text' id='cardvy1' name='cardvy' class="long" style="width:190px; height:23px;">
			
			<label style="width:120px;">Card Valid Days </label>
			<input type='text' id='cardvd1' name='cardvd' class="long" style="width:190px; height:23px;"  >
			</p>
			<p class="agreement">
			<label>Card Valid From </label>
			<input type='date' id='cardvf' name='cardvf' class="long" style="width:190px; height:23px;margin-left:-18px;">
			
			<label style="width:120px;">Card Valid To </label>
			<input type='date' id='cardvt' name='cardvt' class="long" style="width:190px; height:23px;margin-left:-18px;">
			<label style="width:120px;">Limit Memebers </label>
			<input type='text' id='limitmem1' name='limitmem' class="long" style="width:190px; height:23px;">
			</p>
			<p class="agreement"><label>Address</label>
            <textarea  class="form-control" name="address"  style="width:190px; height:80px;"></textarea>
               </p>      
		  <p>
		  <table>
		   <tr> <td><label style="width:23px;">SNo</label> </td><td> UMR No.</td><td></td><td>Member Name</td><td> </td><td> </td><td> Age( </td><td>Y/M</td><td>/D)</td><td>Gender</td><td>Relation</td><td>Status</td><td>CardType</td><td></td></tr>
		   <tr>
		   <td> <input type="text" name="sno" value="1" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		   </td>
		   <td> 
		   <input type="text" name="umrno1" id="umrno1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;">
		   <td><button type="button" onclick="SelectName1(1)" ><img src="search.png" /></button>
		   </td>
		   <td> <input type="text" name="memno1" id="memname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="memno2" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		  <td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="ageyear1" id="ageyear1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="agemon1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="agedays1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td><input type="text" name="gender1" id="gender1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td><select name="relation1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		   </td>
		   <td><input type='checkbox' name='accr1' value='0' >
		   </td>
		  <td><select name= 'cardtype1' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		

		<tr>
		<td> 
		<input type="text" name="sno" value="2" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno2" id="umr1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName2(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="mem1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="memb1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="ageyear" id="ageyr1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="gndr1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation2" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select></td><td><input type='checkbox' name='accr2' value='0' >
		</td>
		<td><select name= 'cardtype2' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		

		<tr>
		<td><input type="text" name="sno" value="3" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno3" id="umrnum1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName3(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="mbr1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="mebr1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		<td> <input type="text" name="ageyear" id="agyr1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="gdr1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation3" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		</td>
		<td><input type='checkbox' name='accr3' value='0' >
		</td>
		<td><select name= 'cardtype3' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		
		<tr>
		<td><input type="text" name="sno" value="4" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno4" id="umno1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName4(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="memna1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="membna1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		<td> <input type="text" name="ageyear" id="ageyer1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="gnder1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation4" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select></td><td><input type='checkbox' name='accr4' value='0' >
		</td>
		<td><select name= 'cardtype4' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		
		<tr>
		<td> <input type="text" name="sno" value="5" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno5" id="urno1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName5(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="mename1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="mebame1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		<td> <input type="text" name="ageyear" id="ageyar1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="gendr1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation5" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select></td>
		<td><input type='checkbox' name='accr5' value='0' >
		</td>
		<td><select name= 'cardtype5' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		
		<tr>
		<td> <input type="text" name="sno" value="6" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno6" id="umrn1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName6(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="memn1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="lname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		<td> <input type="text" name="ageyear" id="age1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="type1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation6" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		</td>
		<td><input type='checkbox' name='accr6' value='0' >
		</td>
		<td><select name= 'cardtype6' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		
		<tr>
		<td> <input type="text" name="sno" value="7" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno7" id="no1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;">
		<td><button type="button" onclick="SelectName7(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="fname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="lnam1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		<td> <input type="text" name="ageyear" id="yrs1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="ctgr1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation7" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		</td>
		<td><input type='checkbox' name='accr7' value='0' >
		</td>
		<td><select name= 'cardtype7' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		
		<tr>
		<td> <input type="text" name="sno" value="8" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno8" id="number1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName8(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="fnam1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="lna1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		<td> <input type="text" name="ageyear" id="agen1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="male1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation8" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		</td>
		<td><input type='checkbox' name='accr8' value='0' ></td><td><select name= 'cardtype8' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>
		
		<tr>
		<td> <input type="text" name="sno" value="9" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno9" id="numbe1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName9(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="fna1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="ln1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		</td>
		<td> <input type="text" name="ageyear" id="year1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="mal1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation9" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		</td>
		<td><input type='checkbox' name='accr9' value='0' >
		</td>
		<td><select name= 'cardtype9' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		</tr>

		<tr>
		<td> <input type="text" name="sno" value="10" style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name="umrno10" id="numb1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName10(1)" ><img src="search.png" /></button>
		</td>
		<td> <input type="text" name="memno1" id="fn1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno2" id="l1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		<td> <input type="text" name="ageyear" id="yea1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agemon" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td> <input type="text" name="agedays" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><input type="text" name="gender" id="ma1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		</td>
		<td><select name="relation10" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		</td>
		<td><input type='checkbox' name='accr10' >
		</td>
		<td><select name= 'cardtype10' style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str="select * from health_cards where status=true";
		$result=$conn->query($str);
		echo "<option value='NULL'>--Select Card Type--<option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value=".$row['card_code'].">".$row['card_name']."<option>";
				}
		?>
		</td>
		
		</tr>
		
		   </table>
		   <p>
		</form>
</body>		
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=1;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$val1=$_POST['chno'];
$val2=$_POST['cardcode'];
$val3=$_POST['cardno'];
$val4=$_POST['cardvf'];
$val5=$_POST['cardvt'];
$val6=$_POST['address'];

$str="insert into healthcardholder values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$_SESSION['username']."',now(),NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
	for($i=1;$i<=10;$i++)
	{
		$s="umrno".$i;
		$p="relation".$i;
		$d="accr".$i;
		$f="cardtype".$i;

		//if(isset($_POST[$s]))
		if($_POST[$s]!="")
		{
			if(isset($_POST[$d]))
			{
				$val18=true;
			}
			else
			{
				$val18=false;
			}
			$str="insert into healthcardholder_details values('".$val1."','".$_POST[$s]."','".$_POST[$p]."','".$val18."','".$_POST[$f]."')";
			$conn->query($str);
		}
	}
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='healthcardtype.php';";
	echo "</script>";

}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>	