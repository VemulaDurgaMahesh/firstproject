<?php
session_start();
		$_SESSION['userid']="lakshmi";
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
			$pdcode=quote_smart($_POST['pdcode']);
			$tcode=quote_smart($_POST['tcode']);
			
			$tname=quote_smart($_POST['tname']);
			$pcode=quote_smart($_POST['pcode']);
			$pname=quote_smart($_POST['pname']);
			$ptype=quote_smart($_POST['ptype']);
			$predays=quote_smart($_POST['predays']);
			$pamt=quote_smart($_POST['pamt']);
			$p_act_amt=quote_smart($_POST['p_ac_amt']);
			$postdays=quote_smart($_POST['postdays']);
			$pdur=$_POST['predays'] + $_POST['postdays'];
			$dcode=quote_smart($_POST['dcode']);
			$dname=quote_smart($_POST['dname']);
			
			$effectFrom=quote_smart($_POST['fromDate']);
			$effectTo=quote_smart($_POST['toDate']);
			$stype=quote_smart($_POST['stype1']);
			$modifyby=quote_smart($_SESSION['userid']);
			$modifydate=quote_smart(date("Y-m-d"));
			$stmt= $conn->prepare("UPDATE package_master SET pm_tariffname=$tname,pm_tariffcode=$tcode,pm_pkgcode=$pcode,pm_pkgname=$pname,pm_pkgtype=$ptype,pm_pkgduration=$pdur,pm_pkgamount=$pamt,pm_pkgactualamt=$p_act_amt,pm_pkgdeptcode=$dcode,pm_predays=$predays,pm_postdays=$postdays,pm_effectfrom=$effectFrom,pm_effectto=$effectTo,pm_modifyby=$modifyby,pm_modifydate=$modifydate WHERE pm_pkgdesigncode=$pdcode");
			$stmt->execute();
			$stmt= $conn->prepare("DELETE FROM package_services WHERE pdcode=$pdcode");
			$stmt->execute();
			for($i=0;$i<count($_POST['sc']);$i++)
			{
				
				$sc=quote_smart($_POST['sc'][$i]);
				$quant=quote_smart($_POST['quant'][$i]);
				$rate=quote_smart($_POST['rate'][$i]);
				$amount=quote_smart($_POST['amount'][$i]);
				$includes=quote_smart($_POST['includes'][$i]);
				$excludes=quote_smart($_POST['excludes'][$i]);
				$notes=quote_smart($_POST['notes'][$i]);
				$status=quote_smart($_POST['status'][$i]);
				$sgrp=quote_smart($_POST['sgrp'][$i]);
				
				$stmt = $conn->prepare("INSERT INTO package_services values($pdcode,$stype,$sgrp, $sc, $quant, $rate, $amount, $includes, $excludes,$notes,$status)");
				$stmt->execute();
			}
			echo "<p> Package saved Successfully</p>";
	}
		
	
?>