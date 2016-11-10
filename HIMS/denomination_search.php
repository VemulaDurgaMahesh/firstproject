<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="denomination_search_view.php" method="GET">

<table border=1>
	<tr>
		<td>EDIT</td><td>Denomination Code</td><td>Denomination Value</td><td>Denomination Status</td><td>Denomination Created By</td><td>Denomination Created date</td><td>Denom modify By</td><td>Denom Modify Date</td><td>Delete Status</td>
  </tr>
    <tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td></tr>
</table>  
<button name="submit">Search</button>
</form>
</body>
</html>