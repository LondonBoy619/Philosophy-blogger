<?php
   	include($_SERVER['DOCUMENT_ROOT']."/includes/connect.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/query_functions.php');
   	
	
	
	if(isset($_POST['submitted'])){
        if(!isset($_FILES[audio]['name'])){
            $audio = 'none';
        }
        else $audio = $_FILES['audio']['name'];
	$image=$_POST['image'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$title = $_POST['title'];
	$body = $_POST['body'];
	$cat = $_POST['cat'];
		if(checkUser($username, $password)){
        $image = $_FILES['image']['name'];
        
        addPost($username, $password, $email, $title, $body, $cat, $audio, $image);
		
		$ftp_server = "ftpupload.net";
		$ftp_username   = "epiz_27878453";
		$ftp_password   =  "londonboy770";

		// setup of connection
		$conn_id = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

		// login
		if (@ftp_login($conn_id, $ftp_username, $ftp_password))
			{
				echo "Connected as $ftp_username@$ftp_server\n";
			}
		else
			{
				echo "Could not connect as $ftp_username !!\n";
			}
		echo "please keep this page open, article files are being uploaded!!";
		$file = $_FILES["audio"]["name"];
		$file_source = $_FILES["audio"]["tmp_name"];
		echo $file;
		echo $file_source;
		$remote_file_path = "/htdocs/media/audio/" . $file;
		ftp_put($conn_id, $remote_file_path, $file_source, FTP_BINARY);
		
		echo "done uploading audio, now image";
		
		$image = $_FILES["image"]["name"];
		$image_source = $_FILES["image"]["tmp_name"];
		echo $image;
		echo $image_source;
		$remote_file_path = "/htdocs/images/" . $image;
		ftp_put($conn_id, $remote_file_path, $image_source, FTP_BINARY);
		
		ftp_close($conn_id);
		echo "done uploading files, you're free to close this tab now";
		echo "\n\nConnection Closed!!";
        header("Location: ../index.php");
	}
	else
		echo "<h1>The username or password are incorrect!!!</h1>";
	}

   	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Article Submission Form">
    <meta name="author" content="LondonBoy">

    <!-- Title Page-->
    <title>Submit Your Article</title>

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
                    <h2 class="title">Article Submission Form</h2>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" name="form_submit" method="post">
						<input type="hidden" name="submitted" value="1">
                        <div class="form-row">
                            <div class="name">User name</div>
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

                        <div class="form-row">
                            <div class="name">Email address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" placeholder="example@email.com">
									<div class="label--desc">*Be sure to use your primary email address</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
							<div class="name">Title</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="title" placeholder="Article's title">
                            </div>
                            <div class="name">Body</div>
                            <div class="value">
								<textarea class="input--style-6" name="body" placeholder="Compose an epic article..."></textarea><br>
                            </div>
							<div class="name">Category</div>
                            <div class="value">
                                <select class="input--style-6" name="cat">
									<option value="1">Texts</option><option value="3">Podcasts</option><option value="2">Physical Health</option><option value="4">Tech</option>
								</select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Audio file</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="audio" accept="audio/*">
                                </div>
                                <div class="label--desc">*In case of a podcast</div><br>
                            </div>
							<div class="name">Header image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="image" accept="image/*">
                                </div>
                            </div>
                        </div>
						<div class="card-footer">
							<input class="btn btn--radius-2 btn--blue-2" value="Go For It!!" type="submit">
					<div class="label--desc">*You will be contacted by email if your article has been accepted<br>Hold on to it !</div><br>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
</body>

</html>