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
    <body>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Assignment 02</a>
            <ul class="nav justify-content-end">
                <?php 
                    if(isset($_COOKIE['session_cookie'])) 
                    {
                        echo "<li class='nav-item'>
                                <a class='nav-link active' href='logout.php'>Logout</a>
                            </li>";
                    }
                ?>
            </ul>
        </nav>
        <div class="container">
            <div class="row" align="center" style="padding-top: 100px;">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Update Profile</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <script>
                                        //this function will retrive the CSRF token from the CSRF cookie
                                        function getCookie(cname) 
                                        {
                                            var name = cname + "=";
                                            var decodedCookie = decodeURIComponent(document.cookie);
                                            var ca = decodedCookie.split(';');
                                            for(var i = 0; i <ca.length; i++) 
                                            {
                                                var c = ca[i];
                                                while (c.charAt(0) == ' ') 
                                                {
                                                    c = c.substring(1);
                                                }
                                                if (c.indexOf(name) == 0) 
                                                {
                                                    return c.substring(name.length, c.length);
                                                }
                                            }
                                            return "";
                                        }
                                        //this function set hidden CSRF input's value in the form 
                                        function submitForm(oFormElement)
                                        {
                                            document.getElementById("csrf_Token").value=getCookie("csrf_token");

                                        }
                                    </script>

                                    <?php
                                        //check whether user loged in or not 
                                        if(isset($_COOKIE['session_cookie'])) 
                                        {
                                            echo "
                    						<form method='post' action='endpoint.php' onsubmit='submitForm(this);'>
                                                <!-- CSRF Token -->
                                                    <input type='hidden' name='csrf_Token' id='csrf_Token' value=''>   
                                                <!--  -->	
                                                <div class='form-group row'>
                                                	<label for='name' class='col-sm-2 col-form-label'>Full Name</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='name' name='name' placeholder='Full Name' required>
                                                </div>
                                                </div>
                                              
                                              	<div class='form-group row'>
                                                    <label for='university' class='col-sm-2 col-form-label'>University</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='university' name='university' placeholder='University' required>
                                                </div>
                                              	</div>
                    							
                    							<div class='form-group row'>
                                                    <label for='degree' class='col-sm-2 col-form-label'>Degree</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='degree' name='degree' placeholder='Degree' required>
                                                </div>
                                              	</div>

                                              	<div class='form-group row'>
                                                    <label for='year' class='col-sm-2 col-form-label'>Year</label>
                                                <div class='col-sm-10'>
                                                    <input type='number' class='form-control' id='year' name='year' placeholder='Year' required>
                                                </div>
                                              	</div>

                                                                
                                                <button type='submit' class='btn btn-primary' >Submit</button>
                                           </form>";
                                        }
                                    ?>
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