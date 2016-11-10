<html>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })
});
</script>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
</head>
<body>
<?php include('menu.php'); ?>
		<form action="#" method="post" class="register">
		<p>
		<div>

<ul class="drop_menu">
               <li>
              <a href="state_search.php">
                Search
              </a>
              </li>
                <li><a href="view_state.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  State Master </h2>
        </div>
        <h3> State Details</h3>
        <BR><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">State Code: </label>
			  <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM state_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $scode = 'S'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $scode = 'S'.($row+1);
                      }
                      ?>
			<input type='text' name='wgc' value="<?php echo $scode ?>" style="width:185px; height:23px;">
			</p><BR><BR><p class="agreement">
			<label for="hcode">State Name:</label>
			<input type="text" name="sname" style="width:185px; height:23px;">
			</p><BR><BR><p class="agreement">
			<label for="lcode">Country</label>
			<select name="id" id="tarapp" class="tar" required style="width:185px; height:23px;">
			
			<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$str="SELECT *  from  country_master WHERE country_status=1 ";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Country--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
}
?>
</select>
<input type="text" id="tn" name="tn" class="tntxt" disabled style="width:185px; height:23px;">
</p><p class="agreement">
		</div>
	</div>
	</form>
</body>
</html>
<?php 					
						  $connect = mysql_connect ("localhost","root","") or die();
              mysql_select_db("hospital")or die();
              if(isset($_POST['submit']))
             {                         
              $sname = $_POST['sname'];
              $scountry = $_POST['id'];
                        // $select = mysql_query("SELECT country_code FROM country_master WHERE country_name = '$scountry'");
                        //  $select1 = mysql_fetch_array($select);
                        //  $sccode = $select1['country_code'];
              $queryget = mysql_query("INSERT INTO state_master (state_code,state_name,country_code,s_createby) VALUES('$scode','$sname','$scountry','".$_SESSION['username']."')");
                if($queryget)
                {
                  ?>
                   <script>alert('success');window.location.href='state_masters.php';</script>
                  <?php
                }
              } ?>