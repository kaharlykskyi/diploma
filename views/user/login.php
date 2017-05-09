<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Войти | SPORT INFO</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="/template/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/template/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/template/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/template/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="/template/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="/template/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/template/assets/img/favicon.png">
    <style type="text/css">
        #page-preloader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: #FFF;
            z-index: 100500;
        }
        #page-preloader .spinner {
            width: 120px;
            height: 120px;
            position: absolute;
            left: 50%;
            top: 50%;
            background: url('/template/assets/img/ring.gif') no-repeat 50% 50%;
            margin: -60px 0 0 -60px;
    </style>
</head>

<body>
<div id="page-preloader"><span class="spinner"></span></div>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><a href="/"><img src="/template/assets/img/logo-dark.png" alt="Logo"></a></div>
								<p class="lead">Вход</p>
                                <?php
                                if (isset($errors) && is_array($errors)):
                                    foreach($errors as $error):?>
                                        <p style="color: red;"><?php echo $error; ?></p>
                                    <?php endforeach;
                                endif;
                                ?>
							</div>

							<form class="form-auth-small" action="#" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="signin-email" value="" placeholder="Email" name="email" required>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" value="" placeholder="Пароль" name="password" required>
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Запомнить меня</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">ВОЙТИ</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="/register">Зарегистрироваться?</a></span>
								</div>
							</form>

						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
<script src="/template/assets/vendor/jquery/jquery.min.js"></script>
<script src="/template/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(window).on('load', function () {
        var $preloader = $('#page-preloader'),
            $spinner   = $preloader.find('.spinner');
        $spinner.fadeOut();
        $preloader.delay(250).fadeOut('slow');
    });
</script>

</html>
