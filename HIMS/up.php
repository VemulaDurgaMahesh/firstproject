
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HIMS Masters</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
  <body>
        </br>
            <form  class="form-horizontal" role="form" method="post" action="#">
              <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                  <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title"> Profile Master Details <small></small></h3>
                    </div>
                    <div>
                    <label>Profile Name</label>
                      <input type="text" name="pname" Placeholder="profile Name">
                    </div>
                    <div>
                    <label>Profile Code</label>
                      <input type="text" name="pcode" Placeholder="profile Code">
                    </div>
                    <div class="box-body pad">
                      <div class="row">
                        <div class="col-md-6 well">
                          <div class="nav-tabs-custom">
						  </br>
                            <ul class="nav nav-tabs">
                              <li>&nbsp;&nbsp;&nbsp;<input type="radio" id="c1"  name="pms" onclick="ShowHideDiv1()" value="Masters"> Masters</li>
                              </br></br>
                              <li>&nbsp;&nbsp;&nbsp;<input type="radio" id="c2"  name="pms" onclick="ShowHideDiv1()" value="Hospital"> Hospital</li>
                              </br></br>
                              <li>&nbsp;&nbsp;&nbsp;<input type="radio" id="c3"  name="pms" onclick="ShowHideDiv1()" value="Nursing">Nursing</li>
                              </br></br>
                             <li>&nbsp;&nbsp;&nbsp;<input type="radio" id="c4"  name="pms" onclick="ShowHideDiv1()" value="Stores"> Stores</li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-1">
                        </div>
                        
                        <div class="col-md-5 well">
							<div  class="nav-tabs-custom">
							<div id="d1" style="display:none">
							<label for="c5">
                              <input type="radio" id="c5" name="hospital" onclick="ShowHideDiv()" value="General"> &nbsp;<label> General</label>
							  </label>
                              </br>
							  <label for="c6">
                              <input type="radio" id="c6" name="hospital" onclick="ShowHideDiv()" value="Wards"> &nbsp;<label> Wards</label>
							  </label>
                              </br>
							  <label for="c7">
                              <input type="radio" id="c7" name="hospital" onclick="ShowHideDiv()" value="Users"> &nbsp;<label> Users</label> 
							  </label>
                              </br>
							  <label for="c8">
                              <input type="radio" id="c8" name="hospital" onclick="ShowHideDiv()" value="OT"> &nbsp;<label> OT</label>
							  </label>
                              </br>
							  <label for="c9">
                              <input type="radio" id="c9" name="hospital" onclick="ShowHideDiv()" value="HR"> &nbsp;<label> HR</label>
							  </label>
                            </div>
							<div id="d2" style="display:none">
							<label for="c10">
                              <input type="radio" id="c10" name="hospital" onclick="ShowHideDiv()" value="hospital1"> &nbsp;<label> hospital1</label>
							  </label>
                              </br>
							  <label for="c11">
                              <input type="radio" id="c11" name="hospital" onclick="ShowHideDiv()" value="hospital2"> &nbsp;<label> hospital2</label>
							  </label>
                              </br>
							  <label for="c12">
                              <input type="radio" id="c12" name="hospital" onclick="ShowHideDiv()" value="hospital3"> &nbsp;<label> hospital3</label> 
							  </label>
                              </br>
							  <label for="c13">
                              <input type="radio" id="c13" name="hospital" onclick="ShowHideDiv()" value="hospital4"> &nbsp;<label> hospital4</label>
							  </label>
                              </br>
							  <label for="c14">
                              <input type="radio" id="c14" name="hospital" onclick="ShowHideDiv()" value="hospital5"> &nbsp;<label> hospital5</label>
							  </label>
                            </div>
							<div id="d3" style="display:none">
							<label for="c15">
                              <input type="radio" id="c15" name="hospital" onclick="ShowHideDiv()" value="nursing1"> &nbsp;<label> nursing1</label>
							  </label>
                              </br>
							  <label for="c16">
                              <input type="radio" id="c16" name="hospital" onclick="ShowHideDiv()" value="nursing2"> &nbsp;<label> nursing2</label>
							  </label>
                              </br>
							  <label for="c17">
                              <input type="radio" id="c17" name="hospital" onclick="ShowHideDiv()" value="nursing3"> &nbsp;<label> nursing3</label> 
							  </label>
                              </br>
							  <label for="c18">
                              <input type="radio" id="c18" name="hospital" onclick="ShowHideDiv()" value="nursing4"> &nbsp;<label> nursing4</label>
							  </label>
                              </br>
							  <label for="c19">
                              <input type="radio" id="c19" name="hospital" onclick="ShowHideDiv()" value="nursing5"> &nbsp;<label> nursing5</label>
							  </label>
                            </div>
							<div id="d4" style="display:none">
							<label for="c21">
                              <input type="radio" id="c21" name="hospital" onclick="ShowHideDiv()" value="store1"> &nbsp;<label> store1</label>
							  </label>
                              </br>
							  <label for="c22">
                              <input type="radio" id="c22" name="hospital" onclick="ShowHideDiv()" value="store2"> &nbsp;<label> store2</label>
							  </label>
                              </br>
							  <label for="c23">
                              <input type="radio" id="c23" name="hospital" onclick="ShowHideDiv()" value="store3"> &nbsp;<label> store3</label> 
							  </label>
                              </br>
							  <label for="c24">
                              <input type="radio" id="c24" name="hospital" onclick="ShowHideDiv()" value="store4"> &nbsp;<label> store4</label>
							  </label>
                              </br>
							  <label for="c25">
                              <input type="radio" id="c25" name="hospital" onclick="ShowHideDiv()" value="store5"> &nbsp;<label> store5</label>
							  </label>
                            </div>
                        </div>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 well">
                          <div class="nav-tabs-custom">
                            <div class="col-md-6">
                            <label> Permissions </label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-model="all"> Check all<br><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-model="all1"> Deny<br><br>
                            </div>
                            </br></br>
                            <div class="col-md-6">
                              <label>Full Control</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Add</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" name="add" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" name="adddeny" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Modify</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" name="modify" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" name="modifydeny" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Delete</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Query</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Approval</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Export</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Print Type Allow</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Print Format</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            </br></br>
                            &nbsp;
                            <div class="col-md-6">
                              <label>Print</label>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all"><br>
                            </div>
                            <div class="col-md-3">
                              <input type="checkbox" ng-checked="all1"><br>
                            </div>
                            </br></br></br>
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5 well"> 
                          <div class="nav-tabs-custom">
                            <div id="d5" style="display:none"> 
                              <input type="radio" id="26" name="general" onclick="showMe('div10', this)" value="Doctor Master"> &nbsp;<label> Doctor Master</label>
                              </br>
                              <input type="radio" id="c27" name="general" onclick="showMe('div11', this)" value="Employee Master"> &nbsp;<label> Employee Master</label>
                              </br>
                              <input type="radio" id="c28" name="general" onclick="showMe('div12', this)" value="Referral Master"> &nbsp;<label> Referral Master</label>  
                              </br>
                            </div>
                            <div id="d6" style="display:none">
                              <input type="radio" id="c29" name="wards" onclick="showMe('div13', this)" value="Ward Group Master"> &nbsp;<label> Ward Group Master</label>
                              </br>
                              <input type="radio" id="c30" name="wards" onclick="showMe('div14', this)" value="Ward Master"> &nbsp;<label> Ward Master</label>
                              </br>
                              <input type="radio" id="c31" name="wards" onclick="showMe('div15', this)" value="Room Ward Master"> &nbsp;<label> Room Ward Master</label>  
                              </br>
                            </div>
                            <div id="d7" style="display:none">
                              <input type="radio" id="c32" name="users" onclick="showMe('div16', this)" value="Users Master"> &nbsp;<label> Users Master</label>
                              </br>
                              <input type="radio" id="c33" name="users" onclick="showMe('div17', this)" value="User Profile Master"> &nbsp;<label> User Profile Master</label>
                              </br>
                              <input type="radio" id="c34" name="users" onclick="showMe('div18', this)" value="User Password Change Master"> &nbsp;<label> User Password Change Master</label>  
                              </br>
                            </div>
							<div id="d8" style="display:none">
                              <input type="radio" id="c35" name="OT" onclick="showMe('div16', this)" value="OT1"> &nbsp;<label> OT1</label>
                              </br>
                              <input type="radio" id="c36" name="OT" onclick="showMe('div17', this)" value="OT2"> &nbsp;<label> OT2</label>
                              </br>
                              <input type="radio" id="c37" name="OT" onclick="showMe('div18', this)" value="OT3"> &nbsp;<label> OT3</label>  
                              </br>
                            </div>
							<div id="d9" style="display:none">
                              <input type="radio" id="c38" name="HR" onclick="showMe('div16', this)" value="HR1"> &nbsp;<label> HR1</label>
                              </br>
                              <input type="radio" id="c39" name="HR" onclick="showMe('div17', this)" value="HR2"> &nbsp;<label> HR2</label>
                              </br>
                              <input type="radio" id="c40" name="HR" onclick="showMe('div18', this)" value="HR3"> &nbsp;<label> HR3</label>  
                              </br>
                            </div>
							<div id="d10" style="display:none">
                              <input type="radio" id="c41" name="HS" onclick="showMe('div16', this)" value="A"> &nbsp;<label> A</label>
                            </div>
							<div id="d11" style="display:none">
                              <input type="radio" id="c42" name="HS" onclick="showMe('div16', this)" value="B"> &nbsp;<label> B</label>
                            </div>
							<div id="d12" style="display:none">
                              <input type="radio" id="c43" name="HS" onclick="showMe('div16', this)" value="C"> &nbsp;<label> C</label>
                            </div>
							<div id="d13" style="display:none">
                              <input type="radio" id="c44" name="HS" onclick="showMe('div16', this)" value="D"> &nbsp;<label> D</label>
                            </div>
							<div id="d14" style="display:none">
                              <input type="radio" id="c45" name="HS" onclick="showMe('div16', this)" value="E"> &nbsp;<label> E</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input type="submit" name="submit" value="Save" class="btn btn-success pull-left"></input>
                      </div>    
                    </div>
                    <div class="col-md-1">
                    </div>
                  </div>
                </div>
              </div>
            </form>     
          </div>
    </div>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>
        function showMe (it, box) {
          var vis = (box.checked) ? "block" : "none";
          document.getElementById(it).style.display = vis;
        }
    </script>  
	<script type="text/javascript">
	
    function ShowHideDiv() {
        
		var c5 = document.getElementById("c5");
		var c6 = document.getElementById("c6");
		var c7 = document.getElementById("c7");
        var c8 = document.getElementById("c8");
		var c9 = document.getElementById("c9");
		var c10 = document.getElementById("c10");
		var c11 = document.getElementById("c11");
        var c12 = document.getElementById("c12");
		var c13 = document.getElementById("c13");
		var c14 = document.getElementById("c14");
		d5.style.display = c5.checked ? "block" : "none";
		d6.style.display = c6.checked ? "block" : "none";
		d7.style.display = c7.checked ? "block" : "none";
		d8.style.display = c8.checked ? "block" : "none";
		d9.style.display = c9.checked ? "block" : "none";
		d10.style.display = c10.checked ? "block" : "none";
		d11.style.display = c11.checked ? "block" : "none";
		d12.style.display = c12.checked ? "block" : "none";
		d13.style.display = c13.checked ? "block" : "none";
		d14.style.display = c14.checked ? "block" : "none";
    }
	function ShowHideDiv1() {
        
		var c1 = document.getElementById("c1");
		var c2 = document.getElementById("c2");
		var c3 = document.getElementById("c3");
        var c4 = document.getElementById("c4");
		d1.style.display = c1.checked ? "block" : "none";
		d2.style.display = c2.checked ? "block" : "none";
		d3.style.display = c3.checked ? "block" : "none";
		d4.style.display = c4.checked ? "block" : "none";
    }
</script>
  </body>
</html>
<?php
$connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die(); 
  if(isset($_POST['submit']))
        {
            if(isset($_POST['pms']))
            {
            $profile_module = $_POST['pms'];
            }
            if(isset($_POST['hospital']))
            {
              $module_menu = $_POST['hospital'];
            }
            if(isset($_POST['general']))
            {
              $page = $_POST['general'];
            }
            if(isset($_POST['wards']))
            {
              $page = $_POST['wards'];
            }
            if(isset($_POST['users']))
            {
              $page = $_POST['users'];
            }
            if(isset($_POST['OT']))
            {
              $page = $_POST['OT'];
            }
            if(isset($_POST['HR']))
            {
              $page = $_POST['HR'];
            }
            if(isset($_POST['HS']))
            {
              $page = $_POST['HS'];
            }

            if(isset($_POST['add']))
            {
            $add = 1;
            }
            if(isset($_POST['adddeny']))
            {
            $add = 0;
            }
            if(isset($_POST['modify']))
            {
            $modify = 1;
            }
            if(isset($_POST['modifydeny']))
            {
            $modify = 0;
            }
            $pname = $_POST['pname'];
            $pcode = $_POST['pcode'];
        $queryget = mysql_query("INSERT INTO profile (profile_code,profile_name,profile_module,module_menu,page,write_page,modify_page) VALUES ('$pcode','$pname','$profile_module','$module_menu','$page','$add','$modify')");
                         if($queryget)
                         {
                          ?>
                                  <script>alert('success');
                              window.location.href='up.php';
                              </script>                       
                          <?php
                        }
                        else
                        {
                          echo "not inserted";
                        }
            }            

?>
