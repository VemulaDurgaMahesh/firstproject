<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="equipmentmaster_search_view.php" method="GET">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="equipmentmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="equipmentmastertable.php">View</a></li>               
				  </ul>
				  </div>
</p> 
<table border=1 class="act">
	<tr><td>EQUIPMENT GROUP NAME</td><td>EQUIPMENT CODE</td><td>EQUIPMENT NAME</td><td>EQUIPMENT STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>EQUIPMENT LEVEL</td><td>EQUIPMENT BLOCK</td><td>EQUIPMENT WING</td><td>EXTENSION NUMBER</td></form></tr>
   <tr><td><input type='text' name='t12' id='t12'><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t9' id='t9'></td><td><input type='text' name='t10' id='t10'></td><td><input type='text' name='t11' id='t11'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>
</html>