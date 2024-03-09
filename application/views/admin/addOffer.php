<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adsquaretech">
    <meta name="author" content="Adsquaretech">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">
    <title>Adsquaretech - Offers </title>
    <?php $this->load->view("admin/layouts/headerFiles"); ?>
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
	<div id="loader"></div>

    <?php $this->load->view("admin/layouts/header"); ?>
  <?php $this->load->view("admin/layouts/sidebar"); ?>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->	  
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Offers</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url("admin/dashboard"); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url("admin/offers" ); ?>">Offers</a></li>
								<li class="breadcrumb-item" aria-current="page"><?= @$offer ? 'Edit':'Add'; ?> Offer</li>
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
                    <form id="offerForm" methode="post">
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> ABOUT THE OFFER</h4>
								<hr class="my-15">
							
                                <?php if(isset($offer))
                                { ?>
                                    <input type="hidden" class="form-control" name="offer_id" id="offer_id" value="<?php echo $offer['id']; ?>">
                                <?php } ?>

                                <div class="row">
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Name</label>
									  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo @$offer['name']; ?>">
                                      <p id="nameError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Category</label>
									  <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category" value="<?php echo @$offer['category']; ?>">
                                      <p id="categoryError"  class="validation-error"></p>
                                    </div>
								  </div>

                                  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Subcategory</label>
									  <input type="text" class="form-control" name="subcategory" id="subcategory" placeholder="Enter Subcategory"  value="<?php echo @$offer['subcategory']; ?>">
                                      <p id="subcategoryError"  class="validation-error"></p>
                                    </div>
								  </div>

                                  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> Start Date</label>
									  <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Enter Start Date"  value="<?php echo @$offer['start_date']; ?>">
                                      <p id="start_dateError"  class="validation-error"></p>
                                    </div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label"> End Date</label>
									  <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Enter End Date"  value="<?php echo @$offer['end_date']; ?>">
                                      <p id="end_dateError"  class="validation-error"></p>
                                    </div>
								  </div>
								
								 
                                  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label">URL</label>
                                      <input type="text" class="form-control" name="url" id="url" placeholder="Enter URL"  value="<?php echo @$offer['url']; ?>">
                                      <p id="urlError"  class="validation-error"></p>
                                    </div>
								  </div>


								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Advertiser Plateform</label>
									  <input type="text" class="form-control" name="advertise_platform" id="advertise_platform" placeholder="Enter Advertiser Plateform"  value="<?php echo @$offer['advertise_platform']; ?>">
                                    </div>
								  </div>


                                  
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">Advertiser</label>
									  <input type="text" class="form-control" name="advertiser" id="advertiser" placeholder="Enter Advertiser Plateform"  value="<?php echo @$offer['advertiser']; ?>">
                                    </div>
								  </div>


                                </div>

                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> TARGETING</h4>
                                <hr class="my-15">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Devices</label>
                                            <input type="text" class="form-control" name="devices" id="devices" placeholder="Enter Devices"  value="<?php echo @$offer['devices']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Operating Systems</label>
                                            <input type="text" class="form-control" name="op_systems" id="op_systems" placeholder="Enter Operating Systems"  value="<?php echo @$offer['op_systems']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Region</label>
                                            <input type="text" class="form-control" name="region" id="region" placeholder="Enter Region"  value="<?php echo @$offer['region']; ?>">
                                        </div>
                                    </div>


                                   
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Country</label>
                                            <select class="form-select me-2 " id="country_id" name="country_id">
                                            <?php foreach ($countries as $c ) { ?>
                                                <option value="<?php echo $c["country_id"]; ?>" <?php if (@$offer["country_id"] == $c["country_id"]) {echo "selected";} ?>><?php echo $c["country_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Carriers</label>
                                            <input type="text" class="form-control" name="carriers" id="carriers" placeholder="Enter Carriers" value="<?php echo @$offer['carriers']; ?>">
                                        </div>
                                    </div>
                                    </div> 

                                    <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> ENABLED FRAUD SCAN</h4>
                                <hr class="my-15">


                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> REVENUE & PAYOUT</h4>
                                <hr class="my-15">


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Currency</label>
                                            <input type="text" class="form-control" name="currency" id="currency" placeholder="Enter Currency"  value="<?php echo @$offer['currency']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Revenue</label>
                                            <input type="text" class="form-control" name="revenue" id="revenue" placeholder="Enter Revenue"  value="<?php echo @$offer['revenue']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Payout for Affiliate</label>
                                            <input type="text" class="form-control" name="payout_affiliate" id="payout_affiliate" placeholder="Enter Payout for Affiliate"  value="<?php echo @$offer['payout_affiliate']; ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Payout Frequency</label>
                                            <input type="text" class="form-control" name="payout_frequency" id="payout_frequency" placeholder="Enter Payout Frequency" value="<?php echo @$offer['payout_frequency']; ?>">
                                        </div>
                                    </div>
                                    </div> 

                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> SHARE OFFER</h4>
                                <hr class="my-15">

                                <div class="row">
                                    <div class="col-md-12 mb-20">
                                    <label class="form-label me-2">Offer Type</label>
                                        <div class="form-group align-items-center d-flex">
                                            <select class="form-select me-2 width-auto " name="share_offer" id="share_offer" >
                                                <option  <?php if (@$offer["share_offer"] == 0) {echo "selected";} ?> value="0">Public</option>
                                                <option  <?php if (@$offer["share_offer"] ==  1) {echo "selected";} ?> value="1">Private</option>
                                            </select>
                                            <p id="public-text">This offer will be visible to everyone.</p>
                                        </div>
                                    </div>	
                                </div>
                               
                                <div class="box-footer">

								<button type="submit" id="submitBtn" class="btn btn-primary">
								  <i class="ti-save-alt"></i> Submit
								</button>
							</div>
  
                            </div>
							<!-- /.box-body -->
							  
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
 
  <?php $this->load->view("admin/layouts/footer"); ?>
  
</div>
<!-- ./wrapper -->
<?php $this->load->view("admin/layouts/footerFiles"); ?>
<script>
 let successMsg = "<?php echo $this->session->flashdata('successMsg'); ?>";
    if(successMsg != "")
    {
        toastr.success(successMsg);
    }
   

    $("#offerForm").on('submit',(function(e)
    {
        $(".validation-error").text('');
        e.preventDefault();
        let form = new FormData(this);
        
        $.ajax({
            url: "<?php echo base_url("admin/offers/actionAddoffer"); ?>",
            type: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData:false,
            dataType:'JSON',
            beforeSend : function()
            {
                $("#err").fadeOut();
                $("#submitBtn").attr('disabled','disabled').html('<i class="fas fa-spinner fa-pulse mr-2"></i> Processing...');
            },
            success: function(data)
            {
                if (data.status == 1) {
                    if($("#offer_id").length == 0) {
                        $("#offerForm")[0].reset();
                    }
                  window.location.href = data.redirect;
                }
                else if (data.status == 2) {
                    $("#nameError").text(data.nameError);
                    $("#categoryError").text(data.categoryError);
                    $("#subcategoryError").text(data.subcategoryError);
                    $("#start_dateError").text(data.start_dateError);
                    $("#end_dateError").text(data.end_dateError);
                    $("#urlError").text(data.urlError);
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
                $("#submitBtn").removeAttr('disabled').html('Submit');
            }

        });

    }));


    $('#share_offer').change(function(){
            if($(this).val() == 1){
                $('#public-text').addClass('d-none');
            }else{
                $('#public-text').removeClass('d-none');
            }
        })

        
        $('#share_offer').change(function(){
            if($(this).val() == '1'){
                $('#public-text').addClass('d-none');
            }else{
                $('#public-text').removeClass('d-none');
            }
        });



            $(document).ready(function () {

                if($('#share_offer').val() == '1'){
                $('#public-text').addClass('d-none');
                }else{
                    $('#public-text').removeClass('d-none');
                }


            // Bind change event handler to start and end date fields
            $("#start_date, #end_date").change(function () {
                
                var startDate = new Date($("#start_date").val());
                var endDate = new Date($("#end_date").val());

                if (startDate > endDate) {
                    $("#end_dateError").text("End Date cannot be less than Start Date");
                } else {
                    $("#end_dateError").text("");
                }
            });
        });           
        
</script>
</body>
</html>
