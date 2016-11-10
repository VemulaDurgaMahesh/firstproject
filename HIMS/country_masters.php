<!DOCTYPE html>
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
            <form method="post" action="#" class="register">
            <p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="country_search.php">
                Search
              </a>
              </li>
                <li><a href="view_country.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
          </ul>
          </div>
</p>
             <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Country Master </h2>
        </div>
                  <h3> Country Details</h3>
                  <br><br><br><br><br><br><br><br><br><br>
                  <div style="width:600px;margin:0 auto;">
                    <p class="agreement">
                      <label for="titlecode"> Country Code</label>
                    <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM country_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $tcode = 'C'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $tcode = 'C'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="tcode" value="<?php echo $tcode ?>" style="width:185px; height:23px;">
                      </p><br><br>
                      <p class="agreement">
                      <label for="titlename"> Country Name</label>
                      <input type="text" class="form-control" name="tname" placeholder="Country Name" style="width:185px; height:23px;">
                      </p>
                             
           </form>
            <?php
                         $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                         if(isset($_POST['submit']))
                         {                         
                         $tname = $_POST['tname'];  
                         $queryget = mysql_query("INSERT INTO country_master (country_code,country_name,country_createdby) VALUES('$tcode','$tname','$username')");
                         if($queryget)
                         {
                          ?>
                         <script>alert('success');window.location.href='country_masters.php'; </script>
                         <?php
                        }
                         } ?>
 </div>
  </div>
  </body>
</html>
