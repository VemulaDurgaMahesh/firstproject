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
              <a href="changepswd_search.php">
                Search
              </a>
              </li>
                <li><a href="view_changepswd.php">View</a></li>
                <li>
                  <button class="button" type="submit" name="submit">Save</button></li>
          </ul>
          </div>
</p> 
<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Change Passwords Master </h2>
        </div>
        </div><BR><BR><BR><BR><BR><BR><BR><BR>
    <div style="width:800px; margin:0 auto;">
    <p class="agreement">
      <label for="hname">Passwword Code: </label>
       <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM user_changepass") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $optcode = 'PCC'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $optcode = 'PCC'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" value="<?php echo $optcode ?>" disabled style="width:185px; height:23px;">
      </p><BR><BR><p class="agreement">
      <label for="lcode">User id</label>
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
$str="SELECT *  from  users_masters WHERE user_status=1 ";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Username--</option>";
    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['user_id']."'>".$row['user_name']."</option>";
}
?>
</select>
  <input type="text" id="tn" name="tn" class="tntxt" disabled style="width:185px; height:23px;"> 
      
      </p><BR><BR>
      <p class="agreement">
      <label>Password</label> <input type="password" name="pass" placeholder="password" required style="width:185px; height:23px;">
      <div >
      <label>Confirm Password </label>
      <input type="password" name="cpass" placeholder="Confirm password" required style="width:185px; height:23px;"></div></p>
     
      <p class="agreement">
      <label>Security Code</label>
      <input type="password" name="scode" required placeholder="Security code" style="width:185px; height:23px;">
      <div >
      <label>Confirm Security Code</label>
       <input type="password" name="cscode" required placeholder="Confirm Security code" style="width:185px; height:23px;"></div></p>
       
       <p class="agreement">
                       <label>Remarks</label>
                       <textarea style="resize:none" rows="5" type="text" name="remarks" cols="50">
                        </textarea>
                     </p>
    </div>
  </div>
  </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
                {
                  
                  $uid = $_POST['tarapp'];
                  $pass = $_POST['pass'];
                  $cpass = $_POST['cpass'];
                  $scode = $_POST['scode'];
                  $cscode = $_POST['cscode'];
                  $remarks = $_POST['remarks'];
                  if($pass==$cpass)
                  {
                    if($scode==$cscode)
                    {
                     // $un = mysql_query(" SELECT * FROM admin where userid='$uid'") or die(mysql_error());
                     // $un1 = mysql_fetch_array($un);
                     // $un2 = $un1['username'];
                    //  if($un2)
                    //  {
                        $pw = mysql_query("INSERT INTO user_changepass (user_pwdno,user_id,user_newpwd,user_newscode,user_remarks,user_createdby)
                                                VALUES('$optcode','$uid','$pass','$scode','$remarks','".$_SESSION['username']."')");
                        if($pw)
                        {
                          $date = date("Y-m-d H:i:s");
                          $pupd = mysql_query("UPDATE users_masters set user_password='$pass',user_scode='$scode',user_pwdchangeddate='$date' WHERE user_id='$uid'");
                          if($pupd)
                          {                        
                            ?>
                              <script>alert('Updated Successfully');
                              window.location.href='change_password.php';
                              </script>                       
                          <?php
                          }
                        }
                     // }
                    }
                    else
                    {
                      ?>
                       <script>alert('Security Code Does not match');
                       window.location.href='change_password.php';
                       </script>                       
                    <?php
                    }
                  }
                  else
                  {
                    ?>
                       <script>alert('New password & confirm password Does not match');
                       window.location.href='change_password.php';
                       </script>                       
                    <?php
                  }

                }
?>