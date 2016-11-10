<?php
session_start();
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> OP-Consultation </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript">
    var popup;
    function SelectName() {
        popup = window.open("occ.php","Popup","width=700,height=300");
        popup.focus();
        return false
    }
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })
  });
</script>
</head>

<body>
<?php include("menu.php");?>
	<form action="op_consultation.php" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
				<li>
				<a href="opconsultation_table.php">View</a>
				</li>
                <li>
                  <button class="button" type="submit">Save</button>
                  </li>
				  </ul>
				  </div>
</p>   
	<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2> Out Patient Consultation </h2>
				</div>
				<p>
			<fieldset class="row1">			
			<input type="radio" name="rtype" value="general"/> <label>General Consultation</label>
			<input type="radio" name="rtype" value="package"/> <label>Package Consultation</label>
			<label> New Registration </label>
			 <input type="button" name="search" value="search">
			 </fieldset>
			 </p>
			 <p>			 
			 <label> UMR No:</label>
			 <input type="text" name="umr" id="umr" /><img src="search.png" onclick="SelectName()" />
			 </p>
			 <p>
			 <label>Patient Name</label>
			 <input type="text" name="pname" id="pname" />
			 </p>
			 <P>
			 <fieldset>
			 <label>RegNo:</label>
			 <input type="text" name="rgno" id="rgno">			
			 <label>Age(Y/M/D):</label>
			 <input type="text" name="age" id="age">
			 <label>Gender:</label>
			 <input type="text" name="gndr" id="gndr">
			    <label>Patient Type:</label>
			   <input type="text" name="pt" id="pt">
			   </fieldset>
			   </P>
			   <p>
			   <fieldset>
              <legend> Consultation Details: </legend>	
              <label>Consultation NO:</label>
          	  <input type="text name="cn >         
          	  <label>Cons.Dt:</label>
              <input type="text" name="current-date" value="<?php echo date('Y-m-d');?>" readonly="readonly">
              <label>Last Cons. Dt:</label>
              <input type="text" name="lcdt">
              <input type="checkbox" name="crosscons">
              <label>Cross consultation</label>
			   </fieldset>
			   </p>
			   <p>
			   <fieldset>
			   <label>Ref.Source:</label>
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
			   <label>ReferedBy:</label>
			   <input type="text" name="rfby">
			   <input type="text" name="rfby1">
			   <input type="checkbox" name="crosscons">
              <label>Disable Revisit</label>
			   </fieldset>
			   </p>
			   <p>
			   <fieldset>
			   <label>Payment by</label>
			    <select name="pmtby">
			 <option value="1">Personal</option> 
			  <option value="2">Corporate</option> 
			  <option value="3">Direct cash</option>			 
			   </select>
			   <label> organisation:</label>
			   <input type="text" name="orgn">
			   <input type="text" name="orgn1">
			   <label>charge Type:</label>
			   <input type="text" name="ct">
			  </fieldset>
			  </p>
			  <p>
			  <fieldset>
			  <label>Visit Type:</label>
			   <select name="vt">
			 <option value="1">Normal</option> 
			  <option value="2">General</option> 
			   </select>
			   <label>Consultant:</label>
			    <select name="cnslt" id="tarapp" class="tar" required>
			    <?php
			 	include('dbcon.php');
			 	$str="select * from doctor";
			 	$result=$conn->query($str);
			 	echo "<option value='NULL'>--Select Doctor--</option>";
    			while($row = $result->fetch_assoc()) 
    			{
				echo "<option value='".$row['doc_drcode']."'>".$row['doc_drname']. "</option>";
				}
			 ?>
			 </select>
			 <input type="text" id="tn" name="tn" class="tntxt" disabled >
			   </fieldset>
			   </p>
			   <p>
			   <fieldset>
			   <label>Cheif Complaint:</label>
			   <input type="text" name="ccmplnt">
			   <label>Consultant fee:</label>
			   <input type="text" name="cf">
			   <label>net fee</label>
			   <input type="text" name="nf">
			  </fieldset>
			  </p>
			  <p>
			  <fieldset>
			  <label>Concession:</label>
			  <input type="text" name="cncsn">
			  <label>Authorized By:</label>
			  <input type="text" name="athby">
			  <input type="text" name="athby1">
			  <input type="text" name="athby2">
			  </fieldset>
			  </p>
			   <p>
			  <fieldset>
			  <label>Due Amt:</label>
			  <input type="text" name="damt">
			  <label>Authorized By:</label>
			  <input type="text" name="aby">
			  <input type="text" name="aby1">
			  <input type="text" name="aby2">
			  </fieldset>
			  </p>
			  <p>
			  <fieldset>
			  <label>Remarks:</label>
			  <input type="text" name="rmks">
			  <label>Security Cd:</label>
			  <input type="text" name="scd">
			  </fieldset>
			  </p>
			  <p>
			  <fieldset> 
			   <legend> Receipt Details: </legend>
			   <label>Receipt No:</label>
			   <input type="text" name="rno">
			   <label>Receipt Date:</label>
			   <input type="text" name="rdt">
			   <label>Receipt Amount</label>
			   <input type="text" name="ramt">
			   <input type="button" name="prevcnslt" value="prev conslt">
			  </fieldset>
			  </p>
			  <p>
			  <fieldset>
			   <input type="radio" name="rcpt" value="Receipt"/> <label>Receipt</label>
			   <input type="radio" name="rcpt" value="Prescription"/> <label>Prescription</label>
			   <input type="radio" name="rcpt" value="Both"/> <label>Both</label>
			   <input type="button" name="prnt" value="Print">
			  </fieldset>
			  </p>
			  <br>
			  <p>
			  <fieldset>
			  <table border="1">
			  <tr>
			  <th>Receipt Mode</th>
			  <th>Amount</th>
			  <th>Cheque/card No</th>
			  <th>Cheque/card Bank</th>
			  <th>Cheque Date</th>
			  <th>Card Expiray Date</th>
			  </tr>
			  <tr><td>Cash [Alt+C]</td><td><input type="text" name="r12"></td><td><input type="text" name="r13" disabled></td><td>
			<input type="text" name="r14" disabled></td><td><input type="text" name="r15" disabled></td><td><input type="text" name="r16" disabled></td></tr>
			  <tr><td>Cheque [Alt+Q]</td><td><input type="text" name="r22"></td><td><input type="text" name="r23"></td><td><input type="text" name="r24"></td><td><input type="text" name="r25"></td><td><input type="text" name="r26" disabled></td></tr>
			  <tr><td>Credit Card [Alt+R]</td><td><input type="text" name="r32"></td><td><input type="text" name="r33"></td><td>
			  <input type="text" name="r34"></td><td><input type="text" name="r35" disabled></td><td><input type="text" name="r36"></td></tr>
			  </table>
			  </fieldset>
			  </p>
	</form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$conn = mysql_connect("localhost","root","") or die("connection not established");
	mysql_select_db("hospital") or die("database not exist");

$val1=$_POST['umr'];
$val2=$_POST['pname'];
$val3=$_POST['rgno'];
$val4=$_POST['gndr'];
$val5=$_POST['age'];
$val6=$_POST['pt'];
$val7=$_POST["cnslt"];
$date=$_POST["current-date"];
$query="";

$str=mysql_query("INSERT INTO op_consultation (umr_no,Patient_Name,Reg_No,Gender,Age,Patien_Type,Conc_Code,Conc_Date)
VALUES
	('$val1','$val2','$val3','$val4','$val5','$val6','$val7','$date')");
		
		if ($str)
		 {

    $query="SELECT umr_no FROM op_consultation where Conc_Date='$date' AND Conc_Code='$val7'";

$result=mysql_query($query);
$token=mysql_num_rows($result);
   
   $query=mysql_query("UPDATE op_consultation SET token='$token'  WHERE umr_no= '$val1' AND Conc_Date='$date' AND Conc_Code='$val7' ");

   		if($query)
   		{
   		?>
             <script>alert('sucess');               
              </script>                       
                          <?php
   		}
        }
        else
       {
	      echo "Not inserted";
	      echo "ERROR:".mysql_error();
       }

}
?>