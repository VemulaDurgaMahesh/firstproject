<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="sostable_search_view.php" method="GET">
<p>
	<ul class="drop_menu">
               <li>
              <a href="sostable_search.php">
                Search
              </a>
              </li>
                <li><a href="sostable.php">View</a></li>                 
				  </ul>
				  </div>
</p>
<table border=1 class="act">
	<tr><td>SERVICE TYPE</td>
	<td>CODE</td>
<td>TARRIF NAME</td>
<td>SERVICE GROUP NAME</td>
<td>SERVICE GROUP CODE BILLING HEAD</td>
<td>SERVICE NAME</td>
<td>SERVICE CODE</td>
<td>CHARGE</td>
<td>HOSPITAL PERCENTAGE</td>
<td>HOSPITAL CHARGE</td>
<td>DOCTOR PERCENTAGE</td>
<td>DOCTOR CHARGE</td>
<td>INSTRUCTIONS</td>
<td>APPLICATION FOR</td>
<td>CREATED BY</td>
<td>CREATED TIME</td>
<td>MODIFIED BY</td>
<td>MODIFIED TIME</td>
<td>STATUS</td></tr>
    <tr><td><input type='text' name='t1' id='t1'></td>
<td><input type='text' name='t2' id='t2'></td>
<td><input type='text' name='t3' id='t3'></td>
<td><input type='text' name='t4' id='t4'></td>
<td><input type='text' name='t5' id='t5'></td>
<td><input type='text' name='t6' id='t6'></td>
<td><input type='text' name='t7' id='t7'></td>
<td><input type='text' name='t8' id='t8'></td>
<td><input type='text' name='t9' id='t9'></td>
<td><input type='text' name='t10' id='t10'></td>
<td><input type='text' name='t11' id='t11'></td>
<td><input type='text' name='t12' id='t12'></td>
<td><input type='text' name='t13' id='t13'></td>
<td><input type='text' name='t14' id='t14'></td>
<td><input type='text' name='t15' id='t15'></td>
<td><input type='text' name='t16' id='t16'></td>
<td><input type='text' name='t17' id='t17'></td>
<td><input type='text' name='t18' id='t18'></td>
<td><input type='text' name='t19' id='t19'></td>
</tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>