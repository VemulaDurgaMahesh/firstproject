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
              <a href="#.php">
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
            echo "<input type='text' id='chno' name='chno' value=".$_GET['t1']." class='long' style='width:190px; height:23px;''></p>";
            ?>
			<?php if($_GET['t11']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat45' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat45' value='0'>";
			}
			?>		
			<p class="agreement">
			<label>CardType </label>
			<table style="border:none;">
			<tr><td style="border:none;"><input type='text' id='cardcode1' name='cardcode' value=<?php echo $_GET['t2']; ?> class="long" style="width:190px; height:23px;"></td>
			<td style="border:none;"><button type="button" onclick="SelectName(1)" ><img src="search.png"></button></td>
			<?php 
			$str="select * from health_cards where card_code='".$_GET['t2']."'";
			$result=$conn->query($str);
			$row = $result->fetch_assoc();
			?>
			<td style="border:none;"><input type='text' id='cardname1' name='cardname' value=<?php echo $row['card_name']; ?> class="long" style="width:190px; height:23px;margin-left:15px;"></td></tr></table>
			</p>
			<p class="agreement">
			<label>CardNo </label>
			<input type='text' id='cardno' name='cardno' value=<?php echo $_GET['t3']; ?> class="long"style="width:190px; height:23px;" >
			
			<label style="width:120px;">Card Amount </label>
			<input type='text' id='cardamount1' name='cardamount' value=<?php echo $row['cardamount']; ?> class="long"style="width:190px; height:23px;" >
			
			<label style="width:120px;">Balance Amount </label>
			<input type='text' id='balamount1' name='balamount' value=<?php echo $row['cardamount']; ?> class="long" style="width:190px; height:23px;">
			</p>
			<p class="agreement">
			<label>Card Valid Years </label>
			<input type='text' id='cardvy1' name='cardvy' class="long" value=<?php echo $row['validyears']; ?> style="width:190px; height:23px;">
			
			<label style="width:120px;">Card Valid Days </label>
			<input type='text' id='cardvd1' name='cardvd' class="long" value=<?php echo $row['validdays']; ?> style="width:190px; height:23px;"  >
			</p>
			<p class="agreement">
			<label>Card Valid From </label>
			<input type='date' id='cardvf' name='cardvf' value=<?php echo $_GET['t4']; ?> class="long" style="width:190px; height:23px;margin-left:-18px;">
			
			<label style="width:120px;">Card Valid To </label>
			<input type='date' id='cardvt' name='cardvt' value=<?php echo $_GET['t5']; ?> class="long" style="width:190px; height:23px;margin-left:-18px;">
			<label style="width:120px;">Limit Memebers </label>
			<input type='text' id='limitmem1' name='limitmem' class="long" value=<?php echo $row['card_maxno']; ?> style="width:190px; height:23px;">
			</p>
			<p class="agreement"><label>Address</label>
            <textarea  class="form-control" name="address"  style="width:190px; height:80px;"><?php echo $_GET['t6'];?></textarea>
               </p>      
		  <p>
		  <table>
		   <tr> <td><label style="width:23px;">SNo</label> </td><td> UMR No.</td><td></td><td>Member Name</td><td> </td><td> </td><td> Age( </td><td>Y/M</td><td>/D)</td><td>Gender</td><td>Relation</td><td>Status</td><td>CardType</td><td></td></tr>
		   <?php 
		   $i=1;
			$str="select * from healthcardholder_details where chono='".$_GET['t1']."'";
			$result=$conn->query($str);
			while($row = $result->fetch_assoc()){
				$umrno="umrno".$i;
				$relation="relation".$i;
				$accr="accr".$i;
				$cardtype="cardtype".$i;
				$selectname="SelectName".$i."(1)";
				$str1="select * from new_registration where umr_no='".$row['umrno']."'";
				$result1=$conn->query($str1);
				$row1 = $result1->fetch_assoc();
		   ?>
		   <tr>
		   <td> <input type="text" name="sno" value=<?php echo $i; ?> style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		   </td>
		   <td> 
		   <input type="text" name=<?php echo $umrno; ?> value=<?php echo $row['umrno']; ?> id="umrno1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;">
		   <td><button type="button" onclick=<?php echo $selectname; ?>  ><img src="search.png" /></button>
		   </td>
		   <td> <input type="text" name="memno1" value=<?php echo $row1['p_firstname']; ?> id="memname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="memno2" value=<?php echo $row1['p_lastname']; ?> id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		  <td> <input type="text" name="memno3" id="membname1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="ageyear1" value=<?php echo $row1['p_age']; ?> id="ageyear1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="agemon1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td> <input type="text" name="agedays1" style="width:30px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td><input type="text" name="gender1" value=<?php echo $row1['p_gender']; ?> id="gender1" style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		   </td>
		   <td><select name=<?php echo $relation; ?> style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <?php echo "<option value=".$row['relation'].">".$row['relation']."<option>"; ?><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select>
		   </td>
		   <td><?php if($row['status']==true)
		   {
			   ?>
			   <input type='checkbox' name=<?php echo $accr; ?> checked>
		   <?php
		   }
		   else
		   {
			   ?><input type='checkbox' name=<?php echo $accr; ?> unchecked><?php
		   }?>
		   </td>
		  <td><select name=<?php echo $cardtype; ?> style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
		<?php 
		$str4="select * from health_cards where status=true";
		$result4=$conn->query($str4);
		$str3="select * from health_cards where card_code='".$row['cardtype']."'";
		$result3=$conn->query($str3);
		$row3 = $result3->fetch_assoc();
		echo "<option value=".$row['cardtype'].">".$row3['card_name']."<option>";
				while($row4 = $result4->fetch_assoc()) {
				echo "<option value=".$row4['card_code'].">".$row4['card_name']."<option>";
				}
		?>
		</td>
		</tr>
			<?php $i=$i+1;} 
			for($k=$i;$k<=10;$k=$k+1)
			{
				$umrno="umrno".$k;
				$relation="relation".$k;
				$accr="accr".$k;
				$cardtype="cardtype".$k;
				$selectname="SelectName".$k."(1)";
			?>
		

		<tr>
		<td> 
		<input type="text" name="sno" value=<?php echo $k; ?> style="margin-left:0px; margin-right:0px;border:none;width:15px;">
		</td>
		<td> <input type="text" name=<?php echo $umrno; ?> id="umr1" style="width:190px; height:23px;margin-left:0px; margin-left:0px; margin-right:0px;border:none;"><td><button type="button" onclick="SelectName2(1)" ><img src="search.png" /></button>
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
		<td><select name=<?php echo $relation; ?> style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;"> <option> </option><option>Self</option> <option> Mother </option><option> Father </option><option> Daughter </option><option> Son </option><option> Sister </option><option> Husband </option><option> Wife </option><option> Brother </option><option> Son-in-law </option><option> Sister-in-law </option><option> Brother-in-law </option><option> Father-in-law </option><option> Mother-in-law </option><option> Grand Mother </option><option> Grand Father </option><option> Friend </option><option> Other </option></select></td><td><input type='checkbox' name=<?php echo $accr; ?> value='0' >
		</td>
		<td><select name= <?php echo $cardtype; ?> style="width:190px; height:23px;margin-left:0px; margin-right:0px;border:none;">
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
			<?php } ?>
		
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
if(isset($_POST['stat45']))
{
	$val18=true;

}
else
{
	$val18=false;
}
$str="select * from healthcardholder where chono='".$val1."'";
$result=$conn->query($str);
$row=$result->fetch_assoc();
$val41=$row['createdby'];
$val42=$row['createddate'];
$str="delete from healthcardholder where chono='".$val1."'";
$conn->query($str);
$str="insert into healthcardholder values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val41."','".$val42."','".$_SESSION['username']."',now(),'".$val18."')";
if ($conn->query($str) == TRUE) {
	$str3="delete from healthcardholder_details where chono='".$val1."'";
	$conn->query($str3);
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
	echo "window.alert('Updated Sucessfully');";
	echo "window.location.href='healthcardholdertable.php';";
	echo "</script>";

}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>	