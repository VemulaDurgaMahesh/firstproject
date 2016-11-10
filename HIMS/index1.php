<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>HIMS</title>
</head>
<body>
<div id='cssmenu'>
<center><h3>HIMS Master</h3></center>
   <ul height="100%">
               <li class="treeview">
              <a href="#">
                <img src="icons/general.png" width="25px" height="25px"></i><span>&nbsp General</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="compphp.php" target="f3"> <img src="icons/hospital.png" width="25px" height="25px"></i>HDM</a></li>
                <!--<li class="submenu">
                  <a href="#"><img src="icons/address.png" width="25px" height="25px"></i> Address Master <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview">
                    <li><a href="title_masters.php" target="f3"><img src="icons/title.png" width="25px" height="25px"></i>Title Master</a></li>
                    <li><a href="area_masters.php" target="f3"><img src="icons/address.png" width="25px" height="25px"></i>Area Master</a></li>
                    <li><a href="city_masters.php" target="f3"><img src="icons/address.png" width="25px" height="25px"></i>City Master</a></li>
                    <li><a href="district_masters.php" target="f3"><img src="icons/address.png" width="25px" height="25px"></i>District Master</a></li>
                    <li><a href="state_masters.php" target="f3"><img src="icons/address.png" width="25px" height="25px"></i>State Master</a></li>
                    <li><a href="country_masters.php" target="f3"><img src="icons/address.png" width="25px" height="25px"></i>Country Master</a></li>
                  </ul>
                </li>-->
                <li><a href="category_master.php" target="f3"><img src="icons/category.png" width="25px" height="25px"></i>CM</a></li>
                <li><a href="tarrif_master.php" target="f3"><img src="icons/tariff.png" width="25px" height="25px"></i>TM</a></li>
                <li><a href="nurse_master.php" target="f3"> <img src="icons/nurse.png" width="25px" height="25px"></i>NSM</a></li>
                <li><a href="equipment_master.php" target="f3"><img src="icons/equipment.png" width="25px" height="25px"></i>EM</a></li>
                <li><a href="bank_master.php" target="f3"><img src="icons/bank.png" width="25px" height="25px">BM</a></li>
                <li><a href="occupation_master.php" target="f3"><img src="icons/occupation.png" width="25px" height="25px">OM</a></li>
                <li><a href="departmentmaster.php" target="f3"><img src="icons/department.png" width="25px" height="25px">DM</a></li>
                <li><a href="designationmaster.php" target="f3"><img src="icons/designation.png" width="25px" height="25px">DsgM</a></li>
                <li><a href="specilizationmaster.php" target="f3"><img src="icons/special.png" width="25px" height="25px">SM</a></li>
                <li><a href="servicegroup_master.php" target="f3"><img src="icons/service.png" width="25px" height="25px"></i>SGM</a></li>
                <li><a href="doctormaster.php" target="f3"> <img src="icons/doctor.png" width="25px" height="25px"></i>DocM</a></li>
                <li><a href="referralmaster.php" target="f3"><img src="icons/referral.png" width="25px" height="25px"></i>RM</a></li>
                <li><a href="empmaster.php" target="f3"><img src="icons/employee.png" width="25px" height="25px"></i>EmpM</a></li>
                <li><a href="orginsurance.php"><img src="icons/employee.png" width="25px" height="25px"></i>OM</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <img src="icons/diagnosis.png"></i><span>Diagnostics</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="parametersetup.php"><img src="icons/parameter.png"></i>PS</a></li>
                <li><a href="testformat.php"><img src="icons/testformat.png"></i>TFS</a></li>
                <li><a href="#"><img src="icons/samplecol.png"></i>SCM</a>
                </li>
                <li><a href="specimenmaster.php"><img src="icons/specimen.png"></i>SpecnM</a></li>
                <li><a href="vouchermaster.php"><img src="icons/specimen.png"></i>VM</a></li>
              </ul>
            </li>
           <li class="treeview">
              <a href="#">
                <img src="icons/bag.png"></i>
                <span>Services</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="sourceofservice.php" target="f3"><img src="icons/scm.png"></i>SoSC</a></li>
                <li><a href="sourceoftransactionform1.php" target="f3"><img src="icons/stm.png"></i>SoTC</a></li>
                <li><a href="sourceofconsultation.php" target="f3"><img src="icons/stm.png"></i>SoCC</a>
                </li>
                <li><a href="BillingHeader.php" target="f3"><img src="icons/billing.png">BM</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <img src="icons/usermain.png"></i>
                <span>Users</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="usersgroup_masters.php" target="f3"><img src="icons/usergroup.png"></i>UGM</a></li>
                <li><a href="user_masters.php" target="f3"><img src="icons/user.png"></i>UM</a></li>
                <li><a href="usersprofile_masters.php" target="f3"><img src="icons/userprofile.png"></i>UPM</a></li>
                <li><a href="change_password.php" target="f3"><img src="icons/password.png"></i>UPC</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <img src="icons/mainward.png"></i><span>Wards</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="wardgroupmaster.php" target="f3"><img src="icons/wardgroup.png">WGM</a></li>
                <li><a href="wardmaster.php" target="f3"><img src="icons/ward.png">WM</a></li>
                <li><a href="roommaster.php" target="f3"><img src="icons/room.png">RWM</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <img src="icons/mainot.png"></i>
                <span>OT</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="operation_type.php"><img src="icons/ot.png"></i>OTtM/a>
                </li>
                <li><a href="operation_theater.php"><img src="icons/ot2.png"></i>OTM</a></li>
                <li><a href="surgery_type.php"><img src="icons/st.png"></i>STM</a></li>
                 <li><a href="surgery.php"><img src="icons/sm.png"></i>SM</a></li>
                <li><a href="surgery_template.php"><img src="icons/stm.png"></i>ST</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <img src="icons/mainsetup.png"></i>
                <span>Setup</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><img src="icons/backup.png"></i>Auto Backup Master</a></li>
                <li><a href="#"><img src="icons/shiftlogin.png"></i>Shift Login Masters</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <img src="icons/hr.png"></i>
                <span>HR</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><img src="icons/empprofile.png">EDMr</a></li>
                <li><a href="#"><img src="icons/empleave.png">LFM</a></li>
                <li><a href="#"><img src="icons/empfeedback.png">EFE</a></li>
                 <li><a href="#"><img src="icons/empwishes.png">EGI</a></li>
                <li><a href="#"><img src="icons/printformat.png">PFM</a></li>
                <li><a href="#"><img src="icons/printtype.png">PTM</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <img src="icons/report.png"></i>
                <span>Reports</span>
              </a>
              <ul class="treeview-menu">
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                 <img src="icons/ds.png"></i>
                <span>Discharge Summery</span>
              </a>
              <ul class="treeview-menu">
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                 <img src="icons/package.png"></i>
                <span>Package Master</span>
              </a>
              <ul class="treeview-menu">
              <li><a href="package_master.php"><img src="icons/empprofile.png">Package Master</a></li>
              </ul>
            </li>
          </ul>
</div>

</body>
<html>

