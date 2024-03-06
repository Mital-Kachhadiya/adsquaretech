<?php
 $adminData =  $this->adm->adminData();
 if ($adminData['image'] == "") {
    $imagePath = NO_IMAGE_ADMIN;
  } else {
	$image = 'images/profile/'.$adminData['image'];
    if (file_exists($image)) {
      $imagePath = base_url() . $image;
    } else {
      $imagePath = NO_IMAGE_ADMIN;
    }
  }
 ?>
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
		<div class="d-flex align-items-center logo-box justify-content-start d-md-block d-none">	
			<!-- Logo -->
			<a href="<?php echo base_url('admin/dashboard'); ?>" class="logo">
			  <!-- logo-->
			  <div class="logo-mini">
				  <span class="light-logo"><img src="<?php echo ADMIN_ASSETS; ?>img/logo.jpg" alt="logo"></span>
			  </div>
			  <!-- <div class="logo-lg">
				  <span class="light-logo fs-36 fw-700">Adsquare<span class="text-primary">tech</span></span>
			  </div> -->
			</a>	
		</div> 
		<div class="user-profile my-15 px-20 py-10 b-1 rounded10 mx-15">
			<div class="d-flex align-items-center justify-content-between">			
				<div class="image d-flex align-items-center">
				    <img src="<?php echo $imagePath; ?>" class="rounded-0 me-10" alt="User Image">
					<div>
						<h4 class="mb-0 fw-600"><?= $adminData['name'] ?></h4>
						<p class="mb-0">Super Admin</p>
					</div>
				</div>
				<div class="info">
					<a class="dropdown-toggle p-15 d-grid" data-bs-toggle="dropdown" href="#"></a>
					<div class="dropdown-menu dropdown-menu-end">
					  <a class="dropdown-item" href="<?php echo base_url('admin/profile'); ?>"><i class="ti-user"></i> Profile</a>
					 <a class="dropdown-item" href="<?php echo base_url('admin/change-password'); ?>"><i class="ti-key"></i> Change Password</a> 
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="<?php echo base_url('admin/logout'); ?>"><i class="ti-lock"></i> Logout</a>
					</div>
				</div>
			</div>
	    </div>
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 97%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	
				<!-- <li class="header">Main Menu</li> -->
				<li>
				  <a href="<?php echo base_url('admin/dashboard'); ?>">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Dashboard</span>
				  </a>
				</li>
				<li>
				  <a href="<?php echo base_url('admin/offers'); ?>">
					<i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>
					<span>Offers</span>
				  </a>
				</li>
				<li>
				  <a href="<?php echo base_url('admin/affiliates'); ?>">
					<i class="icon-Add-user"><span class="path1"></span><span class="path2"></span></i>
					<span>Affiliates</span>
				  </a>
				</li>     
			  </ul>
		  </div>
		</div>
    </section>
  </aside>