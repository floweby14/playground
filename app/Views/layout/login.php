<!DOCTYPE html>
<html class="no-js" lang="en">

    <head>

        <!-- Meta -->

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=Edge">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Title & Icon -->

            <title>Login</title>
            <link rel="icon" href="<?= base_url('assets') ?>/images/logo.svg" type="image/x-icon">
        
        <!-- Links -->

            <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css">
            <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/charts-c3/plugin.css">
            <link rel="stylesheet" href="<?= base_url('assets') ?>/extensions/@fortawesome/fontawesome-free/css/all.min.css">
            <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/morrisjs/morris.min.css">
            <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.min.css">

        <!-- Function -->

            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>

    <body class="theme-blush">
        
        <div class="authentication">

            <div class="container">

                <div class="row">

                    <div class="col-lg-4 col-sm-12">

                        <form class="card auth_form" action="<?= base_url('/home/aksi_login/')?>" method="POST">
    
                            <div class="header">

                                <img class="logo" src="<?= base_url('assets') ?>/images/logo.svg" alt="">
                                <h5>Log in</h5>

                            </div>

                            <div class="body">

                                <div class="input-group mb-3">

                                    <input type="text" class="form-control" placeholder="Username" name="username" required>

                                    <div class="input-group-append">

                                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>

                                    </div>

                                </div>

                                <div class="input-group mb-3">

                                    <input type="password" class="form-control" placeholder="Password" name="password" required>

                                    <div class="input-group-append">

                                        <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>

                                    </div>

                                </div>

                                <div class="g-recaptcha" data-sitekey="6Le4D6snAAAAAHKAJFOOLbLc17nMTBTF6Ze12hWG"></div>

                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light" id="login">SIGN IN</button>

                                <div class="signin_with mt-3"></div>

                            </div>

                        </form>

                        <!-- <a href="/home/register_user" class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-md btn-secondary btn-block waves-effect waves-light">REGISTER</button>
                        </a> -->
    
                    </div>

                    <div class="col-lg-8 col-sm-12">

                        <div class="card">

                            <img src="<?= base_url('assets') ?>/images/signin.svg" alt="Sign In"/>

                        </div>

                    </div>

                </div>

            </div>
            
        </div>

        <!-- Jquery Core Js -->

            <script src="<?= base_url('assets') ?>/bundles/libscripts.bundle.js"></script>
            <script src="<?= base_url('assets') ?>/bundles/vendorscripts.bundle.js"></script>

        <!-- Custom JS -->

            <script>

                $(document).on('click', '#login', function() {

                    var response = grecaptcha.getResponse();

                    if (response.length == 0) {

                        alert('Dimohon untuk melakukan verifikasi captcha.');
                        return false;

                    }

                })

            </script>

    </body>