<?php
session_start();
?>
<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='userprofile_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_userprofile.php'>View</a></li>                
          </ul>
          </div>
</p>";?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="userprofile_searchview.php" method="GET">

<table border=1 class="act">
	<tr>
    <td>Profile code</td>
    <td>Profile Name</td>
    <td>User Group Code</td>
    <td>User Group Name</td>
    <td>Depaetment Code</td>
    <td>Depaetment Name</td>
    <td>CREATED BY</td>
    <td>CREATED DATE</td>
    <td>MODIFIED BY</td>
    <td>MODIFIED DATE</td>
    <td>STATUS</td>
  <td></td>
	</tr>
    <tr>
    <td><input type='text' name='t7' ></td>
    <td><input type='text' name='t1' ></td>
    <td><input type='text' name='ottype' ></td>
    <td><input type='text' name='t9' ></td>
    <td><input type='text' name='ottype1' ></td>
    <td><input type='text' name='t10' ></td>
    <td><input type='text' name='t3' ></td>
    <td><input type='text' name='t4' ></td>
    <td><input type='text' name='t6'></td>  
    <td><input type='text' name='t8' ></td>
    <td><input type='text' name='t5' ></td>
          
    </tr>
</table>  
<button type="submit" name="submit" Value="edit">Search</button>
</form>
</body>
</html>
