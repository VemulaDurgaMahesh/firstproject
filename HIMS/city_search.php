
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
<form action="city_searchview.php" method="GET">

<table border=1 class="act">
	<tr><td>City Code</td>
  <td>City Name</td>
  <td>Pincode</td>
  <td>District Name</td>
  <td>State Name</td>
  <td>Country Name</td> 
  <td>CREATED BY</td>
  <td>CREATED DATE</td>
  <td>MODIFIED BY</td>
  <td>MODIFIED DATE</td>
  <td>STATUS</td></tr>
    <tr>
    <td><input type='text' name='t7' id='t7'></td>
    <td><input type='text' name='t1' id='t1'></td>
    <td><input type='text' name='t13' id='t13' ></td>
    <td><input type='text' name='t12' id='t12'></td>
    <td><input type='text' name='t2' id='t2'></td>
    <td><input type='text' name='t9' id='t9'></td>
    <td><input type='text' name='t3' id='t3'></td>
    <td><input type='text' name='t4' id='t4'></td>
    <td><input type='text' name='t6' id='t6'></td>
    <td><input type='text' name='t5' id='t5'></td>
    <td><input type='text' name='t15' id='t15'></td>
    <td></td>
    </tr>
</table>  
<button type="submit" name="submit" Value="edit">Search</button>
</form>
</body>
</html>
