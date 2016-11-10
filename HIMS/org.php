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
            var serviceNameLocation = "txtOrganisation"+selectedRow;
           var txtName = window.opener.document.getElementById(serviceNameLocation);
           var serviceNameSelector = "#row"+rowID+" .sourceServiceName";
            txtName.value = $(serviceNameSelector).val();

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
                                    <?php
                                    $conn = mysql_connect("localhost","root","") or die();
                                    mysql_select_db("hospital") or die();
                                    $query="SELECT * from organisation";
                                            $result=mysql_query($query);
                                        ?>
                                        <table class="table table-condensed table-hover">
                                            <tr>
                                                <th>S.no:</th>
                                                <th>organisation Name</th>                              
                                            </tr>
                                            <?php
                                                    $i=0;
                                                    while ($row=mysql_fetch_array($result))
                                                    {
                                                    $i++;
                                                    $uid=$row["org_orname"];
                                                                                                     
                                                    $url="authorizationmaster.php?";
                                                ?>
                                                    <tr class="clickable" id="row<?php echo $i;?>" onclick="SetName('<?php echo $i;?>');location.href='<?php echo $url;?>';" >
                                                        <td> <?php echo $i ?></td>                                                
                                                        <td><input type="text" name="num" class="sourceServiceName" disabled value="<?php echo $uid;?>" ></td>
                                                                                                                                   
                                                    </tr> 
                                                <?php
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


    