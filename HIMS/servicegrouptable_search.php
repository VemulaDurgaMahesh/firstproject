<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="servicegrouptable_search_view.php" method="GET">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="servicegrouptable_search.php">
                Search
              </a>
              </li>
                <li><a href="servicegrouptable.php">View</a></li>              
				  </ul>
				  </div>
</p>                	
<table border=1 class="act">
	<tr><td>SERVICE GROUP CODE</td><td>SERVICE GROUP NAME</td><td>SERVICE GROUP DPT CODE</td><td>SERVICE GROUP STATUS</td><td>SERVICE GROUP CREATED BY</td><td>SERVICE GROUP CREATED NAME</td><td>SEVICE GROUP MODIFY BY</td><td>SERVICE GROUP MODIFY DATE</td></form></tr>
    <tr><td><input type='text' name='t7' id='t7'><td><input type='text' name='t1' id='t1'></td><td><input name='t2' id='t2'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t9' id='t9'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>