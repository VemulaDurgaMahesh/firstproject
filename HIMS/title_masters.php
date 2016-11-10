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
              <a href="title_search.php">
                Search
              </a>
              </li>
                <li><a href="view_title.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
          </ul>
          </div>
</p>
             <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Title Master </h2>
        </div>
                  <h3> Title Details</h3><BR><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:400px; margin:0 auto;">
                    <p>
                      <label for="titlecode"> Title Code</label>
                    <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM title_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $tcode = 'TCD'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $tcode = 'TCD'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="tcode" value="<?php echo $tcode ?>"  style="width:185px; height:23px;">
                      </p>
                      <BR><BR>
                      <p>
                      <label for="titlename"> Title Name</label>
                      <input type="text" class="form-control" name="tname" placeholder="Title Name" style="width:185px; height:23px;">
                      </p>
                             
           </form>
            <?php
                         $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                         if(isset($_POST['submit']))
                         {                         
                         $tname = $_POST['tname'];  
                         $queryget = mysql_query("INSERT INTO title_master (title_code,title_title,title_createdby) VALUES('$tcode','$tname','$username')");
                         if($queryget)
                         {
                          ?>
                                  <script>alert('success');window.location.href='title_masters.php';
                              
                              </script>                       
                          <?php
                        }
                         } ?>
 </div>
          </div>
  </body>
</html>
