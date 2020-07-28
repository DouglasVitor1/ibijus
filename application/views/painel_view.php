<!DOCTYPE html>
<html lang="pt-br" >
	<head>
		<meta charset="utf-8" />
		<title>
			<?php if (isset($titulo)) { ?>{titulo} | <?php } ?> {titulo_padrao}
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script> 
		<link href="<?php echo base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/vendors/base/vendors.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/demo/default/base/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/demo/default/base/custom.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/demo/default/base/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/vendors/custom/tag-editor/jquery.tag-editor.css') ?>" rel="stylesheet" type="text/css" />
	</head>
	
	<?php
	if ($this->uri->segment(1) == 'usuarios') {
		if ($this->uri->segment(2) == 'login') {
			?>
			<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
				<?php
			} else {
				?>
			<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
				<?php
			}
		} else {
			?>
		<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
			<?php
		}
		?>
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div class="m-grid__item m-grid__item--fluid m-wrapper" id="printable">
					{conteudo}
				</div>
			</div>
		</div>

		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>		    
		
    	<!--begin::Base Scripts -->
		<script src="<?php echo base_url('assets/vendors/base/vendors.bundle.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/demo/default/base/scripts.bundle.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/snippets/pages/user/login.js') ?>" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors 
		<script src="<?php echo base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') ?>" type="text/javascript"></script>-->
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets 
		<script src="<?php echo base_url('assets/app/js/dashboard.js') ?>" type="text/javascript"></script>-->
		<!--end::Page Snippets -->
		<!-- JavaScript Includes
        ================================================== -->
        <script src="<?php echo base_url('assets/demo/default/base/jquery.sortable.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/demo/default/base/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/demo/default/base/dataTables.bootstrap4.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/demo/default/custom/components/forms/widgets/input-mask.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/demo/default/custom/components/forms/widgets/select2.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/demo/default/custom/components/forms/widgets/bootstrap-timepicker.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/vendors/custom/tag-editor/jquery.tag-editor.min.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/vendors/custom/tag-editor/jquery.caret.min.js') ?>" type="text/javascript"></script>
		<!--end::JavaScript Includes -->

        <!-- JavaScript Customs
		================================================== -->
        <script src="<?php echo base_url('assets/demo/default/base/custom.js') ?>" type="text/javascript"></script>
		<!--end::JavaScript Customs -->
	</body>

</html>