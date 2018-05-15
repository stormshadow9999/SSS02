<!doctype html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Assigment_02</title>
    
    <link rel="stylesheet"  href="/Assigment_02/public/css/bootstrap.min.css">    
    <script src="/Assigment_02/public/js/jquery-3.3.1.min.js"></script>
  </head>
  <body >
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Assignment 02</a>
      <ul class="nav justify-content-end">
      </ul>
    </nav>
    <div class="container">
      <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">
          <div class="card">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <form action='login.php' method='POST' enctype='multipart/form-data'>
                    <div class="form-group row">
                      <label for="Email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                    </div>        
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Login</button>
                  </form>
                </div>
                <div class="col-sm-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="/Assigment_02/public/js/bootstrap.min.js"></script>
    <script src="/Assigment_02/public/js/popper.min.js"></script>
  </body>
</html>

<?php
	// check whether login button is pressed
  if(isset($_POST['submit']))
  {
    //if pressed execute login function
		login();
	}
?>

<?php
	function login()
	{
    //hardcoded credentials
		$email='shadow@gmail.com';
		$password='shadow';

		$input_email = $_POST['email'];
		$input_pwd = $_POST['password'];
		//check whether credentials match
		if(($input_email == $email)&&($input_pwd == $password))
		{
      //start session
			session_set_cookie_params(300);
			session_start();
			session_regenerate_id();
		  //set session cookie
			setcookie('session_cookie', session_id(), time() + 300, '/');
      //generate CSRF Token
			$token = generate_token();
      //set CSRF cookie with secure flag set
      setcookie('csrf_token', $token, time() + 300, '/','www.assignment02.com',true);
			//rdirect to profile.php
			header("Location:profile.php");
   		exit;		
		}
		else
		{
      //if credentials doesn't match
			echo "<script>alert('email password are not a match!')</script>";
		}
	}
	
  function generate_token()
	{
    //generate CSRF token and return it
	  return sha1(base64_encode(openssl_random_pseudo_bytes(30)));
	}


?>
