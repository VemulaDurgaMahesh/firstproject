
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
      var location = "city_popup.php?rowID="+selectedRow;
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
              <a href="city_search.php">
                Search
              </a>
              </li>
                <li><a href="view_city.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
          </ul>
          </div>
</p>
             <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  City Master </h2>
        </div>
                  <h3> City Details</h3>
                  <BR><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:800px; margin:0 auto;">
                    <p class="agreement">
                      <label for="titlecode"> City Code</label>
                    <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM city_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $tcode = 'CITY'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $tcode = 'CITY'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="tcode" value="<?php echo $tcode ?>" style="width:185px; height:23px;">
                      </p><BR><BR>
                      <p class="agreement">
                      <label for="titlename"> City Name</label>
                      <input type="text" class="form-control" name="tname" placeholder="City Name" style="width:185px; height:23px;">                      
                      <input type="number" class="form-control" name="pincode" placeholder="pincode" style="width:185px; height:23px;margin-left:+1px;">
                      </p><BR><BR>
                      <p class="agreement">
                      <label for="titlename"> District Name</label>
                        <input type="text" name="dn" id="distname1" readonly placeholder="District name" style="width:185px; height:23px;"/>
                        <input type="text" name="dc" id="distcode1" readonly placeholder="District Code" style="width:185px; height:23px;margin-left:+1px;"/><button type="button" onclick="SelectName(1)" ><img src="search.png" /></button>
                       </p>
                      <p class="agreement">
                      <label for="titlename"> State Name</label>
                        <input type="text" name="sn" id="stateName1" readonly placeholder="State name" style="width:185px; height:23px;"/>
                        <input type="text" name="sc" id="stateCode1" readonly placeholder="State Code" style="width:185px; height:23px;margin-left:+1px;"/>
                       </p>   <BR><BR>
                        <p class="agreement">
                      <label for="titlename"> Country Name</label>
                      <input type="text" name="cn" id="countryName1" readonly placeholder="Country name" style="width:185px; height:23px;"/>
                      <input type="text" name="cc" id="countryCode1" readonly placeholder="Country Code" style="width:185px; height:23px;margin-left:+1px;"/>
                       </p>     
           </form>
            <?php
                         $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                         if(isset($_POST['submit']))
                         {                         
                         $tname = $_POST['tname']; 
                         $pin = $_POST['pincode']; 
                         $distcode = $_POST['dc'];
                         $countrycode=$_POST['cc'];
                         $statecode=$_POST['sc'];
                         $queryget = mysql_query("INSERT INTO city_master (city_code,city_name,city_pin,district_code,state_code,country_code,city_createby) VALUES('$tcode','$tname','$pin','$distcode','$statecode','$countrycode','$username')");
                         if($queryget)
                         {
                          ?>
                                  <script>alert('success');window.location.href='city_masters.php';</script>                       
                          <?php
                        }
                         } ?>
 </div>
          </div>
  </body>
</html>
