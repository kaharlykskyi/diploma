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
                        <form method="POST" action="#">
                            <div class="form-group">
                                <p>Имя</p>
                                <input type="text" tabindex="1" class="form-control" value="<?=$user['name'];?>" name="name" required>
                            </div>
                            <div class="form-group">
                                <p>Фамилия</p>
                                <input type="text" tabindex="2" class="form-control" value="<?=$user['surname'];?>" name="surname" required>
                            </div>
                            <div class="form-group">
                                <p>Дата рождения</p>
                                <input type="date" tabindex="3" class="form-control" value="<?=$user_info['bdate'];?>" name="bdate">
                            </div>
                            <div class="form-group">
                                <p>Cтрана</p>
                                <select name="country" tabindex="4" class="selectpicker" data-live-search="true">
                                    <?php
                                        foreach ($countries as $items) {
                                            foreach ($items as $country){
                                                if ($country->title == $user_info['country']) {
                                                    echo "<option selected value='".$country->title."'>".$country->title."</option>";
                                                } else {
                                                    echo "<option value='".$country->title."'>".$country->title."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Город</p>
                                <input type="text" tabindex="5" class="form-control" name="city" value="<?=$user_info['city'];?>" >
                            </div>
                            <div class="form-group">
                                <p>Моб. телефон</p>
                                <input type="tel" tabindex="6" class="form-control" name="phone" value="<?=$user_info['mobile'];?>">
                            </div>
                            <div class="form-group">
                                <p>Skype</p>
                                <input type="tel" tabindex="7" class="form-control" name="skype" value="<?=$user_info['skype'];?>">
                            </div>
                            <div class="form-group">
                                <p>Ссылка на Вконтакте</p>
                                <input type="url" tabindex="8" class="form-control" name="vk" value="<?=$user_info['vk'];?>">
                            </div>
                            <div class="form-group">
                                <p>Ссылка на Facebook</p>
                                <input type="url" tabindex="9" class="form-control" name="fb" value="<?=$user_info['fb'];?>">
                            </div>
                            <div class="form-group">
                                <p>Ссылка на Google+</p>
                                <input type="url" tabindex="10" class="form-control" name="google" value="<?=$user_info['google'];?>">
                            </div>
                            <div class="form-group">
                                <p>Ссылка на Twitter</p>
                                <input type="url" tabindex="11" class="form-control" name="twitter" value="<?=$user_info['twitter'];?>">
                            </div>
                            <div class="form-group">
                                <p>Интересы</p>
                                <?php $arr = unserialize($user_info['interests']); ?>
                                <select class="selectpicker" name="interests[]" multiple>
                                    <option <?=in_array("Футбол", $arr) ? 'selected' : ''?> value="Футбол">Футбол</option>
                                    <option <?=in_array("Теннис", $arr) ? 'selected' : ''?> value="Теннис">Теннис</option>
                                    <option <?=in_array("Баскетбол", $arr) ? 'selected' : ''?> value="Баскетбол">Баскетбол</option>
                                    <option <?=in_array("Хоккей", $arr) ? 'selected' : ''?> value="Хоккей">Хоккей</option>
                                    <option <?=in_array("Бокс", $arr) ? 'selected' : ''?> value="Бокс">Бокс</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p><a name="about"></a>О себе</p>
                                <textarea tabindex="13" class="form-control text-area" maxlength="500" name="about"><?=$user_info['about'];?></textarea>
                            </div>

                    </div>
                </div>
                <div class="panel-footer">
                        <button type="submit" tabindex="12" class="btn btn-primary btn-md" name="submit">Сохранить</button>
                    </form>
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
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/template/assets/scripts/js/dropdown.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>
<script>
    $('.selectpicker').selectpicker({
        noneSelectedText: "Ваши интересы",
        size: 10
    });
</script>

</body>

</html>

