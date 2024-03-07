<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adsquaretech">
    <meta name="author" content="Adsquaretech">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">
    <title>Adsquaretech - Affiliates </title>
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
					<h4 class="page-title">Affiliates</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin/affiliates'); ?>">Affiliates</a></li>
								<li class="breadcrumb-item" aria-current="page">Add Affiliates</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="box">
                    <form id="updatePasswordForm" methode="post">
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> PERSONAL INFORMATION</h4>
								<hr class="my-15">
							
                                <div class="row">
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> First Name</label>
									  <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">
                                      <p id="oldPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Last Name</label>
									  <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">
                                      <p id="newPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>

                                  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Username</label>
									  <input type="text" class="form-control" name="username" id="username" placeholder="Enter UserName">
                                      <p id="newPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>

                                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label"> Email Id</label>
									  <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Email Id">
                                      <p id="oldPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label"> Confirm Email</label>
									  <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Confirm Email Id">
                                      <p id="newPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>
								
								 
                                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Password</label>
									  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                      <p id="PasswordError"  class="validation-error"></p>
                                    </div>
								  </div>


								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Confirm Password</label>
									  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                                      <p id="confirmPasswordError"  class="validation-error"></p>
                                    </div>
								  </div>


                                </div>

                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> COMPANY INFORMATION</h4>
                                <hr class="my-15">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Account Display Name</label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Account Display Name">
                                            <p id="oldPasswordError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="form-label me-2">Company Website</label>
                                    <div class="form-group d-flex align-items-center">
                                        <select class="form-select me-2 width-auto">
                                            <option>https://</option>
                                            <option>http://</option>
                                        </select>
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Company Website">
                                        <p id="newPasswordError" class="validation-error"></p>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Country</label>
                                            <select class="form-select me-2 " id="c_country_id" name="c_country_id">
                                            <?php foreach ($countries as $c) { ?>
                                                <option value="<?php echo $c['country_id']; ?>" <?php if (@$affiliates['c_country_id'] == $c['country_id']) { echo "selected"; } ?>><?php echo $c['country_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                            <p id="countryError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">
                                            <p id="oldPasswordError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> State</label>
                                            <select class="form-select me-2 " id="state_id">
                                            
                                        </select>
                                            <p id="oldPasswordError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Zip</label>
                                            <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter Zip">
                                            <p id="oldPasswordError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Street Address 1</label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Account Display Name">
                                            <p id="oldPasswordError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Street Address 2</label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Account Display Name">
                                            <p id="oldPasswordError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <label class="form-label me-2">Phone Number</label>
                                    <div class="form-group d-flex align-items-center">
                                    <select class="form-select me-2 width-auto" id="c_country_id" name="c_country_id">
                                            <?php foreach ($countries as $c) { ?>
                                                <option value="<?php echo $c['country_id']; ?>" <?php if (@$affiliates['c_country_id'] == $c['country_id']) { echo "selected"; } ?>><?php echo $c['dial_code']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Company Website">
                                        <p id="newPasswordError" class="validation-error"></p>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <label class="form-label me-2">Currency</label>
                                    <div class="form-group d-flex align-items-center">
                                        <select class="form-select me-2 width-auto">
                                            <option value="USD">USD US Dollar</option>
                                            <option value="AUD">AUD Australian Dollar</option>
                                            <option value="EUR">EUR Euro</option>
                                            <option value="GBP">GBP Sterling</option>
                                        </select>
                                        <p id="newPasswordError" class="validation-error"></p>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Timezone</label>
                                            <select class="form-select me-2 " id="c_country_id" name="c_country_id">
                                            <?php foreach ($timezones as $t) { ?>
                                                <option value="<?php echo $t['identifier']; ?>" <?php if (@$affiliates['identifier'] == $t['identifier']) { echo "selected"; } ?>><?php echo $t['description']; ?></option>
                                            <?php } ?>
                                        </select>
                                            <p id="countryError"  class="validation-error"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">   Indirect Tax Information</label>
                                            <input name="group5" type="radio" id="radio_01" class="with-gap radio-col-primary" checked />
						<label for="radio_01">I am registered for Indirect Tax in Hong Kong</label>
                        <input name="group5" type="radio" id="radio_02" class="with-gap radio-col-primary" checked />
						<label for="radio_02">I am registered for Indirect Tax in a different Country / Region</label>
                        <input name="group5" type="radio" id="radio_03" class="with-gap radio-col-primary" checked />
						<label for="radio_03"> I am not registered for Indirect Tax</label>
                                        </div>
                                    </div>

                                  

                                </div>


                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> PROMOTIONAL INFORMATION</h4>
                                <hr class="my-15">


                                <div class="row">
                                    <div class="col-md-3">
                                    <label class="form-label me-2">Business Model</label>
                                    <div class="form-group d-flex align-items-center">
                                        <select class="form-select me-2 width-auto">
                                        
                                        <?php foreach ($business_model as $b) { ?>
                                                <option value="<?php echo $b['title']; ?>" <?php if (@$affiliates['title'] == $b['title']) { echo "selected"; } ?>><?php echo $b['description']; ?></option>
                                            <?php } ?>
                                        </select>
                                       
                                        <p id="newPasswordError" class="validation-error"></p>
                                    </div>
                                    </div>

                                    <div class="col-md-9">
                                    <label class="form-label me-2">Property Type</label>
                                    <div class="col-md-12 text-cente mb-20">
                                        <label class="form-label me-2 w-100">Websites</label>
                                        <button type="button" class="btn  btn-toggle " data-bs-toggle="button"  id="website_toggle" >
                                            <span class="handle"></span>
                                        </button>
                                    </div>	
                                    <div id="websiteFields" style="display:none;">
                                        <!-- Add or remove input fields dynamically here -->
                                        <div class="website_field_wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group d-flex align-items-center">
                                                        <select class="form-select me-2 width-auto">
                                                            <option>https://</option>
                                                            <option>http://</option>
                                                        </select>
                                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="www.yourDomain.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:void(0);" class="website_add_input_button" title="Add field"><i class="fa fa-plus-circle plus-icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-20 mt-20">
                                    <label class="form-label me-2  w-100">Mobile</label>
                                        <button type="button" class="btn  btn-toggle " data-bs-toggle="button"  id="mobile_toggle">
                                            <span class="handle"></span>
                                    </button>
                                    </div>	
                                    <div id="mobileFields" style="display:none;">
                                    <!-- Add or remove input fields dynamically here -->
                                    <div class="mobile_field_wrapper">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group d-flex align-items-center">
                                                    <select class="form-select me-2 width-auto">
                                                        <option>ios</option>
                                                        <option>Android</option>
                                                    </select>
                                                    <input type="text" class="form-control" name="lname" id="lname" placeholder=" https://apps.apple.com/">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" class="mobile_add_input_button" title="Add field"><i class="fa fa-plus-circle plus-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>


                                    <div class="col-md-12 mb-20">
                                    <label class="form-label me-2 w-100">Social Networks</label>
                                        <button type="button" class="btn  btn-toggle " data-bs-toggle="button" id="social_toggle" >
                                            <span class="handle"></span>
                                        </button>
                                        </div>	

                                        <div id="socialFields" style="display:none;" >
                                    <!-- Add or remove input fields dynamically here -->
                                    <div class="social_field_wrapper">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group d-flex align-items-center">
                                                    <select class="form-select me-2 width-auto">
                                                        <option>Facebook</option>
                                                        <option>Twitter</option>
                                                        <option>Instagram</option>
                                                        <option>Pintrest</option>
                                                        <option>Linkedin</option>
                                                        <option>Youtube</option>
                                                        <option>Tiktok</option>
                                                        <option>Twich</option>
                                                        <option>Wechat</option>
                                                        <option>Weibo</option>
                                                        <option>Snapchat</option>
                                                    </select>
                                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Account URL">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" class="social_add_input_button" title="Add field"><i class="fa fa-plus-circle plus-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
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

    $('#c_country_id').change(function(){
        var c_id = $(this).val();

        $.ajax({
        type: 'POST',
        url: "<?php echo base_url('admin/affiliates/getCountrywiseState'); ?>",
        data: { country_id: c_id },
        dataType: 'json',
        success: function (states) {
            // Reference to the state dropdown
            var $stateSelect = $('#state_id');

            // Clear existing options in the state dropdown
            $stateSelect.empty();

            // Populate the state dropdown with the fetched states
            $.each(states, function (index, state) {
                $stateSelect.append('<option value="' + state.id_state + '">' + state.state + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching states:', error);
        }
    });


    })
</script>

<script>
    $(document).ready(function () {
        $('#website_toggle').on('click', function () {
            $('#websiteFields').toggle();
        });
        
        var website_add_input_button = $('.website_add_input_button');
        var website_field_wrapper = $('.website_field_wrapper');
        var website_new_field_html = '<div class="row"><div class="col-md-6"><div class="form-group d-flex align-items-center"><select class="form-select me-2 width-auto"><option>https://</option><option>http://</option></select><input type="text" class="form-control" name="lname" id="lname" placeholder="www.yourDomain.com"></div></div><div class="col-md-2"><a href="javascript:void(0);" class="website_remove_input_button" title="Remove field"><i class="fa fa-minus-circle minus-icon"></i></a></div>';
        var input_count = 1;
        // Add button dynamically
        $(website_add_input_button).click(function(){
        $(website_field_wrapper).append(website_new_field_html);
        });
        // Remove dynamically added button using event delegation
    $(website_field_wrapper).on('click', '.website_remove_input_button', function (e) {
        e.preventDefault();
        $(this).closest('.row').remove();
        input_count--;
    });


    $('#mobile_toggle').on('click', function () {
            $('#mobileFields').toggle();
        });
        
        var mobile_add_input_button = $('.mobile_add_input_button');
        var mobile_field_wrapper = $('.mobile_field_wrapper');
        var mobile_new_field_html = ' <div class="row"><div class="col-md-6"><div class="form-group d-flex align-items-center"><select class="form-select me-2 width-auto"><option>ios</option><option>Android</option></select><input type="text" class="form-control" name="lname" id="lname" placeholder=" https://apps.apple.com/"></div></div><div class="col-md-2"><a href="javascript:void(0);" class="mobile_remove_input_button" title="Remove field"><i class="fa fa-minus-circle minus-icon"></i></a></div>';
        var input_count = 1;
        // Add button dynamically
        $(mobile_add_input_button).click(function(){
        $(mobile_field_wrapper).append(mobile_new_field_html);
        });
        // Remove dynamically added button using event delegation
    $(mobile_field_wrapper).on('click', '.mobile_remove_input_button', function (e) {
        e.preventDefault();
        $(this).closest('.row').remove();
        input_count--;
    });



    $('#social_toggle').on('click', function () {
            $('#socialFields').toggle();
        });
        
        var social_add_input_button = $('.social_add_input_button');
        var social_field_wrapper = $('.social_field_wrapper');
        var social_new_field_html = ' <div class="row"><div class="col-md-6"><div class="form-group d-flex align-items-center"><select class="form-select me-2 width-auto"><option>Facebook</option><option>Twitter</option><option>Instagram</option><option>Pintrest</option><option>Linkedin</option><option>Youtube</option><option>Tiktok</option><option>Twich</option><option>Wechat</option><option>Weibo</option><option>Snapchat</option></select><input type="text" class="form-control" name="lname" id="lname" placeholder="Account URL"></div></div><div class="col-md-2"><a href="javascript:void(0);" class="social_remove_input_button" title="Remove field"><i class="fa fa-minus-circle minus-icon"></i></a></div>';
        var input_count = 1;
        // Add button dynamically
        $(social_add_input_button).click(function(){
        $(social_field_wrapper).append(social_new_field_html);
        });
        // Remove dynamically added button using event delegation
    $(social_field_wrapper).on('click', '.social_remove_input_button', function (e) {
        e.preventDefault();
        $(this).closest('.row').remove();
        input_count--;
    });
    });
</script>
</body>
</html>
