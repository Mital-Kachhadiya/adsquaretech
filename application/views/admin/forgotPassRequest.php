<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">
    <title>Adsquaretech - Forgot Password</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>css/skin_color.css">	

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url('<?php echo ADMIN_ASSETS; ?>img/login-bg.jpg')">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">						
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h3 class="text-primary">Forgot Password</h3>	
                                <p class="mb-0">You forgot your password? Here you can easily request for a reset password.</p>							
							</div>
							<div class="p-40">
                            <div class="alert alert-primary" role="alert" style="display:none;" id="processingMsg">
                                Processing...
                                </div>
                                <div class="alert alert-danger" id="errorMsg"  style="display:none;">
                                </div>
                                <div class="alert alert-success" role="alert" style="display:none;" id="successMsg">
                                Check your inbox.
                                </div>
								<form id="forgotPassReqForm" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="email" class="form-control ps-15 bg-transparent" placeholder="Your Email" name="email" required>
										</div>
									</div>
									  <div class="row">
										<div class="col-12 text-center">
										  <button type="submit" id="sendReqBtn" class="btn btn-info margin-top-10">Send Request</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	



	<!-- Vendor JS -->
	<script src="<?php echo ADMIN_ASSETS; ?>js/vendors.min.js"></script>
	<script src="<?php echo ADMIN_ASSETS; ?>js/pages/chat-popup.js"></script>
    <script src="<?php echo ADMIN_ASSETS; ?>icons/feather-icons/feather.min.js"></script>	

    <script type="text/javascript">

$("#forgotPassReqForm").on('submit',(function(e)
  {
    e.preventDefault();
    $('#errorMsg').attr('style','display: none');
    $('#errorMsg').html('');
    $('#successMsg').attr('style','display: none');
    let form = new FormData(this);
    $.ajax({
        url: "<?php echo base_url('admin/ForgotPassword/checkRequest'); ?>",
        type: "POST",
        data: form,
        contentType: false,
        cache: false,
        processData:false,
        dataType:'JSON',
        beforeSend : function()
        {
          $("#err").fadeOut();
          $("#processingMsg").removeAttr('style');
          $("#sendReqBtn").attr('disabled','disabled');
          $("#forgotReqCard").attr('style','display:none;');
        },
        success: function(data)
        {
          if (data.status == 1) {
            $('#successMsg').removeAttr('style');
            $("#forgotReqCard").removeAttr('style');
            $("#forgotPassReqForm")[0].reset()
          }
          else
          {
            $('#errorMsg').removeAttr('style').html(data.message);
            $("#forgotReqCard").removeAttr('style');
          }
        },
        error: function(e)
        {
          $("#err").html(e).fadeIn();
        },
        complete: function(e)
        {
          $("#processingMsg").attr('style','display:none;');
          $("#sendReqBtn").removeAttr('disabled');
        }

    });

  }));

</script>
</body>
</html>
