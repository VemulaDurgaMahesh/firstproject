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
              <a href="surgerytype_search.php">
                Search
              </a>
              </li>
                <li><a href="viewsurgery_type.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
</p>                  
				  </div>
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Operation Theater type Master </h2>
                          <h3 class="box-title"> Surgery Details <small></small></h3>
                </div> 
                <br><br><br><br><br><br><br><br><br>
                <div style="width:600px; margin:0 auto;">   
                <P class="agreement">           
                      <label for="countrycode">Surgery Type Code</label>
                      <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM surgerytype_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $sgtcode = 'SGT'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $sgtcode = 'SGT'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="sgtcode" value="<?php echo $sgtcode ?>" disabled style="width:185px; height:23px;">
                      </p><br><br>
                      <p class="agreement">
                      <label for="countryname">Surgery Type Name</label>
                      <input type="text" class="form-control" name="sgtname" placeholder="Surgery type name" style="width:185px; height:23px;">
                      </p>
                   
	</form>
</body>
</html>
 <?php
                         if(isset($_POST['submit']))
                         {                         
                         $sgtname = $_POST['sgtname'];
                         $queryget = mysql_query("INSERT INTO  surgerytype_master (st_code,st_name,st_createdby) VALUES('$sgtcode','$sgtname','$username')");
                         if($queryget)
                         {
                          ?>
                                  <script>alert('success');
                              window.location.href='surgery_type.php';
                              </script>                       
                          <?php
                        }
                         } ?>