<?php
    $targetRow = $_GET["rowID"];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Hospital Masters | BINATE  Technologies Pvt.Ltd </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
    <script src="js/hide.js" ></script>
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
<style type="text/css">
        tr.clickable{
            cursor:pointer;
        }
        </style>
        <script type="text/javascript">
        var selectedRow = "<?php echo $targetRow;?>";
    function SetName(rowID) {
        if (window.opener != null && !window.opener.closed) {
            var serviceNameLocation = "cardcode"+selectedRow;
           var txtName = window.opener.document.getElementById(serviceNameLocation);
           var serviceNameSelector = "#row"+rowID+" .sourceServiceName";
            txtName.value = $(serviceNameSelector).val();

            var serviceCodeLocation = "cardname"+selectedRow;
          var txtName1 = window.opener.document.getElementById(serviceCodeLocation);
          var serviceCodeSelector = "#row"+rowID+" .sourceServiceCode";
          txtName1.value = $(serviceCodeSelector).val();

          var serviceCodeLocation = "cardamount"+selectedRow;
          var txtName2 = window.opener.document.getElementById(serviceCodeLocation);
          var serviceCodeSelector = "#row"+rowID+" .sourceServiceCod";
          txtName2.value = $(serviceCodeSelector).val();

          var rateLocation = "cardvy"+selectedRow;
           var txtName3 = window.opener.document.getElementById(rateLocation);
           var rateSelector = "#row"+rowID+" .sourceCharge";
           txtName3.value = $(rateSelector).val();

        
           var serviceTypeLocation = "cardvd"+selectedRow;
          var txtName4 = window.opener.document.getElementById(serviceTypeLocation);
          var serviceTypeSelector = "#row"+rowID+" .sourceType";
            txtName4.value = $(serviceTypeSelector).val();

             var serviceTypeLocation = "limitmem"+selectedRow;
          var txtName5 = window.opener.document.getElementById(serviceTypeLocation);
          var serviceTypeSelector = "#row"+rowID+" .sourceTyp";
            txtName5.value = $(serviceTypeSelector).val();

            var serviceCodeBalance = "balamount"+selectedRow;
          var txtName6 = window.opener.document.getElementById(serviceCodeBalance);
          var serviceBalanceSelector = "#row"+rowID+" .sourceBalanceCod";
          txtName6.value = $(serviceBalanceSelector).val();

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
                                    <?php
                                    $conn = mysql_connect("localhost","root","") or die();
                                    mysql_select_db("hospital") or die();
                                  
                                    $query="SELECT * from health_cards Where status=1";
                                            $result=mysql_query($query);
                                            if(mysql_num_rows($result)==0)
                                            {
                                            ?>
                                             <br/><br/><br/><br/><br/><div class="text-center"><h4 style="color: #f56954">Data  Not found!</h4></div><br/><br/><br/><br/><br/>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                        <table class="table table-condensed table-hover">
                                            <tr>
                                                <th>S.no:</th>
                                                <th>CardCode</th>  
                                                <th>CardName</th>   
                                                <th>CardAmount</th>                       
                                                <th>ValidYears</th>
                                                <th>ValidDays</th>
                                                <th>LimitedMembers</th> 
                                               
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    $num=0;
                                                    while ($row=mysql_fetch_array($result))
                                                    {
                                                    $i++;
                                                    $ccode=$row["card_code"];
                                                    $cname=$row["card_name"];
                                                    $camount=$row["cardamount"];
                                                    $vyears=$row["validyears"];
                                                    $vdays=$row['validdays'];  
                                                    $lmtdmem=$row['card_maxno'];  
                                                    $url="healthcardtype.php?";
                                                 ?>
                                        <tr class="clickable" id="row<?php echo $i;?>" onclick="SetName('<?php echo $i;?>');location.href='<?php echo $url;?>';">
                                                
                                                <td> <?php echo $i ?></td>                                                
                                                        <td><input type="text" name="num" class="sourceServiceName" readonly value="<?php echo $ccode;?>" ></td>
                                                        <td><input type="text" name="num1" class="sourceServiceCode" readonly value="<?php echo $cname;?>" ></td> 
                                                        <td><input type="text" name="num2" class="sourceServiceCod" readonly value="<?php echo $camount;?>" ></td> 
                                                        <td><input type="text" name="num3" class="sourceCharge" readonly value="<?php echo $vyears;?>" ></td> 
                                                        <td><input type="text" name="num4" class="sourceType" readonly value="<?php echo $vdays;?>" ></td> 
                                                        <td><input type="text" name="num5" class="sourceTyp" readonly value="<?php echo $lmtdmem;?>" ></td>    
                                                        <td><input type="text" name="num6" class="sourceBalanceCod" readonly value="<?php echo $camount;?>" ></td>    
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


    