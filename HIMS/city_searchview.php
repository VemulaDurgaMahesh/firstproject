<?php include('menu.php');
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='city_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_city.php'>View</a></li>                
          </ul>
          </div>
</p>";
 ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
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
$x=$_GET['t7'];
$str="SELECT * from city_master where city_code ='$x' OR city_name like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
  echo "<tr>
  <td>EDIT</td>
  <td>City Code</td>
  <td>City Name</td>
  <td>Pincode</td>
  <td>District Name</td>
  <td>State Name</td>
  <td>Country Name</td> 
  <td>CREATED BY</td>
  <td>CREATED DATE</td>
  <td>MODIFIED BY</td>
  <td>MODIFIED DATE</td>
  <td>STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
     $x=$row['country_code'];
      $y=$row['state_code'];
      $z=$row['district_code'];
      $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM country_master WHERE  country_code='$x'") or die(mysql_error());
                      $cname = mysql_fetch_array($b);
                      $s = mysql_query(" SELECT * FROM state_master WHERE state_code='$y'") or die(mysql_error());
                      $sname = mysql_fetch_array($s);
                      $d = mysql_query(" SELECT * FROM district_master WHERE district_code='$z'") or die(mysql_error());
                      $dname = mysql_fetch_array($d);

  echo "<tr><form action='city_edit.php' method='get'><td>
  <input type='submit' name='edit' value='edit'></td>
  <td><input type='text' name='t7' id='t7' value='".$row['city_code']."' readonly='readonly'></td>
  <td><input type='text' name='t1' id='t1' value='".$row['city_name']."' readonly='readonly'></td>
  <td><input type='text' name='t13' id='t13' value='".$row['city_pin']."' readonly='readonly'></td>
  <td><input type='text' name='t12' id='t12' value='".$dname['district_name']."' readonly='readonly'</td>
  <td><input type='text' name='t2' id='t2' value='".$sname['state_name']."' readonly='readonly'></td>
  <td><input type='text' name='t9' id='t9' value='".$cname['country_name']."' readonly='readonly'></td>
  <td><input type='text' name='t3' id='t3' value='".$row['city_createby']."' readonly='readonly'></td>
  <td><input type='text' name='t4' id='t4' value='".$row['city_date']."' readonly='readonly'></td>
  <td><input type='text' name='t6' id='t6' value='".$row['city_modifyby']."' readonly='readonly'></td>  
  <td><input type='text' name='t5' id='t5' value='".$row['city_modifydate']."' readonly='readonly'></td>
  <td><input type='text' name='t15' id='t15' value='".$row['city_status']."' readonly='readonly'></td>
  <td><input type='hidden' name='t14' id='t14' value='".$row['district_code']."' readonly='readonly'></td>
  <td><input type='hidden' name='t10' id='t10' value='".$row['country_code']."' readonly='readonly'></td>
  <td><input type='hidden' name='t11' id='t11' value='".$row['state_code']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
