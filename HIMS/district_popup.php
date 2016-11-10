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
            var serviceNameLocation = "stateCode"+selectedRow;
           var txtName = window.opener.document.getElementById(serviceNameLocation);
           var serviceNameSelector = "#row"+rowID+" .sourceServiceName";
            txtName.value = $(serviceNameSelector).val();

            var serviceCodeLocation = "stateName"+selectedRow;
          var txtName1 = window.opener.document.getElementById(serviceCodeLocation);
          var serviceCodeSelector = "#row"+rowID+" .sourceServiceCode";
          txtName1.value = $(serviceCodeSelector).val();

          var rateLocation = "countryName"+selectedRow;
           var txtName2 = window.opener.document.getElementById(rateLocation);
           var rateSelector = "#row"+rowID+" .sourceCharge";
           txtName2.value = $(rateSelector).val();
         

           var serviceTypeLocation = "countryCode"+selectedRow;
          var txtName3 = window.opener.document.getElementById(serviceTypeLocation);
          var serviceTypeSelector = "#row"+rowID+" .sourceType";
            txtName3.value = $(serviceTypeSelector).val();

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
                                    $srch=$_POST['srch'];             
                        $query="SELECT * from state_master Where state_status=1 and state_name like '%".$_POST['srch']."%' ";
                                    }
                                    else
                                    {
                                        $query="SELECT * from state_master Where state_status=1 ";
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
                                                <th>State Code</th>                                                
                                                <th>State Name</th>
                                                <th>Country Name</th>
                                                <th>Country Code</th>
                                                                                                
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    $num=0;
                                                    while ($row=mysql_fetch_array($result))
                                                    {
                                                    $regno=$row['country_code'];
                                                    $cn=mysql_query("SELECT * FROM country_master WHERE country_code='$regno'");
                                                    $cn1=mysql_fetch_array($cn);
                                                    $i++;
                                                    $uid=$row["state_code"];
                                                    $pid=$row["state_name"];
                                                    $pno=$cn1["country_name"];
                                    
                                                ?>
                                                    <tr class="clickable" id="row<?php echo $i;?>" onclick="SetName('<?php echo $i;?>');" >
                                                        <td> <?php echo $i ?></td>                                                
                                                        <td><input type="text" name="num" class="sourceServiceName" readonly value="<?php echo $uid;?>" ></td>
                                                        <td><input type="text" name="num1" class="sourceServiceCode" readonly value="<?php echo $pid;?>" ></td> 
                                                        <td><input type="text" name="num2" class="sourceCharge" readonly value="<?php echo $pno;?>" ></td> 
                                                        <td><input type="text" name="num3" class="sourceType" readonly value="<?php echo $regno;?>" ></td>                                                                             
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


    