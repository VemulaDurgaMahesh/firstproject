<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    	<div class="row">
                    		<div class="col-md-5 col-md-offset-3">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">Enter UMR No (or) Registered Mobile Number</h3>
                                    </div>
                                    <div class="box-body">
                                        <form name="form1" action="search_patients.php" method="post" autocomplete="off">
                                        <div class="input-group">
                                        <input class="form-control input-lg" required maxlength="10" name="mob" type="text" autofocus placeholder="Id (or) Registered Mobile Number ">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        </div>
                                        <br/>
                                        <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Search Patient">
                                        </div>

                                    </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.box -->
                                <?php
                                if(@$_GET["err"]=="404")
                                {
                                ?>
                                    <div class="callout callout-danger">
                                        <h4>No Records Found</h4>
                                        <p>No Patients found with the entered mobile number or UMR No. Please try again.</p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                    	</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>
