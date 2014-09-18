<!DOCTYPE html>
<html>
	<head>
		<title>Drag Drop File Update</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="uploads">
			<div class="dropzone" id="dropzone">Drop files here to upload</div>
			<div id="rte" class="contenteditable" contenteditable="true"></div>
			<div class="progressWarper">
				<progress id="progressbar" max="100" value="0"></progress>
				<div class="progress-value"></div>
			</div>
			<ul id="filePlace">
			</ul>
		</div>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/libs/jquery-migrate-1.2.1.js"></script>
		<script type="text/javascript" src="js/uploader.js"></script>
	</body>
</html>
