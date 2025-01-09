<?php include_once('config.php');
if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
	extract($_REQUEST);
	if ($category_name == "") {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un');
		exit;
	} elseif ($description == "") {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');
		exit;
	} else {

		$userCount = $db->getQueryCount('category', 'category_id');
		$data = array(
			'category_name' => $category_name,
			'description' => $description,
		);
		$insert = $db->insert('category', $data);
		if ($insert) {
			header('location:admin_category.php?msg=ras');
			exit;
		} else {
			header('location:admin_category.php?msg=rna');
			exit;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Admin</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="admin_dashboard.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" href="admin_category.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Categories</span></a>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="admin_song.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Songs</span></a>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="admin_comment.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Comments</span></a>
				</a>
			</li>

		</ul>

		<div id="content-wrapper" class="d-flex flex-column">

			<div id="content">
				<?php

				if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {

					echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {

					echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {

					echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

					echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

					echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

				}

				?>

				<div class="card">

					<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Category</strong>
					</div>

					<div class="card-body">



						<div class="col-sm-6">

							<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

							<form method="post">

								<div class="form-group">

									<label>Category Name <span class="text-danger">*</span></label>

									<input type="text" name="category_name" id="category_name" class="form-control"
										placeholder="Enter category name" required>

								</div>

								<div class="form-group">

									<label>Category Description <span class="text-danger">*</span></label>

									<input type="text" name="description" id="description" class="form-control"
										placeholder="Enter description" required>

								</div>

								<div class="form-group">

									<button type="submit" name="submit" value="submit" id="submit"
										class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add
										Category</button>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>
		</div>

	</div>

	</div>


	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="js/demo/chart-area-demo.js"></script>
	<script src="js/demo/chart-pie-demo.js"></script>
	<script>
		$(document).ready(function () {
			jQuery(function ($) {
				var input = $('[type=tel]')
				input.mobilePhoneNumber({ allowPhoneWithoutPrefix: '+1' });
				input.bind('country.mobilePhoneNumber', function (e, country) {
					$('.country').text(country || '')
				})
			});
		});
	</script>
</body>

</html>