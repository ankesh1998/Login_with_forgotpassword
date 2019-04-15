<?php
include('dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Index Page</title>
     <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
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
                            <input type="text" class="form-control" name="username" placeholder="&#xf007;  Username" autofocus='autofocus' style="border-radius: 20px;" required />
                            </div>
                        </div>
                <div class="form-group">
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="&#xf084;  Password" style="border-radius: 20px;" onmouseover="this.type='text'" onmousedown="this.type='password'" onmouseout="this.type='password'" required />
                    </div>
                 </div>

                            <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                            </div>
                             <div>
                                <button class="btn btn-primary submit btn-block" type="submit" name="login" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; SIGN IN</button>
                                <?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
                            </div>
               
                        </form>
<?php
if (isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$login_query=mysqli_query($con,"select * from user where username='$username' and password='$password'");
$count=mysqli_num_rows($login_query);
$row=mysqli_fetch_array($login_query);

if (($count > 0)){
$_SESSION['id']=$row['user_id'];
header("location:home.php");
}else{ 
echo 
   $error = "<span style='color:red;'>Incorrect Login Details </span>";
   header('location: index.php?error=' . $error);

}
}
?>
                 </div>
                 
                 <div class="panel-footer">
                    
                    <a href="forgot_password.php" class="text-primary" style="text-decoration: none;"> Forgot Password?</a>
                   
                 </div>  
               
            </div>
        </div>
    </div>
</div>

</body>

</html>
