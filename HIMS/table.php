<?php
session_start();
if(!isset($_POST['mob']))
{
    header("location=occ.php");
}
$mob=$_POST['mob'];
$conn = mysql_connect("localhost","root","") or die();
mysql_select_db("hospital") or die();
$query="SELECT * from new_registration where umr_no='$mob'";
$result=mysql_query($query);
if (mysql_num_rows($result)==0)
{
    $query="select * from new_registration where p_mobile='$mob'";
    $result=mysql_query($query);
    if (mysql_num_rows($result)==0)
    {
        header("location:occ.php?err=404");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Doctor | Suraksha Hospital</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
        tr.clickable{
            cursor:pointer;
        }
        </style>
        <script type="text/javascript">
    function SetName() {
        if (window.opener != null && !window.opener.closed) {
           var txtName = window.opener.document.getElementById("umr");
            txtName.value = document.getElementById("num").value;

          var txtName1 = window.opener.document.getElementById("pname");
       txtName1.value = document.getElementById("num1").value;

         //   var txtName2 = window.opener.document.getElementById("umr");
        //    txtName2.value = document.getElementById("num2").value;
          var txtName3 = window.opener.document.getElementById("rgno");
            txtName3.value = document.getElementById("num3").value;

            var txtName4 = window.opener.document.getElementById("pt");
            txtName4.value = document.getElementById("num4").value;

            var txtName5 = window.opener.document.getElementById("gndr");
            txtName5.value = document.getElementById("num5").value;

            var txtName6 = window.opener.document.getElementById("age");
            txtName6.value = document.getElementById("num6").value;
        }
        window.close();
    }
</script>
    </head>
    <body class="skin-blue">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Main content -->
                <section class="content">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div>
                                    <div class="box-body">
                                            <?php
                              $query="select * from new_registration where umr_no ='$mob' or p_mobile='$mob' ";
                                            
                                            $result=mysql_query($query);
                                            if(mysql_num_rows($result)==0)
                                            {
                                            ?>
                                             <br/><br/><br/><br/><br/><div class="text-center"><h4 style="color: #f56954">No Appointments found!</h4></div><br/><br/><br/><br/><br/>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                        <table class="table table-condensed table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>UMR No</th>
                                                <th>Patient Name</th>
                                                <th>Phone Number</th>
                                                <th>Reg no</th>
                                                <th>type</th>
                                                <th>gender</th>
                                                <th>Age</th>
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    $num=0;
                                                    while ($row=mysql_fetch_array($result))
                                                    {
                                                    $i++;
                                                    $uid=$row["umr_no"];
                                                    $pid=$row["p_firstname"];
                                                    $pno=$row["p_mobile"];
                                                    $regno=$row['reg_no'];
                                                    $ptype=$row['p_type'];
                                                    $gender=$row['p_gender'];
                                                    $age=$row['p_age'];
                                                    $url="op_consultation.php?id=".$uid."&pno=".$pno;
                                                ?>
                                                    <tr class="clickable"  onclick="SetName();location.href='<?php echo $url;?>';" >
                                                        <td> <?php echo $i ?></td>
                                                        <td><input type="text" name="num" id="num" disabled value="<?php echo $uid;?>" ></td>
                                                        <td><input type="text" name="num1" id="num1" disabled value="<?php echo $pid;?>" ></td> 
                                                        <td><input type="text" name="num2" id="num2" disabled value="<?php echo $pno;?>" ></td> 
                                                        <td><input type="text" name="num3" id="num3" disabled value="<?php echo $regno;?>" ></td> 
                                                        <td><input type="text" name="num4" id="num4" disabled value="<?php echo $ptype;?>" ></td> 
                                                        <td><input type="text" name="num5" id="num5" disabled value="<?php echo $gender;?>" ></td> 
                                                        <td><input type="text" name="num6" id="num6" disabled value="<?php echo $age;?>" ></td>                       
                                                    </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <?php
                            ?>
                            </div>
                        </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>