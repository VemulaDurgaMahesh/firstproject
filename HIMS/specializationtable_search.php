<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="specializationtable_search_view.php" method="GET">
<p>
		<div>
			  <ul class="drop_menu">
               <li>
              <a href="specializationtable_search.php">
                Search
              </a>
              </li>
                <li><a href="specializationtable.php">View</a></li>              
				  </ul>
				  </div>
			</p>       
<table border=1 class="act">
	<tr><td>SPLZN CODE</td><td>SPLZN NAME</td><td>SPLZN STATUS</td><td>SPLZN CREATED BY</td><td>SPLZN CREATED DATE</td><td>SPLZN MODIFIED BY</td><td>SPLZN MODIFIED DATE</td><td>DELETE STATUS</td></form></tr>
    <tr><td><input type='text' name='t7' id='t7'><td><input type='text' name='t1' id='t1'></td><td><input name='t2' id='t2'></td><td><input type='text' name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t5' id='t5'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>