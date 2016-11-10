<?php

	if(($_SERVER['REQUEST_METHOD'] == 'POST'))
	{
		
		include('dbcon.php');
		
		function quote_smart($str)
		{
			if(is_string($str))
			{
				$str="'".$str."'";
				return $str;
			}
			else
			{
				return $str;
			}
		}
		$sgtcode=$_POST['sgtcode'];      
       $sgtname=$_POST['sgtn'];     
      $sgcode=$_POST['tn2'];     
      $ptype=$_POST['sprocedure'];
      $date = date("Y-m-d");
     $connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
			$stmt= mysql_query("UPDATE surgery_template SET st_name='$sgtname' ,st_sgcode='$sgcode', st_procedure='$ptype', 	st_modifyby='".$_SESSION['username']."', st_modifydate='$date' WHERE st_code='$sgtcode'");
			if($stmt)
			{
			$stmt1= mysql_query("DELETE FROM srgtmp_services WHERE st_code=$sgtcode");
			if($stmt1)
			{
			    for($i=0;$i<count($_POST['stype']);$i++)
    		  {
      		    
      		  $stype=quote_smart($_POST['stype'][$i]);
      		  $quant=quote_smart($_POST['quant'][$i]);
      		  $rate=quote_smart($_POST['rate'][$i]);
       		 $amount=quote_smart($_POST['amount'][$i]);
      		  $includes=quote_smart($_POST['includes'][$i]);
      		  $billing=quote_smart($_POST['bh'][$i]);
      		 if($i<count($_POST['sc']))
     		   {        
     				   $sc=quote_smart($_POST['sc'][$i]);
       			 }
		        else
		        {          
		          $sc=quote_smart("");
		        }				
				$stmt2 = mysql_query("INSERT INTO srgtmp_services values($sgtcode,$stype,$sc,$sc,$quant,$rate,$amount,$includes, $billing)");				
				 if($stmt2)
		        {
		          ?>
			         <script>alert('success');window.location.href='view_surgerytemplate.php';</script>                       
			         <?php
			            
			      }
				}
			}
			else
			{
				echo "null";
			}

		}
      
  }
	
?>