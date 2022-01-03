<?php
include 'admin/include/function/conn.php';
session_start();
if (isset($_SESSION['user']))
 {
    header("location:index.php");
    # code...
}



  ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background-image: none;background-color: #111111;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                         
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" style="background-color: #111111">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
         var check=false;
        $('form').on('submit', function(event) {
            event.preventDefault();
            inputs=document.querySelectorAll('input');
            let data={};
            for (let i = 0; i < inputs.length; i++) 
            {
                let input=inputs[i];
                if (input.value.length==0) 
                {
                    input.style.border = '2px solid red';
                }
                else
                {
                    input.style.border = '1px solid #d1d3e2';
                   
                }


            }
             if (validateEmail(inputs[0].value)&&inputs[1].value.length>=8) 
             {
                    data={email:inputs[0].value,password:inputs[1].value}
                    $.post('include/function/getUser.php',data, function(data)
                     {
                        if (data=="1")
                         {
                             location.href='index.php';
                        }
                        else
                        {
                            if (check==false) {
                           inputs[1].parentElement.insertAdjacentHTML('afterend','<div class="alert bg-danger alert-icon-split" style="color: #fff;border-radius: 10rem;"><span class="icon text-white-50"></span><span class="text">Wrong Email Or Password</span></div>')
                           check=true
                           inputs[0].value=""; 
                           inputs[1].value=""; 
                       }
                           else
                           {
                            inputs[0].value=""; 
                            inputs[1].value=""; 
                           }
                        }
                    });
                }else
                {   
                    if (check==false) {
                        inputs[1].parentElement.insertAdjacentHTML('afterend','<div class="alert bg-danger alert-icon-split" style="color: #fff;border-radius: 10rem;"><span class="icon text-white-50"></span><span class="text">Wrong Email Or Password</span></div>')
                        check=true
                        console.log(check)
                    }
                    
                }
        });
        function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
        
 
    </script>

</body>

</html>