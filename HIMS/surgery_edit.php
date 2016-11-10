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
<script type="text/javascript">
$(document).ready(function()
{
  $(".tar1").change(function() {
    var id=$(this).val();
          $("#tn1").val(id);
        })  
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
  $(".tar2").change(function() {
    var id=$(this).val();
          $("#tn2").val(id);
        })  
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
  $(".tar3").change(function() {
    var id=$(this).val();
          $("#tn3").val(id);
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
              <a href="surgery_search.php">
                Search
              </a>
              </li>
                <li><a href="view_surgery.php">View</a></li>
                <li>
                <button class="button" type="submit">Save</button></li>
          </ul>
          </div>
</p>      
    <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Surgery Master </h2>
              <div>     
                  <h3 class="box-title">Surgery Details</h3>
                   </div>
        </div>     
      <p class="agreement">
      <label for="lcode">Tariff Name</label>
      <select name="sg_tcode" id="sg_tcode" class="tar" required style="width:185px; height:23px;">
      
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
$str1="select * from tariff_master where tariff_code='".$_GET['t2']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t2']."'>".$row1['tariff_name']."</option>";
$str="SELECT *  from  tariff_master WHERE tariff_status=1";
$result=$conn->query($str);
    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
}
?>
</select>            
      <input type="text" id="tn" name="tn" class="tntxt" value=<?php echo $_GET['t2']; ?> disabled style="width:185px; height:23px;">
      
       <label for="hname">Surgery Design Code: </label>
      <input type="text" name="sdc" value="<?php echo $_GET['t1']; ?>" readonly style="width:185px; height:23px;">
      </p><br><br>
      <p class="agreement">
      <label for="lcode">Surgery/Procedure Code</label>
      <select name="sg_procedure" id="sg_procedure" class="tar1" required style="width:185px; height:23px;">
      
      <?php 
 
$str1="select * from soc_masters where soc_servicecode='".$_GET['t3']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t3']."'>".$row1['soc_servicename']."</option>";
$str="SELECT *  from  soc_masters WHERE soc_status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['soc_servicecode']."'>".$row['soc_servicename']."</option>";
}
?>
 </select>
      <input type="text" id="tn1" name="tn1" class="tntxt" value=<?php echo $_GET['t3']; ?> disabled style="width:185px; height:23px;">
      
       <label for="hname">Surgery Amount </label>
      <input type="text" name="sg_amount" value="<?php echo $_GET['t8']; ?>" style="width:185px; height:23px;">
      </p><br><br>
      <p class="agreement">
      <label for="lcode">Surgery Type Code</label>
      <select name="sg_sgtcode" id="sg_sgtcode" class="tar2" required style="width:185px; height:23px;">
      
      <?php 

$str1="select * from surgerytype_master where st_code='".$_GET['t5']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t5']."'>".$row1['st_name']."</option>";
$str="SELECT *  from  surgerytype_master WHERE st_status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['st_code']."'>".$row['st_name']."</option>";
}
?>
</select>            
      <input type="text" id="tn2" name="tn2" class="tntxt" value=<?php echo $_GET['t5']; ?> disabled style="width:185px; height:23px;">
      
       <label for="hname">Estimated Duration in mins </label>
      <input type="number" name="sg_estime" value="<?php echo $_GET['t9']; ?>" style="width:185px; height:23px;">
      </p><br><br>
       <p class="agreement">
      <label for="lcode">Department Code</label>
      <select name="sg_dept" id="sg_dept" class="tar3" required style="width:185px; height:23px;">
      
      <?php 
 
$str1="select * from department_master where dept_code='".$_GET['t6']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t6']."'>".$row1['dept_name']."</option>";
$str="SELECT DISTINCT * from  department_master WHERE dept_status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";
    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
 </select>
      <input type="text" id="tn3" name="tn3" class="tntxt" value=<?php echo $_GET['t6']; ?> disabled style="width:185px; height:23px;">
      </p><br><br>
      <p class="agreement">
                       <label>Effect From</label>
                       <input type="date"  name="sg_effectfrom" value=<?php echo $_GET['t10']; ?> style="width:185px; height:23px;">    
                     
                       <label>Effect to</label>
                       <input type="date" name="sg_effectto"  value=<?php echo $_GET['t11']; ?> style="width:185px; height:23px;">     
                     </p><br><br>
      <p class="agreement">
        <label>Remarks</label>
        <input  rows="4" type="text" value=<?php echo $_GET['t16']; ?> name="sg_remarks" cols="50" style="width:585px; height:53px;">
          </p><br><br>
      <p class="agreement">
      <?php if($_GET['t17']=='1')
      {
      echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
      }
      else
      {
        echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
      }
      ?>
    </div></p>
  </div>
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
                            $x = $_GET['t1'];
                            $sg_tcode = $_POST['sg_tcode'];
                            $sg_procedure = $_POST['sg_procedure'];
                            $sg_amount = $_POST['sg_amount'];
                            $sg_sgtcode = $_POST['sg_sgtcode'];
                            $sg_estime = $_POST['sg_estime'];
                            $sg_dept = $_POST['sg_dept'];
                            $sg_effectfrom = $_POST['sg_effectfrom'];
                            $sg_effectto = $_POST['sg_effectto'];                            
                            $sg_description = $_POST['sg_remarks'];
                            $date = date("Y-m-d H:i:s");
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
  $val4=false;
}
$connect = mysql_connect ("localhost","root","") or die();
                      mysql_select_db("hospital")or die();
 $queryget = mysql_query("UPDATE surgery_master set sg_tcode='$sg_tcode',sg_procedure='$sg_procedure',sg_amount='$sg_amount',sg_sgtcode='$sg_sgtcode',sg_estime='$sg_estime',sg_dept='$sg_dept',sg_effectfrom='$sg_effectfrom',sg_effectto='$sg_effectto',sg_remarks='$sg_description',sg_modifyby='".$_SESSION['username']."',sg_modifydate='$date',sg_status='$val4' WHERE sg_code='$x'" );
                         if($queryget)
                         {
                          ?>
                                  <script>alert('success');
                              window.location.href='view_surgery.php';
                              </script>                       
                          <?php
                        }
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>