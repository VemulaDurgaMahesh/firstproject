
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
<script type="text/javascript">
    var popup;
    function SelectName(selectedRow) {
      console.log(selectedRow);
      var location = "district_popup.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300,scrollbars=1");
        popup.focus();
        return false
    }
</script>
  </head>
  <body>
  <?php include('menu.php'); ?>
            <form method="post" action="#" class="register">
            <p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="district_search.php">
                Search
              </a>
              </li>
                <li><a href="view_district.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
          </ul>
          </div>
</p>
             <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  District Master </h2>
        </div>
                  <h3> District Details</h3><BR><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:800px; margin:0 auto;">
                    <p class="agreement">
                      <label for="titlecode"> District Code</label>
                    <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM district_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $tcode = 'D'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $tcode = 'D'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="tcode" value="<?php echo $tcode ?>" style="width:185px; height:23px;">
                      </p><BR><BR>
                      <p class="agreement">
                      <label for="titlename"> District Name</label>
                      <input type="text" class="form-control" name="tname" placeholder="District Name" style="width:185px; height:23px;">
                      </p><BR><BR>
                      <p class="agreement">
                      <label for="titlename"> State Name</label>
                        <input type="text" name="stateName1" id="stateName1" readonly style="width:185px; height:23px;"/>
                        <input type="text" name="stateCode1" id="stateCode1" readonly style="width:185px; height:23px;margin-left:+1px;"/>
                        <button type="button" onclick="SelectName(1)" ><img src="search.png" /></button>
                       </p> 
                        <p class="agreement">
                      <label for="titlename"> Country Name</label>
                      <input type="text" name="countryName1" id="countryName1" readonly style="width:185px; height:23px;"/>
                      <input type="text" name="countryCode1" id="countryCode1" readonly style="width:185px; height:23px;margin-left:+1px;"/>
                       </p>     
           </form>
            <?php
                         $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                         if(isset($_POST['submit']))
                         {                         
                         $tname = $_POST['tname'];  
                         $countrycode=$_POST['countryCode1'];
                         $statecode=$_POST['stateCode1'];
                         $queryget = mysql_query("INSERT INTO district_master (district_code,district_name,state_code,country_code,d_cby) VALUES('$tcode','$tname','$statecode','$countrycode','$username')");
                         if($queryget)
                         {
                          ?>
                          <script>alert('success');window.location.href='district_masters.php';</script>
                           <?php
                        }
                         } ?>
 </div>
          </div>
  </body>
</html>
