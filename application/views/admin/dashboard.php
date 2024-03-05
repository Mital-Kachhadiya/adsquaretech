<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adsquaretech">
    <meta name="author" content="Adsquaretech">
    <link rel="icon" href="<?php echo ADMIN_ASSETS; ?>img/logo.jpg">
    <title>Adsquaretech - Dashboard </title>
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
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xxxl-8 col-xl-9 col-12">
					<div class="row">
						<div class="col-xl-6 col-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">
										Sales Pipeline
									</h3>
								</div>
								<div class="box-body pb-0">
									<div id="chartdiv45" class="h-300 amcharts-main-div"></div>
								</div>								
							</div>
						</div>
						<div class="col-xl-6 col-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">
										Leads by Source
									</h3>
								</div>
								<div class="box-body pb-0">
									<div id="chartdiv46" class="h-300"></div>
								</div>								
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">
								Sales Analytics
							</h3>
						</div>
						<div class="box-body pb-0">
							<div id="chart44"></div>
						</div>
						<div class="box-body pb-0">							
							<div class="row">
								<div class="col-lg-4 col-12">
									<div class="box no-shadow no-border bg-lightest">
										<div class="box-body">
											<h2 class="fw-600"><small>$</small>1.200</h2>
											<p class="text-mute mb-0">This Day</p>
											<p class="text-success mb-0"><i class="fa fa-arrow-up"></i> 1.8%</p>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-12">
									<div class="box no-shadow no-border bg-lightest">
										<div class="box-body">
											<h2 class="fw-600 text-primary"><small>$</small>12.745</h2>
											<p class="text-mute mb-0">This Week</p>
											<p class="text-success mb-0"><i class="fa fa-arrow-up"></i> 1.8%</p>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-12">
									<div class="box no-shadow no-border bg-lightest">
										<div class="box-body">
											<h2 class="fw-600 text-success"><small>$</small>7.745</h2>
											<p class="text-mute mb-0">Previous Week</p>
											<p class="text-success mb-0"><i class="fa fa-arrow-up"></i> 1.8%</p>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="box bg-transparent no-shadow no-border mb-0">
						<div class="box-header no-border px-0">
							<h3 class="box-title">Project Data</h3>							
							<div class="box-controls pull-right d-md-flex d-none">
							  <a href="#">View All</a>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-body py-10">
							<div class="table-responsive">
								<table class="table no-border mb-0">
									<tbody>
										<tr>
											<td>
												<div class="bg-danger h-50 w-50 l-h-50 rounded text-center">
												  <p class="mb-0 fs-20 fw-600">A1</p>
												</div>
											</td>
											<td class="fw-600">Vivamus consectetur</td>
											<td class="text-fade">05-08-2021</td>
											<td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Approved</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn-sm btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 fs-18"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="bg-info h-50 w-50 l-h-50 rounded text-center">
												  <p class="mb-0 fs-20 fw-600">B1</p>
												</div>
											</td>
											<td class="fw-600">Google Art</td>
											<td class="text-fade">05-08-2021</td>
											<td class="fw-500"><span class="badge badge-sm badge-dot badge-danger me-10"></span>Rejected</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn-sm btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 fs-18"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="bg-primary h-50 w-50 l-h-50 rounded text-center">
												  <p class="mb-0 fs-20 fw-600">C1</p>
												</div>
											</td>
											<td class="fw-600">Rolex Language</td>
											<td class="text-fade">05-08-2021</td>
											<td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Approved</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn-sm btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 fs-18"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="bg-success h-50 w-50 l-h-50 rounded text-center">
												  <p class="mb-0 fs-20 fw-600">A2</p>
												</div>
											</td>
											<td class="fw-600">Geometry INC</td>
											<td class="text-fade">05-08-2021</td>
											<td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Approved</td>
											<td class="text-end">
												<a href="#" class="waves-effect waves-light btn-sm btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
												<a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 fs-18"><span class="path1"></span><span class="path2"></span></span></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxxl-4 col-xl-3 col-12">
					<div class="box bg-img box-inverse" style="background-image: url(../../../images/promo.jpg); background-position: top center;" data-overlay="5">				
						<div class="box-header with-border">
							<h3 class="box-title">Company</h3>
							<ul class="box-controls pull-right">
								<li><a class="box-btn-close" href="#"></a></li>
								<li><a class="box-btn-fullscreen" href="#"></a></li>
							</ul>
						</div>
						<div class="box-body mt-110">
							<span class="badge me-15 mt-100" data-overlay="5">Watch New Promo</span>
							<button type="button" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
							  <i class="fa fa-play"></i>
							</button>
							<ul class="flexbox flex-justified mt-10">
								<li>
									<p class="fs-20 text-warning mb-0 fw-300"> <i class="fa fa-caret-up text-warning"></i> +1.92% 
									<small class="fs-12">4,425.81</small></p>
								</li>
							</ul>	
						</div>
					</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">
								Sales Analytics
							</h3>
						</div>
						<div class="box-body">
							<div style="min-height: 279.7px;">
								<div id="sales-chart"></div>
							</div>							
						</div>
					</div>
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<div class="bg-primary mb-20 w-50 h-50 rounded10 text-center l-h-50">
										<i class="fs-18 fa fa-file"></i>
									</div>
									<h4 class="mb-5">Projects</h4>
									<p class="text-mute mb-0">124 Total</p>
								</div>
								<div id="chart41"></div>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<div class="bg-info mb-20 w-50 h-50 rounded10 text-center l-h-50">
										<i class="fs-18 fa fa-cogs"></i>
									</div>
									<h4 class="mb-5 text-nowrap">On Going</h4>
									<p class="text-mute mb-0">32 Total</p>
								</div>
								<div id="chart42"></div>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-body">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<div class="bg-success mb-20 w-50 h-50 rounded10 text-center l-h-50">
										<i class="fs-18 fa fa-trophy"></i>
									</div>
									<h4 class="mb-5">Complate</h4>
									<p class="text-mute mb-0">102 Total</p>
								</div>
								<div id="chart43"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-body">	
							<div class="flex-grow-1 pb-10">	
								<div class="bg-primary w-70 h-70 rounded10 mb-30 text-center l-h-70">							
									<i class="fa fa-users fs-24"></i>							
								</div>

								<a href="#" class="text-dark fw-600 hover-primary fs-18" data-bs-toggle="modal" data-bs-target="#evemt-view">
									Annual client Management <br>Program 2021
								</a>
								<p class="fs-16 mt-15">
									Employees & Clients Meeting
								</p>
								<div class="d-flex align-items-center">
									<a href="reports.html" class="btn btn-sm btn-primary-light me-15">Report</a>
									<div class="fs-16">
										<i class="fa fa-clock text-primary"></i>
										15 min
									</div>
								</div>
							</div>							
							<div class="d-flex mt-10 align-items-center justify-content-between">
								<h2 class="mb-0 text-primary">20</h2>
								<div class="d-flex">
									<a href="extra_profile.html" class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center overflow-hidden">
										<img src="../../../images/avatar/avatar-1.png" class="h-50 align-self-end" alt="">
									</a>
									<a href="extra_profile.html" class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center overflow-hidden">
										<img src="../../../images/avatar/avatar-3.png" class="h-50 align-self-end" alt="">
									</a>
									<a href="extra_profile.html" class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center overflow-hidden">
										<img src="../../../images/avatar/avatar-4.png" class="h-50 align-self-end" alt="">
									</a>
								</div>
							</div>
						</div>					
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-body">	
							<div class="flex-grow-1 pb-10">	
								<div class="bg-warning w-70 h-70 rounded10 mb-30 text-center l-h-70">							
									<i class="fa fa-user fs-24"></i>							
								</div>

								<a href="#" class="text-dark fw-600 hover-primary fs-18" data-bs-toggle="modal" data-bs-target="#evemt-view">
									How to manage your Clients<br>in Proper way
								</a>
								<p class="fs-16 mt-15">
									Top priority project of August 2020
								</p>
								<div class="d-flex align-items-center">
									<a href="reports.html" class="btn btn-sm btn-warning-light me-15">Report</a>
									<div class="fs-16">
										<i class="fa fa-clock text-primary"></i>
										15 min
									</div>
								</div>
							</div>							
							<div class="d-flex mt-10 align-items-center justify-content-between">
								<h2 class="mb-0 text-primary">15</h2>
								<div class="d-flex">
									<a href="extra_profile.html" class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center overflow-hidden">
										<img src="../../../images/avatar/avatar-1.png" class="h-50 align-self-end" alt="">
									</a>
									<a href="extra_profile.html" class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center overflow-hidden">
										<img src="../../../images/avatar/avatar-3.png" class="h-50 align-self-end" alt="">
									</a>
									<a href="extra_profile.html" class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center overflow-hidden">
										<img src="../../../images/avatar/avatar-4.png" class="h-50 align-self-end" alt="">
									</a>
								</div>
							</div>
						</div>					
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Daily Orders</h3>
						</div>
						<div class="box-body">
							<div id="charts_widget_1_chart"></div>
						</div>
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
	
</body>
</html>
