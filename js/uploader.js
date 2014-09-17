(function() {
	var dropzone = $("#dropzone");
	var progress = $(".progressBar");

	var displayUploads = function(files){
		var uploads = $("#filePlace"), anchor;
		for (var i = files.length - 1; i >= 0; i--) {
			anchor = '<li><a href="'+files[i].path+'" target="_black">'+files[i].name+'</a></li>';
			uploads.append(anchor);
		}
	};

	var upload = function(files, blob){
		var formData = new FormData(), xhr = new XMLHttpRequest();

		if(!blob){
			for (var i = 0; i < files.length; i++) {
				formData.append('files[]', files[i]);
			}
		}else{
			formData.append('data', files);
		}

		$(xhr.upload).bind({
			load: function(){
				progress.css('display', 'none');
			},
			progress: function(e){
				if(e.originalEvent.lengthComputable){
					var percent = e.originalEvent.loaded / e.originalEvent.total;
					progress.empty();
					progress.append('<span>' + Math.round(percent * 100) + ' %</span>');
				}
			}
		});

		$(xhr).bind({
			readystatechange: function(){
				if(this.readyState == 4 && this.status == 200){
					var data = $.parseJSON(this.responseText);
					if(data.success){
						displayUploads(data.files);
					}
				}
			}
		});

		xhr.open('post', '_ajax/ajax.fileUpload.php');
		xhr.setRequestHeader('Cache-Control', 'no-cache');

		progress.css('display', 'block');

		xhr.send(formData);
	};

	$("#rte").focus();
	$(document).on('click', function(){
		$("#rte").focus();
	});
	if($.browser.mozilla){
		document.body.addEventListener("paste", function(e){
			setTimeout(function()
	    	{
		        var blob = $('#rte img').attr('src');
		        $('#rte img').remove();
		        upload(blob, true);
	    	}, 2);
		},false);
	}else if($.browser.chrome){

		window.addEventListener("paste", function(e){

			var formData = new FormData(), xhr = new XMLHttpRequest();
			for (var i = e.clipboardData.items.length - 1; i >= 0; i--) {
				var clipboardItem = e.clipboardData.items[i];
				var type = clipboardItem.type;

				if(type.indexOf("image") != -1){
					var blob = clipboardItem.getAsFile();
	                var blobUrl = window.webkitURL.createObjectURL(blob);
	                formData.append('blob', blob);
				}
			}



			$(xhr.upload).bind({
				load: function(){
					progress.css('display', 'none');
				},
				progress: function(e){
					if(e.originalEvent.lengthComputable){
						var percent = e.originalEvent.loaded / e.originalEvent.total;
						progress.empty();
						progress.append('<span>' + Math.round(percent * 100) + ' %</span>');
					}
				}
			});

			$(xhr).bind({
				readystatechange: function(){
					if(this.readyState == 4 && this.status == 200){
						var data = $.parseJSON(this.responseText);
						if(data.success && data.files){
							displayUploads(data.files);
						}
					}
				}
			});
			xhr.open('post', '_ajax/ajax.fileUpload.php');
			xhr.setRequestHeader('Cache-Control', 'no-cache');

			progress.css('display', 'block');

			xhr.send(formData);


			//form.submit();

		}, false);
}

	dropzone.bind({
		dragover: function(){
			$(this).attr('class', 'dropzone dragover');
			return false;
		},
		dragleave: function(){
			$(this).attr('class', 'dropzone');
			return false;
		},
		drop: function(e){
			e.preventDefault();
			$(this).attr('class', 'dropzone');
			upload(e.originalEvent.dataTransfer.files);
		}
	});
}());