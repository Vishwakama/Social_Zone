  <link rel="stylesheet" href="dropzone/css/dropzone.css">
	<div id="main">
        <div id="content">
        <form class="dropzone" id="file_upload"></form>
        <button id="upload_btn">Upload</button>
        </div>
	</div>
  <script type="text/javascript" src="dropzone/js/jquery.js"></script>
  <script type="text/javascript" src="dropzone/js/dropzone.js"></script>
  <script>
    Dropzone.autoDiscover = false;
    
    var myDropzone = new Dropzone("#file_upload", { 
      url: "upload.php",
      parallelUploads: 3,
      uploadMultiple: true,
      acceptedFiles: '.png,.jpg,.jpeg',
      autoProcessQueue: false,
      success: function(file,response){
        if(response == 'true'){
          $('#content .message').hide();
          $('#content').append('<div class="message success">Images Uploaded Successfully.</div>');
        }else{
          $('#content').append('<div class="message error">Images Can\'t Uploaded.</div>');
        }
      }
    });

    $('#upload_btn').click(function(){
      myDropzone.processQueue();
    });
  </script>