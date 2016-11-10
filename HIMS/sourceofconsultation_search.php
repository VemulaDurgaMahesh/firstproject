<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="souconsul_search_view.php" method="GET">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="sourceofconsultation_search.php">
                Search
              </a>
              </li>
                <li><a href="socconstable.php">View</a></li>                
				  </ul>
				  </div>
</p> 
<table border=1 class="act">
	<tr>
<td>SEARCH</td>
<td>TARRIF NAME</td>
<td>CONSULTANT CODE</td>
<td>CONSULTANCY NAME</td>
<td>NORMAL CHARGES </td>
<td>NORMAL HOSPITAL CHARGES</td>
<td>EMEREGENCY CHARGES</td>
<td>EMEREGENCY HOSPITAL CHARGES</td>
<td>REVISIT CHARGES</td>
<td>REVISIT HOSPITAL CHAREGES</td>
<td>REGISTRATION FEE</td>
<td>NUMBER OF DAYS</td>
<td>NUMBER OF VISITS</td>
<td>STATUS</td></form></tr>
    <tr><td><input type="submit" value="search"><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t9' id='t9'></td><td><input type='text' name='t10' id='t10'></td><td><input type='text' name='t11' id='t11'></td><td><input type='text' name='t12' id='t12'></td><td><input name='t13' id='t13'></td></tr>
</table>  
</form>
</body>
</html>