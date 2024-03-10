<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adsquaretech">
    <meta name="author" content="Adsquaretech">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">
    <title>Adsquaretech - Registration Form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    
    <link rel="stylesheet" href="<?php echo WEB_ASSETS; ?>style.css">
</head>
<body>

<div class="container mt-5 container-style">
<h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> YOUR INFORMATION</h4> <hr class="my-15">
<form id="affiliatesForm" methode="post">
        <!-- Personal Information Section -->
        <div class="row">
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> First Name</label>
									  <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" value="<?php echo @$affiliates['fname']; ?>">
                                      <p id="fnameError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Last Name</label>
									  <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" value="<?php echo @$affiliates['lname']; ?>">
                                      <p id="lnameError"  class="validation-error"></p>
                                    </div>
								  </div>

                                  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Username</label>
									  <input type="text" class="form-control" name="username" id="username" placeholder="Enter UserName"  value="<?php echo @$affiliates['username']; ?>">
                                      <p id="usernameError"  class="validation-error"></p>
                                    </div>
								  </div>

                                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label"> Email Id</label>
									  <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Id"  value="<?php echo @$affiliates['email']; ?>">
                                      <p id="emailError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label"> Confirm Email</label>
									  <input type="text" class="form-control" name="cemail" id="cemail" placeholder="Enter Confirm Email Id"  value="<?php echo @$affiliates['email']; ?>">
                                      <p id="cemailError"  class="validation-error"></p>
                                    </div>
								  </div>
								
								 
                                  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Password</label>
									  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"  value="<?php echo @$affiliates['password']; ?>">
                                      <p id="passwordError"  class="validation-error"></p>
                                    </div>
								  </div>


								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Confirm Password</label>
									  <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter Confirm Password"  value="<?php echo @$affiliates['password']; ?>">
                                      <p id="cpasswordError"  class="validation-error"></p>
                                    </div>
								  </div>


                                </div>

        <!-- Company Information Section -->
        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> COMPANY INFORMATION</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Account Display Name</label>
                                            <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Enter Account Display Name"  value="<?php echo @$affiliates['display_name']; ?>">
                                            <p id="display_nameError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="form-label me-2">Company Website</label>
                                    <div class="d-flex align-items-center">
                                        <select class="select-form me-2 width-auto" name="url_protocol" id="url_protocol" >
                                            <option  <?php if (@$affiliates["url_protocol"] == 'HTTPS') {echo "selected";} ?> value="HTTPS">https://</option>
                                            <option  <?php if (@$affiliates["url_protocol"] == 'HTTP') {echo "selected";} ?> value="HTTP">http://</option>
                                        </select>
                                        <input type="text" class="form-control" name="c_website" id="c_website" placeholder="www.yourDomain.com"  value="<?php echo @$affiliates['c_website']; ?>">
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Country</label>
                                            <select class="select-form me-2 " id="c_country_id" name="c_country_id">
                                            <?php foreach ($countries as $c ) { ?>
                                                <option value="<?php echo $c["country_id"]; ?>" <?php if (@$affiliates["c_country_id"] == $c["country_id"]) {echo "selected";} ?>><?php echo $c["country_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> City</label>
                                            <input type="text" class="form-control" name="c_city" id="c_city" placeholder="Enter City"  value="<?php echo @$affiliates['c_city']; ?>">
                                            <p id="c_cityError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> State</label>
                                            <select class="select-form me-2 " id="c_state_id" name="c_state_id">
                                            <?php foreach ($states as $s) { ?>
                                                <option value="<?php echo $s["id_state"]; ?>" <?php if (@$affiliates["c_state_id"] == $s["id_state"]) {echo "selected";} ?>><?php echo $s["state"]; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Zip</label>
                                            <input type="text" class="form-control" name="c_zipcode" id="c_zipcode" placeholder="Enter Zip" value="<?php echo @$affiliates['c_zipcode']; ?>">
                                            <p id="c_zipcodeError"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Street Address 1</label>
                                            <input type="text" class="form-control" name="c_street_1" id="c_street_1" placeholder=" Street Address 1"  value="<?php echo @$affiliates['c_street_1']; ?>">
                                            <p id="c_street_1Error"  class="validation-error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Street Address 2</label>
                                            <input type="text" class="form-control" name="c_street_2" id="c_street_2" placeholder=" Street Address 2"  value="<?php echo @$affiliates['c_street_2']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <label class="form-label me-2">Phone Number</label>
                                    <div class="form-group d-flex align-items-center">
                                    <select class="select-form me-2 width-auto" id="c_phonecode" name="c_phonecode" >
                                            <?php foreach ($countries as $c) { ?>
                                                <option value="<?php echo $c["dial_code"]; ?>" <?php if (@$affiliates["c_phonecode"] == $c["dial_code"]) {echo "selected";} ?>><?php echo $c["dial_code"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="text" class="form-control" name="c_phone" id="c_phone" placeholder="Enter Phone Number"  value="<?php echo @$affiliates['c_phone']; ?>">
                                       
                                    </div>
                                    <p id="c_phoneError" class="validation-error"></p>
                                    </div>
                                    <div class="col-md-2">
                                    <label class="form-label me-2">Currency</label>
                                    <div class="form-group d-flex align-items-center">
                                        <select class="select-form me-2" name="c_currency" id="c_currency">
                                            <option value="USD" <?php if (@$affiliates["c_currency"] == 'USD') {echo "selected";} ?>>USD US Dollar</option>
                                            <option value="AUD" <?php if (@$affiliates["c_currency"] == 'AUD') {echo "selected";} ?>>AUD Australian Dollar</option>
                                            <option value="EUR" <?php if (@$affiliates["c_currency"] == 'EUR') {echo "selected";} ?>>EUR Euro</option>
                                            <option value="GBP" <?php if (@$affiliates["c_currency"] == 'GBP') {echo "selected";} ?>>GBP Sterling</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Timezone</label>
                                            <select class="select-form me-2 " id="c_timezone" name="c_timezone">
                                            <?php
                                             foreach ($timezones as $t) { ?>
                                                <option value="<?php echo $t["identifier"]; ?>" <?php if (@$affiliates["c_timezone"] == $t["identifier"]) {echo "selected";} ?>><?php echo $t["description"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="tax_info">
                                        <div class="form-group">
                                            <label class="form-label">Indirect Tax Information</label>
                                            <div class="col-md-12">
                                            <input name="group5" type="radio" id="radio_01" class="with-gap radio-col-primary" value="1" <?php if (@$affiliates["c_tax"] == '1') {echo "checked";} ?>/>
                                            <label for="radio_01" id="taxLabel1" >I am registered for Indirect Tax in Afghanistan</label>

                                            <div id="taxTargetDiv1" class="taxTargetDiv" style="<?php if (!@$affiliates){ echo 'display:none;'; } else if(@$affiliates["c_tax"] != '1') {echo "display:none;";} ?>">
                                                <div class="form-group col-md-4" >
                                                    <label class="form-label">VAT Number</label>
                                                    <input type="text" class="form-control" name="tax_number" id="tax_number" placeholder="Enter VAT Number" value="<?php echo @$affiliates['tax_number']; ?>">
                                                    <p id="tax_numberError" class="validation-error"></p>
                                                </div>
                                            </div>
                                            </div><div class="col-md-12 ">
                                            <input name="group5" type="radio" id="radio_02" class="with-gap radio-col-primary" value="2" <?php if (@$affiliates["c_tax"] == '2') {echo "checked";} ?>/>
                                            <label for="radio_02" class="">I am registered for Indirect Tax in a different Country / Region</label>

                                            <div id="taxTargetDiv2" class="taxTargetDiv row" style="<?php if (!@$affiliates){ echo 'display:none;'; } else if(@$affiliates["c_tax"] != '2') {echo "display:none;";} ?>">
                                                <div class="form-group  col-md-4">
                                                    <label class="form-label">Country</label>
                                                    <select class="select-form me-2" id="indirect_country" name="indirect_country">
                                                        <?php foreach ($countries as $c) { ?>
                                                            <option value="<?php echo $c["country_id"]; ?>" <?php if (@$affiliates["indirect_country"] == $c["country_id"]) {echo "selected"; } ?>><?php echo $c["country_name"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group  col-md-4 ">
                                                    <label class="form-label">VAT Number</label>
                                                    <input type="text" class="form-control" name="dc_tax_number" id="dc_tax_number" placeholder="Enter VAT Number"  value="<?php echo @$affiliates['dc_tax_number']; ?>">
                                                    <p id="dc_tax_numberError" class="validation-error"></p>
                                                </div>
                                            </div></div>
                                            <div class="col-md-12 ">

                                            <input name="group5" type="radio" id="radio_03" class="with-gap radio-col-primary" value="3" <?php if (!@$affiliates){ echo 'checked'; } else if(@$affiliates["c_tax"] == '3') {echo "checked";} ?>/>
                                            <label for="radio_03">I am not registered for Indirect Tax</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add the rest of the form fields for company information here -->

                                <!-- Promotional Information Section -->
                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> PROMOTIONAL INFORMATION</h4>
                                                        <hr class="my-15">
                                <!-- Add the rest of the form fields for promotional information here -->
                                <div class="row">
                                    <div class="col-md-3">
                                    <label class="form-label me-2">Business Model</label>
                                    <div class="form-group d-flex align-items-center">
                                        <select class="select-form me-2 width-auto" id="business_model" name="business_model">
                                        <?php foreach ($business_model as $b) { ?>
                                                <option value="<?php echo $b["title"]; ?>" <?php if (@$affiliates["business_model"] == $b["title"]) {echo "selected";} ?>><?php echo $b["description"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-md-9">
                                    <label class="form-label me-2">Property Type</label>
                                    <div class="col-md-12 text-cente mb-20">
                                        <label class="form-label me-2  col-md-3  w-120">Websites</label>
                                        <label class="switch">
                                        <input type="checkbox" id="website_toggle" >
                                        <span class="slider"></span>
                                    </label>
                                    </div>	

                                    <div id="websiteFields" style="display:none;">
                                            <div class="website_field_wrapper">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group d-flex align-items-center">
                                                            <select class="select-form me-2 width-auto"  id="web_title" name="web_title[]">
                                                                <option value="HTTPS">https://</option>
                                                                <option value="HTTP">http://</option>
                                                            </select>
                                                            <input type="text" class="form-control"  name="web_desc[]" id="web_desc"  placeholder="www.yourDomain.com" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:void(0);" class="website_add_input_button" title="Add field"><i class="fa fa-plus-circle plus-icon"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                    
                                    <div class="col-md-12 mb-20 mt-20">
                                    <label class="form-label me-2  col-md-3   w-120">Mobile</label>
                                    <label class="switch">
                                        <input type="checkbox" id="mobile_toggle" >
                                        <span class="slider"></span>
                                    </label>
                                    </div>
                                    <div id="mobileFields" style="display:none;">
                                    <!-- Add or remove input fields dynamically here -->
                                        <div class="mobile_field_wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group d-flex align-items-center">
                                                        <select class="select-form me-2 width-auto" id="mo_title" name="mo_title[]">
                                                        <option value="ios">ios</option>
                                                            <option value="Android">Android</option>
                                                        </select>
                                                        <input type="text" class="form-control"  name="mo_desc[]" id="mo_desc" placeholder=" https://apps.apple.com/">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:void(0);" class="mobile_add_input_button" title="Add field"><i class="fa fa-plus-circle plus-icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-12 mb-20">
                                    <label class="form-label col-md-3 me-2 w-120">Social Networks</label>
                                        <label class="switch">
                                        <input type="checkbox" id="social_toggle" >
                                        <span class="slider"></span>
                                    </label>
                                    </div>	

                                    <div id="socialFields" style="display:none;" >
                                    <!-- Add or remove input fields dynamically here -->
                                    <div class="social_field_wrapper">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group d-flex align-items-center">
                                                    <select class="select-form me-2 width-auto"  id="so_title" name="so_title[]">
                                                        <option value="facebook" >Facebook</option>
                                                        <option value="twitter">Twitter</option>
                                                        <option value="instagram">Instagram</option>
                                                        <option value="pintrest">Pintrest</option>
                                                        <option value="linkedin">Linkedin</option>
                                                        <option value="youtube">Youtube</option>
                                                        <option value="tiktok">Tiktok</option>
                                                        <option value="twich">Twich</option>
                                                        <option value="wechat">Wechat</option>
                                                        <option value="weibo">Weibo</option>
                                                        <option value="snapchat">Snapchat</option>
                                                    </select>
                                                    <input type="text" class="form-control" name="so_desc[]" id="so_desc" placeholder="Account URL">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" class="social_add_input_button" title="Add field"><i class="fa fa-plus-circle plus-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <p id="propertyTypeError" class="validation-error"></p>
                                    </div>

        <!-- Agreements Section -->
        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> AGREEMENTS</h4>
        <hr class="my-15">
        <div class="row col-md-12">
        <ul class="accordion-list">
  <li>
    <h3>How much does a website cost?</h3>
    <div class="answer">
      <p>While we would love to be able to give a definitive, fixed price for a website, it really depends on the specific needs for each individual business. If one business needs a website comprised of five pages, while another has a substantially larger site of over 100 pages - obviously those projects are going to command different price points.</p>
      
      <p>With that being said - here are some general guidelines on what to expect from a pricing standpoint.</p>
      
      <p>If you can get by with a small website (between 3 - 10 pages) using a pre-designed template, you can expect to pay approximately $2,500.00. A mid-sized website that has anywhere from 11 - 25 pages, but still uses a pre-made template, will be between $3,000.00 - $5,000.00. If you have a lot of pages, are looking for something completely custom, or are looking for something that has special functionality such as eCommerce, custom calculators, or integrations with other services, you may be looking at anywhere from $10,000 - $20,000.</p>
      
      <p>Ultimately, the takeaway here is that we can accommodate projects of just about any budget - so long as expectations are set accordingly.</p> 
        
    </div>
  </li>
  <li>
    <h3>Are there any monthly fees?</h3>
    <div class="answer"><p>This will vary depending on the type of project. For logo & branding projects, fees will be one-time costs. For website projects, we will typically charge a monthly fee, depending on the level of service you choose. To view a full list of our monthly packages, click here.</p></div>
  </li>
  
  
</ul>
       
</div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4 w-100">Sign Up</button>
    </form>
</div>

<!-- Bootstrap JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo WEB_ASSETS; ?>jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script>
$("#affiliatesForm").on('submit',(function(e)
{
    $(".validation-error").text('');
    
    e.preventDefault();

    // Check if at least one toggle is on
    if (!($("#website_toggle").prop("checked") || $("#mobile_toggle").prop("checked") || $("#social_toggle").prop("checked"))) {
        $("#propertyTypeError").text('Please select at least one property type.');
        return;
    }

    var selectedRadioValue = $("input[name='group5']:checked").val();

    // Check required fields based on the active property type
    var web_property = 0;
    if ($("#website_toggle").prop("checked")) {
        $("input[name='web_desc[]']").prop('required', true);
        web_property =1;
    } else {
        $("input[name='web_desc[]']").prop('required', false);
    }

    // Check required fields based on the active property type
    var mobile_property = 0;
    if ($("#mobile_toggle").prop("checked")) {
        $("input[name='mo_desc[]']").prop('required', true);
        mobile_property = 1;
    } else {    
        $("input[name='mo_desc[]']").prop('required', false);
    }

    // Check required fields based on the active property type
    var social_property = 0;
    if ($("#social_toggle").prop("checked")) {
        $("input[name='so_desc[]']").prop('required', true);
        social_property = 1;
    } else {
        $("input[name='so_desc[]']").prop('required', false);
    }


    let form = new FormData(this);
    form.append('selectedRadioValue', selectedRadioValue);
    form.append('web_property', web_property);
    form.append('mobile_property', mobile_property);
    form.append('social_property', social_property);
    
    
    $.ajax({
        url: "<?php echo base_url("Affiliates/actionAddAffiliates"); ?>",
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
                if($("#affiliates_id").length == 0) {
                    $("#affiliatesForm")[0].reset();
                }
                toastr.success(data.message);
                
            }
            else if (data.status == 2) {
                $("#fnameError").text(data.fnameError);
                $("#lnameError").text(data.lnameError);
                $("#usernameError").text(data.usernameError);
                $("#emailError").text(data.emailError);
                $("#cemailError").text(data.cemailError);
                $("#passwordError").text(data.passwordError);
                $("#cpasswordError").text(data.cpasswordError);
                $("#display_nameError").text(data.display_nameError);
                $("#c_cityError").text(data.c_cityError);
                $("#c_zipcodeError").text(data.c_zipcodeError);
                $("#c_street_1Error").text(data.c_street_1Error);
                $("#c_phoneError").text(data.c_phoneError);
                $("#tax_numberError").text(data.tax_numberError);
                $("#dc_tax_numberError").text(data.dc_tax_numberError);
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
        var optionHtml = $('#c_country_id option:selected').html();
        if(c_id == 230){
            $('#tax_info').addClass('d-none');
        }else{
            $('#tax_info').removeClass('d-none');
            $("#taxLabel1").html('I am registered for Indirect Tax in '+optionHtml)
        }
        
        $.ajax({
        type: 'POST',
        url: "<?php echo base_url("affiliates/getCountrywiseState"); ?>",
        data: { country_id: c_id },
        dataType: 'json',
        success: function (states) {
            // Reference to the state dropdown
            var stateSelect = $('#c_state_id');
            
            // Clear existing options in the state dropdown
            stateSelect.empty();

            // Populate the state dropdown with the fetched states
            $.each(states, function (index, state) {
                stateSelect.append('<option value="' + state.id_state + '">' + state.state + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching states:', error);
        }
    });


    })
    $(document).ready(function () {

         
 // Handle change event for radio button 1
 $('#radio_01').change(function() {
        if ($(this).is(':checked')) {
            $('#taxTargetDiv1').show();
            $('#taxTargetDiv2').hide();
        }
    });

    // Handle change event for radio button 2
    $('#radio_02').change(function() {
        if ($(this).is(':checked')) {
            $('#taxTargetDiv1').hide();
            $('#taxTargetDiv2').show();
        }
    });

    // Handle change event for radio button 3
    $('#radio_03').change(function() {
        if ($(this).is(':checked')) {
            $('#taxTargetDiv1').hide();
            $('#taxTargetDiv2').hide();
        }
    });


    $('#website_toggle').on('click', function () {
        $('#websiteFields').toggle();
        $("#propertyTypeError").text('');
    });
        
        var website_add_input_button = $('.website_add_input_button');
        var website_field_wrapper = $('.website_field_wrapper');
        var website_new_field_html = '<div class="row"><div class="col-md-6"><div class="form-group d-flex align-items-center"><select class="select-form me-2 width-auto"  id="web_title" name="web_title[]"><option>https://</option><option>http://</option></select><input type="text" class="form-control" name="web_desc[]" id="web_desc" placeholder="www.yourDomain.com"></div></div><div class="col-md-2"><a href="javascript:void(0);" class="website_remove_input_button" title="Remove field"><i class="fa fa-minus-circle minus-icon"></i></a></div>';
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
            $("#propertyTypeError").text('');
        });
        
        var mobile_add_input_button = $('.mobile_add_input_button');
        var mobile_field_wrapper = $('.mobile_field_wrapper');
        var mobile_new_field_html = ' <div class="row"><div class="col-md-6"><div class="form-group d-flex align-items-center"><select class="select-form me-2 width-auto"  id="mo_title" name="mo_title[]"><option>ios</option><option>Android</option></select><input type="text" class="form-control"  name="mo_desc[]" id="mo_desc" placeholder=" https://apps.apple.com/"></div></div><div class="col-md-2"><a href="javascript:void(0);" class="mobile_remove_input_button" title="Remove field"><i class="fa fa-minus-circle minus-icon"></i></a></div>';
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
            $("#propertyTypeError").text('');
        });
        
        var social_add_input_button = $('.social_add_input_button');
        var social_field_wrapper = $('.social_field_wrapper');
        var social_new_field_html = ' <div class="row"><div class="col-md-6"><div class="form-group d-flex align-items-center"><select class="select-form me-2 width-auto"  id="so_title" name="so_title[]"><option>Facebook</option><option>Twitter</option><option>Instagram</option><option>Pintrest</option><option>Linkedin</option><option>Youtube</option><option>Tiktok</option><option>Twich</option><option>Wechat</option><option>Weibo</option><option>Snapchat</option></select><input type="text" class="form-control" name="so_desc[]" id="so_desc" placeholder="Account URL"></div></div><div class="col-md-2"><a href="javascript:void(0);" class="social_remove_input_button" title="Remove field"><i class="fa fa-minus-circle minus-icon"></i></a></div>';
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
    

    $(document).ready(function(){
  $('.accordion-list > li > .answer').hide();
    
  $('.accordion-list > li').click(function() {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active").find(".answer").slideUp();
    } else {
      $(".accordion-list > li.active .answer").slideUp();
      $(".accordion-list > li.active").removeClass("active");
      $(this).addClass("active").find(".answer").slideDown();
    }
    return false;
  });
  
});

    </script>
</body>
</html>
