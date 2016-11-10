<?php
session_start();
$_SESSION['userid']="kishore";
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$val1=$_POST['umrcode'];
$val2=$_POST['rgcode'];
$val4=$_POST['browse'];
$val5=$_POST['title'];
$val6=$_POST['fname'];
$val7=$_POST['mname'];
$val8=$_POST['lname'];
$val9=$_POST['dob'];
$val10=$_POST['age'];
$val11=$_POST['gndr'];
$val12=$_POST['ms'];
$val13=$_POST['father'];
$val14=$_POST['mthr'];
$val15=$_POST['rlgn'];
$val16=$_POST['ntnlty'];
$val17=$_POST['psprtno'];
$val18=$_POST['bgp'];
$val19=$_POST['pt'];
$val20=$_POST['emp'];
$val21=$_POST['emp1'];
$val22=$_POST['ocpn'];
$val23=$_POST['cnsltnt'];
$val24=$_POST['cnsltnt1'];
$val25=$_POST['cnsltnt2'];
$val26=$_POST['refer'];
$val27=$_POST['rfrd'];
$val28=$_POST['rfrd1'];
$val29=$_POST['rfrd2'];
$val30=$_POST['addr'];
$val31=$_POST['city'];
$val32=$_POST['city1'];
$val33=$_POST['st'];
$val34=$_POST['st1'];
$val35=$_POST['ctry'];
$val36=$_POST['ctry1'];
$val37=$_POST['pz'];
$val38=$_POST['phone'];
$val39=$_POST['mbl'];
$val40=$_POST['fx'];
$val41=$_POST['eml'];
$val42=$_POST['rf'];
$val43=$_POST['rcptnum'];
$val44=$_POST['cncsn'];
$val45=$_POST['vldty'];
$val46=$_POST['cnath'];
$val47=$_POST['cnath1'];
$val48=$_POST['rm'];
$val49=$_POST['amt'];
$val50=$_POST['chno'];
$val51=$_POST['chdt'];
$val52=$_POST['bnk'];
$val53=$_POST['bnk1'];
$val54=$_POST['rmrk'];
$val55=$_POST['qstnry'];
$date=date("d/m/Y h:i a", time());
$t=time();

$conn = mysql_connect("localhost","root","") or die();
mysql_select_db("hospital") or die();
$str=mysql_query("INSERT INTO new_registration (umr_no,reg_no,image,title,p_firstname,p_middlename,p_lastname,p_dob,p_age,p_gender,p_maritalstatus,p_father,p_mother,p_religion,p_nationality,p_passportno,p_bloodgroup,p_type,p_code,p_name,p_occupation,p_consultcode,p_consultantname,p_consultantdept,p_referaltype,p_referalcode,p_referalname,p_referaldept,p_address,p_citycode,p_cityname,p_statecode,p_statename,p_countrycode,p_countryname,p_zip,p_phone,p_mobile,p_fax,p_email,p_regfee,p_receiptno,p_concession,p_vailidity,p_concauthcode,p_concauthname,p_receiptmode,p_amount,p_chequeno,p_chequedate,p_bankcode,p_bankname,p_remarks,
p_questionary,p_createby)
VALUES
	('$val1','$val2','$val4','$val5','$val6','$val7','$val8','$val9','$val10','$val11','$val12','$val13','$val14','$val15'
	,'$val16','$val17','$val18','$val19','$val20','$val21','$val22','$val23','$val24','$val25','$val26','$val27','$val28','$val29'
	,'$val30','$val31','$val32','$val33','$val34','$val35','$val36','$val37','$val38','$val39','$val40','$val41','$val42','$val43'
	,'$val44','$val45','$val46','$val47','$val48','$val49','$val50','$val51','$val52','$val53','$val54','$val55',
	'xxxxx')");
		

	/*	if ($str)
		 {
                echo "<center><h1>New record created successfully</h1></center>";
         }
        else
       {
	      echo "Not inserted";
	      echo "ERROR:".mysql_error();
       }*/
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Hospital </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
     <aside class="right-side">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content invoice" style="border: 1px solid black">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-6" >
                            <h2 class="page-header">
                            <img src="images/c.png" alt="..." class="img-circle" height="100" width="100">
                             Bysani Surakhsa Hospital
                            </h2>
                         </div><!-- /.col -->
                          <div class="col-xs-6">
                            <div class="col-md-6">   
                            <?php
                                $query="select * from new_registration where umr_no='$val1'";
                                $result=mysql_query($query);
                                while ($row=mysql_fetch_array($result))
                                {
                                ?>
                                <strong>P.Name:<?php echo $row["p_firstname"];?><br>
                                UMR Num: <?php echo $row["umr_no"];?></strong><br>
                                Registration Num : <?php echo $row["reg_no"];?><br>
                                Age: <?php echo $row["p_age"] ?><br>
                                Gender: <?php echo $row["p_gender"];?><br>
                                </div>

                                <?php
                                 }
                                ?>  
                                <div class="col-md-6">
                                    <?php
                                $query="select * from new_registration where umr_no='$val1'";
                                $result=mysql_query($query);
                                while ($row=mysql_fetch_array($result))
                                {
                                ?>
                                Reg.Dt: <?php echo $row['regdate'];?><br>
                                Phone Num: <?php echo $row['p_mobile'];?><br>
                                <?php
                                }
                                ?>
                                </div>        
                    </div>
                    ______________________________________________________________________________________________________________________
                    </div>
                    <!-- info row -->

                    <div class="row invoice-info">
                        <div class="col-md-6 invoice-col">
                        <?php
                                $query="select * from new_registration where umr_no='$val1'";
                                $result=mysql_query($query);
                                while ($row=mysql_fetch_array($result))
                                {
                                ?>
                           S/O D/O W/O: <?php echo $row['p_father'];?><br>
                           Date of birth:<?php echo $row['p_dob'];?><br>
                           Occupation:<?php echo $row['p_occupation'];?><br>
                           Consultant:<?php echo $row['p_consultantname'];?><br>
                           Ref.By:<?php echo $row['p_referalname'];?><br>
                           Reg.Fee:<?php echo $row['p_regfee'];?><br>
                           Receipt Num:<?php echo $row['p_receiptno'];?><br>
                           Addresss:<?php echo $row['p_address'];?><br>
                           City Name:<?php echo $row['p_cityname'];?><br> 
                            
                        </div><!-- /.col -->
                         <?php
                                 }
                                ?> 
                         <div class="col-md-6 invoice-col">
                          <?php
                                $query="select * from new_registration where umr_no='$val1'";
                                $result=mysql_query($query);
                                while ($row=mysql_fetch_array($result))
                                {
                                ?>
                            Title:<?php echo $row['title'];?><br>
                            Marital Status:<?php echo $row['p_maritalstatus'];?><br>
                            Nationality:<?php echo $row['p_nationality'];?><br>
                            Dept.Name:<?php echo $row['p_consultantdept'];?><b>
                            Religion:<?php echo $row['p_religion'];?><br>
                            Reg.Validity:<?php echo $row['p_vailidity'];?><br>
                            Concession:<?php echo $row['p_concession'];?><br>
                            PinCode:<?php echo $row['p_zip'];?><br>
                         </div>
                          <?php
                                 }
                                ?> 
                    </div><!-- /.row -->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                            Created By:<?php echo $row['p_createby'];?><br>
                            print By:<br>
                            </div>
                            <div class="col-md-4">
                            Created Date:<br>
                            print Date:<br>
                            </div>
                            <div class="col-md-4">
                            <br>
                            <strong>(Authorised signatory)</strong>
                            </div>
                        </div>
                    </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                            <?php
                                $query="select * from new_registration where umr_no='$val1'";
                                $result=mysql_query($query);
                                while ($row=mysql_fetch_array($result))
                                {
                                ?>
                                <h1>*<?php echo $row["umr_no"];?>*</h1>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-4">
                           
                            </div>
                            <div class="col-md-4">
                            <?php
                                $query="select * from new_registration where umr_no='$val1'";
                                $result=mysql_query($query);
                                while ($row=mysql_fetch_array($result))
                                {
                                ?>
                                <h1>*<?php echo $row["reg_no"];?>*</h1>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            </body>
           </html>