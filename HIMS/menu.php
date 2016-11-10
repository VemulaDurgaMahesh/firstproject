<?php
session_start();
if(isset($_SESSION['username']))
{

$username=$_SESSION['username'];    
$ad=$_SESSION['apc'];
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="menu.css" />
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
<div class="drop">
<ul class="drop_menu">
               <li>
              <a href="#">
                <span>General</span>
              </a>
              <ul>
                <li><a href="company.php">Hospital Details Master</a></li>
                <li>
                  <a href="#">Address Master</a>
                  <ul>
                    <li><a href="title_masters.php">Title Master</a></li>
                    <li><a href="area_masters.php">Area Master</a></li>
                    <li><a href="city_masters.php">City Master</a></li>
                    <li><a href="district_masters.php">District Master</a></li>
                    <li><a href="state_masters.php">State Master</a></li>
                    <li><a href="country_masters.php">Country Master</a></li>
                  </ul>
                </li>
                 <li><a href="authorizationmaster.php">Authorization Master</a></li>
                <li><a href="category_master.php">Category Master</a></li>
                <li><a href="tarrif_master.php">Tariff Master</a></li>
                <li><a href="nurse_master.php">Nurse Station Master</a></li>
                <li><a href="equipment_master.php">Equipment Master</a></li>
                <li><a href="bank_master.php">Bank Master</a></li>
                <li><a href="occupationmaster.php">Occupation Master</a></li>
                <li><a href="departmentmaster.php">Department Master</a></li>
                <li><a href="designationmaster.php">Designation Master</a></li>
                <li><a href="specilizationmaster.php">Specilization Master</a></li>
                <li><a href="servicegroup_master.php">Service Group Master</a></li>
                <li><a href="doctormaster.php">Doctors Master</a></li>
                <li><a href="referralmaster.php">Referral Master</a></li>
                <li><a href="empmaster.php">Employe Master</a></li>
                <li><a href="orginsurance.php">Organisation master</a></li>               
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <span>Diagnostics</span>
              </a>
              <ul>
                <li><a href="parametersetup.php">Parameter Setup</a></li>
                <li><a href="testformat.php">Test Format Setup</a></li>     
                 <li><a href="#">Sample Collection Master</a></li>           
                <li><a href="specimenmaster.php">Specimen Master</a></li>
                <li><a href="vouchermaster.php">Voucher Master</a></li>
              </ul>
            </li>
           <li class="treeview">
              <a href="#">
                
                <span>Services</span>
              </a>
              <ul>
                <li><a href="sourceofservice.php">Source of Service Charges</a></li>
                <li><a href="sourceoftransactionform1.php">Source of Transaction Charges</a></li>
                <li><a href="sourceofconsultation.php">SOC Consultation Charges</a></li> 
                <li><a href="BillingHeader.php">Billing Master</a></li>
                <li><a href="healthcardentry.php">Health card Entry</a></li>
                <li><a href="healthcardtype.php">Health card details</a></li>              
              </ul>
            </li>
            <li>
              <a href="#">
                
                <span>Users</span>
              </a>
              <ul>
                <li><a href="usergroupmaster.php">Users Group master</a></li>
                <li><a href="usersmaster.php">Users master</a></li>
                <li><a href="userprofile_master.php">Users Profile Master</a></li>
                <li><a href="change_password.php">Users Passwords Change</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
               <span>Wards</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="wardgroupmaster.php">Ward Group Master</a></li>
                <li><a href="wardmaster.php">Ward Masters</a></li>
                <li><a href="roommaster.php">Room Wards master</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <span>OT</span>
              </a>
              <ul>
                <li><a href="operationtheater_type.php">Operation Theater type Master</a>
                </li>
                <li><a href="operation_theater.php">Operation Theater Master</a></li>
                <li><a href="surgery_type.php">Surgery Type master</a></li>
                 <li><a href="surgery.php">Surgery Master</a></li>
                <li><a href="surgery_template.php">Surgery Template</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
               
                <span>Setup</span>
              </a>
              <ul>
                <li><a href="#">Auto Backup Master</a></li>
                <li><a href="#">Shift Login Masters</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                
                <span>HR</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">pay List</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                 <li><a href="#">Offer Letter</a></li>
                <li><a href="#">Join Letter</a></li>
                <li><a href="#">Declaration Letter</a></li>
              </ul>
            </li>
           <li class="treeview">
              <a href="#">
                <span>Reports</span>
              </a>
              <ul class="treeview-menu">
              <li><a href="master_reports.php">Masters Report</a>
              </li>
              <li><a href="usersshiftlogin.php">Users Shift Login</a>
              </li>
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#">
                <span>Package Master</span>
              </a>
              <ul class="treeview-menu">
              <li><a href="packagemaster.php">Package Master</a></li>
              </ul>
            </li>
            <li>
            <a href="logout.php" target="_top" onclick="window.close();">Logout</a></li>
          </ul>
</div>
</body>
</html>

