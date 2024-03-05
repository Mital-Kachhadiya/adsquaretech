<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">

    <title>Adsquaretech - Log in </title>
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
							<img  class="height-100" src="<?php echo ADMIN_ASSETS; ?>img/logo.jpg" alt="logo">
								<h2 class="text-primary">Let's Get Started</h2>
								<p class="mb-0">Sign in to continue to Adsquaretech.</p>							
							</div>
							<div class="p-40">

  <div class="alert alert-primary" role="alert" style="display:none;" id="authencateLogin">
        Authenting...
  </div>
  <div class="alert alert-danger" id="loginError"  style="display:none;">
  </div>
  <div class="alert alert-success" role="alert" style="display:none;" id="successLogin">
    Login successfull. Redirecting...
  </div>

							<form method="post" id="loginForm">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" class="form-control ps-15 bg-transparent"  name="username"  placeholder="Username" required  value="<?php if (get_cookie('adsquare_username')) { echo get_cookie('adsquare_username'); } ?>" autofocus>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" class="form-control ps-15 bg-transparent"  name="password"  required placeholder="Password" value="<?php if (get_cookie('adsquare_password')) { echo get_cookie('adsquare_password'); } ?>"">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" value="1" name="remember" <?php if (get_cookie('adsquare_username')) { ?> checked="checked" <?php } ?>>
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit"  id="loginBtn" class="btn btn-danger mt-10">SIGN IN</button>
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
	<script src="<?php echo ADMIN_ASSETS; ?>js/jquery.min.js"></script>
	<script src="<?php echo ADMIN_ASSETS; ?>js/pages/chat-popup.js"></script>
    <script src="<?php echo ADMIN_ASSETS; ?>icons/feather-icons/feather.min.js"></script>	
	<script type="text/javascript">

$("#loginForm").on('submit',(function(e)
      {
        e.preventDefault();
        $('#loginError').attr('style','display: none');
        $('#loginError').html('');
        let form = new FormData(this);
        $.ajax({
            url: "<?php echo base_url('admin/Login/checkLogin'); ?>",
            type: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData:false,
            dataType:'JSON',
            beforeSend : function()
            {
              $("#err").fadeOut();
              $("#authencateLogin").removeAttr('style');
              $("#loginBtn").attr('disabled','disabled');
              $("#loginFormCard").attr('style','display:none;');
            },
            success: function(data)
            {
              if (data.status == 1) {
                window.location = data.redirectPath;
                $('#successLogin').removeAttr('style');
                $("#loginFormCard").attr('style','display:none;');
              }
              else
              {
                $('#loginError').removeAttr('style').html(data.message);
                $("#loginFormCard").removeAttr('style');
              }
            },
            error: function(e)
            {
              $("#err").html(e).fadeIn();
            },
            complete: function(e)
            {
              $("#authencateLogin").attr('style','display:none;');
              $("#loginBtn").removeAttr('disabled');
            }

        });

      }));

</script>

</body>
</html>
