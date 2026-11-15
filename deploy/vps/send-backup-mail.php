<?php
chdir("/usr/share/nginx/html/office");
require "vendor/autoload.php";
require "vendor/yiisoft/yii2/Yii.php";
require "common/config/bootstrap.php";
require "frontend/config/bootstrap.php";
$config = yii\helpers\ArrayHelper::merge(
    require "common/config/main.php",
    require "common/config/main-local.php",
    require "frontend/config/main.php",
    require "frontend/config/main-local.php"
);
new yii\web\Application($config);
$body = file_get_contents("/tmp/backup-mail-body.txt");
$ok = Yii::$app->mailer->compose()
    ->setFrom(["taxi.easy.ua.sup@gmail.com" => "Офис on-line"])
    // Andrii only — do not add Any / other recipients
    ->setTo(["andrey18051@gmail.com"])
    ->setSubject("Копия баз Офиса и ОМП")
    ->setTextBody($body)
    ->send();
echo $ok ? "MAIL_OK\n" : "MAIL_FAIL\n";
