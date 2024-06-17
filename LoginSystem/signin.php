<?php
    session_start();
    include("database.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Minimal and Clean Sign up / Login and Forgot Form by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- Start Sign In Form -->
					<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="fh5co-form animate-box" data-animate-effect="fadeIn">
						<h2>Sign In</h2>
						<p style="color: red"><?php echo isset($_SESSION['error-pass']) ? $_SESSION['error-pass'] : "" ?></p>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
						</div>
						<div class="form-group">
							<p>Not registered? <a href="sign-up.php">Sign Up</a></p>
						</div>
						<div class="form-group">
							<input type="submit" name="sign-in" value="Sign In" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->

				</div>
			</div>
		</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>


	</body>
</html>
<?php 
    if(isset($_SERVER["REQUEST_METHOD"]) != "POST") return;

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

    $select_all_username = $pdo->prepare("SELECT * FROM `users` WHERE username = :username");
    $select_all_username->bindParam(":username", $username);
    $select_all_username->execute();
    $result = $select_all_username->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result) > 0){
        unset($_SESSION['error-username']);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(password_verify($password, $result[0]["password"])){
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            header("location: ../Homepage/index.php");
            return;
        }else{
            $_SESSION['error-pass'] = "Username or password incorrect";
            header("location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
            return;
        }
    }else{
        $_SESSION['error-username'] = "Username or password incorrect";
        return;
    }
?>