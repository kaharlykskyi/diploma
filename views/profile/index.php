<?php include_once(ROOT.'/views/layouts/header.php'); ?>

		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
                                        <div class="profile-img">
                                            <a href="/profile/edit"><img src="<?=$large_avatar_url?>" class="img-circle" alt="Avatar"></a>
                                        </div>
										<h3 class="name"><?php echo $user['name'].'&nbsp;'.$user['surname'];?></h3>
										<span class="online-status status-available">Online</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-12 stat-item">
												<span class="text-center">На сайте <b><?=$reg_date;?></b> дней</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Основная информация</h4>
										<ul class="list-unstyled list-justify">
                                            <li>Статус
                                                <span>
                                                    <?php
                                                        if ($user['role'] == 'admin') echo "Администратор"; else echo "Пользователь";
                                                    ?>
                                                </span>
                                            </li>
                                            <li>Email <span><?=$user['email'];?></span></li>
											<li>Дата рождения
                                                <span>
                                                   <?php
                                                   $notificationsCounter = 0;
                                                   if ($user_info['bdate'] == '') {
                                                       echo '<a href="/profile/edit">Не указан</a>';
                                                   } else {
                                                       echo Profile::toDate($user_info['bdate']);
                                                   }

                                                   ?>
                                                </span>
                                            </li>
                                            <li>Телефон
                                                <span>
                                                    <?php
                                                        if ($user_info['mobile'] == '') {
                                                            echo '<a href="/profile/edit">Не указан</a>';
                                                        } else {
                                                            echo $user_info['mobile'];
                                                        }

                                                    ?>
                                                </span>
                                            </li>
                                            <li>Страна
                                                <span>
                                                    <?php
                                                    if ($user_info['country'] == '') {
                                                        echo '<a href="/profile/edit">Не указан</a>';
                                                    } else {
                                                        echo $flag_url;
                                                        echo $user_info['country'];
                                                    }

                                                    ?>
                                                </span>
                                            </li>
                                            <li>Город
                                                <span>
                                                    <?php
                                                    if ($user_info['city'] == '') {
                                                        echo '<a href="/profile/edit">Не указан</a>';
                                                    } else {
                                                        echo $user_info['city'];
                                                    }

                                                    ?>
                                                </span>
                                            </li>
                                            <li>Skype
                                                <span>
                                                    <?php
                                                    if ($user_info['skype'] == '') {
                                                        echo '<a href="/profile/edit">Не указан</a>';
                                                    } else {
                                                        echo $user_info['skype'];
                                                    }

                                                    ?>
                                                </span>
                                            </li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">Социальные сети</h4>
										<ul class="list-inline social-icons">
                                            <?php
                                                if (!$user_info['vk'] == '') {
                                                    echo "<li><a href=".$user_info['vk']." target='_blank' class=\"github-bg\"><i class=\"fa fa-vk\"></i></a></li>";
                                                }
                                                if (!$user_info['fb'] == '') {
                                                    echo "<li><a href=".$user_info['fb']." target='_blank' class=\"facebook-bg\"><i class=\"fa fa-facebook\"></i></a></li>";
                                                }
                                                if (!$user_info['twitter'] == '') {
                                                    echo "<li><a href=".$user_info['twitter']." target='_blank' class=\"twitter-bg\"><i class=\"fa fa-twitter\"></i></a></li>";
                                                }
                                                if (!$user_info['google'] == '') {
                                                    echo "<li><a href=".$user_info['google']." target='_blank' class=\"google-plus-bg\"><i class=\"fa fa-google-plus\"></i></a></li>";
                                                }
                                                if ($user_info['vk'] == '' && $user_info['fb'] == '' && $user_info['twitter'] == '' && $user_info['google'] == '') {
                                                    echo "&nbsp;<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>&nbsp;<a href='/profile/edit/#about'>Добавить социальные сети</a>";
                                                }
                                            ?>
										</ul>
									</div>
                                    <div class="profile-info">
                                        <h4 class="heading">Интересы</h4>
                                        <p><?php
                                                $interests = unserialize($user_info['interests']);
                                                if (empty($interests)) {
                                                    echo "<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>&nbsp;<a href='/profile/edit'>Добавить интересы</a>";
                                                } else {
                                                    foreach ($interests as $interes){
                                                        if ($interes == end($interests)) {echo $interes;}
                                                        else {echo $interes.', ';}
                                                    }
                                                }
                                            ?>
                                        </p>
                                    </div>
									<div class="profile-info">
										<h4 class="heading">Обо мне</h4>
										<p><?=$user_info['about']?></p>
									</div>

								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">Интерактивная лента</h4>
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav news" role="tablist">
                                        <?php if (!empty($interests)): ?>
                                            <?=in_array("Футбол", $interests) ? "<li><a href=\"#tab-bottom-left1\" role=\"tab\" data-toggle=\"tab\">Футбол</a></li>" : ""?>
                                            <?=in_array("Теннис", $interests) ? "<li><a href=\"#tab-bottom-left2\" role=\"tab\" data-toggle=\"tab\">Теннис</a></li>" : ""?>
                                            <?=in_array("Хоккей", $interests) ? "<li><a href=\"#tab-bottom-left3\" role=\"tab\" data-toggle=\"tab\">Хоккей</a></li>" : ""?>
                                            <?=in_array("Баскетбол", $interests) ? "<li><a href=\"#tab-bottom-left4\" role=\"tab\" data-toggle=\"tab\">Баскетбол</a></li>" : ""?>
                                            <?=in_array("Бокс", $interests) ? "<li><a href=\"#tab-bottom-left5\" role=\"tab\" data-toggle=\"tab\">Бокс</a></li>" : ""?>
                                        <?php endif; ?>
                                        <li><a href="#tab-bottom-left6" role="tab" data-toggle="tab">Анализ</a></li>
									</ul>
								</div>
								<div class="tab-content news">
                                    <?php if (!empty($interests)): ?>
                                        <?=in_array("Футбол", $interests) ? "<div class=\"tab-pane fade\" id=\"tab-bottom-left1\">$football_news</div>" : ""?>
                                        <?=in_array("Теннис", $interests) ? "<div class=\"tab-pane fade\" id=\"tab-bottom-left2\">$tennis_news</div>" : ""?>
                                        <?=in_array("Хоккей", $interests) ? "<div class=\"tab-pane fade\" id=\"tab-bottom-left3\">$hockey_news</div>" : ""?>
                                        <?=in_array("Баскетбол", $interests) ? "<div class=\"tab-pane fade\" id=\"tab-bottom-left4\">$basketball_news</div>" : ""?>
                                        <?=in_array("Бокс", $interests) ? "<div class=\"tab-pane fade\" id=\"tab-bottom-left5\">$boxing_news</div>" : ""?>
                                    <?php endif; ?>
                                    <div class="tab-pane fade" id="tab-bottom-left6">
                                            <p>В разработке :)</p>

                                    </div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->

	<script src="/template/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/template/assets/scripts/klorofil-common.js"></script>
    <script>

        $(document).ready(function(){
            $('div.rn_full img').each(function () {
                var href = 'https://www.livesport.ru';
                href += $( this ).attr("src");
                $( this ).attr("src", href);
            });

            $('div.rn_lenta a').each(function () {
                var href = 'https://www.livesport.ru';
                href += $( this ).attr("href");
                $( this ).attr("href", href);
                $( this ).attr("target", "_blank");
            });

            $('div.rn_full a').each(function () {
                var href = 'https://www.livesport.ru';
                href += $( this ).attr("href");
                $( this ).attr("href", href);
                $( this ).attr("target", "_blank");
            });

            $('ul.news li:first').addClass('active');
            $('div.news div:first').addClass('in active');
            $('a.lista, a.list, a.list_r, div.pro30').addClass('hidden');

            if ($(window).width() < 640) {
                $('div.rn_full').addClass('hidden');
            }


            if ($(window).width() < 380) {
                $('div.rn_lenta a').addClass('small_font');
                $('div.panel-profile').addClass('fixedmr');
            } else {
                $('div.rn_lenta a').removeClass('small_font');
                $('div.panel-profile').removeClass('fixedmr');
            }


        });
    </script>
</body>

</html>
