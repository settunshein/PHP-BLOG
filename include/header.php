<?php ob_start(); ?>

<?php
if (!isset($_SESSION)) {
    session_start();
}

include('include/db.php');
include('admin/include_admin/functions.php');
include('include/header_include.php');

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Hasta BLOG</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">

	<link rel="stylesheet" href="assets/js/bootstrap/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/js/mainmenu/menu.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/default.css" type="text/css" />

	<!-- toastr Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<style>
		.image-holder {
			position: relative !important;
		}

		.post-info {
			position: absolute !important;
			top: 0;
			right: 0;
			padding: 5px 32px;
			background-color: #dbdc33;
			color: #ffffff;
			font-size: 12px;
			font-weight: 500;
			text-align: center;
			text-transform: uppercase;
		}

		.topbar-left-items .ri,
		.post-info .ri {
			margin-right: 3px;
			font-size: 16px;
			vertical-align: middle !important;
		}

		.blog1-post-holder .ri {
			margin-right: 3.5px;
			font-size: 16px;
			vertical-align: middle !important;
		}

		.post-ttl {
			margin-bottom: 18px;
			font-size: 18px;
			font-weight: 700;
		}

		.post-blk {
			margin-bottom: 28px;
		}

		.post-content {
			margin-bottom: 28px;
		}

		/* Sidebar */
		.sidebar-blk {
			margin-bottom: 28px !important;
		}

		.sec-content-blk {
			padding-top: 40px;
			padding-bottom: 60px;
		}

		.category-link {
			display: flex;
			flex-direction: row;
			align-items: center;
		}

		i.category-logo {
			width: 24px !important;
		}

		/* Search Form */
		.post-search-form {
			position: relative;
		}

		.post-search-input,
		.comment-input {
			width: 100%;
			height: 46px;
			padding-left: 10px;
			border: 1px solid #e4e4e4 !important;
			background: transparent;
			font-size: 14px;
		}

		.comment-input {
			margin-bottom: 20px;
		}

		.post-search-input:focus,
		.comment-input:focus,
		textarea:focus {
			outline: none;
		}

		.post-search-btn {
			display: inline-block;
			position: absolute;
			top: 0;
			right: 0;
			padding: 10px 20px 10px;
			border: 1px solid #dbdc33;
			background: #dbdc33;
			color: #ffffff;
			font-size: 12px;
			font-weight: 700;
			text-transform: uppercase;
			cursor: pointer;
		}

		.btn {
			background-color: inherit;
		}

		textarea {
			width: 100%;
			margin-bottom: 20px;
			padding-left: 10px;
			border: 1px solid #e4e4e4 !important;
			background: transparent;
			font-size: 14px;
		}

		/* Custom Styling Toastr */
		#toast-container>div {
			width: 400px !important;
			opacity: 1;
		}

		#title-error {
			font-size: 12px;
		}

		/* Custom Class */
		.fw-600 {
			font-weight: 600;
		}

		.fs-700 {
			font-weight: 700;
		}

		.pr-0 {
			padding-right: 0 !important;
		}

		.custom-fs-12 {
			font-size: 12.5px;
		}

		.custom-fs-13 {
			font-size: 13px;
		}

		.custom-fs-14 {
			font-size: 14px;
		}

		.custom-fs-16 {
			font-size: 16px;
		}

		.custom-fs-18 {
			font-size: 18px;
		}

		.custom-fs-20 {
			font-size: 20px;
		}

		.custom-fs-24 {
			font-size: 24px;
		}

		.custom-fs-28 {
			font-size: 28px;
		}

		.custom-mr-10 {
			margin-right: 10px;
		}

		.custom-mt-20 {
			margin-top: 20px;
		}

		.no-mb {
			margin-bottom: 0;
		}

		.custom-mb-5 {
			margin-bottom: 5px;
		}

		.custom-mb-10 {
			margin-bottom: 10px;
		}

		.custom-mb-22 {
			margin-bottom: 22px;
		}
	</style>
</head>
<body>
	<div class="site_wrapper">
		<div id="header">
			<div class="container">
				<div class="navbar yellow-green navbar-default yamm">
					<div class="navbar-header">
						<button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
						<a href="index.php" class="navbar-brand">
							<img src="assets/img/logo.png" alt="Logo" />
						</a>
					</div>
					<div id="navbar-collapse-grid" class="navbar-collapse collapse pull-right pr-0">
						<ul class="nav yellow-green navbar-nav">
							<li>
								<a href="index.php" class="<?= check_page_status('index') ?>">Home</a>
							</li>
							<?php if( isset($_SESSION['auth_user']) ): ?>
								<li>
									<a href="admin/dashboard.php">Dashboard</a>
								</li>
								<li>
									<form class="pr-0 d-inline-block" method="GET">
										<button type="submit" class="logout-btn" name="logout">Logout</button>
									</form>
								</li>
							<?php else: ?>
								<li>
									<a href="register.php" class="<?= check_page_status('register') ?>">Register</a>
								</li>
								<li>
									<a href="login.php" class="<?= check_page_status('login') ?> pr-0">Login</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>