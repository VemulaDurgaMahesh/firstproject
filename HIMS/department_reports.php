<?php
session_start();
?>
<html>
<head>
</head>
<body>
<form action="page_department.php" target="p2" method="POST">
	<table border=1>
	<tr>
    <td>Department Name</td>	
	</tr>
    <tr>
    
    <td><input type='text' name='t1' id='t1'></td>  
    </tr>
</table> 
	<button type="submit" name="submit" >SHOW</button>
   	<button type="submit" name="export" >EXPORT</button>
   	<button type="submit" name="print" >PRINT</button>
</form>
</body>
</html>