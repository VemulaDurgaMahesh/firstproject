<p>
			<fieldset>
			<p>
		  <label>Authorization Code: </label> 
		  <?php
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
			$str="select * from author_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=ATH".$count." readonly required>";
?>
		  </p>
		<p class="agreement">
			<div id="div1" style="padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" id="txtDoctor"  value="" readonly/>
				<img src="search.png" onclick="SelectName(1)">
			</div>
            <div id="DivDoctor" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtDoctor1" id="txtDoctor1" required readonly placeholder="Select doctor"  style="margin-right:50px;margin-top:2px;height:23px;width:185px; />
				<img src="search.png" onclick="SelectName(1)">
			</div>
			<div id="DivOrganisation" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtOrganisation1" id="txtOrganisation1" readonly placeholder="select Organisation" required  style="margin-right:50px;margin-top:2px;height:23px;width:185px; />
				<img src="search.png" onclick="SelectName1(1)">
			</div>
			<div id="DivStaff" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtStaff1" id="txtStaff1" readonly placeholder="Select Staff" required style="margin-right:50px;margin-top:2px;height:23px;width:185px; />
				<img src="search.png" onclick="SelectName2(1)">
			</div>
			<div id="DivReferral" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtReferral" id="txtReferral1" readonly placeholder="Select Referral" required style="margin-right:50px;margin-top:2px;height:23px;width:185px; / >
				<img src="search.png" onclick="SelectName3(1)">
			</div>
		</p>
		<p class="agreement">
		<label for="athname">Authorization Name:</label>
		<input type="text" name="athname1" id="athname1" >
		</p>
		<p class="agreement">
		<label for="athfor">Authorization For:</label>
		<p class="agreement">	
		<input type="checkbox" name="cb0" id="cb0">
		<label><u>O</u>PConcession</label>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="cb1" id="cb1">
		<label><u>I</u>PConcession</label>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="cb2" id="cb2">
		<label><u>V</u>ocher Approval</label>
		</p>		
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb3" id="cb3">
		<label>OP<u>C</u>redit</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="cb4" id="cb4">
		<label>IP<u>C</u>redit</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="cb5" id="cb5">
		<label>Modif<u>y</u>ing Approved Trans</label>
		</p>
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb6" id="cb6">
		<label>OP Canc<u>e</u>llations</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="cb7" id="cb7">
		<label>IP Canc<u>e</u>llations</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<input type="checkbox" name="cb8" id="cb8">
		<label>Discharge<u>W</u>ithout Settlement</label>
		</p>
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb9" id="cb9">
		<label>OP Pharmacy Concession</label>&nbsp;&nbsp;
		<input type="checkbox" name="cb10" id="cb10">
		<label>Patient<u>B</u>ill Conversion</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="cb11" id="cb11">
		<label>FNB D<u>u</u>e</label>
		</p>
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb12" id="cb12">
		<label>OP Pharmacy Due</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" name="cb13" id="cb13">
		<label><u>F</u>NB Concession</label>
		</p>
		</p>
		</form>
	 </body>
 </html>
 <?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$connect = mysql_connect ("localhost","root","") or die();
    mysql_select_db("hospital")or die();
	$desig=$_POST['MyRadio'];
	$athcode=$_POST['wc'];
	$d='Doctor';
	$o='Organization';
	$s='Staff';
	if($desig==$d)
	{
		$refcode=$_POST['txtDoctor1'];
	}
	else if($desig==$o)
	{
		$refcode=$_POST['txtOrganisation1'];
	}
	else if($desig==$s)
	{
		$refcode=$_POST['txtStaff1'];
	}
	else
	{
		$refcode=$_POST['txtReferral'];
	}

	$athname=$_POST['athname1'];
	if (isset($_POST['cb0'])) 
	{
    	$opcncscn=true;
	}
	else
	{
		$opcncscn=false;
	}
	if (isset($_POST['cb1'])) 
	{
    	$ipcncscn=true;
	}
	else
	{
		$ipcncscn=false;
	}
	if (isset($_POST['cb2'])) 
	{
    	$vchraprvl=true;
	}
	else
	{
		$vchraprvl=false;
	}
	if (isset($_POST['cb3'])) 
	{
    	$opcrdt=true;
	}
	else
	{
		$opcrdt=false;
	}
	if (isset($_POST['cb4'])) 
	{
    	$ipcrdt=true;
	}
	else
	{
		$ipcrdt=false;
	}
	if (isset($_POST['cb5'])) 
	{
    	$modfyngaprvdtrans=true;
	}
	else
	{
		$modfyngaprvdtrans=false;
	}
	if (isset($_POST['cb6'])) 
	{
    	$opcncl=true;
	}
	else
	{
		$opcncl=false;
	}
	if (isset($_POST['cb7'])) 
	{
    	$ipcncl=true;
	}
	else
	{
		$ipcncl=false;
	}
	if (isset($_POST['cb8'])) 
	{
    	$dscgewostlmnt=true;
	}
	else
	{
		$dscgewostlmnt=false;
	}
	if (isset($_POST['cb9'])) 
	{
    	$opphcnscn=true;
	}
	else
	{
		$opphcnscn=false;
	}
	if (isset($_POST['cb10'])) 
	{
    	$ptntbillcnvrsn=true;
	}
	else
	{
		$ptntbillcnvrsn=false;
	}
	if (isset($_POST['cb11'])) 
	{
    	$fnbdue=true;
	}
	else
	{
		$fnbdue=false;
	}
	if (isset($_POST['cb112'])) 
	{
    	$opphdue=true;
	}
	else
	{
		$opphdue=false;
	}
	if (isset($_POST['cb13'])) 
	{
    	$fnbcnscn=true;
	}
	else
	{
		$fnbcnscn=false;
	}
	$str=mysql_query("INSERT into author_master (designtn,am_code,refcode,athname,opcnscn,ipcnscn,vocherapproval,opcrdt,ipcrdt,mfdapdtrans,opcncln,ipcncln,dscgewostlmnt,opphcnscn,patntbillcnvrsn,fnbdue,opphdue,fnbcnscn,createdby) values ('$desig','$athcode','$refcode','$athname','$opncscn','$ipcncscn','$vchraprvl','$opcrdt','$ipcrdt','$modfyngaprvdtrans','$opcncl','$ipcncl','$dscgewostlmnt','$opphcnscn','$ptntbillcnvrsn','$fnbdue','$opphdue','$fnbcnscn','".$_SESSION['username']."'");
	if ($str) 
	{
	echo "<script>";
	echo "window.alert('Sucess');";
	echo "window.location.href='authorizationmaster.php';";
	echo "</script>";
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
?>