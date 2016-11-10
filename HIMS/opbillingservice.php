<html>
<head>
<style type="text/css">
        tr.clickable{
            cursor:pointer;
        }
        </style>
        <script type="text/javascript">
    function SetName() {
        if (window.opener != null && !window.opener.closed) {
           var txtName = window.opener.document.getElementById("umr[]");
            txtName.value = document.getElementById("num").value;

          var txtName1 = window.opener.document.getElementById("umr1[]");
          txtName1.value = document.getElementById("num1").value;

           var txtName2 = window.opener.document.getElementById("rate[]");
           txtName2.value = document.getElementById("num2").value;
          var txtName3 = window.opener.document.getElementById("servicetype[]");
            txtName3.value = document.getElementById("num3").value;
            var txtName4 = window.opener.document.getElementById("amount[]");
            txtName4.value = document.getElementById("num2").value;
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
                        $query="SELECT * from soc_masters Where soc_status=1 and soc_servicename like '%".$_POST['srch']."%' ";
                                    }
                                    else
                                    {
                                        $query="SELECT * from soc_masters Where soc_status=1 ";
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
                                                <th>ok</th>                                                
                                                <th>Service Code</th>
                                                <th>Charge</th>
                                                <th>Service Type</th>                                                
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    $num=0;
                                                    while ($row=mysql_fetch_array($result))
                                                    {
                                                    $i++;
                                                    $uid=$row["soc_servicename"];
                                                    $pid=$row["soc_servicecode"];
                                                    $pno=$row["soc_charge"];
                                                    $regno=$row['soc_type'];                                                    ;
                                                    $url="op_consultation.php?id=".$uid."&pno=".$pno;
                                                ?>
                                                    <tr class="clickable"  onclick="SetName();location.href='<?php echo $url;?>';" >
                                                        <td> <?php echo $i ?></td>                                                
                                                        <td><input type="text" name="num" id="num" disabled value="<?php echo $uid;?>" ></td>
                                                        <td><input type="text" name="num1" id="num1" disabled value="<?php echo $pid;?>" ></td> 
                                                        <td><input type="text" name="num2" id="num2" disabled value="<?php echo $pno;?>" ></td> 
                                                        <td><input type="text" name="num3" id="num3" disabled value="<?php echo $regno;?>" ></td>                                                                             
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


    