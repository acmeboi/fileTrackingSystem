
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/logo.png">

        <title>File Tracking System </title>
        <!-- Vendors Style-->
        <?php include './stylesheet.php'; ?>
    </head>
    <?php
        $urlData = filter_input_array(INPUT_GET);
        if(isset($urlData['responCode']) && $urlData['responCode'] == '202') {
    ?>
    <script>
        alert("Invalid Username or Password");
        window.location = 'index.php';
    </script>
    <?php
        }
    ?>
    <body class="hold-transition theme-primary bg-img" style="background-image: url(images/auth-bg/bg-16.jpg)">

        <div class="container h-p100">
            <div class="row align-items-center justify-content-md-center h-p100">	

                <div class="col-12">
                    <div class="row justify-content-center g-0">
                        <div class="col-lg-5 col-md-5 col-12">
                            <div class="bg-white rounded10 shadow-lg">

                                <div class="content-top-agile p-20 pb-0">
                                    <div class="logo-lg">
                                        <span class="light-logo"><img src="images/acc.png" style="width: 250px; height: 180px;" alt="logo"></span>
                                    </div>
                                    <p class="mb-0 text-fade">Sign in to continue to File Tracking System.</p>							
                                </div>
                                <div class="p-40">
                                    <form class="form-horizontal form-element" role="form" action="check_login.php" method="post">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-transparent"><i class="text-fade ti-user"></i></span>
                                                <input type="text" class="form-control ps-15 bg-transparent" placeholder="Username" name="staffID" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text  bg-transparent"><i class="text-fade fa fa-lock"></i></span>
                                                <input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="basic_checkbox_1" >
                                                    <label for="basic_checkbox_1">Remember Me</label>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary w-p100 mt-10"  name="login" >SIGN IN</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>	
                                </div>						
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vendor JS -->
        <script src="src/js/vendors.min.js"></script>
        <script src="src/js/pages/chat-popup.js"></script>
        <script src="assets/icons/feather-icons/feather.min.js"></script>	

    </body>
</html>
