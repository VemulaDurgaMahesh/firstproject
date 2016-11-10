
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
      var location = "area_popup.php?rowID="+selectedRow;
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
              <a href="area_search.php">
                Search
              </a>
              </li>
                <li><a href="view_area.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
          </ul>
          </div>
</p>
             <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Area Master </h2>
             </div>
                  <h3> Area Details</h3>
                  <br><br><br>
                  <div style="width:850px;margin:0 auto;">
                    <p class="agreement">
                      <label for="titlecode">Area Code</label>
                    <?php 
                        $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM area_master") or die(mysql_error());
                      $r=mysql_num_rows($b);
                      if($r==0)
                      {
                        $row=0;
                        $acode = 'AREA'.($row+1);
                      }
                      else
                      {
                        $row=$r;
                        $acode = 'AREA'.($row+1);
                      }
                      ?>
                      <input type="text" class="form-control" name="acode" value="<?php echo $acode ?>" style="width:190px; height:23px;">
                      </p><BR><BR>
                      <p class="agreement">
                      <label for="titlename"> Area Name</label>
                      <input type="text" class="form-control" name="aname" placeholder="Area Name" style="width:190px; height:23px;">        
                      </p><BR><BR>
                      <p class="agreement">
                      <label for="titlename"> City Name</label>
                      <input type="text"  name="cname" id="city1" placeholder="City Name" readonly style="width:190px; height:23px;">
                       &nbsp;&nbsp;
                       <input type="text"  name="ccode" id="cit1" placeholder="City Code" readonly style="width:185px; height:23px;margin-left:+1px;">                  
                      <input type="number" name="pincode" id="pincode1" placeholder="pincode" readonly style="width:185px; height:23px;margin-left:+1px;">
                      <button type="button" onclick="SelectName(1)" ><img src="search.png" /></button>
                      </p>
                      <p class="agreement">
                      <label for="titlename"> District Name</label>
                        <input type="text" name="dn" id="distname1" readonly placeholder="District name" style="width:190px; height:23px;"/>
                        <input type="text" name="dc" id="distcode1" readonly placeholder="District Code" style="width:185px; height:23px;margin-left:+1px;" />
                       </p><BR><BR>
                      <p class="agreement">
                      <label for="titlename"> State Name</label>
                        <input type="text" name="sn" id="stateName1" readonly placeholder="State name" style="width:190px; height:23px;"/>
                        <input type="text" name="sc" id="stateCode1" readonly placeholder="State Code" style="width:185px; height:23px;margin-left:+1px;"/>
                       </p>   <BR><BR>
                        <p class="agreement">
                      <label for="titlename"> Country Name</label>
                      <input type="text" name="cn" id="countryName1" readonly placeholder="Country name" style="width:190px; height:23px;"/>
                      <input type="text" name="cc" id="countryCode1" readonly placeholder="Country Code" style="width:185px; height:23px; margin-left:+1px;"/>
                       </p>     
           </form>
            <?php
                         $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                         if(isset($_POST['submit']))
                         {                         
                         $aname = $_POST['aname']; 
                         $ccode =$_POST['ccode'];                         
                         $distcode = $_POST['dc'];
                         $countrycode=$_POST['cc'];
                         $statecode=$_POST['sc'];
                         $queryget = mysql_query("INSERT INTO area_master (   area_code,area_name,city_code,district_code,state_code,country_code,area_createdby) VALUES('$acode','$aname','$ccode','$distcode','$statecode','$countrycode','$username')");
                         if($queryget)
                         {
                          ?>
                          <script>alert('success');window.location.href='area_masters.php';</script>           
                          <?php
                        }
                         } ?>
 </div>
  </div>
  </body>
</html>
