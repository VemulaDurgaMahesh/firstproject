<html>
<head>

<script src="jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function SetName() {
        if (window.opener != null && !window.opener.closed) {
            var txtName = window.opener.document.getElementById("txtName");
            txtName.value = document.getElementById("ddlNames").value;
        }
        window.close();
    }
</script>
</head>
<body>
<label>Package Type</label>
 <select name="ddlNames" id="ddlNames">
    <option value="Profiles">Profiles</option>
    <option value="HealthCheckups">HealthCheckups</option>
    <option value="OperationPackages">OperationPackages</option>
</select>
<br />
<br />
<input type="button" value="Select" onclick="SetName();" /> 
</body>
</html>


    