<!DOCTYPE html>
<html>
<head>
	<title>lectureBuddy</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script type="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script type="text/javascript" src="/hwbuddy/js/hwbuddy.js"></script>

</head>
<body>
	<form id="fileForm" action="/hwbuddy/saveFile.php" method="POST" enctype="multipart/form-data">
	<!--<form enctype="multipart/form-data">-->
		<!--123 megabytes-->
		<input type="hidden" name="MAX_FILE_SIZE" value="1230000000">

  		<input type="file" name="fileToUpload" id="fileToUpload"/>
  		<!--<input type="submit" value="Submit">-->
  		<input type="submit" name="Send File">
  		<!--<input type="button" value="Upload" />-->

	</form>


</body>
</html>
