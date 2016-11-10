<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="healthcardtype_search_view.php" method="GET">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="healthcardholder_search.php">
                Search
              </a>
              </li>
                <li><a href="healthcardholdertable.php">View</a></li>
         </ul>
          </div>
          </p>
<?php 
echo "<table border=1>";
	echo "<tr><td>CHONo</td><td>CARD TYPE CODE</td><td>CARD NO</td><td>CARD VALID FROM</td><td>CARD VALID TO</td><td>ADDRESS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></tr>";
   	echo "<tr>
	<td><input type='text' name='t1' id='t1'></td>
	<td><input type='text' name='t2' id='t2'></td>
	<td><input name='t3' id='t3'></td>
	<td><input name='t4' id='t4'></td>
	<td><input name='t5' id='t5'></td>
	<td><input name='t6' id='t6'></td>
	<td><input name='t7' id='t7'></td>
	<td><input name='t8' id='t8'></td>
	<td><input name='t9' id='t9'></td>
	<td><input name='t10' id='t10'></td>
	<td><input name='t11' id='t11'></td></form></tr>";
echo "</table>";
?>  
<button name="submit">Search</button>
</body>
</html>