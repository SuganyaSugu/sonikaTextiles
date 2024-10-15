<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>Sonika Textiles BO</title>
   <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png');?>">
    <link href="<?= base_url('dist/css/style.min.css')?>" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper  bg-dark d-flex no-block justify-content-center align-items-center">
            <div class="auth-box border-top border-secondary">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <span class="db">BACKOFFICE</span>
                    </div>
                    <!-- Form -->                    
                    <?php if (session()->has('errors')) : ?>
                        <div class="alert alert-danger">
                                <?php foreach (session('errors') as $error) : ?>
                                    <div><?= esc($error) ?></div>
                                <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <?= form_open(route_to('login')); ?>
                    <div class="row pb-4">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <?= form_input('username', '', 'id="username"  class="form-control form-control-lg" placeholder="'.lang('Login.userName') .'" aria-label="Username" aria-describedby="basic-addon1" '); ?>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <?= form_password('password', '', 'id="password" class="form-control form-control-lg" placeholder="'.lang('Login.password') .'" aria-label="Password" aria-describedby="basic-addon1" '); ?>
                            </div>
                        </div>
                    </div>                        
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="pt-3">
                                    <?= form_submit('submit', 'Login', 'class="btn btn-success float-end text-white"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <script>

    $(".preloader").fadeOut();
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>

</body>
</html>