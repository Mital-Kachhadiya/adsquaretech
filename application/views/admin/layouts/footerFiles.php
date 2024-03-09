<!-- Vendor JS -->
<script src="<?php echo ADMIN_ASSETS; ?>js/vendors.min.js"></script>
	<script src="<?php echo ADMIN_ASSETS; ?>js/pages/chat-popup.js"></script>
    <script src="<?php echo ADMIN_ASSETS; ?>icons/feather-icons/feather.min.js"></script>
	
	<script src="<?php echo ADMIN_ASSETS; ?>vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
	
	<!-- CRMi App -->
	<script src="<?php echo ADMIN_ASSETS; ?>js/template.js"></script>
	<script src="<?php echo ADMIN_ASSETS; ?>js/pages/dashboard.js"></script>

	<script src="<?php echo ADMIN_ASSETS; ?>js/toastr.min.js" ></script>
	<script src="<?php echo ADMIN_ASSETS; ?>vendor_components/datatable/datatables.min.js"></script>	
	<script src="<?php echo ADMIN_ASSETS; ?>js/pages/data-table.js"></script>

	<!-- <script src="<?php echo ADMIN_ASSETS; ?>vendor_components/sweetalert/sweetalert.min.js"></script> -->
    <!-- <script src="<?php echo ADMIN_ASSETS; ?>vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script> -->
	<script src="<?php echo ADMIN_ASSETS; ?>js/sweetalert.min.js"></script>

	<script>
  $(document).ready(function () {
    // Get the current page URL
    var currentUrl = window.location.href;

    // Loop through each sidebar menu item
    $(".sidebar-menu li").each(function () {
      // Get the URL associated with the menu item
      var menuItemUrl = $(this).find("a").attr("href");

      // Check if the current URL contains the menu item URL
      if (currentUrl.indexOf(menuItemUrl) !== -1) {
        // Add the "active" class to the current menu item
        $(this).addClass("active");
      }
    });
  });
</script>
	