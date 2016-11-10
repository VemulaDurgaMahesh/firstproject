<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="roommaster_search_view.php" method="GET">
<p>
	<ul class="drop_menu">
               <li>
              <a href="roommaster_search.php">
                Search
              </a>
              </li>
                <li><a href="roommastertable.php">View</a></li>
				  </div>
</p>

<table border=1>
	<tr><td>WARD CODE</td><td>WARD NAME</td><td>ROOM CODE</td><td>ROOM BLOCK</td><td>ROOM BEDNUMBER</td><td>ROOM LEVEL</td><td>ROOM EXTEN</td><td>ROOM NURSE</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>ROOM STATUS</td><td>EDIT</td></form></tr>
    <tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t9' id='t9'></td><td><input type='text' name='t10' id='t10'></td><td><input type='text' name='t11' id='t11'></td><td><input type='text' name='t12' id='t12'></td><td><input name='t13' id='t13'></td</tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>