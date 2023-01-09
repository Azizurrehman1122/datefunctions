<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Upload dengan Codeigniter dan Ajax</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<div class="container mt-5" align="center">
		<div class="col-sm-4 col-md-offset-4">
		<h4>Upload files Witth Progress Bar Using Codeigniter and Ajax</h4>
			<form class="form-horizontal mt-4" id="submit">
				<div class="form-group">
					<input type="file" name="file" id ="files">
				</div>
				<div class="progress">
              <div id="file-progress-bar" class="progress-bar"></div>
           </div>
		   
				<div class="form-group mt-3">
					<button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
				</div>
				
			</form>	
			<div class="col">
            <div id="show_msg"></div>
            </div>
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.progress').hide();
		$('#files').change(
                function () {
                    var fileExtension = ['png', 'jpg', 'pdf', 'mp4'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        alert("Only '.png','.jpg','.pdf','.mp4' formats are allowed.");
						$('#submit').trigger("reset");
                        return false;
					 }
});
      
		$('#submit').submit(function(e){
		    e.preventDefault();
			$('.progress').show();
			var getfile = $('#files').val();
	       if(getfile){
		         $.ajax({
					xhr: function() {
						var xhr = new window.XMLHttpRequest();  
						      
						xhr.upload.addEventListener("progress", function(element) {
							if (element.lengthComputable) {
								var percentComplete = Math.round((element.loaded / element.total) * 100);
								$("#file-progress-bar").width(percentComplete + '%');
								$("#file-progress-bar").html(percentComplete + '%');
							}
						}, false);
						return xhr;
					},
		             url:'<?php echo base_url();?>index.php/upload/do_upload',
		             type:"post",
		             data:new FormData(this),
		             processData:false,
		             contentType:false,
		             cache:false,
		            //  async:false,
					//  dataType:'json',
						beforeSend: function(){
							$("#file-progress-bar").width('0%');
						},

						success: function(data){
							// alert("File Upload Successfully.");
						   $('#submit').trigger("reset");
						   $('#show_msg').html('<p style="color:#28A74B;"><b>File has uploaded successfully!</b></p>');


						},

						error: function (xhr, ajaxOptions, thrownError) {
							console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
							}
		        
		         });
				}else{
			alert("Please Select Your file!!");
			$('.progress').hide();
		}

		    });
		
		
	});
	
</script>
</body>
</html>