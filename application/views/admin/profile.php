<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adsquaretech">
    <meta name="author" content="Adsquaretech">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">
    <title>Adsquaretech - Profile </title>
    <?php $this->load->view('admin/layouts/headerFiles'); ?>
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
<?php

$adminData = $this->adm->adminData();

if($adminData['image'] == "")
{
    $imagePath = NO_IMAGE_ADMIN;
}
else
{
    $image = 'images/profile/'.$adminData['image'];
    if(file_exists($image))
    {
    $imagePath = base_url().$image;
    }
    else
    {
    $imagePath = NO_IMAGE_ADMIN;
    }
}
?>
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
					<h4 class="page-title">Profile</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Update Profile</li>
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
                    <form id="updateProfileForm" methode="post">
                    <!-- <div class="alert alert-primary" role="alert" style="display:none;" id="processingMsg">
                        Processing....
                    </div> -->
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
								<hr class="my-15">
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label"> Name</label>
									  <input type="text" class="form-control" placeholder="Name"  name="name" id="name"  value="<?php echo $adminData['name'];?>">
                                      <p id="nameError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">User Name</label>
									  <input type="text" class="form-control" placeholder="User Name"  name="username" id="username" value="<?php echo $adminData['username'];?>">
                                      <p id="usernameError"  class="validation-error"></p>
                                    </div>
								  </div>
								</div>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">E-mail</label>
									  <input type="text" class="form-control" placeholder="E-mail"  id="email" name="email" readonly value="<?php echo $adminData['email'];?>">
                                      <p id="emailError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Conatct Number</label>
									  <input type="text" class="form-control" placeholder="Conatct Number"  id="mobile" name="mobile" value="<?php echo $adminData['mobile'];?>">
                                      <p id="mobileError"  class="validation-error"></p>
                                    </div>
								  </div>

                                  <div class="col-md-12 mt-10">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="uploadImage" name="image">
                                        <label for="uploadImage" class="custom-file-upload">
                                            <i class="fa fa-upload"></i> Profile Picture
                                        </label>
                                        <img id="imgPreview" src="<?php echo $imagePath; ?>">
                                        <p id="imageError"  class="validation-error"></p>
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
     function readURL(input,idAttr) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $(idAttr).attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    function changeProfileImage(path,idAttr) {
      $(idAttr).attr('src',path);
    }


    $("#uploadImage").change(function() {
      readURL(this,'#imgPreview');
    });

    $("#updateProfileForm").on('submit',(function(e)
    {
        $("#emailError").text('');
        $("#usernameError").text('');
        $("#imageError").text('');
        $("#mobileError").text('');
        
        
        e.preventDefault();

        console.log("Sdfsdf")
        let form = new FormData(this);
        $.ajax({
            url: "<?php echo base_url('admin/Profile/updateProfile'); ?>",
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
                $("#submitBtn").attr('disabled','disabled').html('<i class="fas fa-spinner fa-pulse mr-2"></i> Processing...');
            },
            success: function(data)
            {
                if (data.status == 1) {
                  toastr.success(data.message);
                }
                else if (data.status == 2) {
                    $("#emailError").text(data.emailError);
                    $("#usernameError").text(data.usernameError);
                    $("#mobileError").text(data.mobileError);
                    $("#imageError").text(data.imageError);
                    
                }
                else
                {
                    toastr.clear();
                    toastr.error(data.message);
                }
            },
            error: function(e)
            {
                $("#err").html(e).fadeIn();
            },
            complete: function(e)
            {
                
                $("#processingMsg").attr('style','display:none;');
                $("#submitBtn").removeAttr('disabled').html('Submit');
            }

        });

    }));
</script>
</body>
</html>
