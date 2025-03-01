<!DOCTYPE html>
<html lang="es">
<!--begin::Head-->

<head>
	<title><?= $title ?? '' ?></title>
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="bg-body">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png)">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="#" class="mb-12">
					<img alt="Logo" src="<?php echo base_url('assets/media/logos/logo-1.svg'); ?>" class="h-40px" />
				</a>
				<!--end::Logo-->

				<?php if (session()->getFlashdata('error')): ?>
					<div class="alert alert-danger">
						<?= session()->getFlashdata('error') ?>
					</div>
				<?php endif; ?>

				<?php if (session()->getFlashdata('success')): ?>
					<div class="alert alert-success">
						<?= session()->getFlashdata('success') ?>
					</div>
				<?php endif; ?>

				<?php if (isset($validation)): ?>
					<div class="alert alert-danger">
						<?= $validation->listErrors() ?>
					</div>
				<?php endif; ?>

				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<form class="form w-100" action="<?= base_url('login/process') ?>" method="post">
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Inicia sesión</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4">¿No tienes cuenta?
								<a href="<?= base_url('register') ?>" class="link-primary fw-bolder">Crea una nueva</a>
							</div>
							<!--end::Link-->
						</div>
						<!--end::Heading-->

						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="form-label fs-6 fw-bolder text-dark">Email</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack mb-2">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>
								<!--end::Label-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Actions-->
						<div class="text-center">
							<!--begin::Submit button-->
							<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
								<span class="indicator-label">Continuar</span>
								<span class="indicator-progress">Por favor espere...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
								</span>
							</button>
							<!--end::Submit button-->

							<!--begin::Separator-->
							<div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
							<!--end::Separator-->

							<!--begin::Social login buttons-->
							<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continuar con Google
							</a>
							<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continuar con Facebook
							</a>
							<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
								<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continuar con Apple
							</a>
							<!--end::Social login buttons-->
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Main-->

	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="assets/js/custom/authentication/sign-in/general.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>