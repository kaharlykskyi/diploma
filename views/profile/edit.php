<?php include_once(ROOT."/views/layouts/header.php"); ?>
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Настройки</h3>
                    <p class="panel-subtitle">Добавьте больше информации о себе в профиль</p>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <form method="post" action="#">
                            <div class="form-group">
                                <p>Имя</p>
                                <input type="text" class="form-control" value="<?=$user['name'];?>" name="name">
                            </div>
                            <div class="form-group">
                                <p>Фамилия</p>
                                <input type="text" class="form-control" value="<?=$user['surname'];?>" name="surname">
                            </div>
                            <div class="form-group">
                                <p>Дата рождения</p>
                                <input type="date" class="form-control" value="" name="bdate">
                            </div>
                            <div class="form-group">
                                <p>Cтрана</p>
                                <select name="country" class="form-control">
                                    <?php
                                        foreach ($countries as $items) {
                                            foreach ($items as $country){
                                                echo "<option value='".$country->title."'>".$country->title."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Город</p>
                                <input type="text" class="form-control" name="city" value="" >
                            </div>
                            <div class="form-group">
                                <p>Ваш номер телефона</p>
                                <input type="tel" class="form-control" name="phone" value="">
                            </div>
                            <div class="form-group">
                                <p>Ссылка на Вконтакте</p>
                                <input type="url" class="form-control" name="vk" value="">
                            </div>
                            <div class="form-group">
                                <p>Ссылка на Facebook</p>
                                <input type="url" class="form-control" name="fb" value="">
                            </div>
                            <div class="form-group">
                                <p>Ссылка Google+</p>
                                <label for="google" class="control-label sr-only"></label>
                                <input type="url" class="form-control" id="google" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <p>Ссылка Twitter</p>
                                <label for="twitter" class="control-label sr-only"></label>
                                <input type="url" class="form-control" id="twitter" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <p>О себе</p>
                                <textarea id="text_area" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-footer">
                        <button type="submit" class="btn btn-primary btn-md">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="/template/assets/vendor/jquery/jquery.min.js"></script>
<script src="/template/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/template/assets/scripts/klorofil-common.js"></script>
<script src="/template/assets/vendor/jquery/jquery.min.js"></script>
<script src="/template/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
</body>

</html>

