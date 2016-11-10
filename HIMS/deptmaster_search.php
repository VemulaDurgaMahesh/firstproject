<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="deptmaster_search_view.php" method="GET">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="deptmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="deptmastertable.php">View</a></li>
				  </ul>
				  </div>
</p>     
<table border='1' class='act'>
	<tr><td>DEPARTMENT CODE</td><td>DEPARTMENT NAME</td><td>DEPARTMENT STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></form></tr>
    <tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>