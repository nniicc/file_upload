<!DOCTYPE html>
<html>
	<head>
		<title>Drag Drop File Update</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="uploads">
			<form id="inputForm">
				<input type="file" multiple="multiple" name="files[]" id="inputFiles">
			</form>
			<div class="dropzone" id="dropzone">Drop files here to upload</div>
			<div id="rte" class="contenteditable" contenteditable="true"></div>
			<div class="progressWarper">
				<div class="meter animate">
					<span id="progressbar" style="width: 0%"></span>
				</div>

			</div>

			<ul id="filePlace">
			</ul>
		</div>

		<script type="text/javascript" src="js/libs/jquery.2.1.1.min.js"></script>
		<script type="text/javascript" src="js/libs/jquery-migrate-mini.js"></script>
		<script type="text/javascript" src="js/uploader.js"></script>
	</body>
</html>
