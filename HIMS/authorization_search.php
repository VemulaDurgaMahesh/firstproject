<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="authorization_search_view.php" method="GET">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="authorization_search.php">
                Search
              </a>
              </li>
                <li><a href="authorization_table.php">View</a></li>
				  </ul>
				  </div>
				  </p>
<table border=1 class="act">
	<tr>
  <td>designtn</td><td>am_code</td><td>refcode</td><td>athname</td><td>opcnscn</td><td>ipcnscn</td><td>vocherapproval</td><td>opcrdt</td><td>ipcrdt</td><td>mfdapdtrans</td><td>opcncln</td><td>ipcncln</td><td>dscgewostlmnt</td><td>opphcnscn</td><td>patntbillcnvrsn</td><td>fnbdue</td><td>opphdue</td><td>fnbcnscn</td><td>createdby</td><td>createddate</td><td>modifyby</td><td>modifydate</td><td>status</td>
  </tr>
    <tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input type='text' name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5' ></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7' ></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t9' id='t9' ></td><td><input type='text' name='t10' id='t10'></td><td><input type='text' name='t11' id='t11'></td><td><input type='text' name='t12' id='t12' ></td><td><input type='text' name='t13' id='t13'></td><td><input type='text' name='t14' id='t14'></td><td><input type='text' name='t15' id='t15'></td><td><input type='text' name='t16' id='t16'></td><td><input type='text' name='t17' id='t17'></td><td><input type='text' name='t18' id='t18' ></td><td><input type='text' name='t19' id='t19' ></td><td><input type='text' name='t20' id='t20' ></td><td><input type='text' name='t21' id='t21' ></td><td><input type='text' name='t22' id='t22'></td><td><input type='text' name='t23' id='t23'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>
</html>