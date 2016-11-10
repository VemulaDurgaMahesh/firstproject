<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; } 
</style>
<body>
<form action="occupationmaster_search_view.php" method="GET">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="occupationmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="occupationmastertable.php">View</a></li>               
				  </ul>
				  </div>
</p>               
<table border='1' class='act'>
	<tr><td>OCCUPATION CODE</td><td>OCCUPATION NAME</td><td>OCCUPATION CREATEDBY</td><td>OCCUPATION CREATEDDATE</td><td>OCCUPATION MODIFIED BY</td><td>OCCUPATION MODIFIED DATE</td><td>OCCUPATION STATUS</td><td>DELETE STATUS</td></form></tr>
   <tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input type='text' name='t3' id='t3'></td><td><input name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>
</html>