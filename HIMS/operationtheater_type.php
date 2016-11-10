<html>
<head>

<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
</head>
<body>
<?php include('menu.php'); ?>
		<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="ottype_search.php">
                Search
              </a>
              </li>
                <li><a href="viewoperation_type.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>  	
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Operation Theater type Master </h2>
        </div>
        <h3> Opeartion Type Details</h3>
        <br><br><br><br><br><br><br><br><br><br>
                  <div style="width:600px;margin:0 auto;">
        <p class="agreement"><label for="countrycode"> OT Type Code</label>
                      <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM operation_theatertype") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $ottcode = 'OTT'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $ottcode = 'OTT'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="ottcode" value="<?php echo $ottcode ?>" disabled style="width:185px; height:23px;"> 
                    </p><br><br>
                     <p class="agreement">
                      <label for="countryname">OT Type Name</label>
                      <input type="text" class="form-control" name="ottname" placeholder="Operation Theater Type name" style="width:185px; height:23px;">
                      </p>          
             </div>
             </div>
	</form>
</body>
</html>
<?php
                         if(isset($_POST['submit']))
                         {                         
                         $ottname = $_POST['ottname'];
                         $queryget = mysql_query("INSERT INTO  operation_theatertype (ott_code,ott_name,ott_createdby) VALUES('$ottcode','$ottname','$username')");
                         if($queryget)
                         {
                          ?>
                            <script>alert('success'); window.location.href='operationtheater_type.php';</script>
                          <?php
                        }
                         } ?>