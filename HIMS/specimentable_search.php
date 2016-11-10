<?php
 include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<p>
<ul class="drop_menu">
               <li>
              <a href="specimentable_search.php">Search </a>
              </li>
                <li><a href="specimentable.php">View</a></li>
                </ul>
				  </p>
<form action="specimentable_search_view.php" method="GET">
<table border=1 class="act">
	<tr>
	<td>SPECIMEN CODE</td><td>SPECIMEN NAME</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></tr>
    <tr><td><input type='text' name='t1' id='t1'><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td>
	<td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td>
	<td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td>
	</tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>