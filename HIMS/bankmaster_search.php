
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="banktable_search_view.php" method="GET">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="bankmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="banktable.php">View</a></li>                
				  </ul>
				  </div>
</p>  
<table border=1 class="act">
	<tr><td>BANK CODE</td><td>BANK NAME</td><td>BANK BRANCH</td><td>BANK ADDRESS</td><td>BANK STATUS</td><td>BANK CREATED BY</td><td>BANK CREATED DATE</td><td>BANK MODIFIED BY</td><td> BANK MODIFIED DATE</td><td>BANK ACCOUNT TYPE</td><td>BANK  ACCOUNT NUMBER</td><td>BANK MICR</td><td>BANK IFSC</td><td>BANK BSR</td><td>DELETE STATUS</td></form></tr>
    <tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t9' id='t9'></td><td><input type='text' name='t10' id='t10'></td><td><input type='text' name='t11' id='t11'></td><td><input type='text' name='t12' id='t12'></td><td><input type='text' name='t13' id='t13'></td><td><input type='text' name='t14' id='t14'></td><td><input type='text' name='t15' id='t15'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>