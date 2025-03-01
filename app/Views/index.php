<!--
Author: Ant-DeLaT
-->
<!DOCTYPE html>
<?php $session = session() ?>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="<?= base_url() ?>">
	<title><?= $title ?? '' ?></title>
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!-- Include sidebar -->
			<?= view('includes/sidebar.php') ?>
			<!-- end::sidebar -->
		</div>
		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Container-->
				<div id="kt_content_container" class="container-xxl">
					<div class="card">
						<div class="card-body d-flex align-items-center justify-content-center py-15">
							<div class="text-center">
								<div class="fs-2x fw-bolder text-dark mb-4">
									<h1>Bienvenido <?= $session->get('name') ?? 'user' ?></h1>
									<p class="fs-2 text-gray-600">Usa los botones para navegar</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Container-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Wrapper-->
		<!--end::Page-->
	</div>
	<!--end::Root-->
	<!--end::Main-->

	<!--begin::Javascript-->
	<?= view('includes/common-scripts.php') ?>
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>