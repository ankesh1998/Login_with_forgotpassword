<?php
require_once('dbcon.php');
?>
<head>
   
    <title>Forgot Password</title>
     <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
   
<style>
 input {
 
    font-family: FontAwesome, "Open Sans", Verdana;
}
</style>
</head>

<body>
      
      <div class="container">
    <div class="row row-style">
        <div class="col-md-4 col-md-push-4">
            <div class="panel panel-primary" style="margin-top: 120px;margin-left: 10px">
                 <div class="panel-heading" align="center" style="font-family:Georgia;letter-spacing:2px">WELCOME</div>
                 <div class="panel-body">
                        <form method="post" action="">
                        <div class="form-group">
                            <div >
                            <input type="text" class="form-control" name="username" placeholder="&#xf007;  Enter Username OR Email-Id" autofocus='autofocus' style="border-radius: 20px;" required="" >
                            </div>
                        </div>
                      
                        <button class="btn btn-primary submit btn-block" type="submit" name="forgot_password" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; Forgot Password
                        </button>
                        		<?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
						</form>
<?php 
if(isset($_POST['forgot_password'])){
	$username = mysqli_real_escape_string($con, $_POST['username']);

	$sql = "SELECT username,email_id,password FROM `user` WHERE username = '$username' OR email_id='$username'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email_id'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login " . $password;
		$headers = "From : ankeshofficial18@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			$success = "<span style='color:red;'>Your password is successfully sent to your Email-Id. </span>";
  			 header('location: forgot_password.php?error=' . $success);
		}else{
			$error = "<span style='color:red;'>Unable to recover your Password. </span>";
  			 header('location: forgot_password.php?error=' . $error);
		}

	}else{
		$error = "<span style='color:red;'>Incorrect Credentials. </span>";
  			 header('location: forgot_password.php?error=' . $error);
		
	}
}


?>

				</div>
 				<div class="panel-footer">
                    
                    <a href="index.php" class="text-primary" style="text-decoration: none;"> Login?</a>
                   
				</div>  
			</div>
		</div>
	</div>
</div>

</body>

</html>

      