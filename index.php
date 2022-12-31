<?php include('inc/head.php'); ?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="index.php" class="navbar-brand mr-3">Online Leave Management System</a>
			
		</div>
	</nav>

	<!--This is section-->
	<section id="sections" class="py-4 mb-4 ">
		<div class="container">
			<div class="row">
			</div>
		</div>
	
	</section>
	<!----Section2 for showing Post Model ---->
	<section id="post">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">
							<h5>Employee Login Panel </h5>
						</div>
						<div class="card-body p-3">
							<form action="" method="POST">
								<label class="form-control-label">EPF Number</label>
								<input type="number" name="epf" class="form-control"  />
								<br />
								<label class="form-control-label">Password</label>
								<input type="password" name="password" class="form-control"  />
								<br />
								<input type="submit" name="submit" class="btn btn-primary" style="border-radius:0%;" value="Log In" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br>
	<!----Section3 footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="lead">&copy; <?php echo date("Y")?> NML</p>
				</div>
			</div>
		</div>
	</section>
	
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>

</body>
</html>
   
<?php 
	
	if(isset($_POST['submit'])){
		$user = $_POST['epf'];
		$password = $_POST['password'];

		$password = md5($_POST['password']);

		include 'inc/config.php';

		$sql = "SELECT * FROM users WHERE epf = '$user' AND password = '$password'";

		$run = mysqli_query($con,$sql);
		$check = mysqli_num_rows($run);

		$name = $_GET['name'];

		if($check == 1){
			session_start();
			$_SESSION['epf'] = $user;
			
			echo "<script> 
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('EPF Number or Password Invaild');
			window.open('index.php','_self');
			</script>";
		}
	}

 ?>