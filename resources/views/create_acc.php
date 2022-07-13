<!DOCTYPE html>
<?php
   	include($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/query_functions.php');
   	
	if(isset($_POST['submitted'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$re_password = $_POST['re_pass'];
		$email = $_POST['email'];
	
		if(checkUser($username, $password)){
			echo "The username $username is already taken, please choose another!";
		}
		else if($password != $re_password){
			echo "The passwords don't match";
		}
		else{
			addUser($username, $password, $email);
			header("Location: index.php");
		}
	}
?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Article Submission Form">
    <meta name="author" content="LondonBoy">

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
                    <h2 class="title">Create an account on Philosophy</h2>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" name="form_submit" method="post">
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
							<div class="name">Re-Password</div>
                            <div class="value">
                                <input class="input--style-6" type="password" name="re_pass" placeholder="re-type your password">
								<div class="label--desc">*Please make sure the passwords match</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" placeholder="example@email.com">
									<div class="label--desc">*Be sure to use your primary email address</div>
                                </div>
                            </div>
                        </div>
                        
                        
						<div class="card-footer">
							<input class="btn btn--radius-2 btn--blue-2" value="Begin your journey on Philosophy" type="submit">
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