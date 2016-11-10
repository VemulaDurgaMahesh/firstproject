<html>
<head>
  <title> Users Master </title>
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
  $(".desig").change(function()
  {
    var id=$(this).val();
    if(id=="Doctor")
    {
      $("label[for='empc']").html("Doctor");
        
    }
    else
    {
      $("label[for='empc']").html("Employee");
        
    }
    var dataString = 'id3='+ id;
  
    $.ajax
    ({
      type: "POST",
      url: "get_data.php",
      data: dataString,
      cache: false,
      success: function(html)
      {
        
        $(".empcode").html(html);
        
      } 
    });
  });
  
  $(".empcode").change(function()
  {
    var id=$(this).val();
          $("#empname").val(id);
      var vall=$( "input[name='desig']:checked").val();
    if(vall=="Doctor")
      var dataString = 'id4='+ id;
    else
      var dataString = 'id5='+id;
  
    $.ajax
    ({
      type: "POST",
      url: "get_data.php",
      data: dataString,
      cache: false,
      success: function(html)
      {
        
        $(".depcode").html(html);
        var val1=$( "#depcode option:selected").val();
        $("#depname").val(val1);
      } 
    });
  });

  
});

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
  <title>HOSPITAL CARE INFORMATION SYSTEM</title>
  
</head>

<body>
<?php include('menu.php'); ?>
    <form action="#" method="post" class="register">
    <p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="usermaster_search.php">
                Search
              </a>
              </li>
                <li><a href="view_usermaster.php">View</a></li>
                <li>
                <button class="button" type="submit" name="submit">Save</button></li>
          </ul>
          </div>
</p>      
    <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Users Master </h2>
        </div>    
      <p class="agreement">
      <fieldset class="row1">
      <legend>Designation</legend>
      <?php 
        $connect = mysql_connect ("localhost","root","") or die();
                      mysql_select_db("hospital")or die();
                     $x = $_GET['t2'];
          $ud = mysql_query("SELECT user_designation From users_masters WHERE user_id='$x'");
        $profilename = mysql_fetch_array($ud);
        $y = $profilename['user_designation'];
      if($y == 'Doctor')
      {
        ?>
      <input type="radio" name="desig" value="Employee" id="desig" class="desig"/><label>Employee</label>
      <input type="radio" name="desig" value="Doctor" id="desig" checked class="desig"/><label>Doctor</label>
      <input type="radio" name="desig" value="Others" id="desig" class="desig"/><label>Other</label>
      <?php 
    }
    else if($y == 'Employee')
    {
        ?>
      <input type="radio" name="desig" value="Employee" id="desig" checked class="desig"/><label>Employee</label>
      <input type="radio" name="desig" value="Doctor" id="desig"  class="desig" /><label>Doctor</label>
      <input type="radio" name="desig" value="Others" id="desig" class="desig" /><label>Other</label>
      <?php 
    }
     else if($y == 'Other')
    {
        ?>
      <input type="radio" name="desig" value="Employee" id="desig"  class="desig" /><label>Employee</label>
      <input type="radio" name="desig" value="Doctor" id="desig"  class="desig" /><label>Doctor</label>
      <input type="radio" name="desig" value="Others" id="desig" checked class="desig" /><label>Other</label>
      <?php 
    }
      ?>
      </fieldset>
      </p><p class="agreement">
      <label for="empc"> Employee </label> <select name="empcode" id="empcode" class="empcode" style="width:185px; height:23px;"><option value="">--emmployee Name--</option></select><input type="text" name="empname" id="empname" class="empname"  value="<?php echo $_GET['t4']; ?>" disabled style="width:185px; height:23px;"/>
      </p>
      <p class="agreement">
      <label for="lcode">Dept Code</label>
      <select name="deptcode" id="deptcode" class="tar" style="width:185px; height:23px;">
      
      
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

$str1="SELECT *  from  department_master WHERE dept_code='".$_GET['t6']."'"; 
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t6']."'>".$row1['dept_name']."</option>";
$str="SELECT *  from  department_master WHERE dept_status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>   
</select>       
<input type="text" id="tn" name="tn" class="tntxt" value=<?php echo $_GET['t6']; ?> disabled style="width:185px; height:23px;">      
      </p><p class="agreement">
      <label>User ID</label> <input type="text" name="userid" value=<?php echo $_GET['t2']; ?> readonly style="width:185px; height:23px;">
      </p><p class="agreement">
     <label>User Name</label> <input type="text" name="username" value=<?php echo $_GET['t1']; ?> style="width:185px; height:23px;">
      </p>
      <p class="agreement">
      <label>Password</label> <input type="password" name="pass" value=<?php echo $_GET['t19']; ?> readonly style="width:185px; height:23px;">
      <label>Confirm Password </label>
      <input type="password" name="cpass" value=<?php echo $_GET['t19']; ?> readonly style="width:185px; height:23px;"> </p>
      <p class="agreement">
      <label>Security Code</label>
      <input type="text" name="scode" value=<?php echo $_GET['t20']; ?> style="width:185px; height:23px;">
      <label>Confirm Security Code</label>
       <input type="text" name="cscode" value=<?php echo $_GET['t20']; ?> style="width:185px; height:23px;margin-left:-8px;"></p>
     <p class="agreement">
      <label for="lcode">Profile Name</label>
      <select name="tarapp1" id="tarapp1" class="tar1" style="width:185px; height:23px;">
      
      <?php 

$str1="SELECT Distinct profile_code,profile_name  from  profile WHERE profile_code='".$_GET['t8']."'"; 
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t8']."'>".$row1['profile_name']."</option>";
$str="SELECT Distinct profile_code,profile_name  from  profile WHERE status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['profile_code']."'>".$row['profile_name']."</option>";
}
?>
</select>
<input type="text" id="tn1" name="tn1" class="tntxt1" disabled value=<?php echo $_GET['t8']; ?> style="width:185px; height:23px;">
      
      </p>
      <p class="agreement">
      <?php if($_GET['t16']=='1')
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
}                            $x = $_GET['t17']; 
                            if(isset($_POST['empcode'])) 
                            {                      
                            $desgcode = $_POST['empcode'];
                            }
                            else
                            {
                              $desgcode = $_GET['t4'];
                            }
                            if(isset($_POST['deptcode'])) 
                            {                      
                            $deptcode = $_POST['deptcode'];
                            }
                            else
                            {
                              $deptcode = $_GET['t6'];
                            }
                            if(isset($_POST['tarapp1'])) 
                            {                      
                            $tarapp1 = $_POST['tarapp1'];
                            }
                            else
                            {
                              $tarapp1 = $_GET['t8'];
                            }
                            $user=$_POST['username'];
                            $userid=$_POST['userid'];                                                       
                            $date = date("Y-m-d H:i:s");                           

if(isset($_POST['desig']))
{
  $udesig = $_POST['desig'];
}
else
{
  $udesig = $y;
}
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
  $val4=false;
}
 $queryget = mysql_query("UPDATE users_masters set user_designation='$udesig',user_designationcode='$desgcode',user_deptcode='$deptcode',user_id='$userid',user_name='$user',user_profilecode='$tarapp1',user_modifyby='".$_SESSION['username']."',user_modifydate='$date',user_status='$val4' WHERE id='$x'" );
                         if($queryget)
                         {
                          ?>
                              <script>alert('success');
                              window.location.href='view_usermaster.php';
                              </script>                       
                          <?php
                        }
else
{
  ?>
                              <script>alert('Failed, Please try again');
                              window.location.href='view_usermaster.php';
                              </script>                       
                          <?php
}
}
?>