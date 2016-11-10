
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="ottype_searchview.php" method="GET">
<p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="ottype_search.php">
                Search
              </a>
              </li>
                <li><a href="viewoperation_type.php">View</a></li>                
          </ul>
          </div>
</p>
<table border=1 class="act">
	<tr><td>OT Type Code</td>
	<td>OT Type Name</td>	
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	<td>EDIT</td></form></tr>
    <tr>
    <td><input type='text' name='t7' id='t7'></td>
    <td><input type='text' name='t1' id='t1'></td>
    <td><input type='text' name='t3' id='t3'></td>
    <td><input type='text' name='t4' id='t4'></td>
    <td><input type='text' name='t6' id='t6'></td>
    <td><input type='text' name='t8' id='t8'></td>
    <td><input type='text' name='t5' id='t5'></td>
    <td></td>
    </tr>
</table>  
<button type="submit" name="submit" Value="edit">Search</button>
</form>
</body>
</html>
