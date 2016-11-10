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
    function SetNam(rowID) {
        if (window.opener != null && !window.opener.closed) {

             var serviceNameLocation = "bh"+selectedRow;
           var txtName = window.opener.document.getElementById(serviceNameLocation);
           var serviceNameSelector = "#row"+rowID+" .sourceServiceNa";
            txtName.value = $(serviceNameSelector).val();

       
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
                        $query="SELECT * from billing Where billing_status=1 and billing_servicetype like '%".$_POST['srch']."%' ";
                                    }
                                    else
                                    {
                                        $query="SELECT * from billing Where billing_status=1 ";
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
                                                <th>City Code</th>
                                                <th>City Name</th>                                                   
                                                                                                
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    $num=0;
                                                    while ($row=mysql_fetch_array($result))
                                                    {
                                                    $regno=$row['billing_header'];
                                                    $state=$row['billing_servicetype'];
                                                    $i++;                                             
                                    
                                                ?>
                                                    <tr class="clickable" id="row<?php echo $i;?>" onclick="SetNam('<?php echo $i;?>');" >
                                                        <td> <?php echo $i ?></td>   
                                                        <td><input type="text" name="num" class="sourceServiceNa" readonly value="<?php echo $regno;?>" ></td>         
                                                         <td><input type="text" name="num1" class="sourceServiceNam" readonly value="<?php echo $state;?>" ></td>                                                                                                       
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


    