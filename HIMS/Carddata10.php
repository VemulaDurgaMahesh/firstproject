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
            var serviceNameLocation = "numb"+selectedRow;
           var txtName = window.opener.document.getElementById(serviceNameLocation);
           var serviceNameSelector = "#row"+rowID+" .sourceServiceName";
            txtName.value = $(serviceNameSelector).val();

            var serviceCodeLocation = "fn"+selectedRow;
          var txtName1 = window.opener.document.getElementById(serviceCodeLocation);
          var serviceCodeSelector = "#row"+rowID+" .sourceServiceCode";
          txtName1.value = $(serviceCodeSelector).val();


          var serviceMemberLocation = "l"+selectedRow;
          var txtName2 = window.opener.document.getElementById(serviceMemberLocation);
          var serviceMemberSelector = "#row"+rowID+" .sourceServiceCod";
          txtName2.value = $(serviceMemberSelector).val();

          var serviceTypeLocation = "yea"+selectedRow;  
          var txtName3 = window.opener.document.getElementById(serviceTypeLocation);
          var serviceTypeSelector = "#row"+rowID+" .source1";  
            txtName3.value = $(serviceTypeSelector).val();

          var serviceGenderLocation = "ma"+selectedRow;  
          var txtName4 = window.opener.document.getElementById(serviceGenderLocation);
          var serviceGenderSelector = "#row"+rowID+" .source2";  
            txtName4.value = $(serviceGenderSelector).val();

        

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
                                        $query="SELECT * from new_registration Where p_status=1 ";
                                            $result=mysql_query($query);
                                            if(mysql_num_rows($result)==0)
                                            {
                                            ?>
                                             <br/><br/><br/><br/><br/><div class="text-center"><h4 style="color: #f56954">Data Notfound!</h4></div><br/><br/><br/><br/><br/>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                        <table class="table table-condensed table-hover">
                                            <tr>
                                                <th>S.No</th>
                                                <th>UMRNO</th>  
                                                <th>First Name</th>   
                                                <th>Last Name</th> 
                                                <th>Age</th>                       
                                                <th>Gender</th>
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    $num=0;
                                                  while ($row=mysql_fetch_array($result))
                                                    {
                                                    $i++;
                                                    $uid=$row["umr_no"];
                                                    $pid=$row["p_firstname"];
                                                    $pid1=$row["p_lastname"];
                                                    $age=$row['p_age'];
                                                    $pgender=$row['p_gender'];
                                                     $url="healthcardtype.php?";
                                                ?>
                                    <tr class="clickable" id="row<?php echo $i;?>" onclick="SetName('<?php echo $i;?>');location.href='<?php echo $url;?>';" >
                                                        <td> <?php echo $i ?></td>                                                
                                                        <td><input type="text" name="num" class="sourceServiceName" readonly value="<?php echo $uid;?>" ></td>
                                                        <td><input type="text" name="num1" class="sourceServiceCode" readonly value="<?php echo $pid;?>" ></td> 
                                                        <td><input type="text" name="num2" class="sourceServiceCod" readonly value="<?php echo $pid1;?>" ></td> 
                                                          <td><input type="text" name="num3" class="source1" readonly value="<?php echo $age;?>" ></td> 
                                                          <td><input type="text" name="num4" class="source2" readonly value="<?php echo $pgender;?>" ></td> 
                                                      
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


    