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
    <div class="d-flex align-items-center justify-content-between">
        <div class="me-auto">
            <h4 class="page-title">Offer</h4>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page" >Manage Offer</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <a href="<?php echo base_url('admin/offers/addOffer');?>" class="btn btn-primary">+ New Offer</a>
        </div>
    </div>
</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				 <!-- /.box -->
                 <div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="offerTable" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Category</th>
								<th>SubCategory</th>
								<th>url</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>				  
						<tfoot>
							<tr>
                            <th>ID</th>
								<th>Name</th>
								<th>Category</th>
								<th>SubCategory</th>
								<th>url</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
					</div>              
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->    
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
   $(document).ready(function() {
    let successMsg = "<?php echo $this->session->flashdata('successMsg'); ?>";
    if(successMsg != "")
    {
        toastr.success(successMsg);
    }


      $('#offerTable').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [ 'copy', 'excel', 'pdf'],
        "pagingType": "full_numbers",
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "order": [],
        "ajax": {
          "url": "<?php echo base_url('admin/offers/getLists'); ?>",
          "type": "POST"
        },
        "columnDefs": [{ 
          "targets": [4],
          "orderable": false
        }]
      });
    });

   


    function deleteOffer(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Offer's data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })

            .then((willDelete) => {

            if (willDelete) {
                $.ajax({
                    url: "<?php echo base_url('admin/offers/actionDeleteSingle'); ?>",
                    type: "POST",
                    data: { offer_id : id },
                    dataType:'JSON',
                    beforeSend : function()
                    {
                      $("#deleteBtn"+id).html('<i class="fas fa-spinner fa-pulse"></i>').addClass("disable-click");
                    },
                    success: function(data)
                    {
                        if (data.status == 1) {
                          toastr.success(data.message);
                          $('#offerTable').DataTable().ajax.reload( null, false );  
                        }
                        else
                        {
                          toastr.error(data.message);
                        }
                    },
                    error: function()
                    {
                    toastr.error("Something went wrong!");
                    },
                    complete: function()
                    {
                      $("#deleteBtn"+id).html('<i class="fas fa-trash"></i>').removeClass("disable-click");
                    }

                });
            } 
        });
    }

</script>
</body>
</html>
