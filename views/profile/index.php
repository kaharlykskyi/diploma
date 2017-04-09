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
										<img src="../../template/assets/img/user-medium.png" class="img-circle" alt="Avatar">
										<h3 class="name"><?php echo $user['name'].'&nbsp;'.$user['surname'];?></h3>
										<span class="online-status status-available">Online</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-6 stat-item">
												<b>12</b> <span>Комментариев</span>
											</div>
											<div class="col-md-6 stat-item">
												<b>8</b> <span>Прогнозов</span>
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
                                            <li>Email <span><?=$user['email'];?></span></li>
											<li>Дата рождения
                                                <span>
                                                   <?php
                                                   if ($user_info['bdate'] == '') {
                                                       echo 'Не указан';
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
                                                            echo 'Не указан';
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
                                                        echo 'Не указан';
                                                    } else {
                                                        echo $user_info['country'];
                                                    }

                                                    ?>
                                                </span>
                                            </li>
                                            <li>Город
                                                <span>
                                                    <?php
                                                    if ($user_info['city'] == '') {
                                                        echo 'Не указан';
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
                                                        echo 'Не указан';
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
                                                    echo "<p><a href='/profile/edit'>  Добавить соц. сеть</a></p>";
                                                }
                                            ?>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">Обо мне</h4>
										<p><?=$user_info['about']?></p>
									</div>
									<div class="text-center"><a href="/profile/edit" class="btn btn-primary">Изменить</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">Новости</h4>
								<!-- AWARDS -->

								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Футбол</a></li>
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Теннис</a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">

									</div>
									<div class="tab-pane fade" id="tab-bottom-left2">
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Title</th>
														<th>Progress</th>
														<th>Leader</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="#">Spot Media</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																	<span>60% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="../../template/assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">E-Commerce Site</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
																	<span>33% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="../../template/assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-warning">PENDING</span></td>
													</tr>
													<tr>
														<td><a href="#">Project 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;">
																	<span>68% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="../../template/assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">Wordpress Theme</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
																	<span>75%</span>
																</div>
															</div>
														</td>
														<td><img src="../../template/assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">Project 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>100%</span>
																</div>
															</div>
														</td>
														<td><img src="../../template/assets/img/user1.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Antonius</a></td>
														<td><span class="label label-default">CLOSED</span></td>
													</tr>
													<tr>
														<td><a href="#">Redesign Landing Page</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>100%</span>
																</div>
															</div>
														</td>
														<td><img src="../../template/assets/img/user5.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Jason</a></td>
														<td><span class="label label-default">CLOSED</span></td>
													</tr>
												</tbody>
											</table>
										</div>
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
	<script src="../../template/assets/vendor/jquery/jquery.min.js"></script>
	<script src="../../template/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../../template/assets/scripts/klorofil-common.js"></script>
</body>

</html>
