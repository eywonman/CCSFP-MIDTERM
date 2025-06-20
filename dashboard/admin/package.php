<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include_once '../../configuration/header3.php';
	?>
	<title>Package</title>
</head>

<body>

	<!-- Loader -->
	<div class="loader"></div>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="" class="brand">
			<span class="text">MAGRENT</span>

		</a>
		<ul class="side-menu top">
			<li>
				<a href="./">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="user.php">
					<i class='bx bxs-user-plus'></i>
					<span class="text">User Account</span>
				</a>
			</li>
			<li>
				<a href="pending-user.php">
					<i class='bx bxs-user-account'></i>
					<span class="text">Pending User</span>
				</a>
			</li>
			<li class="active">
				<a href="package.php">
					<i class='bx bxs-package'></i>
					<span class="text">Package</span>
				</a>
			</li>
			<li>
				<a href="payment?status=?">
					<i class='bx bxs-credit-card'></i>
					<span class="text">Payment</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu top">
			<li>
				<a href="settings.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="audit-trail.php">
					<i class='bx bxl-blogger'></i>
					<span class="text">Audit Trail</span>
				</a>
			</li>
			<li>
				<a href="authentication/admin-signout.php" class="btn-signout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Signout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<form action="#">
				<div class="form-input">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<div class="username">
				<span>Hello, <label for=""><?php echo $user_fname ?></label></span>
			</div>
			<a href="profile.php" class="profile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Profile">
				<img src="../../src/images/profile/<?php echo $user_profile ?>">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Package</h1>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="./">Home</a>
						</li>
						<li>|</li>
						<li>
							<a href="">Package</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="modal-button">
				<button type="button" data-bs-toggle="modal" data-bs-target="#classModal" class="btn-dark"><i class='bx bxs-plus-circle'></i> Add Package</button>
			</div>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3><i class='bx bxs-package' ></i> List of Package</h3>
					</div>
					<!-- BODY -->
					<section class="data-table">
						<div class="searchBx">
							<input type="input" placeholder="Search Package . . . . . ." class="search" name="search_box" id="search_box"><button class="searchBtn"><i class="bx bx-search icon"></i></button>
						</div>

						<div class="table">
							<div id="dynamic_content">
							</div>

					</section>
				</div>
			</div>
		</main>
		<!-- MAIN -->

		<!-- MODALS -->
		<div class="class-modal">
			<div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true" data-bs-backdrop="static">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="header"></div>
						<div class="modal-header">
							<h5 class="modal-title" id="classModalLabel"><i class='bx bxs-user-account'></i> Add User Account</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeButton"></button>
						</div>
						<div class="modal-body">
							<section class="data-form-modals">
								<div class="registration">
									<form action="controller/package-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()" novalidate style="overflow: hidden;">
										<div class="row gx-5 needs-validation">

											<div class="col-md-12">
												<label for="package_name" class="form-label">Package Name <span> *</span></label>
												<input type="text"  class="form-control" autocapitalize="on" autocomplete="off" name="package_name" id="package_name" required>
												<div class="invalid-feedback">
													Please provide a Package Name.
												</div>
											</div>


											<div class="col-md-6">
												<label for="price" class="form-label">Price (Php) <span> *</span></label>
												<input type="text"  class="form-control numbers" inputmode="numeric"  name="price" id="price" required>
											</div>
											<div class="invalid-feedback">
												Please provide a Price.
											</div>

											<div class="col-md-6">
												<label for="number_of_credits" class="form-label">Number of Credits <span> *</span></label>
												<input type="text"  class="form-control numbers" inputmode="numeric"  name="number_of_credits" id="number_of_credits" required>
											</div>
											<div class="invalid-feedback">
												Please provide a Number of Credits.
											</div>

										</div>

										<div class="addBtn">
											<button type="submit" class="btn-dark" name="btn-add-package" id="btn-add" onclick="return IsEmpty(); sexEmpty();">Add</button>
										</div>
									</form>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CONTENT -->

	<?php
	include_once '../../configuration/footer3.php';
	?>
		<script>

		//live search---------------------------------------------------------------------------------------//
		$(document).ready(function(){

		load_data(1);

		function load_data(page, query = '')
		{
		$.ajax({
			url:"tables/package-table.php",
			method:"POST",
			data:{page:page, query:query},
			success:function(data)
			{
			$('#dynamic_content').html(data);
			}
		});
		}

		$(document).on('click', '.page-link', function(){
		var page = $(this).data('page_number');
		var query = $('#search_box').val();
		load_data(page, query);
		});

		$('#search_box').keyup(function(){
		var query = $('#search_box').val();
		load_data(1, query);
		});

		});

		</script>
	<?php include_once '../../configuration/sweetalert.php'; ?>

</body>

</html>