<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='surgery_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_surgery.php'>View</a></li>                
          </ul>
          </div>
</p>";?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="surgery_searchview.php" method="GET">

<table border=1 class="act">
	<tr><td>Surgery Design Code</td>
    <td>Tariff Code</td>
    <td>Surgery code</td>
    <td>Surgery Name</td>
    <td>Surgery Type Code</td>
    <td>Department Code</td>
    <td>Department Name</td>
    <td>Surgery Amount</td>
    <td>Estimated Time</td>
    <td>Effect From</td>
    <td>Effect to</td>
    <td>Remarks</td>
    <td>CREATED BY</td>
    <td>CREATED DATE</td>
    <td>MODIFIED BY</td>
    <td>MODIFIED DATE</td>
    <td>STATUS</td>
	</tr>
    <tr>
    <td><input type='text' name='t1' ></td>
    <td><input type='text' name='t2' ></td>
    <td><input type='text' name='t3' ></td>
    <td><input type='text' name='t4' disabled></td>
    <td><input type='text' name='t5' ></td>
    <td><input type='text' name='t6' ></td>
    <td><input type='text' name='t7' disabled></td>
    <td><input type='text' name='t8' ></td>
    <td><input type='text' name='t9' ></td>
    <td><input type='text' name='t10' ></td>
    <td><input type='text' name='t11' ></td>
    <td><input type='text' name='t12' ></td>
    <td><input type='text' name='t13' ></td>
    <td><input type='text' name='t14' ></td>
    <td><input type='text' name='t15' ></td>
    <td><input type='text' name='t16' ></td>
    <td><input type='text' name='t17' ></td>    
    </tr></form>
</table>  
<button type="submit" name="submit" Value="edit">Search</button>
</form>
</body>
</html>
