<html>
<head>
    <link href="../pmu/styles/glDatePicker.default.css" rel="stylesheet" type="text/css">
</head>
<body>
    <input type="text" id="mydate" />
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="../pmu/glDatePicker.min.js"></script>

    <script type="text/javascript">
	var d = new Date();
var year = d.getFullYear();
var day=d.getDate()
var month=d.getMonth();

        $(window).load(function()
        {
            $('#mydate').glDatePicker(
			
			{selectableDateRange: [
			{ from: new Date(year, month, day), to: new Date(year+1, month, day) },
			
		],}
			);
        });
    </script>
</body>
</html>