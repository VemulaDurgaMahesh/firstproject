<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='surgerytemplate_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_surgerytemplate.php'>View</a></li>                
          </ul>
          </div>
</p>";
?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="surgerytemplate_searchview.php" method="GET">

<table border=1 class="act">
	<tr>
  <td>Template Code</td>
  <td>Template Name</td>
  <td>Surgery Code</td>
  <td>Surgery Name</td>
  <td>Surgery Procedure</td>
  <td>CREATED BY</td>
  <td>CREATED DATE</td>
  <td>MODIFIED BY</td>
  <td>MODIFIED DATE</td>
  <td>STATUS</td>
    <tr>
    <td><input type='text' name='t7' id='t7'></td>
    <td><input type='text' name='t1' id='t1'></td>
    <td><input type='text' name='t2' id='t2' disabled></td>
    <td><input type='text' name='t9' id='t9'></td>
    <td><input type='text' name='t10' id='t10'></td>
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
