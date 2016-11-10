<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='usermaster_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_usermaster.php'>View</a></li>                
          </ul>
          </div>
</p>";?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="users_searchview.php" method="GET">

<table border=1 class='act'>
	<tr><td>User Name</td>
    <td>User ID</td>
    <td>Designation</td>
    <td>Designation Code</td>     
    <td>Department Code</td>
    <td>Department Name</td>
    <td>Profile Code</td>   
    <td>Profile Name</td> 
    <td>CREATED BY</td>
    <td>CREATED DATE</td>
    <td>MODIFIED BY</td>
    <td>MODIFIED DATE</td>
    <td>STATUS</td>
  <td></td>
	</tr>
    <tr>
    <td><input type='text' name='t1' ></td>
    <td><input type='text' name='t2' ></td>
    <td><input type='text' name='t3' ></td>
    <td><input type='text' name='t4' ></td>
    <td><input type='text' name='t6' ></td>
    <td><input type='text' name='t7' ></td>
    <td><input type='text' name='t8' ></td>
    <td><input type='text' name='t9' ></td>
    <td><input type='text' name='t12'></td>  
    <td><input type='text' name='t13' ></td>
    <td><input type='text' name='t14' ></td>
    <td><input type='text' name='t15' ></td>
    <td><input type='text' name='t16'></td>   
    </tr>
</table>  
<button type="submit" name="submit" Value="edit">Search</button>
</form>
</body>
</html>
