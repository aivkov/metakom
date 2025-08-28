<?php /** @global CMain $APPLICATION */

use Ms\Tools;
use Ms\Site;
?>

<header class="header">
    <div class="header__container container">
        <div class="header__left">
            <div>
                <a href="/" class="header__logo logo">
                    <img src="/local/img/logo.png" alt="Метаком-сервис">
                </a>
                <?php $APPLICATION->IncludeFile('/includes/metakom/header-city.php')?>
            </div>

            <?php $APPLICATION->IncludeFile('/includes/metakom/menu/top.php')?>
        </div>
        <div class="header__right">
            <?php if($phone = Site::getPhones()[0]):?>
                <div class="header__phones">
                    <a href="tel:<?=Tools::phoneToTel($phone)?>" class="header__phone"><?=$phone?></a>
                </div>
            <?php endif?>
            <div class="header__feedback">
                <a href="#" data-modal-ajax-open="call" class="header__feedback-link">Оставить заявку</a>
            </div>
            <div class="header__social">
                <?php $APPLICATION->IncludeFile('/includes/metakom/social.php')?>
            </div>
        </div>
    </div>
</header>