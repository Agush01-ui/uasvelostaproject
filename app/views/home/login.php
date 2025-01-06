<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Velosta</title>
    <link rel="shortcut icon" href="<?= BASEURL ?>/assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= BASEURL ?>/assets/images/fav.jpg">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/assets/css/style.css" />
</head>

<body class="form-login-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto login-desk">
                <div class="row">
                    <div class="col-md-7 detail-box">
                        <img class="logo" src="<?= BASEURL ?>/home/img/logo.png" alt="">
                        <div class="detailsh">
                            <img class="help" style="height: 300px;object-fit: cover;" src="<?= BASEURL ?>/home/img/cr1.png" alt="">
                            <h3>Velosta</h3>
                        </div>
                    </div>
                    <div class="col-md-5 loginform">
                        <h4>Selamat Datang</h4>
                        <p>Silahkan Login</p>
                        <div class="login-det">
                            <form method="post" action="<?= BASEURL; ?>/home/dologin">
                                <div class="form-row">
                                    <label for="">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-user text-dark"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" aria-label="Username" aria-describedby="basic-addon1" style="color: black !important;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-lock text-dark"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control text-dark" name="password" aria-label="Username" aria-describedby="basic-addon1" style="color: black !important;">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-danger" name="simpan">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?= BASEURL ?>/assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= BASEURL ?>/assets/js/popper.min.js"></script>
<script src="<?= BASEURL ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= BASEURL ?>/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="<?= BASEURL ?>/assets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="<?= BASEURL ?>/assets/js/script.js"></script>

</html>