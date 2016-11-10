<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; } 
</style>
<body>
<form action="parametersetupsearch_view.php" method="GET">
<p>
	<ul class="drop_menu">
               <li>
              <a href="parametersetup_search.php">
                Search
              </a>
              </li>
                <li><a href="parametersetup_view.php">View</a></li>              
				  </ul>
				  </div>
</p>
<table border=1 class="act">
<tr><td>LabGroup</td><td>Lab Group Code</td><td>ParameterCode</td><td>ParameterName</td><td>ParameterMethod</td><td>ParaMeterShortName</td><td>Parameter Text Size</td><td>Parameter Text Display</td><td>Accreditaion Needed</td><td>New Organism Interface</td><td>AntiBiotics</td><td>Units Only</td><td>Description Only</td><td>Normal Ranges</td><td>Critical ranges</td><td>Default Ranges</td><td>Gender</td><td>Min Age</td><td>UOM1</td><td>Max Age</td><td>UOM2</td><td>Description</td><td>Symbol</td><td>Min Range</td><td>Max Range</td><td>Units Normal Range</td><td>Min Critical</td><td>Max Critical</td><td>Min Default</td><td>Max Default</td></tr>
<tr><td><input type='text' name='t1' id='t1'></td><td><input type='text' name='t2' id='t2'></td><td><input name='t3' id='t3'></td><td><input type='text' name='t4' id='t4'></td><td><input type='text' name='t5' id='t5'></td><td><input type='text' name='t6' id='t6'></td><td><input type='text' name='t7' id='t7'></td><td><input type='text' name='t8' id='t8'></td><td><input type='text' name='t9' id='t9'></td><td><input type='text' name='t10' id='t10'></td><td><input type='text' name='t11' id='t11'></td><td><input type='text' name='t12' id='t12'></td><td><input type='text' name='t13' id='t13'></td><td><input type='text' name='t14' id='t14'></td><td><input type='text' name='t15' id='t15'></td><td><input type='text' name='t16' id='t16'></td><td><input type='text' name='g' id='g'></td><td><input type='text' name='t17' id='t17'></td><td><input type='text' name='t18' id='t18'></td><td><input type='text' name='t19' id='t19'></td><td><input type='text' name='t20' id='t20'></td><td><input type='text' name='t21' id='t21'></td><td><input type='text' name='t22' id='t22'></td><td><input type='text' name='t23' id='t23'></td><td><input type='text' name='t24' id='t24'></td><td><input type='text' name='t25' id='t25'></td><td><input type='text' name='t26' id='t26'></td><td><input type='text' name='t27' id='t27'></td><td><input type='text' name='t28' id='t28'></td><td><input type='text' name='t29' id='t29'></td></form></tr>
</table>
<button name="submit">Search</button>
</form>
</body>
</html>