<html >
<head>

<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript">
$(document).ready(function()
{
  $(".tar").change(function() {
    var id=$(this).val();
          $("#tn").val(id);
        })
});
$(document).ready(function()
{
  $(".tar1").change(function() {
    var id=$(this).val();
          $("#tn1").val(id);
        })
});
$(document).ready(function()
{
  $(".tar2").change(function() {
    var id=$(this).val();
          $("#tn2").val(id);
        })
});
$(document).ready(function()
{
  $(".tar3").change(function() {
    var id=$(this).val();
          $("#tn3").val(id);
        })
});
</script>
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
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              </div>
              <h2>  Surgery Master </h2> 
              <div>     
                  <h3 class="box-title">Surgery Details</h3>
                   </div>
                   
                   <p class="agreement">
      <label for="lcode">Tarrif Name</label>
      <select name="tarapp" id="tarapp" class="tar" required style="width:185px; height:23px;">
      
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
$str="SELECT *  from  tariff_master WHERE tariff_status=1 ";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Tarrif--</option>";
    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
}
?>
</select>
  <input type="text" id="tn" name="tn" class="tntxt" disabled style="width:185px; height:23px;">

                     <label for="tname">Surgery Design Code</label>  
                       <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                      mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM surgery_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $sg_code = 'SRG'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $sg_code = 'SRG'.($row+1);
                      }
                      ?>
                       <input type="text" class="form-control" name="sg_code" value="<?php echo $sg_code ?>" style="width:185px; height:23px;">                    
                    </p>
                     <p class="agreement">
                     <label for="lcode">Surgery/Procedure</label>
      <select name="tarapp1" id="tarapp1" class="tar1" required style="width:185px; height:23px;">
      
      <?php 

$str="SELECT *  from  soc_masters WHERE soc_status=1 ";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Surgery/Procedure--</option>";
    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['soc_servicecode']."'>".$row['soc_servicename']."</option>";
}
?>
</select>
  <input type="text" id="tn1" name="tn1" class="tntxt" disabled style="width:185px; height:23px;">

                        <label for="sname">Surgery Amount</label>
                       <input type="text" class="form-control" name="sg_amount" placeholder="Surgery Amount" style="width:185px; height:23px;">
                     </p>
                     <p class="agreement">
                        <label for="scode">surgery Type</label>
                          <select name="tarapp2" id="tarapp2" class="tar2" required style="width:185px; height:23px;">
      
                            <?php 

                      $str="SELECT *  from  surgerytype_master WHERE st_status=1 ";
                      $result=$conn->query($str);
                      //echo "<select name='cnames'>";
                      echo "<option value='NULL'>--Select surgeryType--</option>";
                          while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['st_code']."'>".$row['st_name']."</option>";
                      }
                      ?>
                      </select>
                      <input type="text" id="tn2" name="tn2" class="tntxt" disabled style="width:185px; height:23px;">
                     
                     <label>Estimated Duration in Mins</label>                 
                      <input type="text" class="form-control" name="sg_estime" placeholder="Estimated Time in Mins" style="width:185px; height:23px;">
                    </p>    
                     <p class="agreement">
                       <label>Department</label>
                       
                      <select name="deptcode" id="deptcode" class="tar3" required style="width:185px; height:23px;">
                          <?php
                            $str="SELECT *  from  department_master WHERE dept_status=1";
                            $result=$conn->query($str);
                            //echo "<select name='cnames'>";
                            echo "<option value='NULL'>--Select Dept--</option>";
                                while($row = $result->fetch_assoc()) {
                              echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
                            }
                            ?>   
                            </select>       
                            <input type="text" id="tn3" name="tn3" class="tntxt" disabled style="width:185px; height:23px;">
                     </p>
                     <p class="agreement">
                       <label>Effect From</label>
                       <input type="date" class="form-control" name="sg_effectfrom" placeholder="YYYY-MM-DD" required style="width:185px; height:23px;">  

                     <div class="agreement">                      
                       <label>Effect to</label>
                       <input type="date" class="form-control" name="sg_effectto"  placeholder="YYYY-MM-DD" required style="width:185px; height:23px;">   </div>  
                     </p>
                     <p class="agreement">
                       <label>Remarks</label>
                       <textarea style="resize:none" rows="4" type="text" name="sg_remarks" cols="58">
                        </textarea>
                     </p>      
	</form>
</body>
</html>
<?php
                         if(isset($_POST['submit']))
                         {     
                            $sg_tcode = $_POST['tarapp'];                            
                            $sg_amount = $_POST['sg_amount'];
                            $sg_sgtcode = $_POST['tarapp2'];
                            $sg_estime = $_POST['sg_estime'];
                            $sg_dept = $_POST['deptcode'];
                            $sg_effectfrom = $_POST['sg_effectfrom'];
                            $sg_effectto = $_POST['sg_effectto'];                            
                            $sg_description = $_POST['sg_remarks'];
                            $sg_procedure = $_POST['tarapp1'];
                           
                         $queryget = mysql_query("INSERT INTO surgery_master
                                            (sg_tcode,sg_code,sg_procedure,sg_amount,sg_sgtcode,sg_estime,sg_dept,sg_effectfrom,sg_effectto,sg_remarks,sg_createdby) VALUES('$sg_tcode','$sg_code','$sg_procedure','$sg_amount','$sg_sgtcode','$sg_estime','$sg_dept','$sg_effectfrom','$sg_effectto','$sg_description','".$_SESSION['username']."')");
                         if($queryget)
                         {
                          ?>
                                  <script>alert('success');
                              window.location.href='surgery.php';
                              </script>                       
                          <?php
                        }
                         } ?>