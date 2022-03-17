<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap -->
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- font-awesome -->
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<!-- Goole Font -->
	<link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/logo/TSH.png">
	<title>Individual Development Plan Online</title>
	<style>
		body {
			font-family: 'Sarabun', 'sans-serif';
			/* background-image: url('<?php echo base_url(); ?>assets/picture/competency.jpg'); */
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: left;
			background-size: 50%;
		}
	</style>
	<style type="text/css">
		.hovergallery img {
			-webkit-transform: scale(1.5);
			/*Webkit: Scale down image to 0.8x original size*/
			-moz-transform: scale(0.8);
			/*Mozilla scale version*/
			-o-transform: scale(0.8);
			/*Opera scale version*/
			-webkit-transition-duration: 0.5s;
			/*Webkit: Animation duration*/
			-moz-transition-duration: 0.5s;
			/*Mozilla duration version*/
			-o-transition-duration: 0.5s;
			/*Opera duration version*/
			opacity: 0.7;
			/*initial opacity of images*/
			margin: 0 50px 5px 0;
			/*margin between images*/
		}

		.hovergallery img:hover {
			-webkit-transform: scale(1.1);
			/*Webkit: Scale up image to 1.2x original size*/
			-moz-transform: scale(1.1);
			/*Mozilla scale version*/
			-o-transform: scale(1.1);
			/*Opera scale version*/
			box-shadow: 0px 0px 50px gray;
			/*CSS3 shadow: 30px blurred shadow all around image*/
			-webkit-box-shadow: 0px 0px 50px gray;
			/*Safari shadow version*/
			-moz-box-shadow: 0px 0px 50px gray;
			/*Mozilla shadow version*/
			opacity: 1;
		}
	</style>

</head>

<body>
	<br>
	<div class="content">
		<div class="container d-flex justify-content-around">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="<?php echo base_url(); ?>assets/picture/login.png" alt="Image" class="img-fluid">
					</div>
					<div class="col-md-6 contents">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="mb-4">
									<h3 class="text-center">
										<img src="<?php echo base_url(); ?>assets/logo/TSH.png" width="65" height="65" class="d-inline-block align-center">
										<br>Individual Development Plan Online
									</h3>
									<p class="mb-4"></p>
									<div class="text-danger"> <?php echo $this->session->flashdata('msg'); ?></div>
								</div>
								<form class="form-signin" action="<?php echo site_url('login/process_auth_login'); ?>" method="post">

									<div class="form-group first">
										<label for="username">Username</label>
										<input type="text" id="username" name="username" class="form-control" placeholder="รหัสพนักงาน 6 หลัก" required autofocus>

									</div>
									<div class="form-group last mb-4">
										<label for="password">Password</label>
										<input type="password" id="password" name="password" class="form-control" placeholder="รหัสผ่านเลข 4 หลักท้ายของบัตรประชาชน" required>

									</div>

									<input type="submit" value="Log In" class="btn btn-block btn-primary">

							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>

</html>