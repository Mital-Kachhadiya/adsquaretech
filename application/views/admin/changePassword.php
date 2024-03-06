<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adsquaretech">
    <meta name="author" content="Adsquaretech">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">
    <title>Adsquaretech - Change Password </title>
    <?php $this->load->view('admin/layouts/headerFiles'); ?>
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
	<div id="loader"></div>

    <?php $this->load->view('admin/layouts/header'); ?>
  <?php $this->load->view('admin/layouts/sidebar'); ?>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->	  
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Change Password</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Change Password</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="box">
                    <form id="updatePasswordForm" methode="post">
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Change Password</h4>
								<hr class="my-15">
								<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label"> Old Password</label>
									  <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Current Password">
                                      <p id="oldPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">New Password</label>
									  <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                                      <p id="newPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>
								
								 
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">Confirm Password</label>
									  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                                      <p id="confirmPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>


							</div>
							<!-- /.box-body -->
							<div class="box-footer">

								<button type="submit" id="submitBtn" class="btn btn-primary">
								  <i class="ti-save-alt"></i> Submit
								</button>
							</div>  
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
 
  <?php $this->load->view('admin/layouts/footer'); ?>
  
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/layouts/footerFiles'); ?>
<script>
    $("#updatePasswordForm").on('submit',(function(e)
    {
        $("#oldPasswordError").text('');
        $("#newPasswordError").text('');
        $("#confirmPasswordError").text('');
        e.preventDefault();
        let form = new FormData(this);
        $.ajax({
            url: "<?php echo base_url('admin/Profile/updatePassword'); ?>",
            type: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData:false,
            dataType:'JSON',
            beforeSend : function()
            {
                $("#err").fadeOut();
                $("#submitBtnPass").attr('disabled','disabled').html('<i class="fas fa-spinner fa-pulse mr-2"></i> Processing...');
            },
            success: function(data)
            {
                if (data.status == 1) {
                    $("#updatePasswordForm")[0].reset()
                    toastr.success(data.message);
                }
                else if (data.status == 2) {
                    $("#oldPasswordError").text(data.oldPasswordError);
                    $("#newPasswordError").text(data.newPasswordError);
                    $("#confirmPasswordError").text(data.confirmPasswordError);
                }
                else
                {
                    toastr.error(data.message);
                }
            },
            error: function(e)
            {
                $("#err").html(e).fadeIn();
            },
            complete: function(e)
            {
                //$("#processingMsg").attr('style','display:none;');
                $("#submitBtnPass").removeAttr('disabled').html('Submit');
            }

        });

    }));
</script>
</body>
</html>
