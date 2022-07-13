<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Article Submission Form">
    <meta name="author" content="LondonBoy">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Title Page-->
    <title>Sign in to Philosophy</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/article.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w960">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Login with an existing account</h2>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" name="form_submit" method="post">
							<?php
   	include($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/query_functions.php');
	if(checkCookie('logged_in')){
		header('location: index.php');
	}
   	
	if(isset($_POST['submitted'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(checkUser($username, $password)){
			createCookie();
			header('location: index.php');
		}
		else{
			echo '<div class="alert alert-danger" role="alert">Username or password is wrong, please check inputs!!</div>';
			//echo "<h1>Your username or password is wrong</h1>";
		}
	}
?>
                        <div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="username" placeholder="Username goes here" required>
								<div class="label--desc">*This name would be used as the 'Author Name' in the article</div><br>
                            </div>
							<div class="name">Password</div>
                            <div class="value">
                                <input class="input--style-6" type="password" name="password" placeholder="password goes here">
								<div class="label--desc">*Your password is first assigned when your first article is published</div>
                            </div>
                        </div>
						<div class="card-footer">
							<input class="btn btn--radius-2 btn--blue-2" value="Continue your journey" type="submit">
                            <center><a href="create_acc.php"><h5>Haven't started your journey yet? Click here to get your free ticket!</h5></a></center>
                </div>
						<input type="hidden" name="submitted" value="1">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>

<!-- Initialize Quill editor -->
</body>

</html>