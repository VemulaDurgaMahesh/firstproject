
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="tarrifmaster_search_view.php" method="GET">
	<p>
		<div>
<ul class="drop_menu">
               <li>
         <a href="tarrifmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="tarrifmastertable.php">View</a></li>
  </ul>
    </div>
 </p>
<table border=1 class="act">
	<tr><td>TARRIF CODE</td><td>TARRIF NAME</td><td>TARRIF CONTACT PERSON</td><td>TARRIF EFFECT FROM</td><td>TARRIF EFFECT TO</td><td>TARRIF STATUS</td><td>TARRIF CREATED BY</td><td>TARRIF CREATED DATE</td><td>TARRIF MODIFIED BY</td><td>TARRIF MODIFIED DATE</td></form></tr>
    <tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input type='text' name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t9' id='t9'></td><td><input type='text' name='t10' id='t10'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>