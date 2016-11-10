<html >
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
              <a href="usergroup_search.php">
                Search
              </a>
              </li>
                <li><a href="view_usergroup.php">View</a></li>
                <li>
                  <button class="button" type="submit" name="submit">Save</button></li>
          </ul>
          </div>
</p>                  
    
    
    <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> User Group Master </h2>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <div style="width:600px;margin:0 auto;">
    <p class="agreement">    
                      <label for="UsercategoryCode"> User Category Code</label>
                      <input type="text" class="form-control" name="userccode"  placeholder="User Category code" style="width:185px; height:23px;">
               </p>  <br><br>      <p class="agreement">                 
                      <label for="UsercategoryName"> User Category Name</label>
                      <input type="text" class="form-control" name="usercname" placeholder="User Category name" style="width:185px; height:23px;">
                    
      </p><br><br>
      <p class="agreement">
      <label for="lcode">Department Type</label>
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
$str="SELECT *  from  department_master WHERE dept_status=1 "; 
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select department--</option>";
    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
</select>
  <input type="text" id="tn" name="tn" class="tntxt" readonly style="width:185px; height:23px;">
      
      </p><p class="agreement">
    </div>
  </div>
  </form>
</body>
</html>
<?php       $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                         if(isset($_POST['submit']))
                         {                         
                         $userdcode = $_POST['tarapp'];                         
                         $usercname = $_POST['usercname'];
                         $userccode = $_POST['userccode'];
                         $queryget = mysql_query("INSERT INTO user_groupmaster (user_categorycode,user_categoryname,user_categorydeptcode,user_groupcreateby) 
                          VALUES('$userccode','$usercname','$userdcode','".$_SESSION['username']."')");
                         if($queryget)
                         {
                           ?>
                                  <script>alert('success');
                              window.location.href='usergroupmaster.php';
                              </script>                       
                          <?php
                            }
                            else
                            {
                              ?>
                                  <script>alert('Failed, Please try again');
                              window.location.href='usergroupmaster.php';
                              </script>                       
                          <?php
                            }
                         } ?>