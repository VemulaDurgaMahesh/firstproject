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
              <a href="optheater_search.php">
                Search
              </a>
              </li>
                <li><a href="view_operation.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
          </ul>
          </div>
</p>                  
    
    
    <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Opeartion Master </h2>
        </div>
        <h3> Operation Details </h3>
        <br><br><br><br><br><br><br><br><br>
        <div style="width:600px; margin:0 auto;">
    <p class="agreement">
      <label for="hname">Opeartion Code: </label>
       <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM operation_theater") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $optcode = 'OPT'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $optcode = 'OPT'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="wgc" value="<?php echo $optcode ?>" disabled style="width:185px; height:23px;">
      </p><br><br><p class="agreement">
      <label for="hcode">Opeartion Name:</label>
      <input type="text" name="wgn" style="width:185px; height:23px;">
      </p><br><br><p class="agreement">
      <label for="lcode">Operation Theater Type</label>
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
$str="SELECT *  from  operation_theatertype WHERE ott_status=1 ";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select OTtype--</option>";
    while($row = $result->fetch_assoc()) {
  echo "<option value='".$row['ott_code']."'>".$row['ott_name']."</option>";
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
if($_SERVER['REQUEST_METHOD']=='POST')
{
$connect = mysql_connect ("localhost","root","") or die();
 mysql_select_db("hospital")or die(); 

$val2=$_POST['wgn'];
$val3=$_POST['tarapp'];
$queryget = mysql_query("INSERT INTO operation_theater (ot_code,ot_name,ott_code,ot_createdby) VALUES('$optcode','$val2','$val3','".$_SESSION['username']."')");
 if($queryget)
 {
   ?>
    <script>alert('success'); window.location.href='operation_theater.php';</script>                       
   <?php
}
  }
?>