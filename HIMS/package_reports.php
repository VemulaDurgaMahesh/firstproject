<?php
session_start();
?>
<html>
<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <script type="text/javascript">
    var popup;
    function SelectName(selectedRow) {
      console.log(selectedRow);
      var location = "packagereporttariff.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300,scrollbars=1");
        popup.focus();
        return false
    }
</script>
 <script type="text/javascript">
    var popup;
    function SelectNam() {
        popup = window.open("packagereportptype.php", "Popup", "width=300,height=100");
        popup.focus();
    }
</script>
</head>
<body>
<form action="page_package.php" target="p2" method="POST">
<p class="agreement">
           <label for="titlename"> Tariff Name</label>
          <input type="text" name="sn" id="stateName1" readonly />
          <input type="text" name="stateCode1" id="stateCode1" readonly /><button type="button" onclick="SelectName(1)" ><img src="search.png" /></button>
    </p> 
    <p class="agreement">
           <label for="titlename"> Package Type</label>          
          <input type="text" name="ptype" id="txtName" readonly /><button type="button" onclick="SelectNam()" ><img src="search.png" /></button>
    </p> 
  
      <p>
    <button type="submit" name="submit" >SHOW</button>
    <button type="submit" name="export" >EXPORT</button>
    <button type="submit" name="print" >PRINT</button>
</p>
	
</form>
</body>
</html>