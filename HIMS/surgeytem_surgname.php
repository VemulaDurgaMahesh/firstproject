<?php
    $targetRow = $_GET["rowID"];
?>
<html>
<head>
<style type="text/css">
        tr.clickable{
            cursor:pointer;
        }
        </style>
        <script type="text/javascript">
        var selectedRow = "<?php echo $targetRow;?>";
    function SetName(rowID) {
        if (window.opener != null && !window.opener.closed) {
            var serviceNameLocation = "serviceName"+selectedRow;
           var txtName = window.opener.document.getElementById(serviceNameLocation);
           var serviceNameSelector = "#row"+rowID+" .sourceServiceName";
            txtName.value = $(serviceNameSelector).val();

            var serviceCodeLocation = "serviceCode"+selectedRow;
          var txtName1 = window.opener.document.getElementById(serviceCodeLocation);
          var serviceCodeSelector = "#row"+rowID+" .sourceServiceCode";
          txtName1.value = $(serviceCodeSelector).val();

          var rateLocation = "rate"+selectedRow;
           var txtName2 = window.opener.document.getElementById(rateLocation);
           var rateSelector = "#row"+rowID+" .sourceCharge";
           txtName2.value = $(rateSelector).val();

            // var txtName4 = window.opener.document.getElementById("amount[]");
            // txtName4.value = document.getElementById("num2").value;
        }
        window.close();
    }
</script>
<script src="jquery-latest.min.js" type="text/javascript"></script>
</head>
 <body class="skin-blue">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Main content -->
                <section class="content">                        
<form name="form1" action="" method="post" autocomplete="off">
                                        <div class="input-group">
                                        <input class="form-control input-lg" required maxlength="10" name="srch" type="text" autofocus placeholder="Id (or) Registered Mobile Number ">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        </div>
                                        <br/>
                                        <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Search ">
                                        </div>

                                    </form>
                                    <?php
                                    $conn = mysql_connect("localhost","root","") or die();
                                    mysql_select_db("hospital") or die();
                                    if(isset($_POST['srch']))
                                    {                                         
                                    $sname=mysql_query("SELECT soc_servicecode from soc_masters Where soc_servicename like '%".$_POST['srch']."%'");
                                   $sname1=mysql_fetch_array($sname);                        
                                   $sc=$sname1['soc_servicecode'];
                                   $query="SELECT * from surgery_master Where sg_status=1 and sg_procedure='$sc'";
                                   }
                                    else
                                    {
                                        $query="SELECT * from surgery_master Where sg_status=1 ";
                                    }
                                            
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
                                                <th>Surgery Name</th>                                    
                                                <th>Service Code</th>                                                
                                                <th>Charge</th>
                                                                                                
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    $num=0;
                                                    while ($row=mysql_fetch_array($result))
                                                    {
                                                    $i++;
                                                    $pid1=$row["sg_procedure"];
                                                    $query1=mysql_query("SELECT * from soc_masters Where soc_servicecode='$pid1'");
                                                    $row1=mysql_fetch_array($query1);

                                                   $pid=$row1["soc_servicename"];
                                                    $pno=$row["sg_amount"];
                                                    
                                                    $url="surgeytem_surgname.php?id=".$pid1."&pno=".$pno;
                                                ?>
                                                    <tr class="clickable" id="row<?php echo $i;?>" onclick="SetName('<?php echo $i;?>');location.href='<?php echo $url;?>';" >
                                                        <td> <?php echo $i ?></td>                                                
                                                        <td><input type="text" name="num" class="sourceServiceName" disabled value="<?php echo $pid;?>" ></td>
                                                        <td><input type="text" name="num1" class="sourceServiceCode" disabled value="<?php echo $pid1;?>" ></td> 
                                                        <td><input type="text" name="num2" class="sourceCharge" disabled value="<?php echo $pno;?>" ></td>                                                                          
                                                    </tr> 
                                                <?php
                                                    }
                                                }
                                                ?>
                                        </table>
                               
                            <?php
                            ?>
                                          </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->    
</body>
</html>


    