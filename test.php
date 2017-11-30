<html>
<head>
	<style>
		#popup{
			
		}
	</style>
</head>
<body>
	<a href='#' onclick='showDiv()'>Show Popup</a><br />
	<div id='popup' style='background-color: black; color: white; position: absolute; top: 40%; left: 40%;'>
		This is my popup
	</div>

	<script type='text/javascript'>
		var popup = document.getElementById('popup');
		popup.style.display = 'none';
		function showDiv(){
			popup.style.display = 'block';

		}
	</script>

</body>
</html>
